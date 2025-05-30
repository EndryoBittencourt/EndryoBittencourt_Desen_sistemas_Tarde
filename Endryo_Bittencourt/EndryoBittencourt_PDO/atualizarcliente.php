<?php

require_once 'conexao.php';

$conexao = conectarbanco();

//Obtendo o ID via GET

$pk_cliente = $_GET['id'] ?? null;
$cliente = null;
$msgErro = "";

//função local para buscar cliente por id

function buscarClientePorId($pk_cliente, $conexao){
    $stmt = $conexao->prepare("SELECT pk_cliente, nome, endereco, telefone, email FROM cliente WHERE pk_cliente = :id");
    $stmt->bindParam(":pk_cliente", $pk_cliente, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch();
}

//se um ID foi enciado, busca o cliente no banco

if($pk_cliente && is_numeric($pk_cliente)){
    $cliente = buscarClientePorId($pk_cliente, $conexao);

    if(!$cliente){
        $msgErro = "Erro: Cliente não encontrado.";
    }
    } else{
        $msgErro= "Digite o ID do cliente para buscar os dador";

    }

?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Cliente</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function habilitarEdicao(campo){
            document.getElementById(campo).removeAttribute("readonly");
        }
    </script>
</head>
<body>
    <h2>Atualizar Cliente</h2>

    <?php if($msgErro):?>
        <p style="color:red;"><?=htmlspecialchars($msgErro)?></p>

        <form action="atualizarCliente.php" method="GET">
            <label for="pk_cliente">ID do cliente: </label>
            <input type="text" id="pk_cliente" name= "pk_cliente" required>
            <button type="submit">Buscar</button>
    </form>


    <?php else: ?>
    <form action="atualizarCliente.php" method="POST">
       <input type="hidden" name="pk_cliente" value="<?=htmlspecialchars($cliente[$pk_cliente])?>">
       
       <label for="nome">Nome: </label>
       <input type="text" name="nome" value="<?=htmlspecialchars($cliente[$nome])?>" readonly onclick="habilitarEdicao('nome')">

       <label for="endereco">Endereço: </label>
       <input type="text" name="endereco" value="<?=htmlspecialchars($cliente[$endereco])?>" readonly onclick="habilitarEdicao('endereco')">

       <label for="telefone">Telefone: </label>
       <input type="text" name="telefone" value="<?=htmlspecialchars($cliente[$telefone])?>" readonly onclick="habilitarEdicao('telefone')">

       <label for="email">E-mail: </label>
       <input type="email" name="email" value="<?=htmlspecialchars($cliente[$email])?>" readonly onclick="habilitarEdicao('email')">


       <button type="submit">Atualizar Cliente</button>

        
    </form>
          
    <?php endif; ?>
</body>
</html>