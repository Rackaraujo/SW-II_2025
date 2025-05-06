<?php 

    $notas = array(10, 8, 7, 9, 6);
    sort($notas);

    echo "A menor nota é: ".$notas[0];
    echo "A maior nota é: ".$notas[count($notas) - 1];

?>