<?php

include '../config/conn.php';

$optica = $_POST["optica"];
$paciente = $_POST["paciente"];
$odesfreasl = $_POST["odesfreasl"];
$odcilindrosl = $_POST["odcilindrosl"];
$odejesl = $_POST["odejesl"];
$odprismal = $_POST["odprismal"];
$odadicionl = $_POST["odadicionl"];
$oiesferasl = $_POST["oiesferasl"];
$oicilndrosl = $_POST["oicilndrosl"];
$oiejesl = $_POST["oiejesl"];
$oiprismal = $_POST["oiprismal"];
$oiadicionl = $_POST["oiadicionl"];
$policarbonato = $_POST["policarbonato"];
$anti = $_POST["anti"];
$tipo_lentes = $_POST["tipo_lentes"];
$color_lente = $_POST["color_lente"];
$base_lente = $_POST["base_lente"];
$odoblea = $_POST["odoblea"];
$odpupilar = $_POST["odpupilar"];
$oddplejos = $_POST["oddplejos"];
$odpcerca = $_POST["odpcerca"];
$oioblea = $_POST["oioblea"];
$oipupilar = $_POST["oipupilar"];
$oidplejos = $_POST["oidplejos"];
$oidpcerca = $_POST["oidpcerca"];
$aro = $_POST["aro"];
$color_aro = $_POST["color_aro"];
$medidas_aro = $_POST["medidas_aro"];
$id_usuario = $_POST["id_usuario"];
$fecha = $_POST["fecha"];
$medida_lente = $_POST["medida_lente"];
$medida_lente_a = $_POST["medida_lente_a"];
$medida_lente_b = $_POST["medida_lente_b"];
$medida_lente_c = $_POST["medida_lente_c"];
$medida_lente_d = $_POST["medida_lente_d"];
$estado = "0";
$n_orden = $_POST["numero_orden"];
$sucursal = $_POST["sucursal"];   

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "INSERT INTO ordenes (optica,paciente,odesfera,odcilindro,odeje,oddicion,odprisma,oiesfera,oicilindros,oieje,oiadicion,oiprisma,policarbonato,antirreflejo,lentes,colorlente,base,odoblea,odpupilar,oddplejos,oddpcerca,oioblea,oipupilar,oidplejos,oidpcerca,aro,coloraro,observaciones,usuario,fecha,medidas_lente,medida_a,medida_b,medida_c,medida_d,estado,numero_orden,sucursal) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

$statement = $cnn->prepare( $sql );
	//Enlazar los parámetros de la consulta con los valores del formulario

 
$statement->bindParam(1,$optica, PDO::PARAM_STR );
$statement->bindParam(2,$paciente, PDO::PARAM_STR);
$statement->bindParam(3,$odesfreasl, PDO::PARAM_INT); 
$statement->bindParam(4,$odcilindrosl, PDO::PARAM_INT);
$statement->bindParam(5,$odejesl, PDO::PARAM_STR );    
$statement->bindParam(6,$odadicionl,PDO::PARAM_STR );   
$statement->bindParam(7,$odprismal, PDO::PARAM_STR );       
$statement->bindParam(8,$oiesferasl, PDO::PARAM_STR );     
$statement->bindParam(9,$oicilndros, PDO::PARAM_STR );    
$statement->bindParam(10,$oiejesl, PDO::PARAM_STR );    
$statement->bindParam(11,$oiadicionl, PDO::PARAM_STR );   
$statement->bindParam(12,$oiprismal, PDO::PARAM_STR );       
$statement->bindParam(13,$policarbonato, PDO::PARAM_STR );     
$statement->bindParam(14,$anti,PDO::PARAM_STR );     
$statement->bindParam(15,$tipo_lentes, PDO::PARAM_STR );    
$statement->bindParam(16,$color_lente,PDO::PARAM_STR );   
$statement->bindParam(17,$base_lente, PDO::PARAM_STR );       
$statement->bindParam(18,$odoblea,  PDO::PARAM_STR );    
$statement->bindParam(19,$odpupilar,PDO::PARAM_STR );     
$statement->bindParam(20,$oddplejos ,PDO::PARAM_STR );   
$statement->bindParam(21,$odpcerca, PDO::PARAM_STR );  
$statement->bindParam(22,$oioblea,   PDO::PARAM_STR );     
$statement->bindParam(23,$oipupilar, PDO::PARAM_STR );      
$statement->bindParam(24,$oidplejos, PDO::PARAM_STR );     
$statement->bindParam(25,$oidpcerca, PDO::PARAM_STR );    
$statement->bindParam(26,$aro,PDO::PARAM_STR );    
$statement->bindParam(27,$color_aro, PDO::PARAM_STR );   
$statement->bindParam(28,$medidas_aro,PDO::PARAM_STR );
$statement->bindParam(29,$id_usuario,PDO::PARAM_STR );
$statement->bindParam(30,$fecha,PDO::PARAM_STR );
$statement->bindParam(31,$medida_lente,PDO::PARAM_STR );
$statement->bindParam(32,$medida_lente_a,PDO::PARAM_STR );
$statement->bindParam(33,$medida_lente_b,PDO::PARAM_STR );
$statement->bindParam(34,$medida_lente_c,PDO::PARAM_STR );
$statement->bindParam(35,$medida_lente_d,PDO::PARAM_STR );
$statement->bindParam(36,$estado,PDO::PARAM_STR );
$statement->bindParam(37,$n_orden,PDO::PARAM_STR );
$statement->bindParam(38,$sucursal,PDO::PARAM_STR );
//$statement->bindParam(39,$n_orden,PDO::PARAM_STR );
//$statement->bindParam(36,$fecha,PDO::PARAM_STR );

echo $statement->execute() ? header('Location: ../vistas/ordenes.php')
:"Consulta Registrado Exitosamente"  ;


	//vaciar memoria
	$statement->closeCursor();
	$conexion = null;