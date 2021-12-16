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
    <link rel="stylesheet" href="css/estilo.css">
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

    <table class="striped highlight">
        <tr>
            <th>Código</th>
            <th>Nome do Atleta</th> 
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Nota 3</th>
            <th>Nota 4</th>
            <th>Nota 5</th>
            <th>Maior Nota</th>
            <th>Menor Nota</th>
            <th>Média Notas</th>
            <th>Data Nascimento</th>
            <th>Idade</th>
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

    // Idade dos atletas em anos e formatações condições das Idades

    $ano = date("Y");
    $nascimento = date("Y", strtotime($linha['nascimento']));
    $idade = $ano - $nascimento;
    $nome = $linha['nome'];

        if ($idade >= 50) 
        $nome = "<p class='nameblue'>$nome</p>";
        
        else if ($idade <= 18) 
        $nome = "<p class='namegreen'>$nome</p>";

        else 
        $nome = "<p>$nome</p>";

    // Maior Nota, Menor Nota e Media.

    $nota1 = $linha['nota1'];
    $nota2 = $linha['nota2'];
    $nota3 = $linha['nota3'];
    $nota4 = $linha['nota4'];
    $nota5 = $linha['nota5'];


if ($nota1>$nota2 && $nota1>$nota3 && $nota1>$nota4 &&  $nota1>$nota5 && $nota2<$nota1 && $nota2<$nota3 && $nota2<$nota4 &&  $nota2<$nota5){
    $maiornota = "<p>$nota1</p>";
    $menornota = "<p>$nota2</p>";
    $media = ($nota3 + $nota4 + $nota5)/3;

         if ($nota3 > $nota4 && $nota3 > $nota5) {$nota3 = "<p class='blue'>$nota3</p>";}
    else if ($nota4 > $nota3 && $nota4 > $nota5) {$nota4 = "<p class='blue'>$nota4</p>";}
    else if ($nota5 > $nota3 && $nota5 > $nota4) {$nota5 = "<p class='blue'>$nota5</p>";}

         if ($nota3 < $nota4 && $nota3 < $nota5) {$nota3 = "<p class='red'>$nota3</p>";}
    else if ($nota4 < $nota3 && $nota4 < $nota5) {$nota4 = "<p class='red'>$nota4</p>";}
    else if ($nota5 < $nota3 && $nota5 < $nota4) {$nota5 = "<p class='red'>$nota5</p>";}

}

else if ($nota1>$nota2 && $nota1>$nota3 && $nota1>$nota4 &&  $nota1>$nota5 && $nota3<$nota1 && $nota3<$nota2 && $nota3<$nota4 &&  $nota3<$nota5){
        $maiornota = "<p>$nota1</p>";
        $menornota = "<p>$nota3</p>";
        $media = ($nota2 + $nota4 + $nota5)/3;

         if ($nota2 > $nota4 && $nota2 > $nota5) {$nota2 = "<p class='blue'>$nota2</p>";}
    else if ($nota4 > $nota2 && $nota4 > $nota5) {$nota4 = "<p class='blue'>$nota4</p>";}
    else if ($nota5 > $nota2 && $nota5 > $nota4) {$nota5 = "<p class='blue'>$nota5</p>";}

         if ($nota2 < $nota4 && $nota2 < $nota5) {$nota2 = "<p class='red'>$nota2</p>";}
    else if ($nota4 < $nota2 && $nota4 < $nota5) {$nota4 = "<p class='red'>$nota4</p>";}
    else if ($nota5 < $nota2 && $nota5 < $nota4) {$nota5 = "<p class='red'>$nota5</p>";}

}

else if ($nota1>$nota2 && $nota1>$nota3 && $nota1>$nota4 &&  $nota1>$nota5 && $nota4<$nota1 && $nota4<$nota2 && $nota4<$nota3 &&  $nota4<$nota5){
        $maiornota = "<p>$nota1</p>";
        $menornota = "<p>$nota4</p>";
        $media = ($nota2 + $nota3 + $nota5)/3;

         if ($nota2 > $nota3 && $nota2 > $nota5) {$nota2 = "<p class='blue'>$nota2</p>";}
    else if ($nota3 > $nota2 && $nota3 > $nota5) {$nota3 = "<p class='blue'>$nota3</p>";}
    else if ($nota5 > $nota2 && $nota5 > $nota3) {$nota5 = "<p class='blue'>$nota5</p>";}

         if ($nota2 < $nota3 && $nota2 < $nota5) {$nota2 = "<p class='red'>$nota2</p>";}
    else if ($nota3 < $nota2 && $nota3 < $nota5) {$nota3 = "<p class='red'>$nota3</p>";}
    else if ($nota5 < $nota2 && $nota5 < $nota3) {$nota5 = "<p class='red'>$nota5</p>";}
}

else if ($nota1>$nota2 && $nota1>$nota3 && $nota1>$nota4 &&  $nota1>$nota5 && $nota5<$nota1 && $nota5<$nota2 && $nota5<$nota3 &&  $nota5<$nota4){
        $maiornota = "<p>$nota1</p>";
        $menornota = "<p>$nota5</p>";
        $media = ($nota2 + $nota3 + $nota4)/3;

         if ($nota2 > $nota3 && $nota2 > $nota4) {$nota2 = "<p class='blue'>$nota2</p>";}
    else if ($nota3 > $nota2 && $nota3 > $nota4) {$nota3 = "<p class='blue'>$nota3</p>";}
    else if ($nota4 > $nota2 && $nota4 > $nota3) {$nota4 = "<p class='blue'>$nota4</p>";}

         if ($nota2 < $nota3 && $nota2 < $nota4) {$nota2 = "<p class='red'>$nota2</p>";}
    else if ($nota3 < $nota2 && $nota3 < $nota4) {$nota3 = "<p class='red'>$nota3</p>";}
    else if ($nota4 < $nota2 && $nota4 < $nota3) {$nota4 = "<p class='red'>$nota4</p>";}

}

else if ($nota2>$nota1 && $nota2>$nota3 && $nota2>$nota4 && $nota2>$nota5 && $nota1<$nota2 && $nota1<$nota3 && $nota1<$nota4 &&  $nota1<$nota5){
        $maiornota = "<p>$nota2</p>";
        $menornota = "<p>$nota1</p>";
        $media = ($nota3 + $nota4 + $nota5)/3;

         if ($nota3 > $nota4 && $nota3 > $nota5) {$nota3 = "<p class='blue'>$nota3</p>";}
    else if ($nota4 > $nota3 && $nota4 > $nota5) {$nota4 = "<p class='blue'>$nota4</p>";}
    else if ($nota5 > $nota3 && $nota5 > $nota4) {$nota5 = "<p class='blue'>$nota5</p>";}

         if ($nota3 < $nota4 && $nota3 < $nota5) {$nota3 = "<p class='red'>$nota3</p>";}
    else if ($nota4 < $nota3 && $nota4 < $nota5) {$nota4 = "<p class='red'>$nota4</p>";}
    else if ($nota5 < $nota3 && $nota5 < $nota4) {$nota5 = "<p class='red'>$nota5</p>";}
}

else if ($nota2>$nota1 && $nota2>$nota3 && $nota2>$nota4 && $nota2>$nota5 && $nota3<$nota1 && $nota3<$nota2 && $nota3<$nota4 &&  $nota3<$nota5){
        $maiornota = "<p>$nota2</p>";
        $menornota = "<p>$nota3</p>";
        $media = ($nota1 + $nota4 + $nota5)/3;

         if ($nota1 > $nota4 && $nota1 > $nota5) {$nota1 = "<p class='blue'>$nota1</p>";}
    else if ($nota4 > $nota1 && $nota4 > $nota5) {$nota4 = "<p class='blue'>$nota4</p>";}
    else if ($nota5 > $nota1 && $nota5 > $nota4) {$nota5 = "<p class='blue'>$nota5</p>";}

         if ($nota1 < $nota4 && $nota1 < $nota5) {$nota1 = "<p class='red'>$nota1</p>";}
    else if ($nota4 < $nota1 && $nota4 < $nota5) {$nota4 = "<p class='red'>$nota4</p>";}
    else if ($nota5 < $nota1 && $nota5 < $nota4) {$nota5 = "<p class='red'>$nota5</p>";}
}

else if ($nota2>$nota1 && $nota2>$nota3 && $nota2>$nota4 && $nota2>$nota5 && $nota4<$nota1 && $nota4<$nota2 && $nota4<$nota3 &&  $nota4<$nota5){
        $maiornota = "<p>$nota2</p>";
        $menornota = "<p>$nota4</p>";
        $media = ($nota1 + $nota3 + $nota5)/3;

         if ($nota1 > $nota3 && $nota1 > $nota5) {$nota1 = "<p class='blue'>$nota1</p>";}
    else if ($nota3 > $nota1 && $nota3 > $nota5) {$nota3 = "<p class='blue'>$nota3</p>";}
    else if ($nota5 > $nota1 && $nota5 > $nota3) {$nota5 = "<p class='blue'>$nota5</p>";}

         if ($nota1 < $nota3 && $nota1 < $nota5) {$nota1 = "<p class='red'>$nota1</p>";}
    else if ($nota3 < $nota1 && $nota3 < $nota5) {$nota3 = "<p class='red'>$nota3</p>";}
    else if ($nota5 < $nota1 && $nota5 < $nota3) {$nota5 = "<p class='red'>$nota5</p>";}
}

else if ($nota2>$nota1 && $nota2>$nota3 && $nota2>$nota4 && $nota2>$nota5 && $nota5<$nota1 && $nota5<$nota2 && $nota5<$nota3 &&  $nota5<$nota4){
        $maiornota = "<p>$nota2</p>";
        $menornota = "<p>$nota5</p>";
        $media = ($nota1 + $nota3 + $nota4)/3;

         if ($nota1 > $nota3 && $nota1 > $nota4) {$nota1 = "<p class='blue'>$nota1</p>";}
    else if ($nota3 > $nota1 && $nota3 > $nota4) {$nota3 = "<p class='blue'>$nota3</p>";}
    else if ($nota4 > $nota1 && $nota4 > $nota3) {$nota4 = "<p class='blue'>$nota4</p>";}

         if ($nota1 < $nota3 && $nota1 < $nota4) {$nota1 = "<p class='red'>$nota1</p>";}
    else if ($nota3 < $nota1 && $nota3 < $nota4) {$nota3 = "<p class='red'>$nota3</p>";}
    else if ($nota4 < $nota1 && $nota4 < $nota3) {$nota4 = "<p class='red'>$nota4</p>";}
}


else if ($nota3>$nota1 && $nota3>$nota2 && $nota3>$nota4 &&  $nota3>$nota5 && $nota1<$nota2 && $nota1<$nota3 && $nota1<$nota4 &&  $nota1<$nota5){
        $maiornota = "<p>$nota3</p>";
        $menornota = "<p>$nota1</p>";
        $media = ($nota2 + $nota4 + $nota5)/3;

         if ($nota2 > $nota4 && $nota2 > $nota5) {$nota2 = "<p class='blue'>$nota2</p>";}
    else if ($nota4 > $nota2 && $nota4 > $nota5) {$nota4 = "<p class='blue'>$nota4</p>";}
    else if ($nota5 > $nota2 && $nota5 > $nota4) {$nota5 = "<p class='blue'>$nota5</p>";}

         if ($nota2 < $nota4 && $nota2 < $nota5) {$nota2 = "<p class='red'>$nota2</p>";}
    else if ($nota4 < $nota2 && $nota4 < $nota5) {$nota4 = "<p class='red'>$nota4</p>";}
    else if ($nota5 < $nota2 && $nota5 < $nota4) {$nota5 = "<p class='red'>$nota5</p>";}

}

else if ($nota3>$nota1 && $nota3>$nota2 && $nota3>$nota4 &&  $nota3>$nota5 && $nota2<$nota1 && $nota2<$nota3 && $nota2<$nota4 &&  $nota2<$nota5){
        $maiornota = "<p>$nota3</p>";
        $menornota = "<p>$nota2</p>";
        $media = ($nota1 + $nota4 + $nota5)/3;

         if ($nota1 > $nota4 && $nota1 > $nota5) {$nota1 = "<p class='blue'>$nota1</p>";}
    else if ($nota4 > $nota1 && $nota4 > $nota5) {$nota4 = "<p class='blue'>$nota4</p>";}
    else if ($nota5 > $nota1 && $nota5 > $nota4) {$nota5 = "<p class='blue'>$nota5</p>";}

         if ($nota1 < $nota4 && $nota1 < $nota5) {$nota1 = "<p class='red'>$nota1</p>";}
    else if ($nota4 < $nota1 && $nota4 < $nota5) {$nota4 = "<p class='red'>$nota4</p>";}
    else if ($nota5 < $nota1 && $nota5 < $nota4) {$nota5 = "<p class='red'>$nota5</p>";}
}

else if ($nota3>$nota1 && $nota3>$nota2 && $nota3>$nota4 &&  $nota3>$nota5 && $nota4<$nota1 && $nota4<$nota2 && $nota4<$nota3 &&  $nota4<$nota5){
        $maiornota = "<p>$nota3</p>";
        $menornota = "<p>$nota4</p>";
        $media = ($nota1 + $nota2 + $nota5)/3;

         if ($nota1 > $nota2 && $nota1 > $nota5) {$nota1 = "<p class='blue'>$nota1</p>";}
    else if ($nota2 > $nota1 && $nota2 > $nota5) {$nota2 = "<p class='blue'>$nota2</p>";}
    else if ($nota5 > $nota1 && $nota5 > $nota2) {$nota5 = "<p class='blue'>$nota5</p>";}

         if ($nota1 < $nota2 && $nota1 < $nota5) {$nota1 = "<p class='red'>$nota1</p>";}
    else if ($nota2 < $nota1 && $nota2 < $nota5) {$nota2 = "<p class='red'>$nota2</p>";}
    else if ($nota5 < $nota1 && $nota5 < $nota2) {$nota5 = "<p class='red'>$nota5</p>";}
}

else if ($nota3>$nota1 && $nota3>$nota2 && $nota3>$nota4 &&  $nota3>$nota5 && $nota5<$nota1 && $nota5<$nota2 && $nota5<$nota3 &&  $nota5<$nota4){
        $maiornota = "<p>$nota3</p>";
        $menornota = "<p>$nota5</p>";
        $media = ($nota1 + $nota2 + $nota4)/3;

         if ($nota1 > $nota2 && $nota1 > $nota4) {$nota1 = "<p class='blue'>$nota1</p>";}
    else if ($nota2 > $nota1 && $nota2 > $nota4) {$nota2 = "<p class='blue'>$nota2</p>";}
    else if ($nota4 > $nota1 && $nota4 > $nota2) {$nota4 = "<p class='blue'>$nota4</p>";}

         if ($nota1 < $nota2 && $nota1 < $nota4) {$nota1 = "<p class='red'>$nota1</p>";}
    else if ($nota2 < $nota1 && $nota2 < $nota4) {$nota2 = "<p class='red'>$nota2</p>";}
    else if ($nota4 < $nota1 && $nota4 < $nota2) {$nota4 = "<p class='red'>$nota4</p>";}
}


else if ($nota4>$nota1 && $nota4>$nota2 && $nota4>$nota3 &&  $nota4>$nota5 && $nota1<$nota2 && $nota1<$nota3 && $nota1<$nota4 &&  $nota1<$nota5){
        $maiornota = "<p>$nota4</p>";
        $menornota = "<p>$nota1</p>";
        $media = ($nota2 + $nota3 + $nota5)/3;

         if ($nota2 > $nota3 && $nota2 > $nota5) {$nota2 = "<p class='blue'>$nota2</p>";}
    else if ($nota3 > $nota2 && $nota3 > $nota5) {$nota3 = "<p class='blue'>$nota3</p>";}
    else if ($nota5 > $nota2 && $nota5 > $nota3) {$nota5 = "<p class='blue'>$nota5</p>";}

         if ($nota2 < $nota3 && $nota2 < $nota5) {$nota2 = "<p class='red'>$nota2</p>";}
    else if ($nota3 < $nota2 && $nota3 < $nota5) {$nota3 = "<p class='red'>$nota3</p>";}
    else if ($nota5 < $nota2 && $nota5 < $nota3) {$nota5 = "<p class='red'>$nota5</p>";}
}

else if ($nota4>$nota1 && $nota4>$nota2 && $nota4>$nota3 &&  $nota4>$nota5 && $nota2<$nota1 && $nota2<$nota3 && $nota2<$nota4 &&  $nota2<$nota5){
        $maiornota = "<p>$nota4</p>";
        $menornota = "<p>$nota2</p>";
        $media = ($nota1 + $nota3 + $nota5)/3;

         if ($nota1 > $nota3 && $nota1 > $nota5) {$nota1 = "<p class='blue'>$nota1</p>";}
    else if ($nota3 > $nota1 && $nota3 > $nota5) {$nota3 = "<p class='blue'>$nota3</p>";}
    else if ($nota5 > $nota1 && $nota5 > $nota3) {$nota5 = "<p class='blue'>$nota5</p>";}

         if ($nota1 < $nota3 && $nota1 < $nota5) {$nota1 = "<p class='red'>$nota1</p>";}
    else if ($nota3 < $nota1 && $nota3 < $nota5) {$nota3 = "<p class='red'>$nota3</p>";}
    else if ($nota5 < $nota1 && $nota5 < $nota3) {$nota5 = "<p class='red'>$nota5</p>";}
}

else if ($nota4>$nota1 && $nota4>$nota2 && $nota4>$nota3 &&  $nota4>$nota5 && $nota3<$nota1 && $nota3<$nota2 && $nota3<$nota4 &&  $nota3<$nota5){
        $maiornota = "<p>$nota4</p>";
        $menornota = "<p>$nota3</p>";
        $media = ($nota1 + $nota2 + $nota5)/3;

         if ($nota1 > $nota2 && $nota1 > $nota5) {$nota1 = "<p class='blue'>$nota1</p>";}
    else if ($nota2 > $nota1 && $nota2 > $nota5) {$nota2 = "<p class='blue'>$nota2</p>";}
    else if ($nota5 > $nota1 && $nota5 > $nota2) {$nota5 = "<p class='blue'>$nota5</p>";}

         if ($nota1 < $nota2 && $nota1 < $nota5) {$nota1 = "<p class='red'>$nota1</p>";}
    else if ($nota2 < $nota1 && $nota2 < $nota5) {$nota2 = "<p class='red'>$nota2</p>";}
    else if ($nota5 < $nota1 && $nota5 < $nota2) {$nota5 = "<p class='red'>$nota5</p>";}
}

else if ($nota4>$nota1 && $nota4>$nota2 && $nota4>$nota3 &&  $nota4>$nota5 && $nota5<$nota1 && $nota5<$nota2 && $nota5<$nota3 &&  $nota5<$nota4){
        $maiornota = "<p>$nota4</p>";
        $menornota = "<p>$nota5</p>";
        $media = ($nota1 + $nota2 + $nota3)/3;

         if ($nota1 > $nota2 && $nota1 > $nota3) {$nota1 = "<p class='blue'>$nota1</p>";}
    else if ($nota2 > $nota1 && $nota2 > $nota3) {$nota2 = "<p class='blue'>$nota2</p>";}
    else if ($nota3 > $nota1 && $nota3 > $nota2) {$nota3 = "<p class='blue'>$nota3</p>";}

         if ($nota1 < $nota2 && $nota1 < $nota3) {$nota1 = "<p class='red'>$nota1</p>";}
    else if ($nota2 < $nota1 && $nota2 < $nota3) {$nota2 = "<p class='red'>$nota2</p>";}
    else if ($nota3 < $nota1 && $nota3 < $nota2) {$nota3 = "<p class='red'>$nota3</p>";}
}

else if ($nota5>$nota1 && $nota5>$nota2 && $nota5>$nota3 &&  $nota5>$nota4 && $nota1<$nota2 && $nota1<$nota3 && $nota1<$nota4 &&  $nota1<$nota5){
        $maiornota = "<p>$nota5</p>";
        $menornota = "<p>$nota1</p>";
        $media = ($nota2 + $nota3 + $nota4)/3;

         if ($nota2 > $nota3 && $nota2 > $nota4) {$nota2 = "<p class='blue'>$nota2</p>";}
    else if ($nota3 > $nota2 && $nota3 > $nota4) {$nota3 = "<p class='blue'>$nota3</p>";}
    else if ($nota4 > $nota2 && $nota4 > $nota3) {$nota4 = "<p class='blue'>$nota4</p>";}

         if ($nota2 < $nota3 && $nota2 < $nota4) {$nota2 = "<p class='red'>$nota2</p>";}
    else if ($nota3 < $nota2 && $nota3 < $nota4) {$nota3 = "<p class='red'>$nota3</p>";}
    else if ($nota4 < $nota2 && $nota4 < $nota3) {$nota4 = "<p class='red'>$nota4</p>";}
}

else if ($nota5>$nota1 && $nota5>$nota2 && $nota5>$nota3 &&  $nota5>$nota4 && $nota2<$nota1 && $nota2<$nota3 && $nota2<$nota4 &&  $nota2<$nota5){
        $maiornota = "<p>$nota5</p>";
        $menornota = "<p>$nota2</p>";
        $media = ($nota1 + $nota3 + $nota4)/3;

         if ($nota1 > $nota3 && $nota1 > $nota4) {$nota1 = "<p class='blue'>$nota1</p>";}
    else if ($nota3 > $nota1 && $nota3 > $nota4) {$nota3 = "<p class='blue'>$nota3</p>";}
    else if ($nota4 > $nota1 && $nota4 > $nota3) {$nota4 = "<p class='blue'>$nota4</p>";}

         if ($nota1 < $nota3 && $nota1 < $nota4) {$nota1 = "<p class='red'>$nota1</p>";}
    else if ($nota3 < $nota1 && $nota3 < $nota4) {$nota3 = "<p class='red'>$nota3</p>";}
    else if ($nota4 < $nota1 && $nota4 < $nota3) {$nota4 = "<p class='red'>$nota4</p>";}
}

else if ($nota5>$nota1 && $nota5>$nota2 && $nota5>$nota3 &&  $nota5>$nota4 && $nota3<$nota1 && $nota3<$nota2 && $nota3<$nota4 &&  $nota3<$nota5){
        $maiornota = "<p>$nota5</p>";
        $menornota = "<p>$nota3</p>";
        $media = ($nota1 + $nota2 + $nota4)/3;

         if ($nota1 > $nota2 && $nota1 > $nota4) {$nota1 = "<p class='blue'>$nota1</p>";}
    else if ($nota2 > $nota1 && $nota2 > $nota4) {$nota2 = "<p class='blue'>$nota2</p>";}
    else if ($nota4 > $nota1 && $nota4 > $nota2) {$nota4 = "<p class='blue'>$nota4</p>";}

         if ($nota1 < $nota2 && $nota1 < $nota4) {$nota1 = "<p class='red'>$nota1</p>";}
    else if ($nota2 < $nota1 && $nota2 < $nota4) {$nota2 = "<p class='red'>$nota2</p>";}
    else if ($nota4 < $nota1 && $nota4 < $nota2) {$nota4 = "<p class='red'>$nota4</p>";}
}

else if ($nota5>$nota1 && $nota5>$nota2 && $nota5>$nota3 &&  $nota5>$nota4 && $nota4<$nota1 && $nota4<$nota2 && $nota4<$nota3 &&  $nota4<$nota5){
        $maiornota = "<p>$nota5</p>";
        $menornota = "<p>$nota4</p>";
        $media = ($nota1 + $nota2 + $nota3)/3;

         if ($nota1 > $nota2 && $nota1 > $nota3) {$nota1 = "<p class='blue'>$nota1</p>";}
    else if ($nota2 > $nota1 && $nota2 > $nota3) {$nota2 = "<p class='blue'>$nota2</p>";}
    else if ($nota3 > $nota1 && $nota3 > $nota2) {$nota3 = "<p class='blue'>$nota3</p>";}

         if ($nota1 < $nota2 && $nota1 < $nota3) {$nota1 = "<p class='red'>$nota1</p>";}
    else if ($nota2 < $nota1 && $nota2 < $nota3) {$nota2 = "<p class='red'>$nota2</p>";}
    else if ($nota3 < $nota1 && $nota3 < $nota2) {$nota3 = "<p class='red'>$nota3</p>";}
}


    ?>

        <tr><td><?php echo $linha['id'];?></td>
            <td><?php echo $nome?></td>
            <td><?php echo $nota1?></td>
            <td><?php echo $nota2?></td>
            <td><?php echo $nota3?></td>
            <td><?php echo $nota4?></td>
            <td><?php echo $nota5?></td>
            <td><?php echo $maiornota?></td>
            <td><?php echo $menornota?></td>
            <td><?php echo number_format($media,1,',','.');?></td>
            <td><?php echo date("d/m/Y",strtotime($linha['nascimento']));?></td>
            <td class="Idade"><?php echo "$idade anos";  ?></td>


            <td><a href='show.php?id=<?php echo $linha['id'];?>'> <img class="icon" src="img/show.png" alt=""> </a></td>

            <td><a href='cad.php?acao=editar&id=<?php echo $linha['id'];?>'><img class="icon" src="img/edit.png" alt=""></a></td>
            
            <td><a href="javascript:excluirRegistro('acao.php?acao=excluir&id=<?php echo $linha['id'];?>')"><img class="icon" src="img/delete.png" alt=""></a></td>
        </tr>
    <?php } ?>       
    </table>
    
</body>
</html>
