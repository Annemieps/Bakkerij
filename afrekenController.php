<?php

include_once './Presentation/afrekenen.php';

if ($_SESSION['gebruiker'] != "ingelogd"){
    header('location: loginController.php');
}