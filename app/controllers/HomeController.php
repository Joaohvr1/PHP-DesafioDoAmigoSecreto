<?php
require_once '../models/Amigo.php';

class HomeController {
    private $model;

    public function __construct($dbConnection) {
        $this->model = new Amigo($dbConnection);
    }


    public function listarAmigosController(){
        $nomes = $this->model->listarNomes(); 
        include '../views/Home.php'; 
    }

    
    public function sortearAmigoController() {
        $nomes = $this->model->listarNomes(); 
        $sorteado = null;

        if (!empty($nomes)) {
            $sorteado = $nomes[array_rand($nomes)]; 
        }
    }

    public function realizarSorteioController() {
        $sorteios = $this->model->realizarSorteio(); 
    
        if (is_string($sorteios)) {
            $message = $sorteios;
            include '../views/Home.php'; 
        } else {
            include '../views/Sorteio.php';
        }
    }
    
}



?>
