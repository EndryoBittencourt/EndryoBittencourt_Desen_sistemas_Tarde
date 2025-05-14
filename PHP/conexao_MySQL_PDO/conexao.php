<?php
//habilita relatorio detalhado de erros no MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

function conectadb(){
    //configuração do banco de dados
    $nomeservidor = "localhost:3307";//endereço do servidor mysql
    $usuario = "root";               //nome do usuario do banco
    $senha = "root";                 //senha do banco
    $banco = "empresa";       //nome do banco de dados


try{
    //criação da conexão
    $con = new mysqli($nomeservidor, $usuario, $senha, $banco);

    //definição do conjunto de caracteres para evitar problema de acentuação
    $con->set_charset("utf8mb4");
    return $con;
} catch(Exception $e){
    //
    die("Erro na conexão:".$e->getMessage());
   }
}


?>