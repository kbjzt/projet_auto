<?php

class AdminVoitureController{
    private $advm;

    public function __construct()
    {
        $this->advm = new AdminVoitureModel;
    }

    public function listVoiture(){
        $cars = $this->advm->getVoitures();
        require_once('./views/admin/voitures/adminVoituresItems.php');
        // echo '<pre>';
        // var_dump($cars);
        // echo '</pre>';


    }
}