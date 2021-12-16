<!DOCTYPE html>
<?php 
     include_once "conf/default.inc.php";
     require_once "conf/Conexao.php";
     $title = "Lista de Clientes";
     $id = isset($_GET['id']) ? $_GET['id'] : "1";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

</br>
</br>

<?php
    $sql = "SELECT * FROM salto WHERE id = $id";
    $pdo = Conexao::getInstance(); 
    $consulta = $pdo->query($sql);
    while ($linha = $consulta->fetch(PDO::FETCH_BOTH)){
?>


<table border="1">
        <tr>
            <th>Código</th>
            <th>Nome Atleta</th> 
            <th>Nota 1</th> 
            <th>Nota 2</th> 
            <th>Nota 3</th> 
            <th>Nota 4</th>
            <th>Nota 5</th>
            <th>Nascimento</th>
        </tr>

        <tr>
            <td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['nome'];?></td>
            <td><?php echo number_format($linha['nota1'],1,',','.');?></td>
            <td><?php echo number_format($linha['nota2'],1,',','.');?></td>
            <td><?php echo number_format($linha['nota3'],1,',','.');?></td>
            <td><?php echo number_format($linha['nota4'],1,',','.');?></td>
            <td><?php echo number_format($linha['nota5'],1,',','.');?></td>
            <td><?php echo date("d/m/Y",strtotime($linha['nascimento']));?></td>
            <br> 
            <center><button><a href="index.php" type="btn" class="voltar">Voltar</a></button><center><br>
        <?php  } ?>
</body>
</html>