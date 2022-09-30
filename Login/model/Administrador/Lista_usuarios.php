
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
    <link rel="stylesheet" href="css/estilos_roles.css">
    <script src="https://kit.fontawesome.com/339217bc67.js" crossorigin="anonymous"></script>
    <title>Lista personas</title>
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
                <h1>Formulario <br>lista de usuarios</h1>
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
                        <td>Documento</td>
                        <td>Nombre</td>
                        <td>Apellidos</td>
                        <td>Direccion</td>
                        <td>Tipo de Usuario</td>
                        <td>Estado</td>
                        <td>Accion</td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php
                    $sql="SELECT * FROM tb_usuario, tb_tipo_usuario, tb_estado WHERE tb_usuario.id_tipo_usuario = tb_tipo_usuario.id_tipo_usuario AND tb_usuario.id_estado = tb_estado.id_estado";
                    $i=0;
                    $query=mysqli_query($mysqli,$sql);
                    while($result=mysqli_fetch_assoc($query)){
                        $i++
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['cedula'] ?></td>
                        <td><?php echo $result['nombres'] ?></td>
                        <td><?php echo $result['apellidos'] ?></td>
                        <td><?php echo $result['direccion'] ?></td>
                        <td><?php echo $result['tipo_usuario'] ?></td>
                        <td><?php echo $result['estado'] ?></td>
                        <td><a href="?id=<?php echo $result['cedula'] ?>" onclick="window.open('update_usuarios.php?id=<?php echo $result['cedula'] ?>','','width= 400,height=300, toolbar=NO');void(null);">Modificar</a></td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php } ?>
                </form>
            </table>
        </div>
    </body>
</html>