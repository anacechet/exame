<!DOCTYPE html>
<?php
include_once "acao.php";
$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
$dados;
if ($acao == 'editar'){
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    if ($id > 0)
        $dados = buscarDados($id);
}
//var_dump($dados);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Cadastrar</title>
</head>
<body>

    <br><br><br><br>
    <div class="div1"><div class="div2">
    <form action="acao.php" method="post"><br><br>
    Id | <input readonly  type="text" name="id" id="id" value="<?php if ($acao == "editar") echo $dados['id']; else echo 0; ?>"><br>
    Nome | <input required=true   type="text" name="nome" id="nome" value="<?php if ($acao == "editar") echo $dados['nome']; ?>"><br>
    Nota 1 | <input required=true   type="text" name="nota1" id="nota1" value="<?php if ($acao == "editar") echo $dados['nota1']; ?>"><br>
    Nota 2 | <input required=true   type="text" name="nota2" id="nota2" value="<?php if ($acao == "editar") echo $dados['nota2']; ?>"><br>
    Nota 3 | <input required=true   type="text" name="nota3" id="nota3" value="<?php if ($acao == "editar") echo $dados['nota3']; ?>"><br>
    Nota 4 | <input required=true   type="text" name="nota4" id="nota4" value="<?php if ($acao == "editar") echo $dados['nota4']; ?>"><br>
    Nota 5 | <input required=true   type="text" name="nota5" id="nota5" value="<?php if ($acao == "editar") echo $dados['nota5']; ?>"><br>
    Nascimento | <input required=true   type="date" name="nascimento" id="nascimento" value="<?php if ($acao == "editar") echo $dados['nascimento']; ?>"><br>
    <br>
    <button type="submit" name="acao" id="acao" value="salvar">Salvar</button>
    <button><a href = "index.php" class="listar">Listar</a></button><br><br><br>
    </form>
    </div></div>

    

</body>
</html>