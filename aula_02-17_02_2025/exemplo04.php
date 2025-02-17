<?php

// $contador = 0;
//while ($contador < 5) {
   // echo "Número: $contador";
   // $contador++;
   // echo "<br>";
//}

//for ($i = 0; $i <5; $i++) {
   // echo "Número: $i";
   // echo "<br>";
//}

//$nomes = ["Ana", "Bruno", "Carlos"];
//foreach ($nomes as $nome) {
    //echo "Nome: $nome";
    //echo "<br>";
//}

$nomes = ['Ana', 'Anderson', 'Carlos'];

$qtde = count($nomes);

echo "Elementos: $qtde";

echo "<br>";

for($i = 0; $i < $qtde; $i++){
    echo $nomes[$i] . "<br>";
}

//echo $nomes[1];

?>