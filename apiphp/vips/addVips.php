<?php
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: POST"); 
header("Access-Control-Allow-Headers: Content-Type"); 

require '../ConectBanco/bancoUsuarios.php';

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
} else {
    echo "Conexão bem sucedida!";
}

$data = json_decode(file_get_contents("php://input"));

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $data->nome;
    $login = $data->login;
    
    $sql = "INSERT INTO vips (nome, login) VALUES ('$nome','$login')";
    
    $resultado = $conexao->query($sql);
    if ($resultado === FALSE) {
        echo "Erro na consulta: " . $conexao->error;
    } else {
        echo "Dados adicionados no banco";
    }
}

$conexao->close();

?>