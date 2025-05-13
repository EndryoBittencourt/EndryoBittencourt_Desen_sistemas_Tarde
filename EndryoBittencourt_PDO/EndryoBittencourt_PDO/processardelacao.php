<?php

require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $conexao = conectarBanco();

    $id = filter_var($_POST["pk_cliente"], FILTER_SANITIZE_NUMBER_INT);

    if(!$id){
        die("Erro: ID invalido.");
    }

    $sql = "DELETE FROM cliente WHERE pk_cliente = :pk_cliente";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":pk_cliente", $pk_cliente, PDO::PARAM_INT);

    try{
        $stmt->execute();
        echo "Cliente excluido com sucesso!";
    } catch (PDOException $e){
        error_log("Erro ao excluir cliente: ")
    }

}


?>