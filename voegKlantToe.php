<?php

require_once './Business/klantService.php';
require_once './exceptions/emailBestaatAlException.php';



if (isset($_GET["action"]) && $_GET["action"] == "toevoegen") {

    try {
        $wachtwoord = new KlantService();
        $wachtwoord = $wachtwoord->safety();

        $klantService = new KlantService();
        $klantService->maakKlant($_POST['email'], $wachtwoord, $_POST['voornaam'], $_POST['familienaam'], $_POST['adres'], $_POST['postcode'], $_POST['gemeente'], 1);

        header("location: productenlijstController.php");
        exit(0);
        
    } catch (emailBestaatAlException $ex) {
        header("location: voegKlantToe.php?error=emailBestaatAl");
        exit(0);
    }
}
include_once './Presentation/maakAccount.php';
