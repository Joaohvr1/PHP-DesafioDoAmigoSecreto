<?php
class Amigo {
    private $DB;

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

    public function editarAmigos($nome, $email) {
        $sqlQueryUpdate = "UPDATE sorteio SET nome = ?, email = ? WHERE nome = ?"; 
        

        $stmt = $this->DB->prepare($sqlQueryUpdate);
        if (!$stmt) {
            return "Erro ao preparar dados para UPDATE: " . $this->DB->error;
        }
    
        $stmt->bind_param("sss", $nome, $email, $nome); 
    
        if ($stmt->execute()) {
            return "Amigo atualizado com sucesso";
        } else {
            return "Erro: " . $stmt->error;
        }
    }
    
    public function deletaAmigos($nome){

        $nome = $this->DB->real_escape_string($nome);
        $sqlQuery = "DELETE FROM sorteio where nome = ?   ";
        $stmt = $this->DB->prepare($sqlQuery);
        if (!$stmt) {
            return "Erro ao deletar dados em prepare" . $this->DB->error;
        }

        $stmt->bind_param("s", $nome);

        if( $stmt->execute() ){
            return "Amigo deletado";
        } else {
            return "Erro: " . $stmt->error;
        }

    }
    public function listarNomes() {

        $sqlQuery = "SELECT nome FROM sorteio"; 
        $result = $this->DB->query($sqlQuery);

        $nomes = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nomes[] = $row['nome'];
            }
        }

        return $nomes;
    }

    public function listarAmigos(){
        $sqlQuery = "SELECT * FROM sorteio";
        $result = $this->DB->query($sqlQuery);

        $nomes = [];
        $emails = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nomes[] = $row['nome'];
            }
        }

        return $nomes ;

    }

    public function emailExists($email){

        $sqlQuery = "SELECT * FROM sorteio WHERE email = ?";
        $stmt = $this->DB->prepare($sqlQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows > 0; 
    }
    
    public function nomeExists($nome){
        $sqlQuery = "SELECT * FROM sorteio WHERE nome = ?";
        $stmt = $this->DB->prepare($sqlQuery);
        $stmt->bind_param("s", $nome);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result ->num_rows > 0;
    }

    public function buscarAmigoPorNome($nome) {
        $sqlQuerySelect = "SELECT nome, email FROM sorteio WHERE nome = ? ";
        $stmt = $this->DB->prepare($sqlQuerySelect);
        
        if (!$stmt) {
            return null; 
        }
    
        $stmt->bind_param("s", $nome); 
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_assoc();
    }
    public function buscarAmigo($nome, $email) {

        $nome = '%' . $this->DB->real_escape_string($nome) . '%';
        $email = '%' . $this->DB->real_escape_string($email) . '%';
    
        $sqlQuery = "SELECT nome, email FROM sorteio WHERE nome LIKE ? OR email LIKE ?";
    
        $stmt = $this->DB->prepare($sqlQuery);
        if (!$stmt) {
            return null; 
        }
    
        $stmt->bind_param("ss", $nome, $email); 
    
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        $usuarios = [];
        while ($row = $result->fetch_assoc()) {
            $usuarios[] = $row; 
        }
    
        return $usuarios; 
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
