<?php
	include '../config/conn.php';

$codigo = $_POST["codigo_emp"];
$tipo_reg = "--";
$date = $_POST["hora"];
    

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "INSERT INTO consulta (hora,tipo_registro, cod_empleado) VALUES (?,?,?);";

$statement = $cnn->prepare( $sql );
	//Enlazar los parámetros de la consulta con los valores del formulario

 
$statement->bindParam(1,$date, PDO::PARAM_STR );
$statement->bindParam(2,$tipo_reg, PDO::PARAM_STR);
$statement->bindParam(3,$codigo, PDO::PARAM_INT); 



echo $statement->execute() ? header('Location: ../vistas/asistencia.php')
:"Asistencia Registrada Exitosamente"  ;


	//vaciar memoria
	$statement->closeCursor();
	$conexion = null;