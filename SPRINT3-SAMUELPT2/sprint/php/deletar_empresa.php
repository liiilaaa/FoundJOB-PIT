<?php 
    session_start();
    $con = new mysqli("localhost", "root", "", "estagiosPIT");
    $id = $_SESSION['id'];

    $query_delete = "DELETE FROM cadastroEmpresa where id=$id";
    $query_run = mysqli_query($con,$query_delete);

    if($query_run){
        echo"<script type='text/javascript'>alert('Deletado com sucesso!!');";
        echo"javascript:window.location='../html/index.html'</script>;";
    }else{
        echo"<script type='text/javascript'>alert('Não Deletado!!');";
        echo"javascript:window.location='../php/perfil_empresa.php'</script>;";
    }

?>