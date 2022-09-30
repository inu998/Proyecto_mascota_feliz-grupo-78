
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

    $tp = $_POST['tpespe']; 
    $sqladd = "SELECT * FROM tb_tipo_especie  WHERE tipo_especie = '$tp' ";
    $query = mysqli_query($mysqli, $sqladd); 
    $fila = mysqli_fetch_assoc($query);
    if  ($fila){
        echo '<script>alert (" La Especie ya fue creada");</script>';
        echo '<script>window.location= "especie.php"</script>';

    }elseif ($_POST['tpespe'] == ""){
        echo '<script>alert (" Existen campos vacios");</script>';
        echo '<script>window.location= "especie.php"</script>';

    }else {
        
        $especie = $_POST['tpespe']; 
        
        $sqladd = "INSERT INTO tb_tipo_especie  (tipo_especie) VALUES ('$especie') ";
        $query = mysqli_query($mysqli, $sqladd);
        echo '<script>alert (" Registro Exitoso ");</script>';
        echo '<script>window.location= "especie.php"</script>';

    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Administrador/css/estilos_roles.css">
    <link rel="shortcut icon" href="../../controller/image/icon_proyect_final.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/339217bc67.js" crossorigin="anonymous"></script>
    <title>Creacion de Especies</title>
    

</head>
    <body onload="form1.usuario.focus()">
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
                <h1>Formulario <br>Creacion tipo de Especie</h1>
                <span><i class="fa-solid fa-circle-user"></i></span>
                <span class="tipo_usuario"><?php echo $usua['tipo_usuario']?></span>
                <br>
                <span class="usuario"><?php echo $usua['nombres']?> <?php echo $usua['apellidos']?></span>
                <a href="index.php">Regresar<i class="fa-solid fa-rotate-left"></i></a>
                <a href="../../controller/salir.php">Salir<i class="fa-solid fa-up-right-from-square"></i></a>
            </section>
        </div>
        <div class= "Formulario_creacion_especie">
            <table class="centrar">
                <form method="POST" name="frmadd" autocomplete="off">
                    <tr>
                        <td colspan="2">Tipos de Especie</td>
                    </tr>
                    <tr>
                        <td>Identificador</td>
                        <td><input type="number" placeholder="Asignacion automatica por la base de datos" readonly ></td>
                    </tr>
                    <tr>
                        <td>Tipo de Especie</td>
                        <td><input type="text" name="tpespe" placeholder=" Ingrese tipo de especie"></td>
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