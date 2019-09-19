<?php

require_once("../config/conexion.php");


   class Envios extends Conectar{        
   

         public function get_productos_envio(){

          $conectar= parent::conexion();
       
          $sql= "select*from producto";

          $sql=$conectar->prepare($sql);

          $sql->execute();

           return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

         
         }


         //obtiene el registro por id despues de editar
        public function get_producto_por_id($id_producto){

          $conectar= parent::conexion();

          //$output = array();

            $sql="select * from producto where id_producto=?";

            $sql=$conectar->prepare($sql);

            $sql->bindValue(1,$id_producto);
            $sql->execute();

            return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);


        }

public function agrega_detalle_envios(){

       
  //echo json_encode($_POST['arrayCompra']);
  $str = '';
  $detallesE = array();
  $detallesE = json_decode($_POST['arrayEnvio']);


   
   $conectar=parent::conexion();


  foreach ($detallesE as $k => $v) {
  
    //IMPORTANTE:estas variables son del array detalles
    $cantidad = $v->cantidad;
    $codProd = $v->codProd;
    //$codCat = $v->codCat;
    $modelo = $v->modelo;
    $marca = $v->marca;
    $color = $v->color;
    //$descripcion = $v->descripcion; 

     $sucursal_origen = $_POST["sucursal_origen"];
     $sucursal_destino = $_POST["sucursal_destino"];
     $numero_envio = $_POST["numero_envio"];
     $id_usuario = $_POST["id_usuario"];
     //$id_proveedor = $_POST["id_proveedor"];

        $sql="insert into detalle_envio
        values(null,?,?,?,?,CURRENT_TIMESTAMP,?,?,?);";


        $sql=$conectar->prepare($sql);


        $sql->bindValue(1,$numero_envio);
        $sql->bindValue(2,$codProd);
        $sql->bindValue(3,$modelo);
        $sql->bindValue(4,$cantidad);
        $sql->bindValue(5,$sucursal_origen);
        $sql->bindValue(6,$sucursal_destino);
        $sql->bindValue(7,$id_usuario);
        //$sql->bindValue(6,$categoria);

       
        $sql->execute();

        
             $sql3="select * from producto where id_producto=?;";

             //echo $sql3;
             
             $sql3=$conectar->prepare($sql3);

             $sql3->bindValue(1,$codProd);
             $sql3->execute();

             $resultado = $sql3->fetchAll(PDO::FETCH_ASSOC);

                  foreach($resultado as $b=>$row){

                    $re["existencia"] = $row["stock"];

                  }

                //la cantidad total es la suma de la cantidad más la cantidad actual
                $cantidad_total = $cantidad + $row["stock"];

             
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



           /*$sql2="insert into compras 
           values(null,now(),?,?,?,?,?,?,?,?,?,?,?,?);";


           $sql2=$conectar->prepare($sql2);
           
      
           $sql2->bindValue(1,$numero_compra);
           $sql2->bindValue(2,$proveedor);
           $sql2->bindValue(3,$cedula_proveedor);
           $sql2->bindValue(4,$comprador);
           $sql2->bindValue(5,$moneda);
           $sql2->bindValue(6,$subtotal);
           $sql2->bindValue(7,$total_iva);
           $sql2->bindValue(8,$total);
           $sql2->bindValue(9,$tipo_pago);
           $sql2->bindValue(10,$estado);
           $sql2->bindValue(11,$id_usuario);
           $sql2->bindValue(12,$id_proveedor);
          
           $sql2->execute();*/



      }


}