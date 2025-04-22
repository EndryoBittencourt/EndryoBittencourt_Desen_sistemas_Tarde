<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segundo Programa PHP</title>
</head>
<body>
    <?php
        //Função usada para definir fuso horário padrão
        date_default_timezone_set('America/Sao_Paulo');
        //Manipulando HTML e PHP
        $data_hoje = date("d/m/Y");
        $timestamp = date("H:i:sa");
    ?>
    <h1 align="center">Endryo Gabriel Bittencourt</h1>
    <p align="center">Hoje é dia <?php echo $data_hoje, "<br> E são ", $timestamp; ?></p>

    <?php
        echo "texto";
        echo "Olá Mundo";
        //Na versão anterior ao PHP 8, a quebra de linhas funcionaria (tanto normal quanto \n)
        echo "Isso abrange
        várias linhas. As novas linhas serão de
        saída também.";
        echo "Isso abrange\nmúltiplas linhas. A nova linha será \na saída também.";
        echo "Caracteres Escaping são feitos \"Como esse\".";
    ?>

    <?php
        //Concatenação: . --> 5."2 tartarugas" --> 52 tartarugas
        //Soma: +
        print "<br><br><br>";
        $comida_favorita = "Italiana";
        //Imprime 'a' (2 posição da variável)
        print strtoupper($comida_favorita[2]);
        $comida_favorita = "Cozinha ".$comida_favorita;
        echo "<br>";
        print $comida_favorita;
    ?>
</body>
</html>