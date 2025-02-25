<?php

//função com parametros e com retorno

function msg($x){
    $a = "Gabzin ".$x;
    return $a;
}

$sobrenome = "do grau";

$frase = "Olá ";
$frase .= msg($sobrenome);
$frase .= ", bem vindo!";

echo $frase;

?>