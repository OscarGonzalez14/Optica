<?php


require_once("../config/conexion.php");

require_once("../modelos/Productos.php");
$productos = new Producto();

switch ('op') {
      case "listar_en_bodegas":

     $datos=$productos->get_productos();

     //Vamos a declarar un array
 	 $data= Array();

    foreach($datos as $row)
			{
				$sub_array = array();
				  //STOCK, si es mejor de 10 se pone rojo sino se pone verde
				  $stock=""; 

				  if($row["stock"]<=10){
                      
                     $stock = $row["stock"];
                     $atributo = "badge bg-red-active";
                            
				 
				  } else {

				     $stock = $row["stock"];
                     $atributo = "badge bg-green";
                 
                 }

				
				//$sub_array = array();
				$sub_array[] = $row["modelo"];
				$sub_array[] = '<span class="'.$atributo.'">'.$row["stock"].'</span>';
				$sub_array[] = '<button type="button" name="" id="'.$row["id_producto"].'" onClick="agregarDetalleVenta('.$row["id_producto"].',\''.$row["modelo"].')"><i class="fa fa-plus"></i> Agregar</button>';  
			

				$data[] = $sub_array;
			 
			 }


      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);


     break;
}