<?php
	include '../config/conn.php';

$modelo = $_POST["modelo"];
$precio = $_POST["precio"];
$id_usuario = $_POST["id_usuario"];
$categoria = $_POST["categoria"];

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "INSERT INTO producto (modelo,precio_venta,id_usuario,categoria) VALUES (?,?,?,?);";

$statement = $cnn->prepare( $sql );
	//Enlazar los parámetros de la consulta con los valores del formulario

 
$statement->bindParam(1,$modelo, PDO::PARAM_STR );
$statement->bindParam(2,$precio, PDO::PARAM_STR);
$statement->bindParam(3,$id_usuario, PDO::PARAM_INT); 
$statement->bindParam(4,$categoria, PDO::PARAM_INT);



echo $statement->execute() ? header('Location: ../vistas/productos.php')
:"Error de registro"  ;


	//vaciar memoria
	$statement->closeCursor();
	$conexion = null;