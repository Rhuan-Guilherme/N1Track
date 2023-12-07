<?php
session_start(); // Inicia a sessão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o login e senha informados são válidos
    $username = "rhuan23gAdmin"; // Substitua pelo seu nome de usuário
    $password = "!@#Viltes)(*"; // Substitua pela sua senha

    if ($_POST['username'] == $username && $_POST['password'] == $password) {
        $_SESSION['authenticated'] = true;
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Login ou senha inválidos";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<?php
if (isset($error_message)) {
    echo "<p style='color: red;'>$error_message</p>";
}
?>

<form method="post" action="">
    <label for="username">Usuário:</label>
    <input type="text" name="username" required><br>

    <label for="password">Senha:</label>
    <input type="password" name="password" required><br>

    <input type="submit" value="Entrar">
</form>

</body>
</html>