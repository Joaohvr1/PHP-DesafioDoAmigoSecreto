<?php
require_once '../models/Amigo.php';

class HomeController {
    private $model;

    public function __construct($dbConnection) {
        $this->model = new Amigo($dbConnection);
    }

    public function listarAmigosController() {
        if (isset($_GET['search'])) {
            $searchTerm = trim($_GET['search']);
            $nomes = $this->model->buscarAmigos($searchTerm); 
        } else {
            $nomes = $this->model->listarNomes();
        }

        include '../views/Home.php';
    }


    
    public function sortearAmigoController() {
        $nomes = $this->model->listarNomes(); 
        $nome = "";
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
