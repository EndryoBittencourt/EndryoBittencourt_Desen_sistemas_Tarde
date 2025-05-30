<?php 
//inclui o arquivo de conexao com o banco de dados
require_once ('conecta.php');

//cria a consulta sql para selecionar os dados principais (sem a coluna imagem)

$querySelecao = "SELECT codigo, evento, descricao, nome_imagem, tamanho_imagem FROM tabela_imagem";

$resultado = mysqli_query($conexao, $querySelecao);

if (!$resultado){
    die ("Erro na consulta:".mysqli_error($conexao));
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>armazenamento imagens no banco de dados</title>
</head>
<body>
    <h2>Selecione um novo arquivo de imagem</h2>

    <form enctype="multipart/form-data" action="upload.php" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
        <input type="text" name="evento" placeholder="Nome do Evento">
        <input type="text" name="descricao" placeholder="Descrição">
        <input type="file" name="imagem">
        <input type="submit" value="salvar">

    </form>

<br/>

<table border="1">
    <tr>
        <td style="align: center;">Codigo</td>
        <td style="align: center;">Evento</td>
        <td style="align: center;">Descrição</td>
        <td style="align: center;">Nome da Imagem</td>
        <td style="align: center;">Tamanho</td>
        <td style="align: center;">Visualizar imagem</td>
        <td style="align: center;">Excluir imagem</td>
    </tr>

    <?php 

    while($arquivos = mysqli_fetch_array($resultado)){

    
    
    ?>

    <tr>
        <td style="align: center;"><?php echo $arquivos['codigo']; ?></td>
        <td style="align: center;"><?php echo $arquivos['evento']; ?></td>
        <td style="align: center;"><?php echo $arquivos['descricao']; ?></td>
        <td style="align: center;"><?php echo $arquivos['nome_imagem']; ?></td>
        <td style="align: center;"><?php echo $arquivos['tamanho_imagem']; ?></td>

        <td style="align: center;">
            <a href="ver_imagens.php?id=<?php echo $arquivos['codigo'];?>">Ver imagem </a>
        </td>

        <td style="align: center;">
            <a href="excluir_imagem.php?id=<?php echo $arquivos['codigo'];?>">Excluir </a>
        </td>
    </tr>

    <?php } ?>

</table>
    
</body>
</html>