<?php
  
     //conexión a la base de datos

   require_once("../config/conexion.php");

   class Producto extends Conectar{


       public function get_filas_producto(){

             $conectar= parent::conexion();
           
             $sql="select * from producto";
             
             $sql=$conectar->prepare($sql);

             $sql->execute();

             $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

             return $sql->rowCount();
        
        }

          
      //método para seleccionar registros

      public function get_productos(){

           $conectar= parent::conexion();
       
          $sql= "select*from producto";

           $sql=$conectar->prepare($sql);

           $sql->execute();

           return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

         
         }
      public function get_productos_compra(){

           $conectar= parent::conexion();
       
          $sql= "select*from producto where categoria='aros'";

           $sql=$conectar->prepare($sql);

           $sql->execute();

           return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

         
         }


          //método para seleccionar registros

      public function get_productos_ventas(){

           $conectar= parent::conexion();
       
          $sql= "select* from producto where stock>0;";

           $sql=$conectar->prepare($sql);

           $sql->execute();

           return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

         
         }

  public function get_lentes_ventas(){

    $conectar=parent::conexion();
    parent::set_names();

    $sql="select*from producto where categoria='lentes';";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
  }     

  public function get_ar_ventas(){

    $conectar=parent::conexion();
    parent::set_names();

    $sql="select*from producto where categoria='anti-reflejantes';";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
  }    

  public function get_acc_ventas(){

    $conectar=parent::conexion();
    parent::set_names();

    $sql="select*from producto where categoria='accesorios';";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
  }

    public function get_photo_ventas(){

    $conectar=parent::conexion();
    parent::set_names();

    $sql="select*from producto where categoria='photosensibles';";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
  }

           /*poner la ruta vistas/upload*/
         public function upload_image() {

            if(isset($_FILES["producto_imagen"]))
            {
              $extension = explode('.', $_FILES['producto_imagen']['name']);
              $new_name = rand() . '.' . $extension[1];
              $destination = '../vistas/upload/' . $new_name;
              move_uploaded_file($_FILES['producto_imagen']['tmp_name'], $destination);
              return $new_name;
            }


          }


          //método para insertar registros

        public function registrar_producto($modelo,$marca,$color,$precio_venta,$stock,$id_usuario,$medidas,$categoria,$categoriau,$imagen){


            $conectar=parent::conexion();
            parent::set_names();

            require_once("Productos.php");


            $imagen_producto = new Producto();

                  
            $image = '';
            if($_FILES["producto_imagen"]["name"] != '')
            {
              $image = $imagen_producto->upload_image();
            }
           
            $sql="insert into producto
            values(null,?,?,?,?,?,?,?,?,?,?);";


            $sql=$conectar->prepare($sql);

            $sql->bindValue(1, $_POST["modelo"]);
            $sql->bindValue(2, $_POST["marca"]);
            $sql->bindValue(3, $_POST["color"]);            
            $sql->bindValue(4, $_POST["precio_venta"]);
            $sql->bindValue(5, $_POST["stock"]);
            $sql->bindValue(6, $_POST["id_usuario"]);
            $sql->bindValue(7, $_POST["medidas"]);
            $sql->bindValue(8, $_POST["categoria"]);
            $sql->bindValue(9, $_POST["categoriau"]);
            $sql->bindValue(10, $image);

            $sql->execute();

           

        }


         //obtiene el registro por id despues de editar
        public function get_producto_por_id($id_producto){

          $conectar= parent::conexion();

          //$output = array();

            $sql="select * from producto where id_producto=?";

            $sql=$conectar->prepare($sql);

            $sql->bindValue(1, $id_producto);
            $sql->execute();

            return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);


        }

        public function get_lente_por_id($id_lente){

          $conectar= parent::conexion();

          //$output = array();

            $sql="select * from lentes where id_lente=?";

            $sql=$conectar->prepare($sql);

            $sql->bindValue(1, $id_lente);
            $sql->execute();

            return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);


        }

         /*metodo que valida si hay registros activos*/
        public function get_producto_por_modelo($modelo){

           $conectar= parent::conexion();


            $sql="select * from producto where modelo=?";

            $sql=$conectar->prepare($sql);

            $sql->bindValue(1, $modelo);
            $sql->execute();

            return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);


    }


    //método para editar producto

    public function editar_producto($id_producto,$modelo,$marca,$color,$medidas,$precio_venta,$stock,$id_usuario){

      $conectar=parent::conexion();
      parent::set_names();
                
                $sql="update producto set 
                       modelo=?,
                       marca=?,
                       color=?,
                       precio_venta=?,
                       stock=?,
                       medidas=?,
                       id_usuario=?,
                       categoria=?
                       where 
                       id_producto=?
                ";

                $sql=$conectar->prepare($sql);

                $sql->bindValue(1, $_POST["modelo"]);
                $sql->bindValue(2, $_POST["marca"]);
                $sql->bindValue(3, $_POST["color"]);
                $sql->bindValue(4, $_POST["precio_venta"]);
                $sql->bindValue(5, $_POST["stock"]);
                $sql->bindValue(6, $_POST["medidas"]);
                $sql->bindValue(7, $_POST["id_usuario"]);
                $sql->bindValue(8, $_POST["categoria"]);
                $sql->bindValue(9, $_POST["id_producto"]);
                $sql->execute();




    }
      
        //método para activar Y/0 desactivar el estado del producto

             public function editar_estado($id_producto,$estado){

              $conectar=parent::conexion();
              parent::set_names();
                    
              //si estado es igual a 0 entonces lo cambia a 1
              //el parametro est viene por via ajax, viene de est:est
              $estado = 0;
              if($_POST["est"] == 0){
                $estado = 1;
              }


              $sql="update producto set 
                    
                    estado=?
                    where 
                    id_producto=?
                      ";

                    $sql=$conectar->prepare($sql);

                    $sql->bindValue(1, $estado);
                    $sql->bindValue(2, $id_producto);
                    $sql->execute();

                   
          }


          public function valida_ingreso($modelo,$color,$medidas){

              $conectar=parent::conexion();

              $sql= "select*from producto where 
              modelo=? and color=? and medidas=?";

              $sql=$conectar->prepare($sql);

              $sql->bindValue(1, $modelo);
              $sql->bindValue(2, $color);
              $sql->bindValue(3, $medidas);
              $sql->execute();
              return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }


        //editar estado del producto por categoria

    public function editar_estado_producto_por_categoria($id_categoria,$estado){

      $conectar=parent::conexion();
      parent::set_names();
            
            //si estado es igual a 0 entonces lo cambia a 1
      $estado = 0;
      //el parametro est se envia por via ajax, viene del $est:est
      if($_POST["est"] == 0){
        $estado = 1;
      }


      $sql="update producto set 
            
            estado=?
            where 
            id_categoria=?
              ";

            $sql=$conectar->prepare($sql);

            $sql->bindValue(1, $estado);
            $sql->bindValue(2, $id_categoria);
            $sql->execute();

            
    }


       //editar estado de la categoria por producto

        public function editar_estado_categoria_por_producto($id_categoria,$estado){

          $conectar=parent::conexion();
          parent::set_names();
          

             //si es inactivo entonces la categoria pasa a activo
          if($_POST["est"] == 0){



            $sql="update categoria set 
                
                estado=?
                where 
                id_categoria=?
                  ";

                $sql=$conectar->prepare($sql);

                $sql->bindValue(1, 1);
                $sql->bindValue(2, $id_categoria);
                $sql->execute();

               

           }

          
    }

    //metodo para consultar si la tabla productos tiene registros asociados con categorias
    public function get_prod_por_id_cat($id_categoria){

      $conectar= parent::conexion();

      //$output = array();

      $sql="select * from producto where id_categoria=?";

            $sql=$conectar->prepare($sql);

            $sql->bindValue(1, $id_categoria);
            $sql->execute();

            return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

          
          }


                 //consulta si el id del producto con tiene un detalle_compra asociado
    public function get_producto_por_id_detalle_compra($id_producto){

             
             $conectar=parent::conexion();
             parent::set_names();


      $sql="select p.id_producto,p.modelo,c.id_producto, c.modelo as modelo_compra from producto p INNER JOIN detalle_compras c ON p.id_producto=c.id_producto where p.id_producto=?;

              ";

             $sql=$conectar->prepare($sql);
             $sql->bindValue(1,$id_producto);
             $sql->execute();

             return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

      }


       //consulta si el id del producto con tiene un detalle_venta asociado
    public function get_producto_por_id_detalle_venta($id_producto){

             
             $conectar=parent::conexion();
             parent::set_names();



              $sql="select p.id_producto,p.producto, v.id_producto, v.producto as producto_ventas
                 
           from producto p 
              
              INNER JOIN detalle_ventas v ON p.id_producto=v.id_producto

              where p.id_producto=?

              ";

             $sql=$conectar->prepare($sql);
             $sql->bindValue(1,$id_producto);
             $sql->execute();

             return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

      }

        public function eliminar_producto($id_producto){

        $conectar=parent::conexion();

              $sql="delete from producto where id_producto=?";

              $sql=$conectar->prepare($sql);

              $sql->bindValue(1, $id_producto);
              $sql->execute();

              return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
      }

        
        public function get_producto_por_id_usuario($id_usuario){

        $conectar= parent::conexion();

        //$output = array();

        $sql="select * from producto where id_usuario=?";

              $sql=$conectar->prepare($sql);

              $sql->bindValue(1, $id_usuario);
              $sql->execute();

              return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);


      }

//verificamos si existe el producto en bodega

public function get_producto_por_id_suscursal($id_producto, $sucursal)
{

  $conectar= parent::conexion();
  $sql="select * from existencias where id_producto=? and bodega=?";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1, $id_producto);
  $sql->bindValue(2, $sucursal);
  $sql->execute();

  //echo $sql;
  return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}


public function agrega_detalle_existencia(){

  $str = '';
  $detalles = array();
  $detalles = json_decode($_POST['arrayIngreso']);


   
   $conectar=parent::conexion();


  foreach ($detalles as $k => $v) {
    $modelo = $v->modelo;
    $cantidad = $v->cantidad;
    $codProd = $v->codProd;

    $sucursal = $_POST["sucursal"];
    $id_producto = $_POST["id_producto"];
    //$id_usuario = $_POST["id_usuario"];
       
    $sql3="select * from existencias where id_producto=? and bodega=?;";

             //echo $sql3;
             
             $sql3=$conectar->prepare($sql3);

             $sql3->bindValue(1,$codProd);
             $sql3->bindValue(2,$sucursal);
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
                      id_producto=? and bodega=?
                 ";


                $sql4 = $conectar->prepare($sql4);
                $sql4->bindValue(1,$cantidad_total);
                $sql4->bindValue(2,$codProd);
                $sql4->bindValue(3,$sucursal);
                $sql4->execute();

               } //cierre la condicional


       }
}

public function insert_bodega(){

  $str = '';
  $detalles = array();
  $detalles = json_decode($_POST['arrayIngreso']);


   
   $conectar=parent::conexion();


  foreach ($detalles as $k => $v) {
    $modelo = $v->modelo;
    $cantidad = $v->cantidad;
    $ubicacionu = $v->ubicacionu;
    $codProd = $v->codProd;


    $sucursal = $_POST["sucursal"];
    $id_producto = $_POST["id_producto"];
    //$id_usuario = $_POST["id_usuario"];
       
        $sql="insert existencias
        values(null,?,?,?,?);";


        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$codProd);
        $sql->bindValue(2,$cantidad);
        $sql->bindValue(3,$sucursal);
        $sql->bindValue(4,$ubicacionu);
        $sql->execute();


       }//cierre foreach
      }

public function agrega_detalle_warehouse(){

  $str = '';
  $detalles = array();
  $detalles = json_decode($_POST['arrayIngreso']);


   
   $conectar=parent::conexion();


  foreach ($detalles as $k => $v) {
    $modelo = $v->modelo;
    $cantidad = $v->cantidad;
    $ubicacionu = $v->ubicacionu;
    $codProd = $v->codProd;
    $sucursal = $_POST["sucursal"];
    //$id_producto = $_POST["id_producto"];
    //$id_usuario = $_POST["id_usuario"];

        
      $sql3="select * from existencias where id_producto=? and bodega=?;";

      $sql3=$conectar->prepare($sql3);
      $sql3->bindValue(1,$codProd);
      $sql3->bindValue(2,$sucursal);
      $sql3->execute();
      $resultado = $sql3->fetchAll(PDO::FETCH_ASSOC);
      
      if(is_array($resultado)==true and count($resultado)>0){

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
        id_producto=? and bodega=?
      ";
      $sql4 = $conectar->prepare($sql4);
      $sql4->bindValue(1,$cantidad_total);
      $sql4->bindValue(2,$codProd);
      $sql4->bindValue(3,$sucursal);
      $sql4->execute();
      }

    }else{

     $sql="insert into existencias values (null,?,?,?,?);";


        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$codProd);
        $sql->bindValue(2,$cantidad);
        $sql->bindValue(3,$sucursal);
        $sql->bindValue(4,$ubicacionu);
        $sql->execute();
    } //cierre la condicional
  }//cierre del foreach
}//cierre del la funcion


public function get_existencias(){

  $conectar= parent::conexion();
       
  $sql= "select p.modelo, p.marca,p.medidas,p.color, e.stock,e.bodega from producto as p inner join existencias as e on p.id_producto=e.id_producto;
";

      $sql=$conectar->prepare($sql);

      $sql->execute();

      return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

         
      }



}

?>
