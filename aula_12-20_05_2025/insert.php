<?php
    include_once 'conecta.php';

    $resultado = $conexao->prepare("INSERT INTO produtos (nome,preco,estoque)
                                    VALUES (:n, :p, :e)");

    //$nome = "Caneta";
    //$preco = 1.52;
    //$estoque = 100;

    //$resultado->bindParam(":n",$nome);
    //$resultado->bindParam(":p",$preco);
    //$resultado->bindParam(":e",$estoque);

    //$resultado->bindValue(":n","Notebook");
    //$resultado->bindValue(":p",1500);
    //$resultado->bindValue(":e",10);

    //$resultado->execute();

    //$conexao->query("INSERT INTO produtos (nome,preco,estoque)
                        //VALUES ('Agenda', '25.45','12')");
?>