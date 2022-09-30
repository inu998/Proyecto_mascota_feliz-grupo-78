<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<script> 
function centrar() { 
    iz=(screen.width-document.body.clientWidth) / 2; 
    de=(screen.height-document.body.clientHeight) / 2; 
    moveTo(iz,de); 
}     
</script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../controller/image/icon_proyect_final.png" type="image/x-icon">
    <link rel="stylesheet" href="../Administrador/css/estilos_update.css">
    <script src="https://kit.fontawesome.com/339217bc67.js" crossorigin="anonymous"></script>
    <title>Editar informacion</title>
</head>
    <body onload="centrar();">
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
        </div>
    <div class="Historias_mascota">
    <table class ="tabla_visita" cellpadding ="10">
    <form class = "Detalle_visita" autocomplete="off">
        <h1>Historia Clinica</h1>
                    <tr>
                        <td>Id visita</td>
                        <td>Fecha visita</td>
                        <td>Nombre mascota</td>
                        <td>Especie</td>
                        <td>Raza</td>
                        <td>Nombre del veterinario</td>
                        <td>Estado de salud</td>
                        <td>Peso</td>
                        <td>Temperatura</td>
                    </tr>
                    <?php
                    $sql="SELECT * FROM tb_mascota,tb_usuario,tb_visita,tb_tipo_especie,tb_estado_salud WHERE tb_mascota.id_mascota = tb_visita.id_mascota AND tb_mascota.id_tipo_especie = tb_tipo_especie.id_tipo_especie AND tb_visita.id_estado_salud = tb_estado_salud.id_estado_salud AND tb_visita.cedula_veterinario = tb_usuario.cedula AND tb_mascota.id_mascota ='".$_GET['id']."'";
                    $query=mysqli_query($mysqli,$sql);
                    while($result=mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                        <td><?php echo $result['id_visita']?></td>
                        <td><?php echo $result['fecha_hora'] ?></td>
                        <td><?php echo $result['nombre'] ?></td>
                        <td><?php echo $result['tipo_especie'] ?></td>
                        <td><?php echo $result['raza'] ?></td>
                        <td><?php echo $result['nombres'] ?></td>
                        <td><?php echo $result['estado_salud'] ?></td>
                        <td><?php echo $result['Peso'] ?></td>
                        <td><?php echo $result['Temperatura'] ?></td>
                    </tr>
                    <?php } ?>
                </form>
            </table>
            </div>

            <div class="Historia_medicamentos">
                <table class ="tabla_medicamentos" cellpadding ="12">
                    <form class = "Detalle_medicamento" autocomplete="off">
                      <h1>Medicamentos</h1>
                    <tr>
                        <td>Id visita</td>
                        <td>Fecha y hora de la visita</td>
                        <td>Medicamentos</td>
                        <td>Recomendaciones</td>
                    </tr>
                    <?php
                    $sql2="SELECT * FROM tb_mascota, tb_visita,detalle_visita_medicamento,tb_medicamentos WHERE tb_mascota.id_mascota = tb_visita.id_mascota AND detalle_visita_medicamento.id_visita = tb_visita.id_visita AND tb_medicamentos.Id_medicamento = detalle_visita_medicamento.id_medicamento AND tb_mascota.id_mascota ='".$_GET['id']."'";
                    $query2=mysqli_query($mysqli,$sql2);
                    while($result2=mysqli_fetch_assoc($query2)){
                       
                    ?>
                    <tr>
                        <td><?php echo $result2['id_visita']?></td>
                        <td><?php echo $result2['fecha_hora'] ?></td>
                        <td><?php echo $result2['Nombre_medicamento'] ?></td>
                        <td><?php echo $result2['Recomendaciones'] ?></td>
                    </tr>
                    <?php } ?>
                </form>
            </table>
            </div>
    </body>
</html>