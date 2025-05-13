<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Cliente</title>
</head>
<body>
    <h2>Excluir Cliente</h2>

    <form action="processardelecao.php" method="POST">
        <label for="pk_cliente">ID do Cliente:</label>
        <input type="number" id="pk_cliente" name="pk_cliente" required>

        <button type="submit">Excluir Cliente</button>
    </form>
    
</body>
</html>