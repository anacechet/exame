<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    // Se foi enviado via GET para acao entra aqui
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        excluir($id);
    }

    // Se foi enviado via POST para acao entra aqui
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        if ($id == 0)
            inserir($id);
        else
            editar($id);
    }

    // Métodos para cada operação
    function inserir($id){
        $dados = dadosForm();
        //var_dump($dados);
        
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('INSERT INTO salto (nome, nota1, nota2, nota3, nota4, nota5, nascimento) VALUES(:nome, :nota1, :nota2, :nota3, :nota4, :nota5, :nascimento)');
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':nota1', $nota1, PDO::PARAM_STR);
        $stmt->bindParam(':nota2', $nota2, PDO::PARAM_STR);
        $stmt->bindParam(':nota3', $nota3, PDO::PARAM_STR);
        $stmt->bindParam(':nota4', $nota4, PDO::PARAM_STR);
        $stmt->bindParam(':nota5', $nota5, PDO::PARAM_STR);
        $stmt->bindParam(':nascimento', $nascimento, PDO::PARAM_STR);
        $nome = $dados['nome'];
        $nota1 = $dados['nota1'];
        $nota2 = $dados['nota2'];
        $nota3 = $dados['nota3'];
        $nota4 = $dados['nota4'];
        $nota5 = $dados['nota5'];
        $nascimento = $dados['nascimento'];
        $stmt->execute();
        header("location:cad.php");     
    }

    function editar($id){
        $dados = dadosForm();
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE salto SET nome = :nome, nota1 = :nota1, nota2 = :nota2, nota3 = :nota3, nota4 = :nota4, nota5 = :nota5, nascimento = :nascimento WHERE id = :id');
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':nota1', $nota1, PDO::PARAM_STR);
        $stmt->bindParam(':nota2', $nota2, PDO::PARAM_STR);
        $stmt->bindParam(':nota3', $nota3, PDO::PARAM_STR);
        $stmt->bindParam(':nota4', $nota4, PDO::PARAM_STR);
        $stmt->bindParam(':nota5', $nota5, PDO::PARAM_STR);
        $stmt->bindParam(':nascimento', $nascimento, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $nome = $dados['nome'];
        $nota1 = $dados['nota1'];
        $nota2 = $dados['nota2'];
        $nota3 = $dados['nota3'];
        $nota4 = $dados['nota4'];
        $nota5 = $dados['nota5'];
        $nascimento = $dados['nascimento'];
        $id = $dados['id'];
        $stmt->execute();
        header("location:index.php");
    }

    function excluir($id){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE from salto WHERE id = :id');
        $stmt->bindParam(':id', $idD, PDO::PARAM_INT);
        $idD = $id;
        $stmt->execute();
        header("location:index.php");
        
    //echo "Excluir".$id;
    }


    // Busca um item pelo código no BD
    function buscarDados($id){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM salto WHERE id = $id");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['id'] = $linha['id'];
            $dados['nome'] = $linha['nome'];
            $dados['nota1'] = $linha['nota1'];
            $dados['nota2'] = $linha['nota2'];
            $dados['nota3'] = $linha['nota3'];
            $dados['nota4'] = $linha['nota4'];
            $dados['nota5'] = $linha['nota5'];
            $dados['nascimento'] = $linha['nascimento'];
        }
        //var_dump($dados);
        return $dados;
    }

    // Busca as informações digitadas no form
    function dadosForm(){
        $dados = array();
        $dados['id'] = $_POST['id'];
        $dados['nome'] = $_POST['nome'];
        $dados['nota1'] = $_POST['nota1'];
        $dados['nota2'] = $_POST['nota2'];
        $dados['nota3'] = $_POST['nota3'];
        $dados['nota4'] = $_POST['nota4'];
        $dados['nota5'] = $_POST['nota5'];
        $dados['nascimento'] = $_POST['nascimento'];
        return $dados;
    }

?>