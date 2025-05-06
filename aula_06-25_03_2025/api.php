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

              // VERIFICA SE OS CAMPOS OBRIGATÓRIOS FORAM PREENCHIDOS
              if (!isset($dados["id"]) || !isset($dados["nome"]) || !isset($dados["email"])) {
                http_response_code(400);
                echo json_encode(["erro" => "Dados incompletos."], JSON_UNESCAPED_UNICODE);
                exit;
            }

            //Cria um novo usuario
            $novoUsuario = [
                "id" => $dados["id"],
                "nome" => $dados["nome"],
                "email" => $dados["email"]
            ];

            //Adiciona ao array de usuarios
            $usuarios[] = $novoUsuario;

            //Salva o array atualizado no arquivo Json
            file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            // RETORNA MENSAGEM DE SUCESSO
            echo json_encode(["mensagem" => "Usuário inserido com sucesso!", "usuarios" => $usuarios], JSON_UNESCAPED_UNICODE);
            break;

            //Adiciona um novo usuario ao array existente
            //array_push($usuarios, $novoUsuario);
            //echo json_encode('Usuário inserido com sucesso!');
           // print_r($usuarios);
            break;

        default:
            //echo "Método não encontrado!";
           // break;
            http_response_code(405); //Método não permitido
            echo json_encode(["erro" => "Método não permitido!"], JSON_UNESCAPED_UNICODE);
            break;
    }


    //Converte para json e retorna
    //echo json_encode($usuarios);


?>