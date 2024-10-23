<?php

    require_once '../controllers/AmigoController.php';

    $db = new mysqli("localhost", "root", "root", "amigosecreto");


    if ($db->connect_error) {
        die("Erro: Falha ao conectar ao banco de dados");
    }

    $controller = new AmigoController($db);

    $action = isset($_GET['action']) ? $_GET['action'] : 'listarAmigos';
    switch ($action) {
        case 'realizarSorteio':
            $controller->realizarSorteioController();
            break;
        default:
            $controller->listarAmigosController();
            break;
    }


?>