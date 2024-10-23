<?php
$db = new mysqli("localhost", "root", "root", "amigosecreto");


if ($db->connect_error) {
    die("Erro: Falha ao conectar ao banco de dados");
}


require_once '../controllers/RegistrarController.php';

$controller = new RegistrarController($db);
$controller->registrarAmigoController();
?>
