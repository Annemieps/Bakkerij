<?php
session_start();
require_once './Business/bestellingService.php';

//aanmaken lijst bestellingen
$bestellingservice = new bestellingService();
$bestellingLijst = $bestellingservice->getBestelling($_SESSION['user']);


if (isset($_GET['verwijder'])){
    var_dump($_GET);
    $bestellingservice = new bestellingService();
    $verwijder=$bestellingservice->verwijderBestelling($_GET["verwijder"]);
    
    //header('location: accountOverzichtController.php');
}

include_once './Presentation/accountOverzicht.php';