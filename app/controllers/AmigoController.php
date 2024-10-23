<?php
require_once '../models/Amigo.php';
require_once '../config/database.php';

class AmigoController {
    private $model;

    public function __construct($dbConnection) {
        $this->model = new Amigo($dbConnection);
    }

    // Criando função para registrar amigos
    public function registrarAmigoController() {
        $message = "";

        // Verifica se o formulário foi enviado para o controlador pelo metodo POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $message = $this->model->registrarAmigos($nome, $email);
        }

        // Inclui a view de registro
        include '../views/Registro.php';
    }

    // Cria função para listar os amigos na view
    public function listarAmigosController(){
        // Atribui a variável nomes o retorno da função listarNomes() do model Amigo.php
        $nomes = $this->model->listarNomes(); // Certifique-se de usar $this->model
        include '../views/Home.php'; // Inclui a view que lista os amigos
    }
}



?>
