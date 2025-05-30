<?php 

//FUNÇAO PARA DIMENSIONAR A IMAGEM
function redimensionarImagem($imagem, $largura, $altura){
    //OBTEM AS DIMENSOES ORIGINAIS DA IMAGEM
    list($larguraOriginal, $alturaOriginal) = getimagesize($imagem);

    //CRIA UMA NOVA IMAGEM COM AS DIMENSOES ESPECIFICADAS
    $novaImagem = imagecreatetruecolor($largura, $altura);

    //CRIA UMA IMAGEM APARTIR DO ARQUIVO ORIGINAL(FORMATO jpeg)
    $imagemOriginal = imagecreatefromjpeg($imagem);

    //COPIA E REDIMENSIONA A IMAGEM ORIGINAL PARA A NOVA IMAGEM
    imagecopyresampled($novaImagem, $imagemOriginal, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);

    //INICIA A SAIDA EM BUFFER PARA CAPTURAR OS DADOS DA IMAGEM
    ob_start();
    imagejpeg($novaImagem);
    $dadosImagem = ob_get_clean();//ESSA LINHA OBTEM OS DADOS DA IMAGEM NO BUFFER

    //LIBERA A MEMORIA USADA PELAS IMAGENS
    imagedestroy($novaImagem);
    imagedestroy($imagemOriginal);

    return $dadosImagem; //RETORNA OS DADOS DA IMAGEM REDIMENSIONADA

 }

 //CONEXAO COM O BANCO DE DADOS
 $host = 'localhost:3307';
 $dbname = 'bd_imagem';
 $username = 'root';
 $password = 'root';

 try{
    //CRIA UMA NOVA INSTANCIA DE PDO PARA CONECTAR AO BANCO DE DADOS
    $pdo = new PDO("mysql:host=$host; dbname=$dbname", $username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //DEFINE O MODO DE ERRO DO PDO PARA EXCECOES

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto'])){
        //CODIGO ABAIXO VERIFICA SE NAO HOUVE ERRO NO UPLOAD DA FOTO
        if($_FILES['foto']['error'] == 0){
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $nomeFoto = $_FILES['foto']['name'];
            $tipoFoto = $_FILES['foto']['type'];

            //REDIMENSIONA A IMAGEM PARA 300x400 PIXELS
            $foto = redimensionarImagem($_FILES['foto']['tmp_name'], 300, 400);

            //PREPARA A INSTRUÇAO SQL PARA INSERIR OS DADOS DO FUNCIONARIO NO BANCO DE DADOS
            $sql = "INSERT INTO funcionarios (nome, telefone, nome_foto, tipo_foto, foto) VALUES (:nome, :telefone, :nome_foto, :tipo_foto, :foto)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':nome_foto', $nomeFoto);
            $stmt->bindParam(':tipo_foto', $tipoFoto);
            //O CODIGO ABAIXO DEFINE O PARAMETRO DA FOTO COM LARGE OBJECT (LOB)
            $stmt->bindParam(':foto', $foto, PDO::PARAM_LOB);

            if($stmt->execute()){
                echo "Funcionario cadastrado com sucesso!";

            }else{
                echo "Erro ao cadastrar o funcionario";
            }

        }else{
            echo "Erro ao fazer UPLOAD da foto!".$_FILES['foto']['erro'];
        }
    }
 } catch(PDOException $e){
    echo "Erro.".$e->getMessage();
 }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista imagens</title>
</head>
<body>
    <h1>Lista de Imagens</h1>

<!-- LINK PARA LISTAR FUNCIONARIOS -->
    <a href="consultar_funcionario.php">Listar Funcionarios</a>
</body>
</html>