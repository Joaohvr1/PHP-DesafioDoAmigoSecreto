<?php
$db = new mysqli("localhost", "root", "root", "amigosecreto");


if ($db->connect_error) {
    die("Erro: Falha ao conectar ao banco de dados");
}


require_once '../controllers/HomeController.php';

$controller = new HomeController($db);
$controller->listarAmigosController();
?>
