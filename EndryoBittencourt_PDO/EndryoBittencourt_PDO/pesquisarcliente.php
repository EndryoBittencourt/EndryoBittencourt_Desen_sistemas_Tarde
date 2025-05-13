<?php
require_once 'conexao.php';

$conexao = conectarbanco();

$busca = $_GET['busca']??null;

if(!$busca){
    ?>
    <form action = "pesquisarcliente.php" method = "GET">
        <label for = "busca">Digite o ID ou nome:</label>
        <input type="text" id="busca" name="busca" required>
        <button type="submit">Pesquisar</button>
</form>

<?php
   exit;
}

if(is_numeric($busca)){
    $stmt= $conexao->prepare("SELECT pk_cliente, nome, endereco, telefone, email FROM cliente WHERE pk_cliente = :id");
    $stmt->bindParam(":id", $busca, PDO::PARAM_INT);
} else {
    $stmt = $conexao -> prepare("SELECT pk_cliente, nome, endereco, telefone, email FROM cliente WHERE nome LIKE = :nome");
    $buscarNome ="%$busca%";
    $stmt->bindParam(":nome", $buscaNome, PDO::PARAM_STR);
}

$stmt->execute();
$cliente = $stmt->fetchALL()

if (!$clientes){
    die("Erro:Nenhum cliente encontrado.");
}
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Telefone</th>
        <th>E-mail</th>
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