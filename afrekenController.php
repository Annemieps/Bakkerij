<?php
session_start();
include_once './Presentation/afrekenen.php';

if ($_SESSION['gebruiker'] != "ingelogd"){
    header('location: loginController.php');
}


$product= new productService;
$prijs=$product->getPrijs($productID);
