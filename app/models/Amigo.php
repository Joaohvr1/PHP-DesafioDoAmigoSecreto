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

    public function emailExists($email){

        $sqlQuery = "SELECT * FROM sorteio WHERE email = ?";
        $stmt = $this->DB->prepare($sqlQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows > 0; 
    }

    public function buscarAmigos($searchTerm) {
        $sqlQuery = "SELECT nome FROM sorteio WHERE nome LIKE ?";
        $stmt = $this->DB->prepare($sqlQuery);
        $searchTerm = "%$searchTerm%"; 
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $nomes = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nomes[] = $row['nome'];
            }
        }
    
        return $nomes;
    }
    
    public function realizarSorteio() {
        $nomes = $this->listarNomes();
    
        if (count($nomes) < 2) {
            return 'É necessário pelo menos 2 amigos para realizar o sorteio.';
        }
    
        $sorteios = [];
        $nomesCopia = $nomes; 
    
        foreach ($nomes as $nome) {
            $sorteadoIndex = array_rand($nomesCopia);
            $sorteado = $nomesCopia[$sorteadoIndex];
    
            $sorteios[$nome] = $sorteado;
    
            unset($nomesCopia[$sorteadoIndex]);
        }
    
        return $sorteios; 
    }
    
}
