<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matriz Multidimensional PHP</title>
</head>
<body>
    <h1 align="center">Endryo Gabriel Bittencourt</h1>

    <?php
        $musicas = array(
            array("Kid Abelha", "Amanhã", 1993),
            array("Ultraje a Rigor", "Pelados", 1985),
            array("Paralamas do Sucesso", "Alagados", 1987)
        );

        for ($linha = 0; $linha < 3; $linha++) {
            for ($coluna = 0; $coluna < 3; $coluna++) {
                echo $musicas[$linha][$coluna]." | ";
            }
            echo "<br>";
        }
    ?>

    <?php
        echo "<br>";
        $AmazonProducts = array(
            array("Código" => "Livro", "Descrição" => "Livros", "Preço" => 50),
            array("Código" => "DVDs", "Descrição" => "Filmes", "Preço" => 15),
            array("Código" => "CDs", "Descrição" => "Música", "Preço" => 20),
        );

        for ($linha = 0; $linha < 3; $linha++) { ?>
        <p>
            | <?= $AmazonProducts[$linha]["Código"] ?>
            | <?= $AmazonProducts[$linha]["Descrição"] ?>
            | <?= $AmazonProducts[$linha]["Preço"] ?>
        </p>
    <?php
        }
    ?>
</body>
</html>