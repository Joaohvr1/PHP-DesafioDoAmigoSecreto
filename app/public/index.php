<?php
// Conectando ao banco de dados
$db = new mysqli("localhost", "root", "root", "amigosecreto");


if ($db->connect_error) {
    die("Erro: Falha ao conectar ao banco de dados");
}


// Inclui o controlador
require_once '../controllers/AmigoController.php';

// Instancia o controlador
$controller = new AmigoController($db);
$controller->listarAmigosController();
?>
