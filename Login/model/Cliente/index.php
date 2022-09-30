
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql="SELECT * FROM tb_usuario, tb_tipo_usuario, tb_estado WHERE tb_usuario.id_tipo_usuario = tb_tipo_usuario.id_tipo_usuario AND tb_usuario.id_estado = tb_estado.id_estado AND tb_usuario.cedula = '".$_SESSION['usuario']."'";
$usuario = mysqli_query($mysqli, $sql) or die(mysqli_error());
$result = mysqli_fetch_assoc($usuario);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../controller/css/estilos_index_usuarios.css">
    <link rel="shortcut icon" href="../../../controller/img/icon_proyect_final.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/339217bc67.js" crossorigin="anonymous"></script>
    <title>Menu Cliente</title>
    

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
        <div class="Menu_index">
        <section class="title">
        <h1>Menu <br>Cliente</h1>
            <span><i class="fa-solid fa-circle-user"></i></span>
            <br>
            <span class="usuario"><?php echo $result['nombres']?> <?php echo $result['apellidos']?></span>
            <a href="../../controller/salir.php">Salir<i class="fa-solid fa-up-right-from-square"></i></a> 
            <span class="icon-user"><i class="fa-solid fa-user-graduate"></i></span>
        </section>
        </div>

        <div class= "Formulario_usuario">
            <table class = "centrar" cellspacing = "10">
                <form method="GET" name="frm_consulta" class = "form" autocomplete="off">
                    <h1>Informacion personal</h1>
                    <tr>
                        <td>&nbsp;</td>
                        <td>Documento</td>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Direccion</td>
                        <td>Tipo de Usuario</td>
                        <td>Estado</td>
                        <td>Accion</td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php
                    $query=mysqli_query($mysqli,$sql);
                    while($result=mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                        <td>&nbsp;</td>
                        <td><?php echo $result['cedula'] ?></td>
                        <td><?php echo $result['nombres'] ?></td>
                        <td><?php echo $result['apellidos'] ?></td>
                        <td><?php echo $result['direccion'] ?></td>
                        <td><?php echo $result['tipo_usuario'] ?></td>
                        <td><?php echo $result['estado'] ?></td>
                        <td><a href="?id=<?php echo $result['cedula'] ?>" onclick="window.open('update_usuario.php?id=<?php echo $result['cedula'] ?>','','width= 400,height=300, toolbar=NO');void(null);">Modificar</a></td>                     
                    </tr>
                    <?php } ?>
                </form>
            </table>
            <div class= "Formulario_mascota">
            <table class = "centrar" cellspacing = "20">
                <form method="GET" name="frm_consulta_mascota" class = "form" autocomplete="off">
                   <h1>Informacion mascotas</h1>
                <tr>
                        <td>&nbsp;</td>
                        <td>Codigo</td>
                        <td>Nombre</td>
                        <td>Especie</td>
                        <td>Raza</td>
                        <td>Color</td>
                        <td>Estado</td>
                        <td>Accion</td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php
                    $sql="SELECT * FROM tb_usuario, tb_mascota, tb_afiliacion,tb_tipo_especie WHERE tb_mascota.cedula_usuario= tb_usuario.cedula AND tb_mascota.id_afiliacion = tb_afiliacion.id_afiliacion AND tb_mascota.id_tipo_especie = tb_tipo_especie.id_tipo_especie AND tb_usuario.cedula = '".$_SESSION['usuario']."'";
                    $query=mysqli_query($mysqli,$sql);
                    while($result=mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                        <td>&nbsp;</td>
                        <td><?php echo $result['id_mascota']?></td>
                        <td><?php echo $result['nombre'] ?></td>
                        <td><?php echo $result['tipo_especie'] ?></td>
                        <td><?php echo $result['raza'] ?></td>
                        <td><?php echo $result['color'] ?></td>
                        <td><?php echo $result['Afiliacion'] ?></td>
                        <td><a href="?id=<?php echo $result['id_mascota'] ?>" onclick="window.open('Historia.php?id=<?php echo $result['id_mascota'] ?>','','width= 1000,height=600, toolbar=NO');void(null);">Historia</a></td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php } ?>
                </form>
            </table>
    </body>
</html>
