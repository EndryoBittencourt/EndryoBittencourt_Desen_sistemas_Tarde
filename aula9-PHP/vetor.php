<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vetores PHP</title>
</head>
<body>
    <h1 align="center">Endryo Gabriel Bittencourt</h1>

    <?php
        echo "<h2>Trabalhando com Vetores</h2>";
        $dias = array('Domingo', "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado");
        echo $dias[1]."<br>";
        //Array( [0] => Domingo ... ) | dado e índica
        print_r($dias);
        echo "<br><br>";
        //array(7) { [0]=> string(7) "Domingo" ... } | dado, índice e tipo de variável
        var_dump($dias);
    ?>
</body>
</html>