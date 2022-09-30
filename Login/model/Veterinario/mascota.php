
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql="SELECT * FROM tb_usuario, tb_tipo_usuario WHERE tb_usuario.cedula = '".$_SESSION['usuario']."' AND tb_usuario.id_tipo_usuario = tb_tipo_usuario.id_tipo_usuario";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);  
?>

<?php
// CONSULTA PARA EL TIPO DE ESPECIE
$sql1="SELECT * FROM  tb_tipo_especie";
$tp_esp = mysqli_query($mysqli, $sql1);
$usua1 = mysqli_fetch_assoc($tp_esp);
?>

<?php
// CONSULTA PARA LOS ESTADOS DE USUARIO
$sql2="SELECT * FROM  tb_afiliacion";
$estado2 = mysqli_query($mysqli, $sql2);
$usua2 = mysqli_fetch_assoc($estado2);
?>

<?php
if ((isset($_POST["boton_guardar"])) && ($_POST["boton_guardar"] == "formulario_agregar")) 
{
    $tdoc = $_POST['doc'];
    $sqladd="SELECT * FROM  tb_usuario WHERE  cedula = '$tdoc' && id_tipo_usuario = 4" ;
    $query=mysqli_query($mysqli,$sqladd);
    $fila=mysqli_fetch_assoc($query);

    if($fila==""){
        echo '<script>alert (" El Cliente no Existe ");</script>';
        echo '<script>window.location="mascota.php"</script>';
    }

    elseif($_POST["nomb"]== "" || $_POST["raza"]== "" || $_POST["color"]== "" || $_POST["doc"]== "" || $_POST["especie"]== "" || $_POST["afilia"]== "") {
        echo '<script>alert (" No puede haber campos vacios ");</script>';
        echo '<script>window.location="mascota.php"</script>';
    }
    else 
    {
        $nom = $_POST["nomb"];
        $raza = $_POST["raza"];
        $color = $_POST["color"];
        $docu = $_POST["doc"];
        $especie = $_POST["especie"];
        $afiliac = $_POST["afilia"];
        

        $sqladd="INSERT INTO tb_mascota (nombre, raza, color, cedula_usuario, id_tipo_especie, id_afiliacion) VALUE ('$nom', '$raza', '$color', '$docu', '$especie', '$afiliac')";
        $query=mysqli_query($mysqli,$sqladd);
        echo '<script>alert (" Guardado con exito ");</script>';
        echo '<script>window.location="mascota.php"</script>';
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
    <link rel="stylesheet" href="../Administrador/css/estilos_roles.css">
    <script src="https://kit.fontawesome.com/339217bc67.js" crossorigin="anonymous"></script>
    <title>Agregar Mascota</title>
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
            <h1>Formulario <br>creacion de mascotas</h1>
                <span><i class="fa-solid fa-circle-user"></i></span>
                <span class="tipo_usuario"><?php echo $usua['tipo_usuario']?></span>
                <br>
                <span class="usuario"><?php echo $usua['nombres']?> <?php echo $usua['apellidos']?></span>
                <a href="index.php">Regresar<i class="fa-solid fa-rotate-left"></i></a>
                <a href="../../controller/salir.php">Salir<i class="fa-solid fa-up-right-from-square"></i></a>1>
        </section>
        </div>
        <div class= "Formulario_creacion_mascota">
        <table class = "centrar">
            <form method="POST" name="formulario_agregar" class = "form" autocomplete="off">
                <tr>
                    <td colspan="2">Mascota</td>
                </tr>
                <tr>
                    <td >Id Mascota</td>
                    <td><input type="text" name="idmasc" placeholder="Asignado automaticamente"readonly></td>
                </tr>
                <tr>
                    <td >Nombre</td>
                    <td><input type="text" name="nomb" placeholder=" Nombre de la Mascota" style="text-transform:lowercase;"></td>
                </tr>
                <tr>
                    <td >Raza</td>
                    <td><input type="text" name="raza" placeholder=" Raza de la Mascota" style="text-transform:lowercase;"></td>
                </tr>
                <tr>
                    <td >Color</td>
                    <td><input type="text" name="color" placeholder=" Color de la Mascota" style="text-transform:lowercase;"></td>
                </tr>
                <tr>
                    <td >Cedula Propietario</td>
                    <td><input type="number" name="doc" placeholder=" Ingrese su numero de documento"></td>
                </tr>
                <tr>
                    <td>Especie</td>
                    <td>
                        <select name="especie">
                            <option value= ""> Seleccione una opción </option>
                            <?php
                            do{ 
                                
                            ?>
                            <option value= "<?php echo($usua1['id_tipo_especie'])?>"><?php echo($usua1['tipo_especie'])?></option>
                            <?php
                            }while($usua1 =mysqli_fetch_assoc($tp_esp));
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Afiliacion</td>
                    <td>
                        <select name="afilia">
                            <option value= ""> Seleccione una opción </option>
                            <?php
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
                <tr>
                    <td colspan="2"><input type="submit" name="boton_add" value="Guardar"></td>
                    <input type="hidden" name="boton_guardar" value="formulario_agregar">
                </tr>
            </form>
        </table>
        </div>
    </body>
</html>