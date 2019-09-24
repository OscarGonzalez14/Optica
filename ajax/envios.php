<?php


  //llamo a la conexion de la base de datos 
  require_once("../config/conexion.php");
  //llamo al modelo Producto
  require_once("../modelos/Envios.php");

  $envio = new Envios();

   $id_producto=isset($_POST["id_producto"]);
   $modelo=isset($_POST["modelo"]);
   $id_usuario=isset($_POST["id_usuario"]);
   $marca=isset($_POST["marca"]);
   $color=isset($_POST["color"]);
   $medidas=isset($_POST["medidas"]);
   $precio_venta=isset($_POST["precio_venta"]);
   $stock=isset($_POST["stock"]);
   $categoria=isset($_POST["categoria"]);


	switch ($_GET["op"]) {

	case "listar_en_envios":

    $datos=$envio->get_productos_envio();

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

				

				
               
			$sub_array[] = '<button type="button" name="" id="'.$row["id_producto"].'" class="btn btn-dark btn-md " onClick="agregarDetalleEnvio('.$row["id_producto"].')"><i class="fa fa-plus"></i> Agrega Envio</button>';
                
			

				$data[] = $sub_array;
			 
			 }


      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);


     break;

 case "buscar_productos_envios";


        
    $datos=$envio->get_producto_por_id($_POST["id_producto"]);

            /*comprobamos que el producto esté activo, de lo contrario no lo agrega
	      if(is_array($datos)==true and count($datos)>0){*/

				foreach($datos as $row)
				{
					
					$output["id_producto"] = $row["id_producto"];
					$output["modelo"] = $row["modelo"];
					$output["marca"] = $row["marca"];
					$output["color"] = $row["color"];
					//$output["precio_venta"] = $row["precio_venta"];
					$output["stock"] = $row["stock"];
				     
					
					
				}
		


	        echo json_encode($output);

     break;


     case "registrar_ingreso";

	    $envio->agrega_detalle_ingreso();



     break;

     /*case "activarydesactivar":
              
                //los parametros id_usuario y est vienen por via ajax
              $datos = $usuarios->get_usuario_por_id($_POST["id_usuario"]);
                
                //valida el id del usuario
                 if(is_array($datos)==true and count($datos)>0){
                    
                    //edita el estado del usuario 
                    $usuarios->editar_estado($_POST["id_usuario"],$_POST["est"]);
                 }
         break;*/

         case "listar_requisiones":

         $datos = $envio->listar_requisiones();

         //declaramos el array

         $data = Array();


         foreach($datos as $row){

            
            $sub_array= array();

             //ESTADO
          $est = '';
         
           /*$atrib = "btn btn-warning btn-md estado";
          if($row["estado"] == 0){
            $est = 'PENDIENTE';
            $atrib = "btn btn-warning btn-md estado";
          }
          else{
            if($row["estado"] == 1){
              $est = 'ACTIVO';
              
            } 
          }*/


            //cargo

            /*if($row["cargo"]==1){

              $cargo="ADMINISTRADOR";

            } else{

              if($row["cargo"]==0){
                   
                   $cargo="EMPLEADO";
              }
            }*/


         $sub_array[]= $row["codigo_envio"];
         //$sub_array[] = $row["codigo_envio"];
         $sub_array[] = $row["sucursal_origen"];
         $sub_array[] = $row["sucursal_destino"];
         //$sub_array[] = $cargo;
         //$sub_array[] = $row[""];
         $sub_array[] = $row["usuario"];
         $sub_array[] = $row["modelo"];
         //$sub_array[] = date("d-m-Y",strtotime($row["fecha_ingreso"]));

              
         $sub_array[] = '<button type="button" name="estado"> Pendiente</button>';



        
       $data[]=$sub_array;
      
          
         }

         $results= array( 

         "sEcho"=>1, //Información para el datatables
      "iTotalRecords"=>count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
      "aaData"=>$data);
         echo json_encode($results);


         break;
}