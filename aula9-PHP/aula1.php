<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primeiro Programa PHP</title>
</head>
<body>
    <?php
        echo "<h1>Hello World, PHP-7!</h1>";
    ?>
    
    <?php echo "<h3 align='center'>Natalí Alberton Grolli</h3>"; ?>
    
    <?php
        print "teste <br>";
        print "Olá Mundo <br>";
        print "Escape 'chars' são os mesmos como em C\n <br>";
        print "Você pode ter quebras de linha em uma string\n <br>";
        print 'Uma string pode usar "aspas-duplas". Isso é muito legal! <br>';
        print 'Ainda pode-se usar aspas simples dessa forma: It\'s cool!';
    ?>
    
    <?php
        echo "<h2 align='center'> O meu programa está ecoando corretamente no meu servidor PHP!</h2>";
    ?>

    <?php
        phpinfo();
    ?>
</body>
</html>