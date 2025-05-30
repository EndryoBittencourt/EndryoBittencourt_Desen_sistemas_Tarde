
<?php include 'proteger.php'; ?>
<?php
$conn = new mysqli("localhost", "root", "", "bd_imagem");
$id = $_GET['id'] ?? 0;
$stmt = $conn->prepare("SELECT nome, telefone, nome_foto, tipo_foto, foto FROM funcionarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($nome, $telefone, $nome_foto, $tipo_foto, $foto);
$stmt->fetch();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Funcionário</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include 'menu.php'; ?>
<div class="container">
    <h2>Detalhes do Funcionário</h2>
    <p><strong>Nome:</strong> <?= htmlspecialchars($nome) ?></p>
    <p><strong>Telefone:</strong> <?= htmlspecialchars($telefone) ?></p>
    <?php if ($foto): ?>
        <p><strong>Foto:</strong><br>
        <img src="data:<?= $tipo_foto ?>;base64,<?= base64_encode($foto) ?>" width="200"></p>
    <?php else: ?>
        <p><em>Sem foto enviada.</em></p>
    <?php endif; ?>
</div>
</body>
</html>
