<?php

require_once 'Data/productenDAO.php';
require_once 'Entities/Product.php';

class productService{
    public function getProductenOverview(){
        $productenDAO=new productDAO;
        $productenLijst=$productenDAO->getAllProducts();
        return $productenLijst;
    }
}