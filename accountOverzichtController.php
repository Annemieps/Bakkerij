<?php
session_start();
require_once './Business/bestellingService.php';

//aanmaken lijst bestellingen
$bestellingservice = new bestellingService();
$bestellingLijst = $bestellingservice->getBestelling($_SESSION['user']);

if (!isset($_SESSION['user'])) {
    header('location: loginController.php');
}
if (isset($_GET['verwijder'])){
    var_dump($_GET);
    $bestellingservice = new bestellingService();
    $verwijder=$bestellingservice->verwijderBestelling($_GET["verwijder"]);
    
    header('location: accountOverzichtController.php');
}

if (isset($_GET['action'])&& $_GET['action']=="logout"){
    unset($_SESSION["user"]);
    header('location: indexController.php');
}

include_once './Presentation/accountOverzicht.php';

