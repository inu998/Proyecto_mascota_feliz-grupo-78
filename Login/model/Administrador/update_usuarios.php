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
    $nom=$_POST['nombre'];
    $ap=$_POST['apellido'];
    $dir=$_POST['direccion'];
    $tp=$_POST['id_tp'];
    $est=$_POST['estado_usuario'];
    $sql_update="UPDATE tb_usuario SET nombres = '$nom', apellidos = '$ap', direccion = '$dir', id_tipo_usuario = '$tp', id_estado = '$est'  WHERE cedula = '".$_GET['id']."'";
   $cs=mysqli_query($mysqli, $sql_update);  
   echo '<script>alert (" Actualización Exitosa ");</script>';
}
elseif(isset($_POST["delete"]))
{
    $sqldelete="DELETE FROM tb_usuario WHERE cedula='".$_GET['id']."'";
    $cs=mysqli_query($mysqli, $sqldelete);  
   echo '<script>alert ("Registro eliminado Exitosamente ");</script>';
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
    <link rel="stylesheet" href="css/estilos_update.css">
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
        </div>
    <div class="Update_usuarios">
    <table>
        <form name = "consult" method="POST" autocomplete="off">
            <tr>
                <td>Documento</td>
                <td><input name="doc" value="<?php echo $result['cedula']?>" readonly ></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><input name="nombre" value="<?php echo $result['nombres']?>"></td>
            </tr>
            <tr>
                <td>Apellido</td>
                <td><input name="apellido" value="<?php echo $result['apellidos']?>"  ></td>
            </tr>
            <tr>
                <td>Direccion</td>
                <td><input name="direccion" value="<?php echo $result['direccion']?>"></td>
            </tr>
            <tr>
                <td>Tipo Usuario</td>
                <td> <select name="id_tp">
                                <option value= "<?php echo $result['id_tipo_usuario']?>"> <?php echo $result['tipo_usuario']?> </option>
                                <?php
                                $sql1="SELECT * FROM  tb_tipo_usuario";
                                $tp_usu = mysqli_query($mysqli, $sql1);
                                $usua1 = mysqli_fetch_assoc($tp_usu);
                                do{ 
                                ?>
                                <option value= "<?php echo($usua1['id_tipo_usuario'])?>"><?php echo($usua1['tipo_usuario'])?></option>
                                <?php
                                }while($usua1 =mysqli_fetch_assoc($tp_usu));
                                ?>
                            </select></td>
            </tr>
            <tr>
                        <td>Estado Usuario</td>
                        <td>
                            <select name="estado_usuario">
                                <option value= "<?php echo $result['id_estado']?>"><?php echo $result['estado']?></option>
                                <?php
                                $sql2="SELECT * FROM  tb_estado";
                                $estado2 = mysqli_query($mysqli, $sql2);
                                $usua2 = mysqli_fetch_assoc($estado2);
                                do{           
                                ?>
                                <option value= "<?php echo($usua2['id_estado'])?>"><?php echo($usua2['estado'])?></option>
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