<?php

session_start();
require_once './Business/productenService.php';
require_once './Business/klantService.php';
require_once './Business/bestellinglijnService.php';
require_once './Business/bestellingService.php';

//als niet aangemeld doorsturen
if ($_SESSION['gebruiker'] != "ingelogd") {
    header('location: loginController.php');
    exit(0);
}

//info ophalen over product aan de hand van productID
$productservice = new productService;
$prijs = $productservice->getPrijsEnNaam($_SESSION["winkelmandje"]);


//afrekenenen moet true zijn
if (isset($_GET['betalen']) && $_GET["betalen"] = true) {

    //de klant moet toelating hebben om te bestellen
    $klantService = new KlantService;
    $status = $klantService->checkStatus($_SESSION['user']);

    if ($status = false) {
        header('location: afrekenController?error=verboden.php');
        exit(0);
    }

   
    //als de klant toestemming heeft word er gekeken naar de datum, als deze hoger is dan vandaag dan word er gesubmit naar de databank.
    if (date("jnY",strtotime($_POST["bestellingsdatum"])) > date("jnY",strtotime('now')) && date("jnY",strtotime($_POST['bestellingsdatum'])) < date('jnY', strtotime('now +3 day'))) {
        
        $bestellinglijnService = new bestellingLijnService;
        $bestellingService = new bestellingService();

        //resultaat ophalen of er een bestelling bestaat of niet
        $alEenBestelling = $bestellingService->alEenBestelling($_SESSION["user"], $_POST["bestellingsdatum"]);
        
        //als er geen rijen terug komen voor die user op die datum dan mag er besteld worden
        if ($alEenBestelling == null) {
            $bestellingService->insertBestelling($_SESSION["user"], date("j-n-Y",strtotime($_POST["bestellingsdatum"])));
            
            //alle lijnen afloopen van het order
            for ($i = 0; $i < count($_SESSION["winkelmandje"]); $i++) {
               
                $bestellinglijnService->insertLijnen($_SESSION["winkelmandje"][$i]["BestellingsID"],$_SESSION["winkelmandje"][$i]["productID"], $_SESSION["winkelmandje"][$i]["hoeveelheid"]);
                echo 'HELP';
            }
                
                //als er toestemming is, als de datum juist is, als er nog geen bestelling is voor die datum, als de bestelling en de bestellingslijnen in de databank zitten
                //dan mag er bevestigd worden en de sessie unsetten.
                //unset($_SESSION["winkelmandje"]);
                //header('location: presentation/proficiat.php'); 
                //exit(0);
        } else {
//            header('location: afrekenController?error=DatumBezet.php');
//            exit(0);
        }
    } else {
//        header('location: afrekenController?error=DatumIncorrect.php');
//        exit(0);
    }
}
include_once './Presentation/afrekenen.php';
