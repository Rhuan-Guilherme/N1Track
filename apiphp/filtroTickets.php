<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");

require 'ConectBanco/bancoUsuarios.php';

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';
$tipo_ticket = isset($_GET['tipo_ticket']) ? $_GET['tipo_ticket'] : '';

if (!empty($user_id)) {
    // Consulta SQL para buscar todos os resultados com user_id igual a 18 e tipo de ticket especificado
    $sql = "SELECT * FROM tickets WHERE user_id = $user_id";

    if (!empty($tipo_ticket)) {
        $sql .= " AND tipo = '$tipo_ticket'";
    }

    $sql .= " ORDER BY id DESC";

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
} else {
    echo json_encode(array('message' => 'Parâmetros user_id ou tipo_ticket não fornecidos'));
}

$conexao->close();
?>