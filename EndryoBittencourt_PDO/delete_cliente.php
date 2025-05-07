<?php
//inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";

//estabelece conexão
$conexao = conectadb();

$pk_cliente = 20;

$stmt = $conexao-> prepare("DELETE FROM cliente WHERE pk_cliente=?");

$stmt-> bind_param("i", $pk_cliente);

if ($stmt->execute()){
    echo "Cliente deletado com sucesso!";
}

else {
    echo "Erro ao deletar dados do cliente.".$stmt-> error;
}

$stmt->close();
$conexao->close();

?>