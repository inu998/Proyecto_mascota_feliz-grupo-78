
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql="SELECT * FROM tb_usuario, tb_tipo_usuario WHERE tb_usuario.cedula = '".$_SESSION['usuario']."' AND tb_usuario.id_tipo_usuario = tb_tipo_usuario.id_tipo_usuario";
	$usuarios = mysqli_query($mysqli, $sql) or die(mysqli_error());
	$usua = mysqli_fetch_assoc($usuarios);
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
    <title>Menu Administrador</title>
    

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
        <h1>Menu <br>Administrador</h1>
            <span><i class="fa-solid fa-circle-user"></i></span>
            <br>
            <span class="usuario"><?php echo $usua['nombres']?> <?php echo $usua['apellidos']?></span>
            <a href="../../controller/salir.php">Salir<i class="fa-solid fa-up-right-from-square"></i></a> 
            <span class="icon-user"><i class="fa-solid fa-user-graduate"></i></span>
        </section>
       </div>
        <div class="container">
        <nav class="navegacion">
            <ul class="menu wrapper" >
                <li class="first-item">
                    <a href="agregar_usu.php">
                        <img src="../../controller/image/Tipo usuario.png" alt="" class="imagen"> 
                        <span class="text-item">Tipo de Usuario</span>
                        <span class="down-item"></span>
                    </a>
                </li>
                <li class="first-item">
                    <a href="usuarios.php">
                        <img src="../../controller/image/Usuario.png" alt="" class="imagen">
                        <span class="text-item">Usuario</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li class="first-item">
                    <a href="especie.php">
                        <img src="../../controller/image/Especies.png" alt="" class="imagen">
                        <span class="text-item">Especies</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                   
                <li class="first-item">
                    <a href="afiliacion.php">
                        <img src="../../controller/image/Afiliación.png" alt="" class="imagen">
                        <span class="text-item">Afiliacion</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li class="first-item">
                    <a href="salud.php">
                        <img src="../../controller/image/Estado de salud.png" alt="" class="imagen">
                        <span class="text-item">Estado Salud</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li class="first-item">
                    <a href="medicamento.php">
                        <img src="../../controller/image/Medicamentos.png" alt="" class="imagen">
                        <span class="text-item">Medicamentos</span>
                        <span class="down-item"></span>
                    </a>
                </li>

                
                <li class="first-item">
                    <a href="Lista_usuarios.php">
                        <img src="../../controller/image/Lista usuarios.png" alt="" class="imagen">
                        <span class="text-item">Lista usuarios</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li class="first-item">
                    <a href="agregar_estado.php">
                        <img src="../../controller/image/Estado afiliación.png" alt="" class="imagen">
                        <span class="text-item">Crear estado</span>
                        <span class="down-item"></span>
                    </a>
                </li>
                
                <li class="first-item">
                    <a href="Detalle_visita_medicamento.php">
                        <img src="../../controller/image/Detalle visita medicamento.png" alt="" class="imagen">
                        <span class="text-item">Detalle visita medicamento</span>
                        <span class="down-item"></span>
                    </a>

                </li>
                <li class="first-item">
                    <a href="mascota.php">
                        <img src="../../controller/image/Mascota.png" alt="" class="imagen">
                        <span class="text-item">Mascota</span>
                        <span class="down-item"></span>
                    </a>
                </li>
                <li class="first-item">
                    <a href="Lista_mascotas.php">
                        <img src="../../controller/image/Lista mascotas.png" alt="" class="imagen">
                        <span class="text-item">Lista mascotas</span>
                        <span class="down-item"></span>
                    </a>
                </li>
            </ul>
        </nav>
        </div>
    </body>
</html>