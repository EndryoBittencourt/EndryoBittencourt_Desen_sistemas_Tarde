<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métodos Array PHP</title>
</head>
<body>
    <h1 align="center">Endryo Gabriel Bittencourt</h1>

    <?php
        #RAND --> Gera um array aleatório
        $sorteio = rand(0, 5);
        echo "Sorteado: $sorteio<hr>";

        #ARRAY_MERGE --> Combina um ou mais arrays
        #RANGE --> Cria um array contendo uma faixa de elementos
        #(início, fim, passo)
        $vetor = array_merge(
            #Começou no 0, foi até o 10 
            #--> 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10
            range(0, 10),
            #Começou no número de sorteio, foi até o 10 de 2 em 2
            #--> (4), 6, 8, 10 (exemplo de sorteio) 
            range($sorteio, 10, 2),
            #Começou no número de sorteio, foi até o 5
            #--> (4), 5 (exemplo de sorteio)
            range($sorteio, 0)
        );

        print_r($vetor);
        echo "<hr>";

        #SHUFFLE --> Embaralha o array
        shuffle($vetor);
        print_r($vetor);
        echo "<hr>";
        foreach($vetor as $valor) {
            echo 'O valor ', $valor, ' tem 3 elementos. <br>';
        }
    ?>
</body>
</html>