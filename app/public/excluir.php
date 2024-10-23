<?php
require_once '../models/Amigo.php';
require_once '../controllers/RegistrarController.php';

// Conexão com o banco de dados
$dbConnection = new mysqli('localhost', 'root', 'root', 'amigosecreto');

// Inicializa o controlador
$controller = new RegistrarController($dbConnection);
$controller->excluirAmigoController();
?>
