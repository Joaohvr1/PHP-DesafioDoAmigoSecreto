<?php

class Amigo {
    private $DB;

    // O construtor deve receber a conexão como parâmetro
    public function __construct($dbConnection) {
        $this->DB = $dbConnection; 
    }

    public function registrarAmigos($nome, $email) {
        $sqlQuery = "INSERT INTO sorteio (NOME, EMAIL) VALUES (?, ?)";
        $stmt = $this->DB->prepare($sqlQuery);

        if (!$stmt) {
            return "Erro na preparação: " . $this->DB->error;
        }

        $stmt->bind_param("ss", $nome, $email);

        if ($stmt->execute()) {
            return "Amigo registrado com sucesso";
        } else {
            return "Erro: " . $stmt->error; 
        }
    }

    public function listarNomes() {
        $sqlQuery = "SELECT nome FROM sorteio"; // Corrigido para usar a tabela correta
        $result = $this->DB->query($sqlQuery);

        $nomes = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nomes[] = $row['nome'];
            }
        }

        return $nomes;
    }
}
