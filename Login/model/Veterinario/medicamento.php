
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql="SELECT * FROM tb_usuario, tb_tipo_usuario WHERE tb_usuario.cedula = '".$_SESSION['usuario']."' AND tb_usuario.id_tipo_usuario = tb_tipo_usuario.id_tipo_usuario";
	$usuarios = mysqli_query($mysqli, $sql) or die(mysqli_error());
	$usua = mysqli_fetch_assoc($usuarios);


?>
<?php

if ((isset($_POST["btnguardar"])) && ($_POST["btnguardar"] == "frmadd"))
{

    $tp = $_POST['medic']; 
    $sqladd = "SELECT * FROM tb_medicamentos  WHERE Nombre_medicamento = '$tp' ";
    $query = mysqli_query($mysqli, $sqladd); 
    $fila = mysqli_fetch_assoc($query);
    if  ($fila){
        echo '<script>alert (" El medicamento ya fue creado");</script>';
        echo '<script>window.location= "medicamento.php"</script>';

    }elseif ($_POST['medic'] == ""){
        echo '<script>alert (" Existen campos vacios");</script>';
        echo '<script>window.location= "medicamento.php"</script>';

    }else {
        
        $medicam = $_POST['medic']; 
        
        $sqladd = "INSERT INTO tb_medicamentos  (Nombre_medicamento) VALUES ('$medicam') ";
        $query = mysqli_query($mysqli, $sqladd);
        echo '<script>alert (" Registro Exitoso ");</script>';
        echo '<script>window.location= "medicamento.php"</script>';

    }

}

?>

<form method="POST">

    <tr>
        <td colspan='2' align="center"><?php echo $usua['nombres']?></td>
        <td colspan='2' align="center"><?php echo $usua['apellidos']?></td>
    </tr>
<tr><br>
    <td colspan='2' align="center">
    
    
        <input type="submit" value="Cerrar sesión" name="btncerrar" /></td>
        <input type="submit" formaction="index.php" value="Regresar" />
    </tr>
</form>

<?php 

if(isset($_POST['btncerrar']))
{
	session_destroy();

   
    header('location: ../../index.html');
}
	
?>

</div>

</div>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="shortcut icon" href="../../../controller/img/icon_proyect_final.png" type="image/x-icon">
    <title>Creacion de Medicamentos</title>
    

</head>
    <body>
        <section class="title">
            <h1>Formulario Creacion de Medicamentos <?php echo $usua['tipo_usuario']?></span></h1> 
            
        </section>
        <table class="centrar" border="1">
             <form method="POST" name="frmadd" autocomplete="off">
               <tr>
                    <td colspan="2">Tipos de Medicamento</td>

                </tr>

                <tr>
                    <td>Identificador</td>
                    <td><input type="number" readonly ></td>
                </tr>

                <tr>
                    <td>Nombre Medicamento</td>
                    <td><input type="text" name="medic" placeholder=" Ingrese Medicamento" style="text-transform: uppercase;"></td>
                </tr>

                <tr>
                    <td colspan="2">&nbsp;</td>

                </tr>
                
                <tr>
                    <td colspan="2"><input type="submit" name="btnadd" value="Guardar"></td>
                    <input type="hidden" name="btnguardar" value="frmadd">

                </tr>

             </form>  


        </table>
        
    </body>
</html>