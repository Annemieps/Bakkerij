<?php

require_once './Business/klantService.php';
require_once './exceptions/emailBestaatAlException.php';



if (isset($_GET["action"]) && $_GET["action"] == "toevoegen") {

    try {
//        if (filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL)) {
//            if (filter_input(INPUT_POST, "adres", FILTER_SANITIZE_STRING)) {
//                if (filter_input(INPUT_POST, "postcode", FILTER_SANITIZE_NUMBER_INT)) {
                   // $_POST["voornaam"] = preg_replace("/[^A-Z]+/", "", $_POST["voornaam"]);
                    //$_POST["familienaam"] = preg_replace("/[^A-Z]+/", "", $_POST["familienaam"]);
                    //$_POST["gemeente"] = preg_replace("/[^A-Z]+/", "", $_POST["gemeente"]);
                    
                    
                    $wachtwoord = new KlantService();
                    $wachtwoord = $wachtwoord->safety();
                    $klantService = new KlantService();
                    $klantService->maakKlant($_POST['email'], $wachtwoord, $_POST['voornaam'], $_POST['familienaam'], $_POST['adres'], $_POST['postcode'], $_POST['gemeente'], 1);
                    header("location: voegklanttoe.php?action=gelukt");
                    exit(0);    
                    
                    //header("location: productenlijstController.php");
                    //exit(0);
//                }
//                header("location: voegKlantToe.php?error=postcode");
//                exit(0);
//            }
//            header("location: voegKlantToe.php?error=adres");
//            exit(0);
//        }
//        header("location: voegKlantToe.php?error=email");
//        exit(0);
    } catch (emailBestaatAlException $ex) {
        header("location: voegKlantToe.php?error=emailBestaatAl");
        exit(0);
    }
}
include_once './Presentation/maakAccount.php';
