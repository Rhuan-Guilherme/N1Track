<?php
header("Content-Type: text/html; charset=UTF-8");

session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: admin.php");
    exit();
}

require '../ConectBanco/bancoUsuarios.php';

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}


$sql = "SELECT * FROM usuarios WHERE autorizado = 'nao'";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Aprovação de Usuários</title>
</head>
<body>

<h2>Usuários Não Autorizados</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Autorizado</th>
        <th>Ação</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['nome']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['autorizado']}</td>";
        echo "<td><a href='approve.php?id={$row['id']}'>Aprovar</a></td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>