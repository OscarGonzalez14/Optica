  
  <?php

 require_once("../config/conexion.php");

  class Ventas extends Conectar{


public function get_filas_venta(){

      $conectar= parent::conexion();
           
        $sql="select * from ventas";
             
        $sql=$conectar->prepare($sql);

        $sql->execute();

        $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

        return $sql->rowCount();  
}


		 public function get_ventas(){

		 $conectar= parent::conexion();
       
         $sql="select * from ventas order by fecha_venta DESC";

         //echo $sql;
         
         $sql=$conectar->prepare($sql);

         $sql->execute();

         return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
		
		}

    public function get_bonos(){

      $conectar=parent::conexion();
      $sql="select*from ventas";
      $sql=$conectar->prepare($sql);
      $sql->execute();
      return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

		public function get_detalle_paciente($numero_venta){

		   $conectar=parent::conexion();
           parent::set_names();

		      $sql="select p.nombres,p.telefono,v.numero_venta,v.fecha_venta,v.sucursal,u.usuario from pacientes as p inner join ventas as v on p.id_paciente=v.id_paciente inner join usuarios as u on u.id_usuario=v.id_usuario where v.numero_venta=?
		      ;";

		      //echo $sql; exit();

		      $sql=$conectar->prepare($sql);
          $sql->bindValue(1,$numero_venta);
		      $sql->execute();
		      return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

		   
            
		}

    public function get_det_ultima_venta(){

       $conectar=parent::conexion();
           parent::set_names();

          $sql="select p.telefono,p.nombres, p.empresa, c.id_credito,c.monto,c.saldo,v.tipo_pago,p.id_paciente from pacientes as p inner join creditos as c on p.id_paciente=c.id_paciente join ventas as v where c.id_credito=(select max(id_credito) from creditos) and v.numero_venta=c.numero_venta;";


          //echo $sql; exit();

          $sql=$conectar->prepare($sql);

          $sql->execute();
          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

       
            
    }

    public function get_det_ultima_venta_aros(){

       $conectar=parent::conexion();
           parent::set_names();

          $sql="select d.producto,d.numero_venta,p.modelo,p.marca,p.color from detalle_ventas as d, producto as p where d.id_producto=p.id_producto and d.numero_venta=(select max(d.numero_venta)from detalle_ventas) and p.categoria='aros';";


          //echo $sql; exit();

          $sql=$conectar->prepare($sql);

          $sql->execute();
          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

       
            
    }

 public function get_det_ultima_venta_lentes(){

       $conectar=parent::conexion();
           parent::set_names();

          $sql="select d.producto,d.numero_venta,p.modelo,p.marca,p.color from detalle_ventas as d, producto as p where d.id_producto=p.id_producto and d.numero_venta=(select max(d.numero_venta)from detalle_ventas) and p.categoria='lentes';";


          //echo $sql; exit();

          $sql=$conectar->prepare($sql);

          $sql->execute();
          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

       
            
    }


		public function get_detalle_ventas_paciente($numero_venta){

		   $conectar=parent::conexion();
           parent::set_names();
        $moneda="$";   

		      $sql="select d.cantidad_venta, d.producto,d.precio_venta,d.descuento,v.subtotal,d.importe from  detalle_ventas as d, ventas as v where d.numero_venta=v.numero_venta and d.numero_venta=?
		      
		      ;";

		      //echo $sql; exit();

		      $sql=$conectar->prepare($sql);
              

          $sql->bindValue(1,$numero_venta);
		      $sql->execute();
		      $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

		   
              $html= "

              <thead style='background-color:#A9D0F5'>

                                    <th>Cantidad</th>
                                    <th>Producto</th>
                                    <th>Precio Unitario</th>
                                    <th>Descuento (%)</th>
                                    <th>Subtotal</th>
                                   
                                </thead>


                              ";

           

		          foreach($resultado as $row)
				{

			   
$html.="<tr class='filas'>
<td>".$row['cantidad_venta']."</td>
<td>".$row['producto']."</td>
 <td>".$moneda." ".$row['precio_venta']."</td> 
 <td>".$row['descuento'].'%'."</td> <td>".$moneda." ".$row['importe']."</td>
 </tr>";
 
   $subtotal= $row["subtotal"];         
              
}

		 $html .= "<tfoot>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>
                                    <p>TOTAL</p>
                                    </th>

                                    <th>

                                    <p><strong>".$subtotal."</strong></p>

                                   </th> 
                                </tfoot>";
			
			echo $html;

		}

     public function numero_venta(){

		    $conectar=parent::conexion();
		    parent::set_names();

		 
		    $sql="select numero_venta from detalle_ventas;";

		    $sql=$conectar->prepare($sql);

		    $sql->execute();
		    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

		       //aqui selecciono solo un campo del array y lo recorro que es el campo numero_venta
		       foreach($resultado as $k=>$v){

		                 $numero_venta["numero"]=$v["numero_venta"];

		               
		          
		             }
		          //luego despues de tener seleccionado el numero_venta digo que si el campo numero_venta està vacio entonces se le asigna un F000001 de lo contrario ira sumando

		        

		                   if(empty($numero_venta["numero"]))
		                {
		                  echo 'V000001';
		                }else
		          
		                  {
		                    $num     = substr($numero_venta["numero"] , 1);
		                    $dig     = $num + 1;
		                    $fact = str_pad($dig, 6, "0", STR_PAD_LEFT);
		                    echo 'V'.$fact;
		                    //echo 'F'.$new_cod;
		                  } 

		       //return $data;
		  }



public function agrega_detalle_venta(){

       
	//echo json_encode($_POST['arrayCompra']);
	$str = '';
	$detalles = array();
	$detalles = json_decode($_POST['arrayVenta']);


   
	 $conectar=parent::conexion();


	foreach ($detalles as $k => $v) {
		//echo $v->codProd;
		//IMPORTANTE:estas variables son del array detalles
		$cantidad = $v->cantidad;
		$codProd = $v->codProd;
		$modelo = $v->modelo;
		$marca = $v->marca;
    $color = $v->color;
    $medidas = $v->medidas;
		$precio_venta = $v->precio_venta; 
		$dscto = $v->dscto;
		$importe = $v->importe;
  	//$estado = $v->estado;

		//echo "***************";
		//echo "Cant: ".$cantidad." codProd: ".$codProd. " Producto: ". $producto. " moneda: ".$moneda. " precio: ".$precio. " descuento: ".$dscto. " estado: ".$estado;

		   $numero_venta = $_POST["numero_venta"];
		   $cod_pac = ["cod_pac"];
		   //$paciente_nombre = $_POST["nombre"];
		   $nombre_pac = $_POST["nombre_pac"];
		   $tipo_pago = $_POST["tipo_pago"];
		   $subtotal = $_POST["subtotal"];
		   $usuario = $_POST["usuario"];
       $sucursal = $_POST["sucursal"];
		   $tipo_venta = $_POST["tipo_venta"];
       $id_usuario = $_POST["id_usuario"];
       $id_paciente = $_POST["id_paciente"];
       $plazo = $_POST["plazo"];
		   

        $sql="insert into detalle_ventas
        values(null,?,?,?,?,?,?,?,now(),?,?);";


        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$numero_venta);
        //$sql->bindValue(2,$cod_pac);
        $sql->bindValue(2,$codProd);
        $sql->bindValue(3,$modelo);
        $sql->bindValue(4,$precio_venta);
        $sql->bindValue(5,$cantidad);
        $sql->bindValue(6,$dscto);
        $sql->bindValue(7,$importe);
        $sql->bindValue(8,$id_usuario);
        $sql->bindValue(9,$id_paciente);

       
       
        $sql->execute();
         
        $sql3="select * from producto where id_producto=?;";


             
             $sql3=$conectar->prepare($sql3);

             $sql3->bindValue(1,$codProd);
             $sql3->execute();

             $resultado = $sql3->fetchAll(PDO::FETCH_ASSOC);

                  foreach($resultado as $b=>$row){

                  	$re["existencia"] = $row["stock"];

                  }

                //la cantidad total es la resta del stock menos la cantidad de productos vendido
                $cantidad_total = $row["stock"] - $cantidad;

             
               //si existe el producto entonces actualiza el stock en producto
              
               if(is_array($resultado)==true and count($resultado)>0) {
                     
                  //actualiza el stock en la tabla producto

             	   $sql4 = "update producto set 
                      
                      stock=?
                      where 
                      id_producto=?
             	   ";


             	  $sql4 = $conectar->prepare($sql4);
             	  $sql4->bindValue(1,$cantidad_total);
             	  $sql4->bindValue(2,$codProd);
             	  $sql4->execute();

               } //cierre la condicional


	     }//cierre del foreach

	
        /*$sql5="select sum(importe) as total from detalle_ventas where numero_venta=?";
      
         $sql5=$conectar->prepare($sql5);

         $sql5->bindValue(1,$numero_venta);

         $sql5->execute();

         $resultado2 = $sql5->fetchAll();

             foreach($resultado2 as $c=>$d){

                $row["total"]=$d["total"];
               
             }

             $subtotal=$d["total"];

              //REALIZO EL CALCULO A REGISTRAR
		      $iva= 13/100;
		      $total_iv=$subtotal*$iva;
		      $total_iva=round($total_iv);
		      $tot=$subtotal+$total_iva;
		      $total=round($tot);*/

        //IMPORTANTE: hay que sacar la consulta INSERT INTO VENTAS fuera del foreach sino se repetiria el registro en la tabla ventas

	    

           $sql2="insert into ventas 
           values(null,now(),?,?,?,?,?,?,?,?,?);";


           $sql2=$conectar->prepare($sql2);
           
          
           $sql2->bindValue(1,$numero_venta);
           $sql2->bindValue(2,$nombre_pac);
           $sql2->bindValue(3,$usuario);       
           $sql2->bindValue(4,$subtotal);
           $sql2->bindValue(5,$tipo_pago);
           $sql2->bindValue(6,$tipo_venta);          
           $sql2->bindValue(7,$id_usuario);
           $sql2->bindValue(8,$id_paciente);
           $sql2->bindValue(9,$sucursal);
           $sql2->execute();

           //INSERTAR EN LA TABLA CREDITOS
           $sql7="insert into creditos values(null,?,?,?,?,?,?,?,now());";

           $sql7=$conectar->prepare($sql7);

           $sql7->bindValue(1,$subtotal);
           $sql7->bindValue(2,$plazo);
           $sql7->bindValue(3,$subtotal);
           $sql7->bindValue(4,$tipo_pago);
           $sql7->bindValue(5,$numero_venta);
           $sql7->bindValue(6,$id_paciente);
           $sql7->bindValue(7,$id_usuario);
           $sql7->execute();

          
  	  }

//////////////////////REGISTRAR ABONOS

public function agrega_detalle_abono(){

       
  //echo json_encode($_POST['arrayCompra']);
  $str = '';
  $abonoi = array();
  $abonoi = json_decode($_POST['arrayAbonos']);


   
   $conectar=parent::conexion();


  foreach ($abonoi as $k => $v) {
      
       $abono = $v->abono;

       $id_credito = $_POST["id_credito"];
       $id_usuario = $_POST["id_usuario"];
       $id_paciente = $_POST["id_paciente"];
       $forma_pago = $_POST["forma_pago"];
       

        $sql="insert into abonos
        values(null,?,?,?,?,?);";


        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$abono);
        $sql->bindValue(2,$forma_pago);
        $sql->bindValue(3,$id_paciente);
        $sql->bindValue(4,$id_usuario);
        $sql->bindValue(5,$id_credito);
       
        $sql->execute();
         
        $sql3="select * from creditos where id_credito=?;";


             
             $sql3=$conectar->prepare($sql3);

             $sql3->bindValue(1,$id_credito);
             $sql3->execute();

             $resultado = $sql3->fetchAll(PDO::FETCH_ASSOC);

                  foreach($resultado as $b=>$row){

                    $re["saldo_act"] = $row["saldo"];

                  }

                //la cantidad total es la resta del stock menos la cantidad de productos vendido
                $saldo_total = $row["saldo"] - $abono;

             
               //si existe el producto entonces actualiza el stock en producto
              
               if(is_array($resultado)==true and count($resultado)>0) {
                     
                  //actualiza el stock en la tabla producto

                 $sql4 = "update creditos set 
                      
                      saldo=?
                      where 
                      id_credito=?
                 ";


                $sql4 = $conectar->prepare($sql4);
                $sql4->bindValue(1,$saldo_total);
                $sql4->bindValue(2,$id_credito);
                $sql4->execute();

               } //cierre la condicional


       }//cierre del foreach
      
}



  //////////////FIN REGISTRAR ABONOS    

  	  public function get_ventas_por_id($id_ventas){

		 $conectar= parent::conexion();

		 $id_ventas=$_POST["id_ventas"];
       
         $sql="select * from ventas where id_ventas=?";
         
         $sql=$conectar->prepare($sql);
         $sql->bindValue(1,$id_ventas);
         $sql->execute();

         return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

		
		}

			/*cambiar estado de la venta, solo se cambia si se quiere eliminar una venta y se revertería la cantidad de venta al stock*/

		public function cambiar_estado(){

			$conectar=parent::conexion();
			parent::set_names();
            
            //si estado es igual a 0 entonces lo cambia a 1
			$estado = 0;
			//el parametro est se envia por via ajax, viene del $est:est
			/*si el estado es ==0 cambiaria a PAGADO Y SE EJECUTARIA TODO LO QUE ESTA ABAJO*/
		if($_POST["est"] == 0){
				$estado = 1;
			

			//declaro $numero_venta, viene via ajax

			$numero_venta=$_POST["numero_venta"];


			$sql="update ventas set 
            
            estado=?
            where 
            id_ventas=?
           
              ";

            // echo $sql; 

            $sql=$conectar->prepare($sql);

            $sql->bindValue(1,$estado);
            $sql->bindValue(2,$_POST["id_ventas"]);
            $sql->execute();

            $resultado= $sql->fetch(PDO::FETCH_ASSOC);


      $sql_detalle= "update detalle_ventas set

          estado=?
          where 
          numero_venta=?
          ";

            $sql_detalle=$conectar->prepare($sql_detalle);

            $sql_detalle->bindValue(1,$estado);
            $sql_detalle->bindValue(2,$numero_venta);
            $sql_detalle->execute();

            $resultado= $sql_detalle->fetch(PDO::FETCH_ASSOC);



            /*una vez se cambie de estado a ACTIVO entonces actualizamos la cantidad de stock en productos*/


            //INICIO CONSULTA EN DETALLE DE VENTAS Y VENTAS

          $sql2="select * from detalle_ventas where numero_venta=?";

          $sql2=$conectar->prepare($sql2);

         
            $sql2->bindValue(1,$numero_venta);
            $sql2->execute();

            $resultado=$sql2->fetchAll();

              foreach($resultado as $row){

                 $id_producto=$output["id_producto"]=$row["id_producto"];
                //selecciona la cantidad vendida
                $cantidad_venta=$output["cantidad_venta"]=$row["cantidad_venta"];



                
                 //si el id_producto existe entonces que consulte si la cantidad de productos existe en la tabla producto

                  if(isset($id_producto)==true and count($id_producto)>0){
                      
                      $sql3="select * from producto where id_producto=?";

                      $sql3=$conectar->prepare($sql3);

                      $sql3->bindValue(1, $id_producto);
                      $sql3->execute();

                      $resultado=$sql3->fetchAll();

                         foreach($resultado as $row2){
                           
                           //este es la cantidad de stock para cada producto
                           $stock=$output2["stock"]=$row2["stock"];
                           
                           //esta debe estar dentro del foreach para que recorra el $stock de los productos, ya que es mas de un producto que está asociado a la venta
                           //cuando das click a estado pasa a PAGADO Y RESTA la cantidad de stock con la cantidad de venta
                           $cantidad_actual= $stock - $cantidad_venta;

                         }
                  }

               
                //LE ACTUALIZO LA CANTIDAD DEL PRODUCTO 

               $sql6="update producto set 
               stock=?
               where

               id_producto=?

               ";
               
               $sql6=$conectar->prepare($sql6);   
               
               $sql6->bindValue(1,$cantidad_actual);
               $sql6->bindValue(2,$id_producto);

               $sql6->execute();


              }//cierre del foreach

          }//cierre del if del estado

          else {

          	  /*si el estado es igual a 0, entonces pasaria a ANULADO y reverteria de nuevo la cantidad de productos al stock*/

          	  if($_POST["est"] == 1){
				$estado = 0;

			//declaro $numero_venta, viene via ajax

			$numero_venta=$_POST["numero_venta"];


			$sql="update ventas set 
            
            estado=?
            where 
            id_ventas=?
           
              ";

            // echo $sql; 

            $sql=$conectar->prepare($sql);

            $sql->bindValue(1,$estado);
            $sql->bindValue(2,$_POST["id_ventas"]);
            $sql->execute();

            $resultado= $sql->fetch(PDO::FETCH_ASSOC);


      $sql_detalle= "update detalle_ventas set

          estado=?
          where 
          numero_venta=?
          ";

            $sql_detalle=$conectar->prepare($sql_detalle);

            $sql_detalle->bindValue(1,$estado);
            $sql_detalle->bindValue(2,$numero_venta);
            $sql_detalle->execute();

            $resultado= $sql_detalle->fetch(PDO::FETCH_ASSOC);



            /*una vez se cambie de estado a ACTIVO entonces revertimos la cantidad de stock en productos*/


            //INICIO REVERTIR LA CANTIDAD DE PRODUCTOS VENDIDOS EN EL STOCK

          $sql2="select * from detalle_ventas where numero_venta=?";

          $sql2=$conectar->prepare($sql2);

         
            $sql2->bindValue(1,$numero_venta);
            $sql2->execute();

            $resultado=$sql2->fetchAll();

              foreach($resultado as $row){

                 $id_producto=$output["id_producto"]=$row["id_producto"];
                //selecciona la cantidad vendida
                $cantidad_venta=$output["cantidad_venta"]=$row["cantidad_venta"];



                
                 //si el id_producto existe entonces que consulte si la cantidad de productos existe en la tabla producto

                  if(isset($id_producto)==true and count($id_producto)>0){
                      
                      $sql3="select * from producto where id_producto=?";

                      $sql3=$conectar->prepare($sql3);

                      $sql3->bindValue(1, $id_producto);
                      $sql3->execute();

                      $resultado=$sql3->fetchAll();

                         foreach($resultado as $row2){
                           
                           //este es la cantidad de stock para cada producto
                           $stock=$output2["stock"]=$row2["stock"];
                           
                           //esta debe estar dentro del foreach para que recorra el $stock de los productos, ya que es mas de un producto que está asociado a la venta
                      //cuando le da click al estado pasa de PAGADO A ANULADO y SUMA la cantidad de stock en productos con la cantidad de venta de detalle_ventas, aumentando de esta manera la cantidad actual de productos en el stock de productos
                           $cantidad_actual= $stock + $cantidad_venta;

                         }
                  }

               
                //LE ACTUALIZO LA CANTIDAD DEL PRODUCTO 

               $sql6="update producto set 
               stock=?
               where

               id_producto=?

               ";
               
               $sql6=$conectar->prepare($sql6);   
               
               $sql6->bindValue(1,$cantidad_actual);
               $sql6->bindValue(2,$id_producto);

               $sql6->execute();

             

              }//cierre del foreach



			   }//cierre del if del estado del else


          }


		}//CIERRE DEL METODO



		//BUSCA REGISTROS VENTAS-FECHA

  public function lista_busca_registros_fecha($fecha_inicial, $fecha_final){

                $conectar= parent::conexion();

		        $date_inicial = $_POST["fecha_inicial"];
		        $date = str_replace('/', '-', $date_inicial);
		        $fecha_inicial = date("Y-m-d", strtotime($date));

	            $date_final = $_POST["fecha_final"];
	            $date = str_replace('/', '-', $date_final);
	            $fecha_final = date("Y-m-d", strtotime($date));

       
         
      $sql= "SELECT * FROM ventas WHERE fecha_venta>=? and fecha_venta<=? ";


            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$fecha_inicial);
            $sql->bindValue(2,$fecha_final);
            $sql->execute();
            return $result = $sql->fetchAll(PDO::FETCH_ASSOC);

       }

        //BUSCA REGISTROS VENTAS-FECHA-MES

        public function lista_busca_registros_fecha_mes($mes, $ano){

          $conectar= parent::conexion();


          //variables que vienen por POST VIA AJAX
             $mes=$_POST["mes"];
             $ano=$_POST["ano"];
            
      
            
           $fecha= ($ano."-".$mes."%");

           //la consulta debe hacerse asi para seleccionar el mes/ano

           /*importante: explicacion de cuando se pone el like y % en una consulta: like sirve para buscar una palabra en especifica dentro de la columna, por ejemplo buscar 09 dentro de 2017-09-04. Los %% se ocupan para indicar en que parte se quiere buscar, si se pone like '%queBusco' significa que lo buscas al final de una cadena, si pones 'queBusco%' significa que se busca al principio de la cadena y si pones '%queBusco%' significa que lo busca en medio, asi la imprimo la consulta en phpmyadmin SELECT * FROM ventas WHERE fecha_venta like '2017-09%'*/

      
          $sql= "SELECT * FROM ventas WHERE fecha_venta like ? ";

            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$fecha);
            $sql->execute();
            return $result = $sql->fetchAll(PDO::FETCH_ASSOC);


        }

       public function get_ventas_diarias(){

        $conectar= parent::conexion();
        parent::set_names();

        $sql="select*from ventas where fecha_venta=current_date";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        
      }

         
           public function get_ventas_por_id_paciente($id_paciente){

           $conectar= parent::conexion();

     
            $sql="select * from ventas where id_paciente=?";

            $sql=$conectar->prepare($sql);

            $sql->bindValue(1, $id_paciente);
            $sql->execute();

            return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);


    }


       public function get_detalle_ventas_por_id_paciente($id_paciente){

        $conectar= parent::conexion();

       
        $sql="select * from detalle_ventas where id_paciente=?";

              $sql=$conectar->prepare($sql);

              $sql->bindValue(1, $id_paciente);
              $sql->execute();

              return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);


      }


         public function get_ventas_por_id_usuario($id_usuario){

           $conectar= parent::conexion();

     
           $sql="select * from ventas where id_usuario=?";

            $sql=$conectar->prepare($sql);

            $sql->bindValue(1, $id_usuario);
            $sql->execute();

            return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);


      }

         public function get_detalle_ventas_por_id_usuario($id_usuario){

           $conectar= parent::conexion();

     
           $sql="select * from detalle_ventas where id_usuario=?";

            $sql=$conectar->prepare($sql);

            $sql->bindValue(1, $id_usuario);
            $sql->execute();

            return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);


      }


           /*REPORTE VENTAS*/

        public function get_ventas_reporte_general(){

       $conectar=parent::conexion();
       parent::set_names();


      $sql="SELECT MONTHname(fecha_venta) as mes, MONTH(fecha_venta) as numero_mes, YEAR(fecha_venta) as ano, SUM(total) as total_venta, moneda
        FROM ventas where estado='1' GROUP BY YEAR(fecha_venta) desc, month(fecha_venta) desc";

      
         $sql=$conectar->prepare($sql);

         $sql->execute();
         return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

     }
     
     //suma el total de ventas por año

     public function suma_ventas_total_ano(){

      $conectar=parent::conexion();


       $sql="SELECT YEAR(fecha_venta) as ano,SUM(total) as total_venta_ano FROM ventas where estado='1' GROUP BY YEAR(fecha_venta) desc";
           
           $sql=$conectar->prepare($sql);
           $sql->execute();

           return $resultado= $sql->fetchAll();


     }

     //recorro el array para traerme la lista de una en vez de traerlo con el return, y hago el formato para la grafica
     //suma total por año 
     public function suma_ventas_total_grafica(){

      $conectar=parent::conexion();


       $sql="SELECT YEAR(fecha_venta) as ano,SUM(total) as total_venta_ano FROM ventas where estado='1' GROUP BY YEAR(fecha_venta) desc";
           
           $sql=$conectar->prepare($sql);
           $sql->execute();

           $resultado= $sql->fetchAll();
             
             //recorro el array y lo imprimo
           foreach($resultado as $row){

                 $ano= $output["ano"]=$row["ano"];
                 $p = $output["total_venta_ano"]=$row["total_venta_ano"];

            echo $grafica= "{name:'".$ano."', y:".$p."},";

           }


     }


       public function suma_ventas_cancelada_total_grafica(){

      $conectar=parent::conexion();


       $sql="SELECT YEAR(fecha_venta) as ano,SUM(total) as total_venta_ano FROM ventas where estado='0' GROUP BY YEAR(fecha_venta) desc";
           
           $sql=$conectar->prepare($sql);
           $sql->execute();

           $resultado= $sql->fetchAll();
             
             //recorro el array y lo imprimo
           foreach($resultado as $row){

                 $ano= $output["ano"]=$row["ano"];
                 $p = $output["total_venta_ano"]=$row["total_venta_ano"];

         echo $grafica= "{name:'".$ano."', y:".$p."},";

           }


     }


     public function suma_ventas_anio_mes_grafica($fecha){

      $conectar=parent::conexion();
      parent::set_names();

      //se usa para traducir el mes en la grafica
       //imprime la fecha por separado ejemplo: dia, mes y año
          $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        

       //SI EXISTE EL ENVIO POST ENTONCES SE MUESTRA LA FECHA SELECCIONADA
        if(isset($_POST["year"])){

          $fecha=$_POST["year"];

    $sql="SELECT YEAR(fecha_venta) as ano, MONTHname(fecha_venta) as mes, SUM(total) as total_venta_mes FROM ventas WHERE YEAR(fecha_venta)=? and estado ='1' GROUP BY MONTHname(fecha_venta) desc";
           
           $sql=$conectar->prepare($sql);
           $sql->bindValue(1,$fecha);
           $sql->execute();

           $resultado= $sql->fetchAll();
             
             //recorro el array y lo imprimo
           foreach($resultado as $row){

                 $ano= $output["mes"]=$meses[date("n", strtotime($row["mes"]))-1];
                 $p = $output["total_venta_mes"]=$row["total_venta_mes"];

         echo $grafica= "{name:'".$ano."', y:".$p."},";

           }


         } else {


//sino se envia el POST, entonces se mostraria los datos del año actual cuando se abra la pagina por primera vez

          $fecha_inicial=date("Y");


   $sql="SELECT YEAR(fecha_venta) as ano, MONTHname(fecha_venta) as mes, SUM(total) as total_venta_mes FROM ventas WHERE YEAR(fecha_venta)=? and estado ='1' GROUP BY MONTHname(fecha_venta) desc";
           
           $sql=$conectar->prepare($sql);
           $sql->bindValue(1,$fecha_inicial);
           $sql->execute();

           $resultado= $sql->fetchAll();
             
             //recorro el array y lo imprimo
           foreach($resultado as $row){

                 $ano= $output["mes"]=$meses[date("n", strtotime($row["mes"]))-1];
                 $p = $output["total_venta_mes"]=$row["total_venta_mes"];

         echo $grafica= "{name:'".$ano."', y:".$p."},";

           }//cierre del foreach


         }//cierre del else


     }

      public function get_year_ventas(){

        $conectar=parent::conexion();

          $sql="select year(fecha_venta) as fecha from ventas group by year(fecha_venta) asc";
          

          $sql=$conectar->prepare($sql);
          $sql->execute();
          return $resultado= $sql->fetchAll();


     }


      public function get_ventas_mensual($fecha){


        $conectar=parent::conexion();
      
      if(isset($_POST["year"])){

          $fecha=$_POST["year"];

        $sql="select MONTHname(fecha_venta) as mes, MONTH(fecha_venta) as numero_mes, YEAR(fecha_venta) as ano, SUM(total) as total_venta, moneda
        from ventas where YEAR(fecha_venta)=? and estado='1' group by MONTHname(fecha_venta) desc";
          

          $sql=$conectar->prepare($sql);
          $sql->bindValue(1,$fecha);
          $sql->execute();
          return $resultado= $sql->fetchAll();



        } else {

          //sino se envia el POST, entonces se mostraria los datos del año actual cuando se abra la pagina por primera vez

          $fecha_inicial=date("Y");

             $sql="select MONTHname(fecha_venta) as mes, MONTH(fecha_venta) as numero_mes, YEAR(fecha_venta) as ano, SUM(total) as total_venta, moneda
        from ventas where YEAR(fecha_venta)=? and estado='1' group by MONTHname(fecha_venta) desc";
          

         $sql=$conectar->prepare($sql);
          $sql->bindValue(1,$fecha_inicial);
          $sql->execute();
            return $resultado= $sql->fetchAll();



        }
     }



       public function get_venta_por_fecha($cedula,$fecha_inicial,$fecha_final){

        $conectar=parent::conexion();
        parent::set_names();
            
          
            $date_inicial = $_POST["datepicker"];
            $date = str_replace('/', '-', $date_inicial);
            $fecha_inicial = date("Y-m-d", strtotime($date));

          
            $date_final = $_POST["datepicker2"];
            $date = str_replace('/', '-', $date_final);
            $fecha_final = date("Y-m-d", strtotime($date));


        $sql="select * from detalle_ventas where cedula_paciente=? and fecha_venta>=? and fecha_venta<=? and estado='1';";

    
        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$cedula);
        $sql->bindValue(2,$fecha_inicial);
        $sql->bindValue(3,$fecha_final);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


      public function get_ventas_anio_actual(){

        $conectar=parent::conexion();
        parent::set_names();

        $sql="SELECT YEAR(fecha_venta) as ano, MONTHname(fecha_venta) as mes, SUM(total) as total_venta_mes, moneda FROM ventas WHERE YEAR(fecha_venta)=YEAR(CURDATE()) and estado='1' GROUP BY MONTHname(fecha_venta) desc";

        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

    public function get_ventas_anio_actual_grafica(){

       $conectar=parent::conexion();
       parent::set_names();

        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
       
       $sql="SELECT  MONTHname(fecha_venta) as mes, SUM(total) as total_venta_mes FROM ventas WHERE YEAR(fecha_venta)=YEAR(CURDATE()) and estado='1' GROUP BY MONTHname(fecha_venta) desc";
           
           $sql=$conectar->prepare($sql);
           $sql->execute();

           $resultado= $sql->fetchAll();
             
             //recorro el array y lo imprimo
           foreach($resultado as $row){


          $mes= $output["mes"]=$meses[date("n", strtotime($row["mes"]))-1];
          $p = $output["total_venta_mes"]=$row["total_venta_mes"];

         echo $grafica= "{name:'".$mes."', y:".$p."},";

           }
 
    }

        public function get_cant_productos_por_fecha($cedula,$fecha_inicial,$fecha_final){

          $conectar=parent::conexion();
          parent::set_names();

              $date_inicial = $_POST["datepicker"];
              $date = str_replace('/', '-', $date_inicial);
              $fecha_inicial = date("Y-m-d", strtotime($date));

            
              $date_final = $_POST["datepicker2"];
              $date = str_replace('/', '-', $date_final);
              $fecha_final = date("Y-m-d", strtotime($date));


          $sql="select sum(cantidad_venta) as total from detalle_ventas where cedula_paciente=? and fecha_venta >=? and fecha_venta <=? and estado='1';";

      
          $sql=$conectar->prepare($sql);

          $sql->bindValue(1,$cedula);
          $sql->bindValue(2,$fecha_inicial);
          $sql->bindValue(3,$fecha_final);
          $sql->execute();

          return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
      

         } 




   }