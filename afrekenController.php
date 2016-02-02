<?php
session_start();
require_once './Business/productenService.php';
require_once './Business/afrekenService.php';

//als niet aangemeld doorsturen
if ($_SESSION['gebruiker'] != "ingelogd"){
    header('location: loginController.php');
}

//info ophalen over product aan de hand van productID
$productservice= new productService;
$prijs=$productservice->getPrijsEnNaam($_SESSION["winkelmandje"]);

//De dag berekenen voor de bestelling
//$afrekenservice=new afrekenService();
//$dag=$afrekenservice->dagBerekenen($plus);

if(isset($_GET['betalen']) && $_GET["betalen"]==true){
    
}
include_once './Presentation/afrekenen.php';