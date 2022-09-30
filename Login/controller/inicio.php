<?php
require_once("../db/connection.php");
session_start();
if($_POST["inicio"]){
	// inicia sesion para los usuarios
	$usuario = $_POST["usuario"];
	$clave = $_POST["clave"];
	
	
	/// consultamos el usuario segun el usuario y la clave
	$con="select * from tb_usuario where cedula = '$usuario' and contrasena = '$clave'"; 	
	$query=mysqli_query($mysqli, $con);
	$fila=mysqli_fetch_assoc($query);
	
	if($fila){		
		/// si el usuario y la clave son correctas, creamos las sessiones 
			
		$_SESSION['usuario'] = $fila['cedula']; 
		$_SESSION['nombres'] = $fila['nombres']; 
		$_SESSION['tipo'] = $fila['id_tipo_usuario'];
		$_SESSION['apellido'] = $fila['apellidos'];
		$_SESSION['estado'] = $fila['id_estado'];
		
		/// Valida si el usuario esta inactivo y no lo deja ingresar
		if($_SESSION['estado'] == 2){
			echo '<script>alert (" El usuario esta inactivo o no existe ");</script>';
			echo '<script>window.location="../index.html"</script>';

		}
		/// dependiendo del tipo de usuario lo redireccinamos a una pagina
		/// si es un administrador
		elseif($_SESSION['tipo'] == 1){
			header("Location: ../model/Administrador/index.php"); 
			exit();
		}
		/// si es tipo registro
		elseif($_SESSION['tipo'] == 2){
			header("Location: ../model/Registro/index.php"); 
			exit();		
		}	
		/// si es un veterinario
		elseif($_SESSION['tipo'] == 3){
			header("Location: ../model/Veterinario/index.php"); 
			exit();		
		}
		/// si es un cliente
		elseif($_SESSION['tipo'] == 4){
			header("Location: ../model/Cliente/index.php"); 
			exit();		
		}		
		
	}else{
		/// si el usuario y la clave son incorrectas lo lleva a la pagina de inio y se muestra un mensaje
		header("Location: ../errorlog.html"); 
		exit();
	}
	
}	
?>