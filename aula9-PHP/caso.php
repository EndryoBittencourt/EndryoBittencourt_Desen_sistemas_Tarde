<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casos PHP</title>
</head>
<body>
    <h1 align="center">Endryo Gabriel Bittencourt</h1>

    <?php
        echo "<h2>Trabalhando com Switch (Case)</h2>";
        $s = "lâmpada";
        switch ($s) {
            case "casa":
                print "A casa é amarela";
                break;
            case "árvore":
                print "A árvore é bonita";
                break;
            case "lâmpada":
                print "João apagou a lâmpada";
                break;
            default:
                print "Nenhum elemento selecionado";
                break;
        }
    ?>
</body>
</html>