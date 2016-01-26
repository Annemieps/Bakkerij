<?php
require_once './Business/productenService.php';

$productenservice= new productService;
$productenLijst=$productenservice->getProductenOverview();

include './Presentation/productenOverzicht.php';