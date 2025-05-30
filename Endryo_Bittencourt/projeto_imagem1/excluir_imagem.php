<?php 
error_reporting(E_ALL);
ini_set('display_errors',1);
ob_clean();//limpa qualquer saida inesperada antes do header

 require_once ('conecta.php');

 //obtem o id da imagem da url, garantindo que seja um numero inteiro
 $id_imagem = isset($_GET['id']) ? intval($_GET['id']) : 0;

 //verifica se o id é valido (maior que zero)
 if($id_imagem > 0){
    //cria a query segura usando o prepared statement
    $queryExclusao = "DELETE FROM tabela_imagem WHERE codigo = ?";

    //prepara a query
    $stmt = $conexao->prepare($queryExclusao);
    $stmt->bind_param("i",$id_imagem); //define o id como um inteiro

    //executa a exclusao
    if($stmt->execute()){
        echo "imagem excluida com sucesso!";
    } else{
        die("Erro ao excluir a imagem".$stmt->error);
    }

    //fecha a colsulta
    $stmt->close();
 }else{
    echo "ID invalido";
 }
 
 //redireciona para index.php e garante que o script pare
 header("Location: index.php");
 exit();
?>