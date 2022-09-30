<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php"); 
$sql="SELECT * FROM tb_mascota, tb_afiliacion WHERE tb_mascota.id_afiliacion = tb_afiliacion.id_afiliacion AND tb_mascota.id_mascota ='".$_GET['id']."'";
$query=mysqli_query($mysqli,$sql);
$result=mysqli_fetch_assoc($query)
?>
<?php 
if(isset($_POST["update"]))
{
    $nom=$_POST['nombre'];
    $raza=$_POST['raza'];
    $color=$_POST['color'];
    $id_afiliacion=$_POST['afiliacion'];
    $sql_update="UPDATE tb_mascota SET nombre = '$nom', raza = '$raza', color = '$color', id_afiliacion = '$id_afiliacion'  WHERE id_mascota = '".$_GET['id']."'";
   $cs=mysqli_query($mysqli, $sql_update);  
   echo '<script>alert (" Actualización Exitosa ");</script>';
}
elseif(isset($_POST["delete"]))
{
    $sqldelete="DELETE FROM tb_mascota WHERE id_mascota='".$_GET['id']."'";
    $cs=mysqli_query($mysqli, $sqldelete);  
   echo '<script>alert ("Registro eliminado Exitosamente ");</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<script> 
function centrar() { 
    iz=(screen.width-document.body.clientWidth) / 2; 
    de=(screen.height-document.body.clientHeight) / 3; 
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
    <title>Agregar Usuario</title>
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
            <span></span>
            <span></span>
            
        </div>
    <div class="Update_mascotas">
    <table>
        <form name = "consult" method="POST" autocomplete="off">
            <tr>
                <td>Nombre de la mascota</td>
                <td><input name="nombre" value="<?php echo $result['nombre']?>"></td>
            </tr>
            <tr>
                <td>Raza de la mascota</td>
                <td><input name="raza" value="<?php echo $result['raza']?>"  ></td>
            </tr>
            <tr>
                <td>Color de la mascota</td>
                <td><input name="color" value="<?php echo $result['color']?>"></td>
            </tr>
            <tr>
                        <td>Estado de la mascota</td>
                        <td>
                            <select name="afiliacion">
                                <option value= "<?php echo $result['id_afiliacion']?>"><?php echo $result['Afiliacion']?></option>
                                <?php
                                $sql2="SELECT * FROM  tb_afiliacion";
                                $estado2 = mysqli_query($mysqli, $sql2);
                                $usua2 = mysqli_fetch_assoc($estado2);
                                do{           
                                ?>
                                <option value= "<?php echo($usua2['id_afiliacion'])?>"><?php echo($usua2['Afiliacion'])?></option>
                                <?php
                                }while($usua2 =mysqli_fetch_assoc($estado2));
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                    <td><input type="submit" name="update" value="Update"></td>
                    <td><input type="submit" name="delete" value="Delete"></td>
                </tr>
        </form>
    </table>
    </div>
    </body>
</html>