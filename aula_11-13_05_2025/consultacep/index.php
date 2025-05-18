<?php
$entrada = isset($_GET['busca']) ? trim($_GET['busca']) : '';
$busca = preg_replace('/[^0-9]/', '', $entrada); 
$dados = null;
$erro = '';

if ($entrada !== '') {
    if (!ctype_digit($entrada)) {
        $erro = "CEP inválido. Digite apenas números.";
    } elseif (strlen($busca) !== 8) {
        $erro = "CEP inválido. O CEP deve conter 8 números.";
    } else {
        $url = "https://viacep.com.br/ws/$busca/json/";
        $response = file_get_contents($url);

        if ($response !== false) {
            $dados = json_decode($response, true);

            if (isset($dados['erro'])) {
                $erro = "CEP não encontrado.";
                $dados = null;
            }
        } else {
            $erro = "Erro ao acessar o ViaCEP.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta CEP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Consulta de endereço via CEP</h1>

    <form method="GET" class="form-busca">
        <input type="text" name="busca" placeholder="Digite o CEP (ex:09402060)" value="<?php echo htmlspecialchars($entrada); ?>">
        <button type="submit">Buscar</button>
    </form>

    <?php if ($erro): ?>
        <p style="color: red;"><?php echo $erro; ?></p>
    <?php elseif ($dados): ?>
        <div class="resultado">
            <p><strong>Logradouro:</strong> <?php echo $dados['logradouro'] ?? 'N/A'; ?></p>
            <p><strong>Bairro:</strong> <?php echo $dados['bairro'] ?? 'N/A'; ?></p>
            <p><strong>Localidade:</strong> <?php echo $dados['localidade'] ?? 'N/A'; ?></p>
            <p><strong>UF:</strong> <?php echo $dados['uf'] ?? 'N/A'; ?></p>
            <p><strong>Estado:</strong> <?php echo $dados['estado'] ?? 'N/A'; ?></p>
            <p><strong>Região:</strong> <?php echo $dados['regiao'] ?? 'N/A'; ?></p>
        </div>
    <?php endif; ?>
</body>
</html>