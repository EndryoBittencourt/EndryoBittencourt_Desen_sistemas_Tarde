<?php
 
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $conexao = conectarbanco();

    $sql = "INSERT INTO cliente (nome, endereco, telefone, email) VALUES (:nome, :endereco, :telefone, :email)";
    
    $stms = $conexao->prepare($sql);
    $stms->bindParam(":nome", $_POST["nome"]);
    $stms->bindParam(":endereco", $_POST["endereco"]);
    $stms->bindParam(":telefone", $_POST["telefone"]);
    $stms->bindParam(":email", $_POST["email"]);

    try{
        $stmt->execute();
        echo "Cliente cadastrado com sucesso!";
    } catch (PDOException $e){
        error_log("Erro ao inserir cliente: " .$e->getMessage());
        echo "Erro ao cadastrar cliente. ";
    }
}

?>