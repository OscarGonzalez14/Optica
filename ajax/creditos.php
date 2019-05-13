<?php

require_once("../config/conexion.php");
require_once("../modelos/Creditos.php");

$creditos= new Creditos();


switch ($_GET["op"]) {

	case 'c_metrocentro':

	$datos=$creditos->get_pacientes_metrocentro();

	$data = Array();

	foreach ($datos as $row) {

		$sub_array= array();

				$est = '';
				$atrib = '';
				$event = '';

				 
				if($row["saldo"] == 0){
					$est = 'Factura';
					$icon="<span class='glyphicon glyphicon-print'></span>";
					$event = "registrarVenta()";
					$atrib = "btn btn-blue btn-md ";
				 

				}
				else{
					if($row["saldo"] > 0){
						$est = 'Pendiente';
						$icon="<span class='glyphicon glyphicon-usd'></span>";
						$atrib = "btn btn-default";
					}	
				}
		//$sub_array[] = $row["id_paciente"];
		$sub_array[] = $row["nombres"];
		$sub_array[] = $row["monto"];
		$sub_array[] = $row["saldo"];
		$sub_array[] = $row["telefono"];
		$sub_array[] = $row["empresa"];

		$sub_array[] = '<button class="btn btn-blue abonos" id="'.$row["id_paciente"].'" ><i class="fa fa-usd"></i> Abonar</i></button>';
		$sub_array[] = '<button class="btn btn-dark"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>';

		$sub_array[] = '<button type="button" name="estado" onClick="'.$event.'" class="'.$atrib.'">'.$icon." ".$est.'</button>';


		$data[]= $sub_array;

	}
      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

case 'pacientes_empresarial':

	$datos=$creditos->get_pacientes_empresarial();

	$data = Array();

	foreach ($datos as $row) {

		$sub_array= array();
				$event='';
				$est = '';
				$atrib = '';
				 
				if($row["saldo"] == 0){
					$est = 'Factura';
					$icon="<span class='glyphicon glyphicon-print'></span>";
					$event = "registrarVenta()";
					$atrib = "btn btn-blue btn-md";
				 

				}
				else{
					if($row["saldo"] > 0){
						$est = 'Pendiente';
						$icon="<span class='glyphicon glyphicon-usd'></span>";
						$atrib = "btn btn-default";
					}	
				}
		//$sub_array[] = $row["id_paciente"];
		$sub_array[] = $row["nombres"];
		$sub_array[] = $row["monto"];
		$sub_array[] = $row["saldo"];
		$sub_array[] = $row["telefono"];
		$sub_array[] = $row["empresa"];
		$sub_array[] = $row["sucursal"];

		$sub_array[] = '<button class="btn btn-blue abonarp" id="" onClick="abonoPaciente('.$row["id_paciente"].','.$row["id_credito"].')"><i class="fa fa-usd"></i> Abonar</i></button>';
		$sub_array[] = '<button class="btn btn-dark"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>';

		$sub_array[] = '<button type="button" name="estado" onClick="'.$event.'" class="'.$atrib.'">'.$icon." ".$est.'</button>';


		$data[]= $sub_array;

	}
      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case "listar_creditos_paciente":


   $datos= $creditos->get_detalle_paciente($_POST["id_paciente"]);	

            // si existe el proveedor entonces recorre el array
	      if(is_array($datos)==true and count($datos)>0){

				  foreach($datos as $row)
				{
					
					$output["telefono"] = $row["telefono"];
					$output["nombres"] = $row["nombres"];
					$output["empresa"] = $row["empresa"];
					$output["monto"] = $row["monto"];
					$output["saldo"] = $row["saldo"];
					$output["id_paciente"] = $row["id_paciente"];
					$output["tipo_pago"] = $row["tipo_pago"];
					$output["id_credito"] = $row["id_credito"];
					$output["monto_abono"] = $row["monto_abono"];
									
				}
		
		      
		          echo json_encode($output);


	        } else {
                 
                 //si no existe el registro entonces no recorre el array
                $errors[]="no existe";

	        }


	         //inicio de mensaje de error

				if (isset($errors)){
			
					?>
					<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Error!</strong> 
							<?php
								foreach ($errors as $error) {
										echo $error;
									}
								?>
					</div>
					<?php
			      }

	case "buscar_abonos_paciente":



	$datos=$creditos->abonos_paciente_numerov_idp($_POST["id_paciente"], $_POST["id_credito"]);

	      if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					$output["id_paciente"] = $row["id_paciente"];
					$output["id_paciente"] = $row["id_paciente"];
					$output["monto"] = $row["monto"];
					$output["saldo"] = $row["saldo"];
					$output["nombres"] = $row["nombres"];
					$output["empresa"] = $row["empresa"];
					$output["telefono"] = $row["telefono"];
					$output["tipo_pago"] = $row["tipo_pago"];
					$output["numero_venta"] = $row["numero_venta"];
					$output["monto_abono"] = $row["monto_abono"];
					
				}
		
		     

	        } else {
                 
                 //si no existe el registro entonces no recorre el array
                 $output["error"]="El numero de venta seleccionado está inactivo, intenta con otro";

	        }

	        echo json_encode($output);

	break; 
	
}