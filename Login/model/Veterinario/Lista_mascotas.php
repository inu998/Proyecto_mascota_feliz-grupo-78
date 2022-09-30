
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql="SELECT * FROM tb_usuario, tb_tipo_usuario WHERE tb_usuario.cedula = '".$_SESSION['usuario']."' AND tb_usuario.id_tipo_usuario = tb_tipo_usuario.id_tipo_usuario";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);  
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
    <title>Lista mascotas</title>
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
                <h1>Formulario <br>lista de mascotas</h1>
                <span><i class="fa-solid fa-circle-user"></i></span>
                <span class="tipo_usuario"><?php echo $usua['tipo_usuario']?></span>
                <br>
                <span class="usuario"><?php echo $usua['nombres']?> <?php echo $usua['apellidos']?></span>
                <a href="index.php">Regresar<i class="fa-solid fa-rotate-left"></i></a>
                <a href="../../controller/salir.php">Salir<i class="fa-solid fa-up-right-from-square"></i></a>
            </section>
        </div>
        <div class= "Formulario_lista_usuarios">
            <table class = "centrar" cellspacing = "10">
                <form method="GET" name="frm_consulta" class = "form" autocomplete="off">
                    <tr>
                        <td>&nbsp;</td>
                        <td>Nombre</td>
                        <td>Raza</td>
                        <td>Color</td>
                        <td>Nombre propietario</td>
                        <td>Cedula</td>
                        <td>Direccion propietario</td>
                        <td>Estado</td>
                        <td>Accion</td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php
                    $sql_mascota="SELECT * FROM tb_usuario, tb_mascota, tb_afiliacion WHERE tb_mascota.cedula_usuario= tb_usuario.cedula AND tb_mascota.id_afiliacion = tb_afiliacion.id_afiliacion;";
                    $i=0;
                    $query_mascota=mysqli_query($mysqli,$sql_mascota);
                    while($result_mascota=mysqli_fetch_assoc($query_mascota)){
                        $i++
                    ?>
                    <tr>
                        <td><?php echo $i?></td>
                        <td><?php echo $result_mascota['nombre'] ?></td>
                        <td><?php echo $result_mascota['raza'] ?></td>
                        <td><?php echo $result_mascota['color'] ?></td>
                        <td><?php echo $result_mascota['nombres'] ?></td>
                        <td><?php echo $result_mascota['cedula'] ?></td>
                        <td><?php echo $result_mascota['direccion'] ?></td>
                        <td><?php echo $result_mascota['Afiliacion'] ?></td>
                        <td><a href="?id=<?php echo $result_mascota['id_mascota'] ?>" onclick="window.open('update_mascotas.php?id=<?php echo $result_mascota['id_mascota'] ?>','','width= 500,height=300, toolbar=NO');void(null);">Modificar</a></td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php } ?>
                </form>
            </table>
        </div>
    </body>
</html>