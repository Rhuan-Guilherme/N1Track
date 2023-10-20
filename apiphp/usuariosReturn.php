<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");

require 'ConectBanco/bancoUsuarios.php';

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Consulta SQL para buscar todos os usuários
$sql = "SELECT u.*, COUNT(c.id) AS total_chamados 
        FROM usuarios u 
        LEFT JOIN tickets c ON u.id = c.user_id 
        GROUP BY u.id";

$result = $conexao->query($sql);

if ($result === FALSE) {
    die("Erro na consulta: " . $conexao->error);
}

$usuarios = array();

while ($row = $result->fetch_assoc()) {
    $usuarios[] = $row;
}

// Retorna os dados em formato JSON
echo json_encode($usuarios);

$conexao->close();
?>
