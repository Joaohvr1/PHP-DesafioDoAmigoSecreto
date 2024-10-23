<?php
require_once '../models/Amigo.php';

class RegistrarController {
    private $model;
    private $titulo = ["Registrar Amigo", "Editar Amigo"];

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
            } elseif ($this->model->nomeExists($nome)) {
                $message = "Amigo com esse nome já cadastrado";
                $isFormValid = false;
            } else {
                $result = $this->model->registrarAmigos($nome, $email);
                $message = $result ? "Amigo registrado com sucesso!" : "Erro ao registrar amigo.";
            }
        }

        include '../views/Registro.php';
    }

    public function editarAmigoController() {
        $message = "";
        $nome = "";
        $email = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = trim($_POST["nome"]);
            $email = trim($_POST["email"]);

            if (!empty($nome) && !empty($email)) {
                $result = $this->model->editarAmigos($nome, $email);
                $message = $result ? "Amigo atualizado com sucesso!" : "Erro ao atualizar amigo.";
            } else {
                $message = "Preencha todos os campos.";
            }
        } elseif (isset($_GET['nome'])) {
            $nome = $_GET['nome'];
            $amigo = $this->model->buscarAmigos($nome);
            if ($amigo) {
                $nome = $amigo['nome'];
                $email = $amigo['email'];
            } else {
                $message = "Amigo não encontrado.";
            }
        }

        include '../views/Editar.php';
    }

    public function excluirAmigoController() {
        $message = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome'])) {
            $nome = $_POST['nome'];
            $result = $this->model->deletaAmigos($nome);
            $message = $result ? "Amigo excluído com sucesso!" : "Erro ao excluir amigo.";
        }

        header("Location: ../public/index.php");
    }
}
?>
