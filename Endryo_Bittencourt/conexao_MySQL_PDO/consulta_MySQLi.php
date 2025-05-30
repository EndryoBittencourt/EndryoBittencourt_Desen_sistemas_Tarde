<?php
//definição das credenciais de acesso ao banco de dados
$nomeservidor = "localhost:3307";//endereço do servidor mysql
$usuario = "root";               //nome do usuario do banco
$senha = "root";                 //senha do banco
$bancodedados = "empresa";       //nome do banco de dados

//criação da conexão com MySQLi
$conn = mysqli_connect($nomeservidor,$usuario,$senha,$bancodedados );

//verificação da conexão
if (!$conn) { //caso a conexão falhe, interrompe o script e exibe uma mensagem de erro
    die("Conexão falhou: ".mysqli_connect_error());
}

//configuração do conjunto de caracteres para evitar problemas de acentuação
mysqli_set_charset($conn, "utf8mb4");

//mensagem indicando que a conexao foi estabelecida corretamente
echo "conexão bem-sucedida! <br><br>";

//consulta SQL para obter clientes
$sql = "SELECT pk_cliente, nome, email FROM cliente";
$result = mysqli_query($conn, $sql);

//verifica se ha resultados na consulta
if(mysqli_num_rows($result) > 0){
    //itera sobre os resultados e exibe os dados
    while ($linha = mysqli_fetch_assoc($result)){
        echo "ID: ", $linha["pk_cliente"]. " - Nome: ". $linha["nome"]. " - Email: ". $linha["email"]. "<br/>";
    }
} else{
    echo "nenhum resultado encontrado";
}

//fecha a conexão com o banco de dados
mysqli_close($conn);
?>