<?php

//função sem parametros e com retorno

function msg(){
    $a = "Gabs";
    return $a;
}

$frase = "Olá ";
$frase .= msg();
$frase .= ", bem vindo!";

echo $frase;

?>