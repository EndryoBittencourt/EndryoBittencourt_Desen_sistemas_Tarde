<?php
// conexao.php
$host = "localhost:3306";
$usuario = "root";
$senha = "";
$banco = "bd_imagem";

$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifica conexão
if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

// Define o charset para utf8
$conexao->set_charset("utf8");
?>