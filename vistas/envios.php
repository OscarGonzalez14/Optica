
<?php

 require_once("../config/conexion.php");

    if(isset($_SESSION["id_usuario"])){

     require_once("../modelos/Compras.php");
     require_once("../modelos/Categorias.php");
     require_once("../modelos/Usuarios.php");

      require_once("../modelos/Ventas.php");
     
       $venta = new Ventas();
    
     
      $compra = new Compras();
      $categoria = new Categoria();

      $cat = $categoria->get_categorias();
    
?>


<!-- INICIO DEL HEADER - LIBRERIAS -->
<?php require_once("header.php");?>

<!-- FIN DEL HEADER - LIBRERIAS -->



  <?php if($_SESSION["ventas"]==1)
     {

     ?>

<style>
.navbar-inverse{
    border: 1px;

}

.row1{

  border-style: solid;
  border-color: black;
  border-width: 2px;
  background: white;

}

.row2{

  background: #E0E0E0;

}

#line1{

  background: black;

}
</style>     
<div class="content-wrapper">        
        <!--ESPACIO MODALES -->

     
<div id="factheader"><h3 align="center">ORDENES DE ENVÍO</h3></div>
<div class="row"><!--Row 1-->
  <div class="col-sm-1"></div>
  
  <div class="col-sm-10 row1">

   <div align="left"><strong><?php echo "Usuario: " . $_SESSION["usuario"]."<p align='right' id='date'></p>"; ?></strong></div>

    <div class="form-group row">

      <div class="col-xs-2">
        <label for="ex1">Numero Envio</label>
        <input class="form-control" id="numero_venta" name="numero_venta" type="text" value="<?php $codigo=$venta->numero_venta();?>"  readonly>
      </div>

    <div class="col-xs-3">
      <label for="sel1">Sucursal de Origen:</label>                
      <select class="form-control" name="sucursal" id="sucursal" required>
          <option  value="">Seleccione una sucursal</option>
            <?php
                for($i=0; $i<sizeof($cat);$i++){                             
                  ?>
                  <option value="<?php echo $cat[$i]["categoria"]?>"><?php echo $cat[$i]["categoria"];?></option>
                  <?php
                }
             ?>                      
          </select>
      </div><!-- fin sucursal de origen-->

    <div class="col-xs-3">
      <label for="sel1">Sucursal Destino:</label>                
      <select class="form-control" name="sucursal" id="sucursal" required>
          <option  value="">Seleccione una sucursal</option>
            <?php
                for($i=0; $i<sizeof($cat);$i++){                             
                  ?>
                  <option value="<?php echo $cat[$i]["categoria"]?>"><?php echo $cat[$i]["categoria"];?></option>
                  <?php
                }
             ?>                      
          </select>
      </div><!--fin sucursal destino-->


<div class="col-xs-2">
<label for="ex1">Agregar Aro</label>
   <button class="btn btn-dark btn-block" type="button" data-toggle="modal" data-target="#lista_productos_ventas_Modal"><span class="glyphicon glyphicon-sunglasses"></span> Aros</button>
  </div>      

<div class="col-xs-2">
<label for="ex1">Agregar Accesorio</label>
   <button class="btn btn-dark btn-block" type="button" data-toggle="modal" data-target="#lista_productos_ventas_Modal"><span class="glyphicon glyphicon-plus"></span> Aros</button>
  </div>
    </div> 

  </div><!--fin group-->

 </div>


<div class="row"><!--Row 3-->
  <div class="col-sm-1"></div>
  
    <div class="col-sm-10 row2">

<table id="detalles" class="table table-striped">


      <thead>
              
          <th class="all" colspan="6"></th> 
               
        </tr>
      </thead>               

          <thead>
           <tr class="bg-primary">                  
                
            <th colspan="1">Item</th>
           
            <th colspan="4">Descripcion</th>

            <th colspan="2">Cantidad</th>
            
            </tr>
          </thead>
                  
          <div id="resultados_ventas_ajax"></div>
              <tbody id="listProdEnvios">
              
              </tbody>

          
<input type="hidden" name="grabar" value="si">
<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>
<input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"];?>"/>
<input type="hidden" name="id_paciente" id="id_paciente"/>                
  </table>
 <div class="boton_registrar">
<button type="button" onClick="registrarVenta()" class="btn btn-dark pull-right btn-block" id="btn_enviar"><span class="glyphicon glyphicon-share-alt">  Realizar Envío</button>

</div>

    </div> 

  <div class="col-sm-1"></div>
</div><!--Fin row -->

<!--MODAL DE PRUEBA-->
</div><!-- /.content-wrapper -->
 
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
<script type="text/javascript" src="js/paciente.js"></script>

   <!--AJAX PRODUCTOS-->
<script type="text/javascript" src="js/productos.js"></script>
<script type="text/javascript" src="js/ventas.js"></script>





<?php
   
  } else {

         header("Location:".Conectar::ruta()."vistas/index.php");

     }

?>

