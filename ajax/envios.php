<?php


  //llamo a la conexion de la base de datos 
  require_once("../config/conexion.php");
  //llamo al modelo Producto
  require_once("../modelos/Productos.php");

  $productos = new Producto();

	switch ($_GET["op"]) {

	case "listar_en_envios":

    $datos=$productos->get_productos();

     //Vamos a declarar un array
 	 $data= Array();

    foreach($datos as $row)
			{
				$sub_array = array();



				  //STOCK, si es menor de 10 se pone rojo sino se pone verde
				  $stock=""; 

				  if($row["stock"]<=5){
                      
                     $stock = $row["stock"];
                     $atributo = "badge bg-red-active";
                            
				 
				  } else {

				     $stock = $row["stock"];
                     $atributo = "badge bg-green";
                 
                 }


                 //moneda

                //$moneda = $row[""];

				
				//$sub_array = array();
				$sub_array[] = $row["modelo"];
				$sub_array[] = $row["marca"];
				$sub_array[] = $row["color"];
				$sub_array[] = $row["medidas"];
                $sub_array[] = '<span class="'.$atributo.'">'.$row["stock"].'
                  </span>';

				

				
               
			$sub_array[] = '<button type="button" name="" id="'.$row["id_producto"].'" class="btn btn-dark btn-md " onClick="agregarDetalle('.$row["id_producto"].')"><i class="fa fa-plus"></i> Agregar</button>';
                
			

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