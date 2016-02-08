<?php

require_once './Business/klantService.php';
require_once './exceptions/emailBestaatAlException.php';



if (isset($_GET["action"]) && $_GET["action"] == "toevoegen") {

    try {
            if(isset($_POST["email"],$_POST["adres"],$_POST["voornaam"],$_POST["familienaam"],$_POST["gemeente"],$_POST["postcode"])){
                
                    $email=filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
                    $voornaam = preg_replace("/[^a-zA-Z]+/", "", $_POST["voornaam"]);
                    $familienaam = preg_replace("/[^a-zA-Z]+/", "", $_POST["familienaam"]);
                    $adres = preg_replace("/[^a-zA-Z]+/", "", $_POST["adres"]);
                    $gemeente = preg_replace("/[^a-zA-Z]+/", "", $_POST["gemeente"]);
                    $postcode= preg_replace("/[^0-9]/","", $_POST["postcode"]);
                    
                    $klantService = new KlantService();
                    $wachtwoord = $klantService->safety();
                    $klantService->maakKlant($email, $wachtwoord, $voornaam, $familienaam, $adres, $postcode, $gemeente, 1);
                    setcookie("user", $email, time()+60*60*24*30);
                    header("location: voegklanttoe.php?action=gelukt");
                    exit(0);    
                    
                }
                else{
                header("location: voegKlantToe.php?error=leeg");
                exit(0);
                }
                
    } catch (emailBestaatAlException $ex) {
        header("location: voegKlantToe.php?error=emailBestaatAl");
        exit(0);
    }
}
include_once './Presentation/maakAccount.php';
