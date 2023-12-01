<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");

require '../ConectBanco/bancoUsuarios.php';

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

$sql = "SELECT * FROM tickets WHERE secao = 'n2' ORDER BY id DESC";

$result = $conexao->query($sql);

    if ($result === FALSE) {
        die("Erro na consulta: " . $conexao->error);
    }

    $dados = array();

    while ($row = $result->fetch_assoc()) {
        $dados[] = $row;
    }

    // Retorna os dados em formato JSON
    echo json_encode($dados);

$conexao->close();
?>
