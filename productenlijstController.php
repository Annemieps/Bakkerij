<?php

session_start();
require_once './Business/productenService.php';
require_once './Business/bestellinglijnService.php';

//lijst producten om uit te loopen
$productenservice = new productService();
$productenLijst = $productenservice->getProductenOverview();

//laatste bestellingsID ophalen voor in de sessie te stoppen met alle bestellingslijnen
$bestellinglijnService = new bestellingLijnService();
$laatstebestellingsID= $bestellinglijnService->getLaatsteLijn();
//echo $laatstebestellingsID;

//als de user doorkomt van de login pagina dan word de sessie gebruiker als ingelogd gezet
if (isset($_GET['action']) && $_GET['action'] = "succes") {
    $_SESSION['gebruiker'] = "ingelogd";
}
//als de user niet ingelogd is dan word die doorgestuurd naar de loginController
if (!isset($_SESSION['user'])) {
    header('location: loginController.php');
}

//Als er een product toegevoegd is 
if (isset($_GET['product'])) {
    
    //dan word er in een array winkelmandje het productid gestopt en de hoeveelheid
    $_SESSION['winkelmandje'][] = array("BestellingsID" => $laatstebestellingsID+1,"productID" => $_GET['product'], "hoeveelheid" => $_POST['hoeveelheid']);
   

   
}

include './Presentation/productenOverzicht.php';
