<?php 

    //Cabeçalho
    header("Content-Type: application/json; charset=UTF-8"); //Define tipo de resposta

    $metodo = $_SERVER['REQUEST_METHOD'];

    //echo "Método de requisição: ".$metodo;

    //Recupera o arquivo json na mesma pasta do projeto
    $arquivo = 'usuarios.json';

    //Verifica se o arquivo existe, se não existir cria um com array vazio
    if (!file_exists($arquivo)){
        file_put_contents($arquivo, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    //Le o conteudo do arquivo json
    $usuarios = json_decode(file_gets_contents($arquivo), true);

    //Conteudo
  

    switch ($metodo) {
        case 'GET':
            //echo "Aqui ações do metodo GET";
            //Converte para Json e retorna
            echo json_encode($usuarios,  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            break;
        case 'POST':
            //echo "Aqui ações do metodo POST"
            $dados = json_encode(file_get_contents('php://input'), true);
            //print_r($dados);
            $novoUsuario = [
                "id" => $dados["id"],
                "nome" => $dados["nome"],
                "email" => $dados["email"]
            ];

            //Adiciona um novo usuario ao array existente
            array_push($usuarios, $novoUsuario);
            echo json_encode('Usuário inserido com sucesso!');
            print_r($usuarios);

            break;
        default:
            echo "Método não encontrado!";
            break;
    }


    //Converte para json e retorna
    //echo json_encode($usuarios);


?>