<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções PHP</title>
</head>
<body>
    <h1 align="center">Endryo Gabriel Bittencourt</h1>
    <?php
        echo "<h2>Funções para String</h2>";
        //Acento conta como um caractere --> Natalí: 7 caracteres
        echo $name = "Natalí Alberton Grolli";
        echo "<br>";
        echo $lenght = strlen($name);
        echo "<br>";
        //Compara o tamanho das strings, e retorna 0 ou 1 (0 se Brian Lee > $name)
        echo $cmp = strcmp($name, "Brian Lee");
        echo "<br>";
        echo $index = strpos($name, "e");
        echo "<br>";
        //Pula 9 caracteres e pega os próximos 5
        echo $first = substr($name, 9, 5);
        echo "<br>";
        echo $name = strtoupper($name);
    ?>

    <?php
        echo "<h2>Chamando Variáveis</h2>";
        $cidade = "Joinville";
        $estado = "Santa Catarina";
        $idade = 174;
        $frase_estado = "A cidade de $cidade é a cidade mais populosa de $estado";
        $frase_idade = "$cidade tem mais de $idade anos";
        echo "<h3>$frase_estado</h3>";
        echo "<h4>$frase_idade</h4>";
    ?>

    <?php
        echo "<h2>Trabalhando com If/Else</h2>";
        $umidade = 91;
        $vaiChover = ($umidade > 90);
        if ($vaiChover) {
            echo "Vai chover com toda certeza absoluta da Terra";
        } elseif ($cidade = "Joinville") {
            echo "Sempre chove nessa cidade";
        } else {
            echo "Não vai chover!!";
        }
    ?>

    <?php
        $a = 17;
        print "<br><br>";
        if ($a > 17) {
            print "Maior de idade. <br>";
        } else {
            print "Menor de idade. <br>";
        }
    ?>
</body>
</html>