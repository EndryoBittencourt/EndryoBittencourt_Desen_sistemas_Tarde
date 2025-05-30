<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class = "container">
        <h1> Cadastro</h1>
        <h2> Funcionario</h2>

        <!-- Formulario para cadastrar funcionario-->

        <form action="salvar_funcionario.php" method="POST" enctype="multipart/form-data">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required><br>

    <label for="telefone">Telefone:</label>
    <input type="text" id="telefone" name="telefone"><br>

    <label for="foto">Foto:</label>
    <input type="file" id="foto" name="foto" accept="image/jpeg" required><br>

    <button type="submit">Cadastrar</button>
</form>

</body>
</html>