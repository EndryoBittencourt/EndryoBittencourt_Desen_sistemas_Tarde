<?php
//inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";

//estabelece conexão
$conexao = conectadb();

//define os novos valores
$name = "Maria da Silva"; //Vanessa Andrade
$endereco = "Rua Kalamango, 32"; //Av. Central, 500 - Teresina/PI
$telefone = "(44) 5555-5555"; //(86) 8888-0000
$email = "Mariasilva@teste.com"; //vanessa.andrade@email.com
//atualizado o ID 20

//Define o ID do cliente a ser atualizado
$pk_cliente = 20;

//prepara a consulta SQL segura
$stmt = $conexao->prepare("UPDATE cliente SET nome = ?, endereco = ?, telefone = ?,
email = ? WHERE pk_cliente = ?");

$stmt->bind_param("ssssi", $name, $endereco, $telefone, $email, $pk_cliente);

if($stmt->execute()){
    echo "Cliente atualizado com sucesso!";
}else{
    echo "Erro ao atualizar cliente: ".$stmt->error;
}

$stmt->close();
$conexao->close();

?>