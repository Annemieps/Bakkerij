<?php

session_start();
require_once './Business/productenService.php';
require_once './Business/klantService.php';
require_once './Business/bestellinglijnService.php';
require_once './Business/bestellingService.php';

//als niet aangemeld doorsturen
if (!isset($_SESSION['user']) || !isset($_SESSION['winkelmandje']) || !isset($_SESSION)) {
    header('location: loginController.php');
    exit(0);
}

//info ophalen over product aan de hand van productID
$productservice = new productService;
$prijs = $productservice->getPrijsEnNaam($_SESSION['winkelmandje']);


//afrekenenen moet true zijn
if (isset($_GET['betalen']) && $_GET['betalen'] = true) {

    //de klant moet toelating hebben om te bestellen
    $klantService = new KlantService;
    $status = $klantService->checkStatus($_SESSION['user']);

    if ($status = false) {
        header('location: afrekenController.php?error=verboden');
        exit(0);
    }


    //als de klant toestemming heeft word er gekeken naar de datum, als deze hoger is dan vandaag dan word er gesubmit naar de databank.
    if ($_POST['bestellingsdatum'] > strtotime('now') && $_POST['bestellingsdatum'] < strtotime('+3 day')) {

        $bestellinglijnService = new bestellingLijnService();
        $bestellingService = new bestellingService();

        //resultaat ophalen of er een bestelling bestaat of niet.
        //Werkt in realiteit niet omdat de datum uit de databank komt met minuten en seconden en die waarmee vergeleken word 
        //is de gekozen datum met het uur + minuten van de bestelling. Want het is bv: now +1 day. 
        $datumArray = $bestellingService->getDatum($_SESSION['user']);
        $alEenBestelling = in_array($_POST['bestellingsdatum'], $datumArray);

        //als er geen rijen terug komen voor die user op die datum dan mag er besteld worden
        if ($alEenBestelling == FALSE) {
            $bestellingService->insertBestelling($_SESSION['user'], $_POST['bestellingsdatum']);
            
            //alle lijnen afloopen van het order
            for ($i = 0; $i < count($_SESSION['winkelmandje']); $i++) {
                $bestellinglijnService->insertLijnen($_SESSION['winkelmandje'][$i]['BestellingsID'], $_SESSION['winkelmandje'][$i]['productID'], $_SESSION['winkelmandje'][$i]['hoeveelheid']);
            }

            //als er toestemming is, als de datum juist is, als er nog geen bestelling is voor die datum, als de bestelling en de bestellingslijnen in de databank zitten
            //dan mag er bevestigd worden en de sessie unsetten.
            unset($_SESSION['winkelmandje']);
            header('location: accountOverzichtController.php');
            exit(0);
        } else {
            header('location: afrekenController.php?error=DatumBezet');
            exit(0);
        }
    } else {
        header('location: afrekenController.php?error=DatumIncorrect');
        exit(0);
    }
}
include_once './Presentation/afrekenen.php';
