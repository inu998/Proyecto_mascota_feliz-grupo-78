<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php"); 
$sql="SELECT * FROM tb_usuario, tb_tipo_usuario, tb_estado WHERE tb_usuario.id_tipo_usuario = tb_tipo_usuario.id_tipo_usuario AND tb_usuario.id_estado = tb_estado.id_estado AND tb_usuario.cedula = '".$_GET['id']."'";
$query=mysqli_query($mysqli,$sql);
$result=mysqli_fetch_assoc($query)
?>
<?php 
if(isset($_POST["update"]))
{
    $dir=$_POST['Direccion'];
    $tel=$_POST['Telefono'];
    $corr=$_POST['Correo'];
    $sql_update="UPDATE tb_usuario SET direccion = '$dir', telefono = '$tel', correo = '$corr' WHERE cedula = '".$_GET['id']."'";
   $cs=mysqli_query($mysqli, $sql_update);  
   echo '<script>alert (" Actualización Exitosa ");</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<script> 
function centrar() { 
    iz=(screen.width-document.body.clientWidth) / 2; 
    de=(screen.height-document.body.clientHeight) / 2; 
    moveTo(iz,de); 
}     
</script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../controller/image/icon_proyect_final.png" type="image/x-icon">
    <link rel="stylesheet" href="../Administrador/css/estilos_update.css">
    <script src="https://kit.fontawesome.com/339217bc67.js" crossorigin="anonymous"></script>
    <title>Editar informacion</title>
</head>
    <body onload="centrar();">
    <div class="background">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    <div class="Update_usuarios">
    <table>
        <form name = "consult" method="POST" autocomplete="off">

            <tr>
                <td>Direccion</td>
                <td><input name="Direccion" value="<?php echo $result['direccion']?>"></td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td><input name="Telefono" value="<?php echo $result['telefono']?>"  ></td>
            </tr>
            <tr>
                <td>Correo</td>
                <td><input name="Correo" value="<?php echo $result['correo']?>"></td>
            </tr>
                    <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
        </form>
    </table>
    </div>
    </body>
</html>