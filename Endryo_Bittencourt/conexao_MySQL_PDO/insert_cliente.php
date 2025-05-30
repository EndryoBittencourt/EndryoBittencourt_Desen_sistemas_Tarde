<?php
//inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";
//estabelece conexão
$conexao = conectadb();

//definição dos valores para inserção
$name = "Endryo Gabriel Bittencourt";
$endereco = "Rua Kalamango, 32";
$telefone = "(44) 5555-5555";
$email = "Endryo_bittencourt@estudante.sesisenai.org.br";

//prepara a consulta SQL usando 'prepare()' para evitar SQL injection
$stmt = $conexao->prepare("INSERT INTO cliente(nome, endereco, telefone, email) VALUES (?, ?, ?, ?)");

//associa os parametros aos valores da consulta
$stmt->bind_param("ssss", $name, $endereco, $telefone, $email);

//executa a inserção
if($stmt->execute()){
    echo "Cliente adicionado com sucesso!";
}else{
    echo "Erro ao adicionar cliente:".$stmt->error;
}

//fecha a consulta e a conexão com o banco de dados
$stmt->close();
$conexao->close();

?>