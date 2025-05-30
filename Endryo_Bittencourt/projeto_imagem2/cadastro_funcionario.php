<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Funcionário</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="salvar_funcionario.php" method="POST" enctype="multipart/form-data">
        <h1>Cadastro de Funcionário</h1>

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone">

        <label for="foto">Foto:</label>
        <input type="file" name="foto" id="foto" accept="image/*">

        <button type="submit">Cadastrar</button>
    </form>
</body>
<?php include 'menu.php'; ?>

</html>
