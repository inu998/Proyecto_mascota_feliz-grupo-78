
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql="SELECT * FROM tb_usuario, tb_tipo_usuario WHERE tb_usuario.cedula = '".$_SESSION['usuario']."' AND tb_usuario.id_tipo_usuario = tb_tipo_usuario.id_tipo_usuario";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);  
?>

<?php
// CONSULTA PARA LOS TIPOS DE USUARIO
$sql1="SELECT * FROM  tb_estado_salud";
$estsalud = mysqli_query($mysqli, $sql1);
$usua1 = mysqli_fetch_assoc($estsalud);
?>
<?php
// CONSULTA PARA LAS MASCOTAS
$sql2="SELECT * FROM  tb_mascota";
$mascota = mysqli_query($mysqli, $sql2);
$result = mysqli_fetch_assoc($mascota);
?>
<?php
// CONSULTA PARA LOS VETERINARIOS
$sql3="SELECT * FROM  tb_usuario WHERE id_tipo_usuario = 3";
$veterinario = mysqli_query($mysqli, $sql3);
$result2 = mysqli_fetch_assoc($veterinario);
?>
<?php
if ((isset($_POST["boton_guardar"])) && ($_POST["boton_guardar"] == "formulario_agregar")) 
{
    $tdoc = $_POST['doc'];
    $sqladd="SELECT * FROM  tb_usuario WHERE  cedula = '$tdoc'"  ;
    $query=mysqli_query($mysqli,$sqladd);
    $fila=mysqli_fetch_assoc($query);

    if($_POST["date"]== "" || $_POST["idmasc"]== "" || $_POST["doc"]== "" || $_POST["peso"]== "" || $_POST["temp"]== "" || $_POST["frecres"]== "" || $_POST["freccar"]== "" || $_POST["estsal"]== "" || $_POST["costo"]== "" || $_POST["recom"]== "") {
        echo '<script>alert (" No puede haber campos vacios ");</script>';
        echo '<script>window.location="visita.php"</script>';
    }
    else 
    {
        $fecha = $_POST["date"];
        $idma = $_POST["idmasc"];
        $cedula = $_POST["doc"];
        $peso = $_POST["peso"];
        $temp = $_POST["temp"];
        $respi = $_POST["frecres"];
        $cardiac = $_POST["freccar"];
        $salud= $_POST["estsal"];
        $costo = $_POST["costo"];
        $recom = $_POST["recom"];

        $sqladd="INSERT INTO tb_visita (fecha_hora, id_mascota, cedula_usuario, id_estado_salud, Peso, Temperatura, FrecuenciaRes, FrecuenciaCar, Recomendaciones, costoVisita) VALUE ('$fecha', '$idma', '$cedula', '$salud', '$peso', '$temp', '$respi', '$cardiac','$recom','$costo')";
        $query=mysqli_query($mysqli,$sqladd);
        echo '<script>alert (" Guardado con exito ");</script>';
        echo '<script>window.location="index.php"</script>';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Visita Medica</title>
</head>
    <body onload="frm_add.tipo_usuario.focus()">

        <section class="title">
            <h1>FORMULARIO CREACION VISITA <br/><?php echo $usua['tipo_usuario']?></span></h1>
        </section>
        <table class = "centrar" border=1>
            <form method="POST" name="formulario_agregar" class = "form" autocomplete="off">
                <tr>
                    <td colspan="2">Visita</td>
                </tr>

                <tr>
                    <td >Id visita</td>
                    <td><input type="text" name="idvisita" readonly></td>
                </tr>

                <tr>
                    <td >Fecha Visita</td>
                    <td><input type= "date" name="date" ;></td>
                </tr>

                <tr>
                    <td >Mascota</td>
                    <td>
                    <select name="idmasc">
                            <option value= ""> Seleccione una opción </option>
                            <?php
                            do{ 
                            ?>
                            <option value= "<?php echo($result['id_mascota'])?>"><?php echo($result['id_mascota'])?> <?php echo($result['nombre'])?></option>
                            <?php
                            }while($result =mysqli_fetch_assoc($mascota));
                            ?>
                    </td>
                </tr>

                <tr>
                    <td >Veterinario</td>
                    <td>
                    <select name="doc">
                            <option value= ""> Seleccione una opción </option>
                            <?php
                            do{ 
                            ?>
                            <option value= "<?php echo($result2['cedula'])?>"><?php echo($result2['nombres'])?></option>
                            <?php
                            }while($result2 =mysqli_fetch_assoc($veterinario));
                            ?>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td >Peso</td>
                    <td><input type="text" name="peso" placeholder=" Ingrese Peso de la Mascota" style="text-transform:lowercase;"></td>
                </tr>

                <tr>
                    <td >Temperatura</td>
                    <td><input type="number" name="temp" placeholder=" Temperatura de la Mascota"></td>
                </tr>

                <tr>
                    <td >Frecuencia Respratoria</td>
                    <td><input type="number" name="frecres" placeholder=" Frec Respiratoria de la Mascota"></td>
                </tr>

                <tr>
                    <td >Frecuencia Cardiaca</td>
                    <td><input type="number" name="freccar" placeholder=" Frec Cardiaca de la Mascota"></td>
                </tr>

                             
                <tr>
                    <td>Estado de Salud</td>
                    <td>
                        <select name="estsal">
                            <option value= ""> Seleccione una opción </option>
                            <?php
                            do{ 
                                
                            ?>
                            <option value= "<?php echo($usua1['id_estado_salud'])?>"><?php echo($usua1['estado_salud'])?></option>
                            <?php
                            }while($usua1 =mysqli_fetch_assoc($estsalud));
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td >Costo Visita</td>
                    <td><input type="number" name="costo" placeholder=" Ingrese costo de la visita" value= "0"></td>
                </tr>

                <tr>
                    <td >Recomendaciones</td>
                    <td><input type="texto" name="recom" placeholder=" Ingrese costo de la visita"></td>
                </tr>

                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="boton_add" value="Guardar"></td>
                    <input type="hidden" name="boton_guardar" value="formulario_agregar">
                </tr>


            </form>
        </table>
    </body>
</html>
