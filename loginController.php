<?php

require_once './Business/klantService.php';
//voor het woord admin te veranderen in een hash. Puur voor login account
//$klantenService = new KlantService();
//$admin = $klantenService->adminpw();
//echo $admin . '<br>';


if (isset($_GET["action"]) && $_GET["action"] == "login") {

    $klantService = new KlantService();
    $klant = $klantService->logIn($_POST['email'], $_POST['wachtwoord']);
    if ($klant == "juist") {
        header("location: login.php?action=succes");
        exit(0);
    } elseif ($klant == "emailJwachtwoordF") {
        header("location: login.php?action=wachtwoordfout");
        exit(0);
    } elseif ($klant == "fout") {
        header("location: login.php?action=failed");
        exit(0);
    }
}


include './Presentation/login.php';
