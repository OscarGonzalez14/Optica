<?php


require_once("../config/conexion.php");

require_once("../modelos/Productos.php");
$productos = new Producto();

switch ($_GET["op"]) {
      case "listar_en_bodegas":

     $datos=$productos->get_productos();

     //Vamos a declarar un array
 	 $data= Array();

    foreach($datos as $row)
			{
				$sub_array = array();
				  
				$sub_array[] = $row["id_producto"];
				$sub_array[] = $row["modelo"]." ".$row["marca"]." ".$row["color"]." ".$row["medidas"];
				$sub_array[] = $row["stock"];
				$sub_array[] = '<button type="button" class="btn btn-dark name="" id="'.$row["id_producto"].'" onClick="agregarDetalleBodega('.$row["id_producto"].')"><i class="fa fa-plus"></i> Agregar</button>';  
			

				$data[] = $sub_array;
			 
			 }


      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);


     break;

      case "buscar_producto_bodega":
          
          $datos=$productos->get_producto_por_id($_POST["id_producto"]);

            /*comprobamos que el producto esté activo, de lo contrario no lo agrega*/
	      if(is_array($datos)==true) {

				foreach($datos as $row)
				{
					$output["id_producto"] = $row["id_producto"];
					$output["modelo"] = $row["modelo"];
					$output["stock"] = $row["stock"];
				}
		
		     


	        } else {
                 
                 //si no existe el registro entonces no recorre el array
                 $output["error"]="El producto seleccionado está inactivo, intenta con otro";

	        }

	        echo json_encode($output);

     break;



}//Fin Switch