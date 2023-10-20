<?php
header("Access-Control-Allow-Origin: *"); // Permitir que qualquer origem acesse o servidor (para desenvolvimento)
header("Access-Control-Allow-Methods: POST"); // Permitir apenas métodos POST
header("Access-Control-Allow-Headers: Content-Type"); // Permitir apenas o cabeçalho Content-Type

require 'bancoUsuarios.php';

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
} else {
    echo "Conexão bem sucedida!";
}

$data = json_decode(file_get_contents("php://input"));

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $criador = $data->criador;
    $nome = $data->nome;
    $login = $data->login;
    $ramal = $data->ramal;
    $patrimonio = $data->patrimonio;
    $informacao = $data->informacao;
    $local = $data->local;
    $userId = $data->userId;
    $tipo = $data->tipo;
    $chamado = $data->chamado;
    $created_at = $data->created_at;
    $destinatario = $data->destinatario;


    $sql = "INSERT INTO tickets (user_id, criador, nome, login, ramal, patrimonio, informacao, local, chamado, destinatario, status, created_at, tipo) VALUES ('$userId',  '$criador', '$nome','$login', '$ramal', '$patrimonio', '$informacao', '$local', '$chamado', '$destinatario', 'Aberto', '$created_at', '$tipo')";
    
    $resultado = $conexao->query($sql);
    if ($resultado === FALSE) {
        echo "Erro na consulta: " . $conexao->error;
    } else {
        echo "Dados adicionados no banco";
    }

}

$conexao->close();

?>