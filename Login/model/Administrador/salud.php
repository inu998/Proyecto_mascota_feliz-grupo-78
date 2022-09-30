
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

    $tp = $_POST['tpesta']; 
    $sqladd = "SELECT * FROM tb_estado_salud  WHERE estado_salud = '$tp' ";
    $query = mysqli_query($mysqli, $sqladd); 
    $fila = mysqli_fetch_assoc($query);
    if  ($fila){
        echo '<script>alert (" Estado ya creado");</script>';
        echo '<script>window.location= "salud.php"</script>';

    }elseif ($_POST['tpesta'] == ""){
        echo '<script>alert (" Existen campos vacios");</script>';
        echo '<script>window.location= "salud.php"</script>';

    }else {
        
        $especie = $_POST['tpesta']; 
        
        $sqladd = "INSERT INTO tb_estado_salud  (estado_salud) VALUES ('$especie') ";
        $query = mysqli_query($mysqli, $sqladd);
        echo '<script>alert (" Registro Exitoso ");</script>';
        echo '<script>window.location= "salud.php"</script>';

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
    <title>Estado Salud Mascota</title>
    

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
        <h1>Formulario <br>estado de salud</h1>
            <span><i class="fa-solid fa-circle-user"></i></span>
            <span class="tipo_usuario"><?php echo $usua['tipo_usuario']?></span>
            <br>
            <span class="usuario"><?php echo $usua['nombres']?> <?php echo $usua['apellidos']?></span>
            <a href="index.php">Regresar<i class="fa-solid fa-rotate-left"></i></a>
            <a href="../../controller/salir.php">Salir<i class="fa-solid fa-up-right-from-square"></i></a> 
        </section>
        </div>
        <div class="Formulario_estado_salud">
        <table class="centrar">
             <form method="POST" name="frmadd" autocomplete="off">
               <tr>
                    <td colspan="2">Estado de Salud</td>
                </tr>
                <tr>
                    <td>Identificador</td>
                    <td><input type="number" readonly placeholder="Asignado automaticamente"></td>
                </tr>
                <tr>
                    <td>Estado salud</td>
                    <td><input type="text" name="tpesta" placeholder=" Ingrese Tipo Usuario"></td>
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
        </div>
    </body>
</html>