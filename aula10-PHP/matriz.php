<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrizes PHP</title>
</head>
<body>
    <h1 align="center">Endryo Gabriel Bittencourt</h1>

    <?php
        $estados = array("PR", "SC", "SP", "RS", "RJ", "ES", "BA", "MG",);
        echo "ORIGINAL";
        print_r($estados);
        
        echo "<br><br>STRTOLOWER: Converte uma string para minúsculas<br>";
        for ($i = 0; $i < count($estados); $i++) {
            $estados[$i] = strtolower($estados[$i]);
        }
        echo "STRTOLOWER: "; 
        print_r($estados);
        
        echo "<br><br>SHIFT: Retira o primeiro elemento de um array<br>";
        $rotaciona = array_shift($estados);
        echo "SHIFT: "; 
        print_r($estados);
        
        echo "<br><br>POP: Extrai um elemento no final do array<br>";
        array_pop($estados);
        echo "POP: "; 
        print_r($estados);

        echo "<br><br>PUSH: Adiciona um ou mais elementos no final de um array<br>";
        array_push($estados, "pr");
        echo "PUSH: ";
        print_r($estados);

        echo "<br><br>REVERSE: Retorna um array com os elementos na ordem inversa<br>";
        $inverso = array_reverse($estados);
        echo "REVERSE: ";
        print_r($inverso);

        echo "<br><br>SORT: Ordena o array<br>";
        sort($estados);
        echo "SORT: ";
        print_r($estados);

        echo "<br><br>SLICE: Extrai uma parcela de um array<br>";
        $dividir = array_slice($estados, 1, 2);
        echo "SLICE: ";
        print_r($dividir);
        echo "<br>";
    ?>
</body>
</html>