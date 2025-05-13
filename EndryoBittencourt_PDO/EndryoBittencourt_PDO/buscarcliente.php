<?php
require_once 'conexao.php';

$conexao = conectarbanco();

$sql = "SELECT pk_cliente, nome, endereco, telefone, email FROM cliente ORDER BY nome ASC";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$cliente = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cliente</title>
</head>
<body>
    <h2>Todos os Clientes Cadastrados</h2>
    <?php if (!$clientes): ?>
        <p style="color:red;">Nenhum cliente encontrado no banco de dados</p>
        <?php else: ?>
            <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Ação</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?= htmlspecialchars($cliente['pk_cliente'])?></td>
            <td><?= htmlspecialchars($cliente['nome'])?></td>
            <td><?= htmlspecialchars($cliente['endereco'])?></td>
            <td><?= htmlspecialchars($cliente['telefone'])?></td>
            <td><?= htmlspecialchars($cliente['email'])?></td>
            <td>
                <a href= "atualizarcliente.php?id=<?=$cliente['pk_cliente']?>">Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>
        </table>
        <?php endif; ?>
</body>
</html>