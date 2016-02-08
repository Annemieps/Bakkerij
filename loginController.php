<?php

session_start();

require_once './Business/klantService.php';
//voor het woord admin te veranderen in een hash. Puur voor login account
//$klantenService = new KlantService();
//$admin = $klantenService->adminpw();
//echo $admin . '<br>';

//als er op de inlog knop geduwd is dan:
if (isset($_GET["action"]) && $_GET["action"] == "login") {
    //en als de velden gevuld zijn
    if (isset($_POST['email'], $_POST['wachtwoord'])) {
        //dan word het email adress gesanitized en het wachtwoord gecontroleerd door preg_replace
         $email=filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
         $wachtwoord= preg_replace("/[^a-zA-Z]+/", "", $_POST["wachtwoord"]);
         
         //nieuwe klantenservice die email en wachtwoord invoerd voor login
        $klantService = new KlantService();
        $klant = $klantService->logIn($email, $wachtwoord);
        if ($klant == "juist") {
            $_SESSION['user'] = $email;
            header("location: productenlijstController.php");
            exit(0);
        } elseif ($klant == "emailJwachtwoordF") {
            header("location: logincontroller.php?error=wachtwoordfout");
            exit(0);
        } elseif ($klant == "fout") {
            header("location: logincontroller.php?error=failed");
            exit(0);
        }
    }
}


include './Presentation/login.php';
