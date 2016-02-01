<?php
session_start();
require_once './Business/productenService.php';

$productenservice= new productService;
$productenLijst=$productenservice->getProductenOverview();


var_dump($_SESSION['user']);
if (isset($_GET['action']) && $_GET['action']="succes"){
   $_SESSION['gebruiker']="ingelogd";
   
}
if ($_SESSION['gebruiker'] != "ingelogd"){
    header('location: loginController.php');
}

if (isset($_GET['product'])){
$winkelmand= array("productID" => $_GET['product'], "hoeveelheid" => $_POST['hoeveelheid']);
$_SESSION['winkelmandje']=$winkelmand;

    var_dump($_SESSION['winkelmandje']);
}

include './Presentation/productenOverzicht.php';