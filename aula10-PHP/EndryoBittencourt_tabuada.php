<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada Em PHP</title>
    <style type="text/css">

        th, td {
            border: solid;
            width: 85px;
        }

    </style>
</head>
<body>
    <h1>Endryo Gabriel Bittencourt</h1>

    <table>
    <?php

        for ($x = 1; $x <= 10; $x++) {

         echo "<tr>";

         for ($y = 1; $y <= 10; $y++) {

             echo "<td> $x x $y = ".$x*$y."</td>";

            }
            echo "</tr>";
        }
    ?>
    </table>
</body>
</html>