
<?php include 'proteger.php'; ?>
<?php
$conn = new mysqli("localhost", "root", "", "bd_imagem");
$busca = $_GET['busca'] ?? '';
$sql = "SELECT id, nome, telefone FROM funcionarios WHERE nome LIKE ?";
$stmt = $conn->prepare($sql);
$param = "%$busca%";
$stmt->bind_param("s", $param);
$stmt->execute();
$resultado = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Consultar Funcionários</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include 'menu.php'; ?>
<div class="container">
    <h2>Consultar Funcionários</h2>
    <form method="GET">
        <input type="text" name="busca" placeholder="Buscar por nome" value="<?= htmlspecialchars($busca) ?>">
        <button type="submit">Buscar</button>
    </form>
    <table>
        <tr><th>ID</th><th>Nome</th><th>Telefone</th><th>Ações</th></tr>
        <?php while ($linha = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= $linha['id'] ?></td>
            <td><?= $linha['nome'] ?></td>
            <td><?= $linha['telefone'] ?></td>
            <td><a href="visualizar_funcionario.php?id=<?= $linha['id'] ?>">Visualizar</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>
