<?php
$servername = "localhost";
$username = "root";
$password = "root"; 
$dbname = "amigosecreto"; 


try{
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
} catch (e){
    die("Falha ao conectar ao banco de dados ". e);
}


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Retorna a conexão
return $conn;
?>
