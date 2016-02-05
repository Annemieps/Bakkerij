<?php

require_once './Business/klantService.php';
require_once './exceptions/emailBestaatAlException.php';



if (isset($_GET["action"]) && $_GET["action"] == "toevoegen") {

    try {
//        if (filter_var(INPUT_POST, "email", FILTER_SANITIZE_EMAIL)) {
//            if (filter_var(INPUT_POST, "adres", FILTER_SANITIZE_STRING)) {
//                if (filter_var(INPUT_POST, "postcode", FILTER_SANITIZE_NUMBER_INT)) {
//                    $voornaam = preg_replace("/[^A-Z]+/", "", $_POST["voornaam"]);
//                    $familienaam = preg_replace("/[^A-Z]+/", "", $_POST["familienaam"]);
//                    $gemeente = preg_replace("/[^A-Z]+/", "", $_POST["gemeente"]);
                    
                    
                    $klantService = new KlantService();
                    $wachtwoord = $klantService->safety();
                    $klantService->maakKlant($_POST['email'], $wachtwoord, $voornaam, $familienaam, $_POST['adres'], $_POST['postcode'], $gemeente, 1);
                    header("location: voegklanttoe.php?action=gelukt");
                    exit(0);    
                    
//                    header("location: productenlijstController.php");
//                    exit(0);
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
