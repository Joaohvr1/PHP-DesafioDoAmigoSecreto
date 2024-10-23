<?php

    require_once '../controllers/HomeController.php';

    $db = new mysqli("localhost", "root", "root", "amigosecreto");


    if ($db->connect_error) {
        die("Erro: Falha ao conectar ao banco de dados");
    }

    $controller = new HomeController($db);
    $controller->sortearAmigoController();


?>