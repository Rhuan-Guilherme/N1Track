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
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #141414;
        margin: 0;
        padding: 0;
        height: 100vh;
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    h2 {
        color: #333;
    }

    form {
        max-width: 300px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #555;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #025DD4;
        color: #fff;
        cursor: pointer;
        font-weight: 600;
    }

    input[type="submit"]:hover {
        background-color: #00146A;
    }

    p {
        margin-top: 10px;
    }
    </style>
</head>
<body>

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

    <input type="submit" value="ENTRAR">
</form>

</body>
</html>