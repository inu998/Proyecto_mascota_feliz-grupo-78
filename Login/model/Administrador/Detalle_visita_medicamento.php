
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql="SELECT * FROM tb_usuario, tb_tipo_usuario WHERE tb_usuario.cedula = '".$_SESSION['usuario']."' AND tb_usuario.id_tipo_usuario = tb_tipo_usuario.id_tipo_usuario";
	$usuarios = mysqli_query($mysqli, $sql) or die(mysqli_error());
	$usua = mysqli_fetch_assoc($usuarios);
?>
<?php
// CONSULTA PARA MEDICAMENTO
$sql2="SELECT * FROM  tb_medicamentos";
$medicamento = mysqli_query($mysqli, $sql2);
$result = mysqli_fetch_assoc($medicamento);
?>
<?php
// CONSULTA PARA LAS VISITAS A LA MASCOTA
$sql3="SELECT * FROM  tb_visita , tb_mascota WHERE tb_visita.id_mascota = tb_mascota.id_mascota";
$visita = mysqli_query($mysqli, $sql3);
$result2 = mysqli_fetch_assoc($visita);
?>
<?php

if ((isset($_POST["btnguardar"])) && ($_POST["btnguardar"] == "frmadd"))
{

    $medicamento = $_POST['medicamento']; 
    $visita = $_POST['visita'];
    $sqladd = "SELECT * FROM detalle_visita_medicamento  WHERE id_visita = '$visita' AND Id_medicamento = '$medicamento'";
    $query = mysqli_query($mysqli, $sqladd); 
    $fila = mysqli_fetch_assoc($query);
    if  ($fila){
        echo '<script>alert (" EL medicamento ya esta asignado a esta visita");</script>';
        echo '<script>window.location= "Detalle_visita_medicamento.php"</script>';

    }elseif ($_POST['visita'] == "" || $_POST['medicamento'] == ""){
        echo '<script>alert (" Existen campos vacios");</script>';
        echo '<script>window.location= "Detalle_visita_medicmento.php"</script>';

    }else {
        $medicamento = $_POST['medicamento']; 
        $visita = $_POST['visita'];
        $sqladd = "INSERT INTO detalle_visita_medicamento (id_visita,id_medicamento) VALUES ('$visita','$medicamento')";
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
                    <td><input type="text" readonly></td>
                </tr>
                <tr>
                    <td>Nombra mascota- id visita</td>
                    <td>
                        <select name="visita">
                            <option value= ""> Seleccione una opción </option>
                            <?php
                            do{            
                            ?>
                            <option value="<?php echo($result2['id_visita'])?>"><?php echo($result2['id_visita'])?>  <?php echo($result2['nombre'])?></option>
                            <?php
                            }while($result2 =mysqli_fetch_assoc($visita));
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Medicamento</td>
                    <td>
                        <select name="medicamento">
                            <option value= ""> Seleccione una opción </option>
                            <?php
                            do{ 
                            ?>
                            <option value= "<?php echo($result['Id_medicamento'])?>"><?php echo($result['Nombre_medicamento'])?></option>
                            <?php
                            }while($result =mysqli_fetch_assoc($medicamento));
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