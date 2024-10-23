<?php
require_once '../models/Amigo.php';
require_once '../config/database.php';

class AmigoController {
    private $model;

    public function __construct($dbConnection) {
        $this->model = new Amigo($dbConnection);
    }


    public function listarAmigosController(){
        $nomes = $this->model->listarNomes(); 
        include '../views/Home.php'; 
    }
}



?>
