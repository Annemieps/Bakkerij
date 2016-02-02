<?php

class afrekenService{
    //Notice: Undefined variable: plus in C:\xampp\htdocs\Bakkerij\afrekenController.php on line 17
    //Fatal error: Non-static method DateTime::add() cannot be called statically, assuming $this from incompatible context in C:\xampp\htdocs\Bakkerij\Business\afrekenService.php on line 6
    public function dagBerekenen($plus){
        $vandaag=date("j m Y");
        $dag=  DateTime::add($vandaag,$plus);
        return $dag;
    }
}