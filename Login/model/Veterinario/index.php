
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
    <title>Menu Veterinario</title>
    

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
        <h1>Menu <br>Veterinario</h1>
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
                    <a href="mascota.php">
                        <img src="../../controller/image/Mascota.png" alt="" class="imagen">
                        <span class="text-item">Mascota</span>
                        <span class="down-item"></span>
                    </a>
                </li>
                <li>
                    <a href="visita.php">
                        <img src="../../controller/image/Visita.png" alt="" class="imagen">
                        <span class="text-item">Visita</span>
                        <span class="down-item"></span>
                    </a>
                </li>
                <li>
                    <a href="especie.php">
                        <img src="../../controller/image/Especies.png" alt="" class="imagen">
                        <span class="text-item">Especies</span>
                        <span class="down-item"></span>
                    </a>
                </li>
                <li>
                    <a href="Lista_mascotas.php">
                        <img src="../../controller/image/Lista mascotas.png" alt="" class="imagen">
                        <span class="text-item">Lista Mascotas</span>
                        <span class="down-item"></span>
                    </a>
                </li>     
                <li>
                    <a href="medicamento.php">
                        <img src="../../controller/image/Medicamentos.png" alt="" class="imagen">
                        <span class="text-item">Medicamentos</span>
                        <span class="down-item"></span>
                    </a>
                </li>
                <li>
                    <a href="Detalle_visita_medicamento.php">
                        <img src="../../controller/image/Detalle visita medicamento.png" alt="" class="imagen">
                        <span class="text-item">Medicamentos Visita</span>
                        <span class="down-item"></span>
                    </a>
                </li>     
                    </a>
                </li>
            </ul>
        </nav>
        </div>
    </body>
</html>