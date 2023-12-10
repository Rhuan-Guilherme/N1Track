<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Aprovação de Usuários</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffffff;
            color: #333333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: black;
        }

        p {
            margin: 15px 0;
        }

        .success {
            color:  black;
        }

        .error {
            color: #e74c3c;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            color: #2980b9;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Resultado da Aprovação</h2>

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
                echo "<p class='success'>Usuário aprovado com sucesso! E-mail do usuário: $emailAprovado</p>";

                // Envie o e-mail
                ini_set('display_errors', 1);
                error_reporting(E_ALL);
                $from = "atendimento@n1track.com";
                $to = $emailAprovado;
                $subject = "N1track - Conta aprovada com sucesso";
                $message = "Agradecemos por se cadastrar no N1track! Sua conta foi aprovada com sucesso, e agora você pode desfrutar plenamente do nosso sistema para gerenciar e abrir chamados. Estamos ansiosos para oferecer a você uma experiência eficiente e satisfatória. Seja bem-vindo!";
                $headers = "From:" . $from;
                mail($to, $subject, $message, $headers);
                echo "<p class='success'>O e-mail foi enviado com sucesso.</p>";
            } else {
                echo "<p class='error'>Erro ao obter e-mail do usuário.</p>";
            }
        } else {
            echo "<p class='error'>Erro ao aprovar usuário: " . $conexao->error . "</p>";
        }
    }

    $conexao->close();
    ?>

    <a href="index.php">Voltar</a>
</div>

</body>
</html>