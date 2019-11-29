<?php

  //llamo a la conexion de la base de datos 
  require_once("../config/conexion.php");
  //llamo al modelo Producto
  require_once("../modelos/Productos.php");

  $productos = new Producto();

      //declaramos las variables de los valores que se envian por el formulario y que recibimos por ajax y decimos que si existe el parametro que estamos recibiendo
   
   //los valores vienen del atributo name de los campos del formulario
   /*el valor id_producto, id_categoria y id_usuario se carga en el campo hidden cuando se edita un registro*/
   
   $id_producto=isset($_POST["id_producto"]);
   $modelo=isset($_POST["modelo"]);
   $id_usuario=isset($_POST["id_usuario"]);
   $marca=isset($_POST["marca"]);
   $color=isset($_POST["color"]);
   $medidas=isset($_POST["medidas"]);
   $precio_venta=isset($_POST["precio_venta"]);
   $stock=isset($_POST["stock"]);
   $categoria=isset($_POST["categoria"]);
   $categoriau=isset($_POST["categoriau"]);
   $sucursal=isset($_POST["sucursal"]);

        

   switch($_GET["op"]){

        case "guardaryeditar":

        $datos = $productos->valida_ingreso($_POST["modelo"],$_POST["color"],$_POST["medidas"]);

		if(is_array($datos)==true and count($datos)==0){

			$productos->registrar_producto($modelo,$marca,$color,$medidas,$precio_venta,$stock,$id_usuario,$categoria,$categoriau);
			       	   	  $messages[]="El producto se registró correctamente";

			}else {

			   $errors[]="El producto ya existe";
		}

    
      
     //mensaje success
     if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
	 //fin success

	 //mensaje error
         if (isset($errors)){
			
			?>
				<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
						<script>alert("Producto Ya Existe!!!");</script> 
						<?php
							foreach ($errors as $error) {
									echo $error;
								}
							?>
				</div>
			<?php

			}

	 //fin mensaje error


     break;


     case 'mostrar':

	//selecciona el id del producto
    
    //el parametro id_producto se envia por AJAX cuando se edita el producto
	$datos=$productos->get_producto_por_id($_POST["id_producto"]);


                
				foreach($datos as $row)
				{
					$output["producto_id"] = $row["id_producto"];
					$output["marca"] = $row["marca"];
					$output["modelo"] = $row["modelo"];
					$output["color"] = $row["color"];
					$output["precio_venta"] = $row["precio_venta"];
					$output["stock"] = $row["stock"];
					$output["medidas"] = $row["medidas"];
					
				}



            echo json_encode($output);


	 break;

	     case "activarydesactivar":
     
     //los parametros id_producto y est vienen por via ajax
     $datos=$productos->get_producto_por_id($_POST["id_producto"]);

          // si existe el id del producto entonces recorre el array
	      if(is_array($datos)==true and count($datos)>0){

              //edita el estado del producto
		      $productos->editar_estado($_POST["id_producto"],$_POST["est"]);


		       //editar estado de la categoria por producto

		    $productos->editar_estado_categoria_por_producto($_POST["id_categoria"],$_POST["est"]);

		
		     
	        } 

     break;

     case "listar":

     $datos=$productos->get_productos();

     //Vamos a declarar un array
 	 $data= Array();

     foreach($datos as $row)
			{
				$sub_array = array();

			

				  if($row["stock"]<=5){
                      
                     $stock = $row["stock"];
                     $atributo = "badge bg-red-active";
                            
				 
				  } else {

				     $stock = $row["stock"];
                     $atributo = "badge bg-green";
                 
                 }


			
				//$sub_array = array();
				$sub_array[] = $row["modelo"];
				$sub_array[] = $row["marca"];
				$sub_array[] = $row["color"];
				$sub_array[] = '$'.' '.$row["precio_venta"];
				$sub_array[] = '<span class="'.$atributo.'">'.$row["stock"].'
                  </span>';
				$sub_array[] = $row["medidas"];


				$sub_array[] = '<button type="button" onClick="mostrar('.$row["id_producto"].');" id="'.$row["id_producto"].'" class="btn btn-infos btn-md"><i class="glyphicon glyphicon-edit"></i> Editar</button>';


				
				$sub_array[] = '<button type="button" onClick="eliminar('.$row["id_producto"].');" id="'.$row["id_producto"].'" class="btn btn-dark btn-md"><i class="glyphicon glyphicon-edit"></i> Eliminar</button>';
              
         
			

				$data[] = $sub_array;
			 
			 }


      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);


     break;

    case "listar_en_compras":

    $datos=$productos->get_productos_compra();

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


     case "buscar_producto";
          
          $datos=$productos->get_producto_por_id($_POST["id_producto"]);

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

     case "registrar_compra";

        //se llama al modelo Compras.php

        require_once('../modelos/Compras.php');

	    $compra = new Compras();

	    $compra->agrega_detalle_compra();



     break;


     /****************VENTAS*******************************/

       case "listar_en_ventas":

     $datos=$productos->get_productos_ventas();

     //Vamos a declarar un array
 	 $data= Array();

    foreach($datos as $row)
			{
				$sub_array = array();




				  //STOCK, si es mejor de 10 se pone rojo sino se pone verde
				  $stock=""; 

				  if($row["stock"]<=5){
                      
                     $stock = $row["stock"];
                     $atributo = "badge bg-red-active";
                            
				 
				  } else {

				     $stock = $row["stock"];
                     $atributo = "badge bg-green";
                 
                 }            

				$sub_array[] = $row["modelo"];
				$sub_array[] = $row["marca"];
				$sub_array[] = $row["color"];
				$sub_array[] = $row["medidas"];
	      		$sub_array[] = $row["precio_venta"];
				
				$sub_array[] = '<span class="'.$atributo.'">'.$row["stock"].'
                  </span>';
      

			$sub_array[] = '<button type="button" name="" id="'.$row["id_producto"].'" class="btn btn-primary btn-md " onClick="agregarDetalleVenta('.$row["id_producto"].')"><i class="fa fa-plus"></i> Agregar</button>';
        
			
				$data[] = $sub_array;
			 
			 }


      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);


     break;


    case "listar_lentes_en_ventas":

     $datos=$productos->get_lentes_ventas();

     //Vamos a declarar un array
 	 $data= Array();

    foreach($datos as $row)
			{
				$sub_array = array();

          
				$sub_array[] = $row["categoria"];
				$sub_array[] = $row["modelo"];
	      		$sub_array[] = $row["precio_venta"];
				
      

			$sub_array[] = '<button type="button" name="" id="'.$row["id_producto"].'" class="btn btn-primary btn-md " onClick="agregarDetalleVenta('.$row["id_producto"].')"><i class="fa fa-plus"></i> Agregar</button>';
        
			
				$data[] = $sub_array;
			 
			 }


      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);


     break; 

     case "listar_ar_en_ventas":

     $datos=$productos->get_ar_ventas();

     //Vamos a declarar un array
 	 $data= Array();

    foreach($datos as $row)
			{
				$sub_array = array();

          
				$sub_array[] = $row["categoria"];
				$sub_array[] = $row["modelo"];
	      		$sub_array[] = $row["precio_venta"];
				
      

			$sub_array[] = '<button type="button" name="" id="'.$row["id_producto"].'" class="btn btn-dark btn-md " onClick="agregarDetalleVenta('.$row["id_producto"].')"><i class="fa fa-plus"></i> Agregar</button>';
        
			
				$data[] = $sub_array;
			 
			 }


      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);


     break; 

      case "buscar_producto_en_venta":
          
          $datos=$productos->get_producto_por_id($_POST["id_producto"]);

	      if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					$output["id_producto"] = $row["id_producto"];
					$output["medidas"] = $row["medidas"];
					$output["modelo"] = $row["modelo"];
					$output["marca"] = $row["marca"];
					$output["color"] = $row["color"];			

					$output["precio_venta"] = $row["precio_venta"];
					$output["stock"] = $row["stock"];
					$output["categoria"] = $row["categoria"];
					
				}
		
		     


	        } else {
                 
                 //si no existe el registro entonces no recorre el array
                 $output["error"]="El producto seleccionado está inactivo, intenta con otro";

	        }

	        echo json_encode($output);

     break;


    case "listar_acc_en_ventas":

     $datos=$productos->get_acc_ventas();

     //Vamos a declarar un array
 	 $data= Array();

    foreach($datos as $row)
			{
				$sub_array = array();

          
				$sub_array[] = $row["categoria"];
				$sub_array[] = $row["modelo"];
	      		$sub_array[] = $row["precio_venta"];
				
      

			$sub_array[] = '<button type="button" name="" id="'.$row["id_producto"].'" class="btn btn-primary btn-md " onClick="agregarDetalleVenta('.$row["id_producto"].')"><i class="fa fa-plus"></i> Agregar</button>';
        
			
				$data[] = $sub_array;
			 
			 }


      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);


     break; 


     case "listar_photo_en_ventas":

     $datos=$productos->get_photo_ventas();

     //Vamos a declarar un array
 	 $data= Array();

    foreach($datos as $row)
			{
				$sub_array = array();

          
				$sub_array[] = $row["categoria"];
				$sub_array[] = $row["modelo"];
	      		$sub_array[] = $row["precio_venta"];
				
      

			$sub_array[] = '<button type="button" name="" id="'.$row["id_producto"].'" class="btn btn-primary btn-md " onClick="agregarDetalleVenta('.$row["id_producto"].')"><i class="fa fa-plus"></i> Agregar</button>';
        
			
				$data[] = $sub_array;
			 
			 }


      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);


     break; 


           case "buscar_lente_en_venta":
          
          $datos=$productos->get_lente_por_id($_POST["id_lente"]);

	      if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					$output["id_lente"] = $row["id_lente"];
					$output["descripcion"] = $row["descripcion"];
					$output["precio_venta"] = $row["precio_venta"];

					
					
				}
		
		     


	        } else {
                 
                 //si no existe el registro entonces no recorre el array
                 $output["error"]="El producto seleccionado está inactivo, intenta con otro";

	        }

	        echo json_encode($output);

     break;

    case "registrar_venta";

        //se llama al modelo Ventas.php

        require_once('../modelos/Ventas.php');

	    $venta = new Ventas();

	    $venta->agrega_detalle_venta();



     break;

         case "registrar_venta2";

        //se llama al modelo Ventas.php

        require_once('../modelos/Ventas.php');

	    $venta = new Ventas();

	    $venta->agrega_detalle_venta2();



     break;

    case "registrar_cargo";

        //se llama al modelo Ventas.php

        require_once('../modelos/Ventas.php');

	    $venta = new Ventas();
	    $venta->agrega_detalle_cargo();



     break;

case "eliminar_producto":


        //verificamos si el producto existe en la bd y si el stock es igual a 0

        $datos= $productos->get_producto_por_id($_POST["id_producto"]);

          

            //verifica si el id_producto tiene registro asociado a detalle_compra
	      $producto_detalle_compra=$productos->get_producto_por_id_detalle_compra($_POST["id_producto"]);

       
  
          
	       //si no hay productos en detalle_compras y en detalle_ventas entonces se elimina el producto
            if(is_array($datos)==true and count($datos)>0 and is_array($producto_detalle_compra)==true and count($producto_detalle_compra)==0){

            	
	        	$productos->eliminar_producto($_POST["id_producto"]);

					
			    $messages[]="El producto se eliminó correctamente";
                

            } 

            else {

            	
   	  	         $errors[]="Oops!! El producto no se puede eliminar por que tiene ingresos Asociados y el Stock es mayor a cero";
            }

        
       

	//prueba mensaje de success

     if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}


	//fin mensaje success


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


     break;
  	
////////////////ENVIOS***********


     case "registrar_envio";

        //se llama al modelo Compras.php

        require_once('../modelos/Envios.php');

	    $compra = new Envios();

	    $compra->agrega_detalle_envios();



     break;

case "registrar_ingreso";

	$verificar_ingreso=$productos->get_producto_por_id_suscursal($_POST["id_producto"],$_POST["sucursal"]);
	if(is_array($verificar_ingreso)==true and count($verificar_ingreso)>0){

	$productos->agrega_detalle_existencia();

		}else {

	$productos->insert_bodega();		   
		}

break;

case 'update_warehouse':
	$productos->agrega_detalle_warehouse();
	break;
     
}
?>