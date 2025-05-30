
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "bd_imagem");
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $stmt = $conn->prepare("SELECT senha FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->bind_result($senha_bd);
    if ($stmt->fetch() && $senha === $senha_bd) {
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php");
        exit;
    } else {
        $erro = "Usuário ou senha incorretos.";
    }
    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="login-container">
    <form method="POST">
        <h2>Login</h2>
        <?php if (isset($erro)) echo "<p class='erro'>$erro</p>"; ?>
        <input type="text" name="usuario" placeholder="Usuário" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
</div>
</body>
</html>
