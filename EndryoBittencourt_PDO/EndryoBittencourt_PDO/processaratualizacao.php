<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conexao = conectarBanco();
    $pk_cliente = filter_var($_POST["pk_cliente"], FILTER_SANITIZE_NUMBER_INT);
    $nome = htmlspecialchars(trim($_POST["nome"]));
    $endereco = htmlspecialchars(trim($_POST["endereco"]));
    $telefone = htmlspecialchars(trim($_POST["telefone"]));
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);

    if (!$id || !$email) {
        die("Erro: ID inválido ou e-mail incorreto.");
    }
    $sql = "UPDATE cliente SET nome = :nome, endereco = :endereco, telefone = :telefone, email = :email WHERE pk_cliente = :pk_cliente";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":pk_cliente", $pk_cliente, PDO::PARAM_INT);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":endereco", $endereco);
    $stmt->bindParam(":telefone", $telefone);
    $stmt->bindParam(":email", $email);
    
    if ($stmt->execute()) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar os dados.";
    }
    try{
        $stmt->execute();
        echo "Cliente atualizado com sucesso!";

    }
    catch (PDOException $e){
        error_log("Erro ao atualizar cliente: " . $e->getMessage());
        echo "Erro  ao atualizar registro.";
    }
    

    
}
?>
