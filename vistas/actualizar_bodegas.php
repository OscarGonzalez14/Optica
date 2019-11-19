
<?php

 require_once("../config/conexion.php");

    if(isset($_SESSION["id_usuario"])){

     require_once("../modelos/Compras.php");
     require_once("../modelos/Categorias.php");
     require_once("../modelos/Usuarios.php");
     
      $compra = new Compras();
      $categoria = new Categoria();

      $cat = $categoria->get_categorias();
      $bodegas = $categoria->get_bodegas();

      //BODEGAS

   
    
?>


<!-- INICIO DEL HEADER - LIBRERIAS -->
<?php require_once("header.php");?>

<!-- FIN DEL HEADER - LIBRERIAS -->



  <?php if($_SESSION["compras"]==1)
     {

     ?>
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

        <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
             
             <div id="resultados_ajax"></div>

             <h2>Actualizar Bodegas</h2>

            <div class="row">
              <div class="col-md-12">
                <div class="box">
                  <div class="box-header with-border">
                    <h1 class="box-title">
            
            <button class="btn btn-dark" id="add_button" onclick="limpiar()" data-toggle="modal" data-target="#lista_productosModal"><i class="fa fa-plus" aria-hidden="true"></i> Ingresar Producto a Bodega  - Envio de Productos</button></h1>




<form class="form-horizontal" id="form_compra">             
        

<div class="panel-body table-responsive">
       
    <div class="row">

        <div class="col-sm-4">
            <label>Fecha de Ingreso: </label>
            <strong><span data-toggle="tooltip" id="date" class="badge bg-blue"></span></strong>
        </div>



        <div class="col-sm-2"><label>Usuario: </label>
              <span data-toggle="tooltip" class="badge bg-blue" id="comprador" name="comprador"><?php echo $_SESSION["usuario"];?></h4>
        </div>
  

        <div class="col-sm-2">
            <label></label>
            <input type="hidden" class="form-control" id="numero_compra" name="numero_compra" value="<?php $codigo=$compra->numero_compra(); ?>" readonly>
        </div>

                <div class="col-sm-4">
                  

                    <select class="form-control" name="bodega" id="bodega" required>

                      <option  value="">Seleccione una Bodega</option>

                        <?php

                           for($i=0; $i<sizeof($bodegas);$i++){
                             
                             ?>
                              <option value="<?php echo $bodegas[$i]["id_bodega"]?>"><?php echo $bodegas[$i]["nombre"];?></option>
                             <?php
                           }
                        ?>
                      
                    </select>

              </div>



   </div><!--fin row-->

          <table id="detalles" class="table table-bordered">
                <thead>

                 <tr>                  
                
                  <th>Item</th>
                  <th>Modelo</th>
                  <th>Marca</th>
                  <th>color</th>
                  <th>Stock</th>
                  <th>Cantidad a Agregar</th>

                  </tr>

                </thead>

                 <tbody id="listProdCompras">
                  
                </tbody>

 <input type="hidden" name="grabar" value="si">
                  <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>      
              </table>
              <div class="boton_registrar">
               <button type="button" onClick="registrarCompra()" class="btn btn-edit col-lg-offset-10 col-xs-offset-3" id="btn"><i class="fa fa-save" aria-hidden="true"></i>  Registrar Ingreso</button>
      </form><!--FIN DEL FORMULARIO-->          
              </div>
                    </div><!--Fin PAnel Body-->
                  
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
 <script>
n =  new Date();
//Año
y = n.getFullYear();
//Mes
m = n.getMonth() + 1;
//Día
d = n.getDate();

h=n.getHours()+":"+n.getMinutes()+":"+n.getSeconds();

//Lo ordenas a gusto.
document.getElementById("date").innerHTML = d + "/" + m + "/" + y;
 </script>

 <script>
  /*$('body').on('click', '.deleteDep', function() {
   $(this).parents('tr').remove();  
});*/

  $(document).on('click', '.deleteDep', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});
</script>
  
  <!--FIN DE CONTENIDO-->

       <!--VISTA MODAL PARA AGREGAR PROVEEDOR-->
    <?php require_once("modal/lista_proveedores_modal.php");?>
    <!--VISTA MODAL PARA AGREGAR PROVEEDOR-->
    
     <!--VISTA MODAL PARA AGREGAR PRODUCTO-->
    <?php require_once("modal/lista_productos_modal.php");?>


   
  <?php  } else {

       require("noacceso.php");
  }
  
   
  ?><!--CIERRE DE SESSION DE PERMISO -->

   <?php require_once("footer.php");?>


   
    <!--AJAX PROVEEDORES-->
<script type="text/javascript" src="js/envios.js"></script>

   <!--AJAX PRODUCTOS-->
<script type="text/javascript" src="js/productos.js"></script>


<?php
   
  } else {

         header("Location:".Conectar::ruta()."vistas/index.php");

     }

?>

