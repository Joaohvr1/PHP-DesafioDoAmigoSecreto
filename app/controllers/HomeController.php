<?php
require_once '../models/Amigo.php';

class HomeController {
    private $model;

    public function __construct($dbConnection) {
        $this->model = new Amigo($dbConnection);
    }


    public function listarAmigosController(){
        $nomes = $this->model->listarAmigos(); 
        include '../views/Home.php'; 
    }

    
    public function sortearAmigoController() {
        $nomes = $this->model->listarNomes(); 
        $nome = "teste";
        $sorteados = [];
        $message = ""; 

        if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
            if(isset($_POST['sortear'])) {
                if (!empty($nomes)) {
                    $nomesEmbaralhados = $nomes;
                    shuffle($nomesEmbaralhados);
        
                    for ($i = 0; $i < count($nomes); $i++) {
                        do {
                            $sorteado = $nomesEmbaralhados[$i % count($nomes)];
                        } while ($sorteado === $nomes[$i]); 
        
                        $sorteados[$nomes[$i]] = $sorteado; 
                    }
                    $message = "Sorteio realizado com sucesso!";
                } else {
                    $message = "Nenhum amigo cadastrado para sortear.";
                }
                
        }
        
    }
    include '../views/Sortear.php';

}

    
}



?>
