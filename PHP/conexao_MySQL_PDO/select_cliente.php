<?php
//inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";

//estabelece conexão
$conexao = conectadb();

//define a consulta SQL para buscar clientes
$sql = "SELECT pk_cliente, nome, email FROM cliente";

//executa a consulta no banco
$result = $conexao->query($sql);

//verificar se ha registro retornados
if($result-> num_rows > 0){
    
    while($linha = $result->fetch_assoc()){
        echo "ID: ".$linha["pk_cliente"]."- nome: ".$linha["nome"]."- Email: ".$linha["email"]."<br>";
    }
}

else{
    //caso nenhum resultado seja encontrado
    echo "Nenhum cliente cadastrado";
}
//fecha conexão
$conexao-> close();

?>