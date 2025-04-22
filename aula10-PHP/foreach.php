<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foreach PHP</title>
</head>
<body>
    <h1 align="center">Endryo Gabriel Bittencourt</h1>

    <?php
        $cores = array("Amarelo", "Vermelho", "Verde", "Azul");
        foreach($cores as $cor) {
            echo $cor."<br>";
        }
    ?>
</body>
</html>