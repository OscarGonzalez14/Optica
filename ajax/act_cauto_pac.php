<?php

include '../config/conn.php';

$nombre = $_POST["nombres"];
$dui = $_POST["dui"];
$codigo = $_POST["codigo"];
$telefono = $_POST["telefono"];
$edad = $_POST["edad"];
$ocupacion = $_POST["ocupacion"];
$correo = $_POST["correo"];
$empresa = $_POST["empresa"];
$tipo_tarjeta = $_POST["tipo_tarjeta"];
$num_tarjeta = $_POST["num_tarjeta"];
$vencimiento = $_POST["vencimiento"];
$id_usuario = $_POST["id_usuario"];
$tipo_pac = $_POST["tipo_pac"];

$conexion = new Conexion();
$cnn = $conexion->getConexion();

$sql = "INSERT INTO pacientes (codigo,nombres,telefono,edad,ocupacion, empresa, correo, id_usuario, dui, tipo_tarjeta, numero_tarjeta,fecha_vencimiento_tarjeta, tipo_pac) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);";

$statement = $cnn->prepare( $sql );
	//Enlazar los parámetros de la consulta con los valores del formulario

 
$statement->bindParam(1,$codigo, PDO::PARAM_STR );
$statement->bindParam(2,$nombre, PDO::PARAM_STR);
$statement->bindParam(3,$telefono, PDO::PARAM_INT); 
$statement->bindParam(4,$edad, PDO::PARAM_INT);
$statement->bindParam(5,$ocupacion, PDO::PARAM_STR );    
$statement->bindParam(6,$empresa,PDO::PARAM_STR );   
$statement->bindParam(7,$correo, PDO::PARAM_STR );       
$statement->bindParam(8,$id_usuario, PDO::PARAM_INT );     
$statement->bindParam(9,$dui, PDO::PARAM_STR );    
$statement->bindParam(10,$tipo_tarjeta, PDO::PARAM_STR );    
$statement->bindParam(11,$num_tarjeta, PDO::PARAM_STR );   
$statement->bindParam(12,$vencimiento, PDO::PARAM_STR );
$statement->bindParam(13,$tipo_pac, PDO::PARAM_STR );       
   



echo $statement->execute() ? header('Location: ../vistas/update_auto.php')
:"Paciente Registrado Exitosamente"  ;


	//vaciar memoria
	$statement->closeCursor();
	$conexion = null;