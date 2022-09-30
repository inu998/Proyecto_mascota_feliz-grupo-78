
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql="SELECT * FROM tb_usuario, tb_tipo_usuario WHERE tb_usuario.cedula = '".$_SESSION['usuario']."' AND tb_usuario.id_tipo_usuario = tb_tipo_usuario.id_tipo_usuario";
	$usuarios = mysqli_query($mysqli, $sql) or die(mysqli_error());
	$usua = mysqli_fetch_assoc($usuarios);


?>
<?php
// CONSULTA VISITA
$sql1="SELECT * FROM tb_visita, tb_mascota, tb_usuario, tb_estado_salud WHERE tb_visita.id_mascota=tb_mascota.id_mascota AND tb_visita.cedula_usuario=tb_usuario.cedula AND tb_visita.id_estado_salud=tb_estado_salud.id_estado_salud";
$tp_usu = mysqli_query($mysqli, $sql1);
$usua1 = mysqli_fetch_assoc($tp_usu);
?>

<?php
// CONSULTA PARA MEDICAMENTO
$sql2="SELECT * FROM  tb_medicamentos";
$estado2 = mysqli_query($mysqli, $sql2);
$usua2 = mysqli_fetch_assoc($estado2);
?>

<?php

if ((isset($_POST["btnguardar"])) && ($_POST["btnguardar"] == "frmadd"))
{

    $tp = $_POST['estdousu']; 
    $sqladd = "SELECT * FROM tb_estado  WHERE estado = '$tp' ";
    $query = mysqli_query($mysqli, $sqladd); 
    $fila = mysqli_fetch_assoc($query);
    if  ($fila){
        echo '<script>alert (" El estdo ya existe");</script>';
        echo '<script>window.location= "Detalle_visita_medicamento.php"</script>';

    }elseif ($_POST['estdousu'] == ""){
        echo '<script>alert (" Existen campos vacios");</script>';
        echo '<script>window.location= "Detalle_visita_medicmento.php"</script>';

    }else {
        
        $tp = $_POST['estdousu']; 
        $sqladd = "INSERT INTO tb_estado  (estado) VALUES ('$tp') ";
        $query = mysqli_query($mysqli, $sqladd);
        echo '<script>alert (" Registro Exitoso ");</script>';
        echo '<script>window.location= "Detalle_visita_medicamento.php"</script>';

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
    <title>Creacion de Usuarios</title>
    

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
            <h1>Formulario<br>Visita Medicamento</h1> 
            <span><i class="fa-solid fa-circle-user"></i></span>
                <span class="tipo_usuario"><?php echo $usua['tipo_usuario']?></span>
                <br>
                <span class="usuario"><?php echo $usua['nombres']?> <?php echo $usua['apellidos']?></span>
                <a href="index.php">Regresar<i class="fa-solid fa-rotate-left"></i></a>
                <a href="../../controller/salir.php">Salir<i class="fa-solid fa-up-right-from-square"></i></a> 
        </section>
    </div>
    <div class="Formulario_visita_medicamento">
        <table class="centrar">
             <form method="POST" name="frmadd" autocomplete="off">
               <tr>
                    <td colspan="2">Historia Visita</td>
                </tr>
                <tr>
                    <td>Identificador</td>
                    <td><input type="text" placeholder="Asignado automaticamente"readonly></td>
                </tr>
                <tr>
                    <td>Numero visita</td>
                    <td>
                        <select name="visita">
                            <option value= "">  </option>
                            <?php
                            
                            do{            
                            ?>
                            <option value= "<?php echo($usua1['id_visita'])?>"><?php echo($usua1['id_visita'])?> <?php echo($usua1['nombre'])?></option>
                            <?php
                            }while($usua1 =mysqli_fetch_assoc($tp_usu));
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Numero Medicamento</td>
                    <td>
                        <select name="medicamento">
                            <option value= ""> Seleccione una opción </option>
                            <?php
                            do{ 
                            ?>
                            <option value= "<?php echo($usua2['Id_medicamento'])?>"><?php echo($usua2['Nombre_medicamento'])?></option>
                            <?php
                            }while($usua2 =mysqli_fetch_assoc($estado2));
                            ?>
                        </select>
                    </td>
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