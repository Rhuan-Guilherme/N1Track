<?php
require '../ConectBanco/bancoUsuarios.php';

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE usuarios SET autorizado = 'sim' WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        // Obtém o e-mail do usuário aprovado
        $query = "SELECT email FROM usuarios WHERE id = $id";
        $result = $conexao->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $emailAprovado = $row['email'];

            // Agora você pode usar $emailAprovado conforme necessário
            echo "Usuário aprovado com sucesso! E-mail do usuário: $emailAprovado";
        } else {
            echo "Erro ao obter e-mail do usuário.";
        }
    } else {
        echo "Erro ao aprovar usuário: " . $conexao->error;
    }
}

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "atendimento@n1track.com";
    $to = $emailAprovado;
    $subject = "N1track - Conta aprovada com sucesso";
    $message = "Agradecemos por se cadastrar no N1track! Sua conta foi aprovada com sucesso, e agora você pode desfrutar plenamente do nosso sistema para gerenciar e abrir chamados. Estamos ansiosos para oferecer a você uma experiência eficiente e satisfatória. Seja bem-vindo!";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "The email message was sent.";

$conexao->close();
?>