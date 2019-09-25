<?php

require_once("../config/conexion.php");


   class Envios extends Conectar{        
   

         public function get_productos_envio(){

          $conectar= parent::conexion();
       
          $sql= "select*from producto where categoria='aros'";

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

          
      public function numeroRequisición(){

        $conectar=parent::conexion();
        parent::set_names();

     
        $sql="select codigo_envio from detalle_envio;";

        $sql=$conectar->prepare($sql);

        $sql->execute();
        $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

           //aqui selecciono solo un campo del array y lo recorro que es el campo numero_venta
           foreach($resultado as $k=>$v){

                     $numero_venta["numero"]=$v["codigo_envio"];

                   
              
                 }
              //luego despues de tener seleccionado el numero_venta digo que si el campo numero_venta està vacio entonces se le asigna un F000001 de lo contrario ira sumando

            

                       if(empty($numero_venta["numero"]))
                    {
                      echo 'E000001';
                    }else
              
                      {
                        $num     = substr($numero_venta["numero"] , 1);
                        $dig     = $num + 1;
                        $fact = str_pad($dig, 6, "0", STR_PAD_LEFT);
                        echo date("y")."-".'E'.$fact;
                        //echo 'F'.$new_cod;
                      } 

           //return $data;
      }



public function agrega_detalle_ingreso(){
       
  //echo json_encode($_POST['arrayCompra']);
  $str = '';
  $detallesE = array();
  $detallesE = json_decode($_POST['arrayIngreso']);
   
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
        
             $sql3="select * from existencias where id_producto=? and id_bodega=?;";
             //echo $sql3;
             
             $sql3=$conectar->prepare($sql3);
             $sql3->bindValue(1,$codProd);
             $sql3->bindValue(2,$sucursal_destino);
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
                 $sql4 = "update existencias set 
                      
                      stock=?
                      where 
                      id_producto=?
                      and
                      id_bodega=?
                 ";
                $sql4 = $conectar->prepare($sql4);
                $sql4->bindValue(1,$cantidad_total);
                $sql4->bindValue(2,$codProd);
                $sql4->bindValue(3,$sucursal_destino);
                $sql4->execute();
               } //cierre la condicional*********FIN DE AGREGA SUDURSAL DESTINO
               ///INICIA UPDATE SUCURSAL ORIGEN
            
            $sql8="select * from existencias where id_producto=? and id_bodega=?;";
             //echo $sql3;
             
             $sql8=$conectar->prepare($sql8);
             $sql8->bindValue(1,$codProd);
             $sql8->bindValue(2,$sucursal_origen);
             $sql8->execute();
             $resultado = $sql8->fetchAll(PDO::FETCH_ASSOC);
                  foreach($resultado as $b=>$row){
                    $re["existencia"] = $row["stock"];
                  }
                //la cantidad total es la suma de la cantidad más la cantidad actual
                $descuenta_producto = $row["stock"]-$cantidad;
             
               //si existe el producto entonces actualiza el stock en producto
              
               if(is_array($resultado)==true and count($resultado)>0) {
                     
                  //actualiza el stock en la tabla producto
                 $sql9 = "update existencias set 
                      
                      stock=?
                      where 
                      id_producto=?
                      and
                      id_bodega=?
                 ";
                $sql9 = $conectar->prepare($sql9);
                $sql9->bindValue(1,$descuenta_producto);
                $sql9->bindValue(2,$codProd);
                $sql9->bindValue(3,$sucursal_origen);
                $sql9->execute();
               }
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


      public function listar_requisiones(){

        $conectar = parent::conexion();
        parent::set_names();

        $sql="select d.id_detalle_envio,d.codigo_envio,d.sucursal_origen,d.sucursal_destino, u.usuario, p.modelo from usuarios as u inner join detalle_envio as d on u.id_usuario=d.id_usuario join producto as p where d.id_producto=p.id_producto;";

        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $resultado=$sql->fetchAll();

      }


}