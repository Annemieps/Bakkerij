<?php
session_start();
require_once './Business/bestellingService.php';

//aanmaken lijst bestellingen
$bestellingservice = new bestellingService();
$bestellingLijst = $bestellingservice->getBestelling($_SESSION['user']);

if (isset($_GET['verwijder'])){
    
}

include_once './Presentation/accountOverzicht.php';