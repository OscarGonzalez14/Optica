<?php

   require_once("../config/conexion.php");

    if(isset($_SESSION["id_usuario"])){

       require_once("../modelos/Categorias.php");

       $categoria = new Categoria();

       $cat = $categoria->get_categorias();
       
       
?>



<?php 
  require_once("header.php");
?>


    <?php if($_SESSION["productos"]==1)
     {

     ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#agregar').click(function() {
            // Recargo la página
            location.reload();
        });
    });
</script>
  <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
    <section class="content">            
    <div id="resultados_ajax"></div>

<?php require_once("modal/agregar_lentes.php");?>
<?php require_once("modal/agregar_accesorios.php");?>
<?php require_once("modal/agregar_ar.php");?>
<?php require_once("modal/agregar_photo.php");?> 
<?php require_once("modal/orden_envio.php");?> 

             <h2 align="center">INVENTARIO</h2>

            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
              <div class="col-sm-1">
                
              </div>
              <h3 class="box-title">
              <button class="btn btn-dark btn-md" id="add_button" data-toggle="modal" data-target="#productoModal"><span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span> Crear Aros</button></h3>
              <!--Boton Agregar Lentes-->
              <h3 class="box-title">
              <button class="btn btn-blue btn-md" data-toggle="modal" data-target="#agregarLentes"><span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span> Crear Lentes</button></h3>
              <!--Boton Agregar Accesorios-->
              <h3 class="box-title">
            <button class="btn btn-dark btn-md" data-toggle="modal" data-target="#agregarAccesorio"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Crear Accesorios</button></h3>
            
            <h3 class="box-title">
            <button class="btn btn-blue btn-md" data-toggle="modal" data-target="#agregarAR"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Crear AR</button></h3>

            <button class="btn btn-dark btn-md" data-toggle="modal" data-target="#agregar_photo"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Crear Photosensible</button></h3>

            <a href="envios.php"><button class="btn btn-dark btn-md" id="add_button" id="add_button" data-toggle="modal" data-target="#orden_envio"><span class="glyphicon glyphicon-share-alt"></span> Envios</button></h1></a>

              <a href="ingresos.php"><button class="btn btn-edit btn-md" id="add_button" onclick="limpiar()" data-toggle="modal" data-target="#productoModal"><span class="glyphicon glyphicon-import" aria-hidden="true"></span> Ingresos a Inventario</button></h1></a>

      <a href="envios.php"><button class="btn btn-dark btn-md" id="add_button" id="add_button" data-toggle="modal" data-target="#orden_envio"><span class="glyphicon glyphicon-share-alt"></span> Envios</button></h1></a>              

                        <div class="box-tools pull-right">

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive">
                          
                          <table id="producto_data" class="table table-bordered table-striped">

                            <thead>
                              
                                <tr>
                                  
                                <th width="10%">Modelo</th>
                                <th width="12%">Marca</th>
                                <th width="10%">Color</th>
                                <th width="5%">Precio de Venta</th>
                                <th width="10%">Stock</th>
                                <th width="10%">Medidas</th>
                                
                               
                                <th width="10%">Editar</th>
                                <th width="10%">Eliminar</th>
                                



                                </tr>
                            </thead>

                            <tbody>
                              

                            </tbody>


                          </table>
                     
                    </div>
                  
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
    
 <!--FORMULARIO VENTANA MODAL-->
<div class="modal fade" id="productoModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Agregar Aros</h4>
        </div>
        <div class="modal-body">

    <form class="form-horizontal" method="post" id="producto_form" enctype="multipart/form-data">
    <div class="form-group row">
     
      <div class="col-xs-4">
        <label for="ex1">Marca</label>
        <input class="form-control" id="marca" name="marca" type="text" placeholder="marca" required>
      </div>
      <div class="col-xs-4">
        <label for="ex3">Modelo</label>
        <input class="form-control" id="modelo" type="text" name="modelo" placeholder="modelo">
      </div>

      <div class="col-xs-4">
        <label for="ex2">Color</label>
        <input class="form-control" id="color" type="text" name="color" placeholder="Color">
      </div>

      <div class="col-xs-4">
        <label for="ex3">Medidas</label>
        <input class="form-control" id="medidas" type="text" name="medidas" placeholder="medidas" required>
      </div>

      <div class="col-xs-4">
        <label for="ex3">Precio</label>
        <input class="form-control" id="precio_venta" type="text" name="precio_venta" placeholder="Precio">
      </div>

      <div class="col-xs-4">
        <label for="ex3">Stock Inicial</label>
        <input class="form-control" id="stock" type="text" name="stock" value="0" placeholder="0">
      </div>

     </div>
    <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>
    <input type="hidden" name="id_producto" id="id_producto"/>
        <input type="hidden" name="categoria" id="categoria" value="aros"/>

    <button type="submit" id="agregar" name="agregar" class="btn btn-blue btn-block"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
Guardar</button>
  </form>

  </div>
        <div class="modal-footer">
          <button class="btn btn-dark" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
 <!--FIN FORMULARIO VENTANA MODAL-->
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


  
  <?php  } else {

       require_once("noacceso.php");
  }
   
  ?><!--CIERRE DE SESSION DE PERMISO -->


<?php

  require_once("footer.php");
?>

<script type="text/javascript" src="js/productos.js"></script>



<?php
   
  } else {

        header("Location:".Conectar::ruta()."vistas/index.php");

  }

  

?>

