<!DOCTYPE html>

<?php 
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";
$title = "Lista de Marcas";
$consulta = isset($_POST['consulta']) ? $_POST['consulta'] : "";
$procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title   >
    <script>
        function excluirRegistro(url) {
            if (confirm("Confirmar Exclusão?"))
                location.href = url; 
        }
    </script>
</head>
<body>

    <br><br>
    <div class="div1"><div class="div2"><br>
    <a href="cad.php"><button>Adicionar Atleta</button></a>
    <br><br><hr>

    <form method="post"><br>

    Procurar atleta:<br><br>    
    <input type="radio" name="procurar" id="procurar" value="1" <?php if($procurar==1) {echo "checked";}?>>Por Código<br>
    <input type="radio" name="procurar" id="procurar" value="2" <?php if($procurar==2) {echo "checked";}?>>Por Nome<br><br>
    <input type="text" name="consulta" id="consulta" value="<?php echo $consulta; ?>">
    <input type="submit" value="Pesquisar">
    </form>
    
    <br></div></div><br><br>

    <table border="1">
        <tr>
            <th>Código</th>
            <th>Nome do Atleta</th> 
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Nota 3</th>
            <th>Nota 4</th>
            <th>Nota 5</th>
            <th>Data Nascimento</th>
            <th>Detalhes</th> 
            <th>Alterar</th> 
            <th>Excluir</th> 
        </tr>


    <?php 

    $sql = "";
    
    if ($procurar == 1) 
    $sql = "SELECT * FROM salto
            WHERE id LIKE  '$consulta%' 
            ORDER BY id";  

    else 
    $sql = "SELECT * FROM salto 
            WHERE nome LIKE '$consulta%' 
            ORDER BY nome";       
    
    $pdo = Conexao::getInstance(); 
    $consulta = $pdo->query($sql);
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){

    ?>

        <tr><td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['nome'];?></td>
            <td><?php echo $linha['nota1'];?></td>
            <td><?php echo $linha['nota2'];?></td>
            <td><?php echo $linha['nota3'];?></td>
            <td><?php echo $linha['nota4'];?></td>
            <td><?php echo $linha['nota5'];?></td>
            <td><?php echo date("d/m/Y",strtotime($linha['nascimento']));?></td>

            <td><a href='show.php?id=<?php echo $linha['id'];?>'> <img class="icon" src="img/show.png" alt=""> </a></td>

            <td><a href='cad.php?acao=editar&id=<?php echo $linha['id'];?>'><img class="icon" src="img/edit.png" alt=""></a></td>
            
            <td><a href="javascript:excluirRegistro('acao.php?acao=excluir&id=<?php echo $linha['id'];?>')"><img class="icon" src="img/delete.png" alt=""></a></td>
        </tr>
    <?php } ?>       
    </table>
    
</body>
</html>
