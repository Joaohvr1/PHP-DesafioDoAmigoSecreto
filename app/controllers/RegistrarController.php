<?php
require_once '../models/Amigo.php';
require_once '../config/database.php';

class RegistrarController {
    private $model;

    public function __construct($dbConnection) {
        $this->model = new Amigo($dbConnection);
    }

    public function registrarAmigoController() {
        $message = "";
        $isFormValid = true;
        $nome = "";
        $email = "";
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = trim($_POST['nome']);
            $email = trim($_POST['email']);
    
            if (empty($nome) || empty($email)) {
                $message = "Preencha todos os campos";
                $isFormValid = false;
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = "Email inválido";
                $isFormValid = false;
            } elseif ($this->model->emailExists($email)) {
                $message = "O email já está cadastrado";
                $isFormValid = false;
            } else {
                $result = $this->model->registrarAmigos($nome, $email);
                if (strpos($result, 'sucesso') !== false) {
                    $message = $result; 
                } else {
                    $message = "Erro ao registrar amigo: " . $result; 
                    $isFormValid = false;
                }
            }
        }
    
        include '../views/Registro.php';
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
            include '../views/Sortear.php';
        }
    }
    
}
?>
