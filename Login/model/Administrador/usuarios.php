
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql="SELECT * FROM tb_usuario, tb_tipo_usuario WHERE tb_usuario.cedula = '".$_SESSION['usuario']."' AND tb_usuario.id_tipo_usuario = tb_tipo_usuario.id_tipo_usuario";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);  
?>

<?php
// CONSULTA PARA LOS TIPOS DE USUARIO
$sql1="SELECT * FROM  tb_tipo_usuario";
$tp_usu = mysqli_query($mysqli, $sql1);
$usua1 = mysqli_fetch_assoc($tp_usu);
?>

<?php
// CONSULTA PARA LOS ESTADOS DE USUARIO
$sql2="SELECT * FROM  tb_estado";
$estado2 = mysqli_query($mysqli, $sql2);
$usua2 = mysqli_fetch_assoc($estado2);
?>

<?php
if ((isset($_POST["boton_guardar"])) && ($_POST["boton_guardar"] == "formulario_agregar")) 
{
    $tdoc = $_POST['doc'];
    $sqladd="SELECT * FROM  tb_usuario WHERE  cedula = '$tdoc'"  ;
    $query=mysqli_query($mysqli,$sqladd);
    $fila=mysqli_fetch_assoc($query);

    if($fila){
        echo '<script>alert (" El usuario ya existe ");</script>';
        echo '<script>window.location="usuarios.php"</script>';
    }

    elseif($_POST["doc"]== "" || $_POST["nomb"]== "" || $_POST["apell"]== "" || $_POST["direccion"]== "" || $_POST["telef"]== "" || $_POST["correo"]== "" || $_POST["contrasena"]== "" || $_POST["tp"]== "" || $_POST["id_tp"]== "" || $_POST["estado_usuario"]== "") {
        echo '<script>alert (" No puede haber campos vacios ");</script>';
        echo '<script>window.location="usuarios.php"</script>';
    }
    else 
    {
        $doc = $_POST["doc"];
        $nom = $_POST["nomb"];
        $ape = $_POST["apell"];
        $dir = $_POST["direccion"];
        $tel = $_POST["telef"];
        $correo = $_POST["correo"];
        $contra = $_POST["contrasena"];
        $tarpro = $_POST["tp"];
        $tipusu = $_POST["id_tp"];
        $estado = $_POST["estado_usuario"];

        $sqladd="INSERT INTO tb_usuario (cedula, nombres, apellidos, direccion, telefono, correo, contrasena, tarjeta_profesional, id_tipo_usuario, id_estado) VALUE ('$doc', '$nom', '$ape', '$dir', '$tel', '$correo', '$contra', '$tarpro','$tipusu','$estado')";
        $query=mysqli_query($mysqli,$sqladd);
        echo '<script>alert (" Guardado con exito ");</script>';
        echo '<script>window.location="usuarios.php"</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../controller/image/icon_proyect_final.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos_roles.css">
    <script src="https://kit.fontawesome.com/339217bc67.js" crossorigin="anonymous"></script>
    <title>Agregar Usuario</title>
</head>
    <body onload="frm_add.tipo_usuario.focus()">
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
            <span></span>
            <span></span>
            <span></span>
            <span></span>   
            <span></span>
            <span></span>
        </div>
        <div class="cabezera">
            <section class="title">
                <h1>Formulario <br>creacion de usuarios</h1>
                <span><i class="fa-solid fa-circle-user"></i></span>
                <span class="tipo_usuario"><?php echo $usua['tipo_usuario']?></span>
                <br>
                <span class="usuario"><?php echo $usua['nombres']?> <?php echo $usua['apellidos']?></span>
                <a href="index.php">Regresar<i class="fa-solid fa-rotate-left"></i></a>
                <a href="../../controller/salir.php">Salir<i class="fa-solid fa-up-right-from-square"></i></a>
            </section>
        </div>
        <div class= "Formulario_creacion_usuario">
            <table class = "centrar">
                <form method="POST" name="formulario_agregar" class = "form" autocomplete="off">
                    <tr>
                        <td colspan="2">Tipos de usuario</td>
                    </tr>
                    <tr>
                        <td >Cedula</td>
                        <td><input type="text" name="doc" placeholder= " Ingrese su documento"></td>
                    </tr>
                    
                    <tr>
                        <td >Nombres</td>
                        <td><input type="text" name="nomb" placeholder=" Ingrese su nombre" style="text-transform:lowercase;"></td>
                    </tr>
                    <tr>
                        <td >Apellidos</td>
                        <td><input type="text" name="apell" placeholder=" Ingrese su apellido" style="text-transform:lowercase;"></td>
                    </tr>
                    <tr>
                        <td >Dirección</td>
                        <td><input type="text" name="direccion" placeholder=" Ingrese su direccion" style="text-transform:lowercase;"></td>
                    </tr>
                    <tr>
                        <td >Telefono</td>
                        <td><input type="number" name="telef" placeholder=" Ingrese su numero de telefono"></td>
                    </tr>
                    <tr>
                        <td >Correo</td>
                        <td><input type="email" name="correo" placeholder=" Ingrese su email"></td>
                    </tr>
                    <tr>
                        <td >Contraseña</td>
                        <td><input type="password" name="contrasena" placeholder=" Ingrese su contraseña"></td>
                    </tr>
                    <tr>
                        <td >Tarjeta Profesional</td>
                        <td><input type="number" name="tp" placeholder=" Ingrese su tarjeta Profesional" value= "0"></td>
                    </tr>
                    <tr>
                        <td>Tipo de Usuario</td>
                        <td>
                            <select name="id_tp">
                                <option value= ""> Seleccione una opción </option>
                                <?php
                                do{ 
                                ?>
                                <option value= "<?php echo($usua1['id_tipo_usuario'])?>"><?php echo($usua1['tipo_usuario'])?></option>
                                <?php
                                }while($usua1 =mysqli_fetch_assoc($tp_usu));
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Estado Usuario</td>
                        <td>
                            <select name="estado_usuario">
                                <option value= ""> Seleccione una opción </option>
                                <?php
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
                    <tr>
                        <td colspan="2"><input type="submit" name="boton_add" value="Guardar"></td>
                        <input type="hidden" name="boton_guardar" value="formulario_agregar">
                    </tr>
                </form>
            </table>
        </div>
    </body>
</html>