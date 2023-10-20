<?php
header("Access-Control-Allow-Origin: *"); // Permitir que qualquer origem acesse o servidor (para desenvolvimento)
header("Access-Control-Allow-Methods: POST"); // Permitir apenas métodos POST
header("Access-Control-Allow-Headers: Content-Type"); // Permitir apenas o cabeçalho Content-Type

require 'ConectBanco/bancoUsuarios.php';

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
} else {
    echo "Conexão bem sucedida!";
}

$data = json_decode(file_get_contents("php://input"));

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $chamado_id = $data->chamado_id; 
    $nome = $data->nome;
    $login = $data->login;
    $ramal = $data->ramal;
    $patrimonio = $data->patrimonio;
    $informacao = $data->informacao;
    $local = $data->local;
    $chamado = $data->chamado;
    $destinatario = $data->destinatario;

    // Verifique se o chamado com o ID fornecido existe antes de tentar atualizar
    $verificar_chamado = "SELECT * FROM tickets WHERE id = $chamado_id";
    $result_verificar = $conexao->query($verificar_chamado);

    if ($result_verificar === FALSE) {
        echo "Erro na consulta: " . $conexao->error;
    } else {
        if ($result_verificar->num_rows > 0) {
            // O chamado com o ID fornecido existe, agora atualize os dados
            $sql = "UPDATE tickets SET
                nome = '$nome',
                login = '$login',
                ramal = '$ramal',
                patrimonio = '$patrimonio',
                informacao = '$informacao',
                local = '$local',
                chamado = '$chamado',
                destinatario = '$destinatario'
                WHERE id = $chamado_id";

            $resultado = $conexao->query($sql);
            if ($resultado === FALSE) {
                echo "Erro na consulta: " . $conexao->error;
            } else {
                echo "Chamado atualizado com sucesso";
            }
        } else {
            echo "Chamado não encontrado com o ID fornecido";
        }
    }
}

$conexao->close();
?>
