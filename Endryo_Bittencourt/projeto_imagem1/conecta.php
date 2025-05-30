<?php 
//definicao das credenciais de conexao ao banco de dados
$servername = "localhost:3307";
$username = "root";
$password = "root";
$dbname = "armazena_imagem";

//criando a conexao usando mysqli com o banco de dados
$conexao = new mysqli($servername,$username, $password, $dbname);

//verificando se houve erro na conexao
if ($conexao->connect_error){
    die("falha na conexão:".$conexao-> connect_error);
}

?>