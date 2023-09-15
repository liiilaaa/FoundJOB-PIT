<?php
$con = new mysqli("localhost", "root", "", "estagiosPIT");

?>

<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estagiosGeral.css">
    <title>FoundJOB</title>
</head>

<body>

<header>
        <div class="topo" >
            <img src="../Itens/Icons/acordo1.png" alt="logo" class="logotipo">
        </div>
        <div class="lateral">
            <a href="../html/landingPage.html">
                <img src="../Itens/Icons/botao-quadrado 1.png" alt="menu Inicial" class="imgs">
            </a>

            <a href="../php/geral_estagios.php">
                <img src="../Itens/Icons/pasta 1.png" alt="Pagina Estagios" class="imgs">
            </a>

            <a href="#">
                <img src="../Itens/Icons/marca-paginas 1.png" alt="estagios Favoritos" class="imgs">
            </a>

            <a href="#">
                <img src="../Itens/Icons/curriculo-e-cv 1.png" alt="curriculo-e-cv" class="imgs">
            </a>

            <a href="../php/perfil_empresa.php">
                <img src="../Itens/Icons/do-utilizador 1.png" alt="Usuario" class="imgs">
            </a>
        </div>
    </header>

    <div class="total">

<h1>Filtros</h1>
<form method="POST" class="filtro">

        <div class="">
            <h3>Bolsa:</h3>
            <input type="text" name="min" placeholder="Valor Minimo">
            <input type="text" name="max" placeholder="Valor Maximo"> <br><br>
            <button name="procura">Procurar</button>
        </div>

        
        <div class="">
            <h3>Localização:</h3>
            <select name="combobox">
                <option  name="belo" >Belo Horizonte</option>
                <option  name="contagem" >Contagem</option>
                <option  name="sabara" >Sabará</option>
            </select>
            <input type="submit" name="Procurar" value="Procurar">
        </div>
        
        
        
        
        <!-- <select name="Localidade">
            <option value="">Localização</option>
            <option class="" value="4">Belo Horizonte</option>
            <option class="" value="5">Contagem</option>
            <option class="" value="6">Sabará</option>
        </select>
        
        <select name="Hórario" placeholder="horario">
            <option value="">Carga Horária</option>
            <option class="" value="7">4 horas</option>
            <option class="" value="8">5 horas</option>
            <option class="" value="9">6 horas</option>
        </select> -->
        
    </form>
<br><br>

<?php
if(isset($_POST['procura'])){

    $max = $_POST['max'];
    $min = $_POST['min'];
    $query = "SELECT * FROM cadastroEstagio where bolsa between $min and $max;";
    
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $estagio = mysqli_fetch_array($query_run);
        
    }
}


if(isset($_POST['Procurar'])){
   
    echo "<h1> chegamos aqui? </h1>";
    print_r($_POST);
    $local = "";
    if(isset($_POST['belo'])){
        $local = $_POST['belo'];
        echo "<h1> chegamos aqui? </h1>";
    }
    if(isset($_POST['contagem'])){
        $local = $_POST['contagem'];
    }
    if(isset($_POST['sabara'])){
        $local = $_POST['sabara'];
    }

    if($local == 'belo'){
        
        $query  = "SELECT * from cadastroEstagio where localizacao = $local;";
    
    }
    else if($local == 'contagem'){
    
        $query  = "SELECT * from cadastroEstagio where localizacao = $local;";
    
    }
    
    else if($local == 'sabara'){

       $query  = "SELECT * from cadastroEstagio where localizacao = $local;";
    
    }
    
}
else{
    $query = "SELECT * FROM cadastroEstagio;";
}

$query = "SELECT * FROM cadastroEstagio";
$query_run = mysqli_query($con, $query);
$dados = mysqli_fetch_all($query_run, MYSQLI_BOTH);


foreach ($dados as $estagio) {
?>
    <tr>
        <td>
            <div class="estagio">
                nome: <?= $estagio['nome']; ?><br>
                localização: <?= $estagio['localizacao']; ?><br>
                contato: <?= $estagio['contato']; ?><br>
                bolsa: <?= $estagio['bolsa']; ?><br>
                cargaHoraria: <?= $estagio['cargaHoraria']; ?><br>
                conhecomento: <?= $estagio['conhecimento']; ?><br>
                informações adicionais: <?= $estagio['informaçõesExtras']; ?><br><br><br><br><br>
            </div>
        </td>
    </tr>
<?php
}





?>

</html>


<?php

?>