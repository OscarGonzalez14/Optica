
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
        <!-- Main content -->
    
    <?php require_once("modal/lista_productos_ventas_modal.php");?>
    <?php require_once("modal/lista_lentes_ventas_modal.php");?>
    <?php require_once("modal/lista_acc_ventas_modal.php");?>
    <?php require_once("modal/lista_ar_ventas_modal.php");?>
    <?php require_once("modal/lista_photo_ventas_modal.php");?>

    <?php require_once("modal/abono_inicial.php");?>
  <div>
      <nav class="navbar navbar-inverse">

      <ul class="nav navbar-nav">
          <li class="active"><a href="#">MODULO DE VENTAS</a></li>
          <li><a href="#">Creditos y Pagos</a></li>
          <li><a href="consultar_ventas.php">Reportes General de Ventas</a></li>

      </ul>
      </div>
    </nav>        
<div id="factheader"><h4 align="center">Ventas</h4></div>
<div class="row"><!--Row 1-->
  <div class="col-sm-1"></div>
  
  <div class="col-sm-10 row1">

   <div align="left"><strong><?php echo "Asesor: " . $_SESSION["usuario"]."  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sucursal: ". $_SESSION["sucursal"]."<p align='right' id='date'></p>"; ?></strong></div>


    <div class="form-group row">

      <div class="col-xs-3">
        <label for="ex1">#Venta</label>
        <input class="form-control" id="numero_venta" name="numero_venta" type="text" value="<?php $codigo=$venta->numero_venta();?>"  readonly>
      </div>

     
      <div class="col-xs-2">
        <label for="ex1">Código Paciente</label>
        <input class="form-control" id="cod_pac" name="cod_pac" type="text">
      </div>

      <div class="col-xs-5">
        <label for="ex3">Nombre Paciente</label>
        <input class="form-control" id="nombre_pac" type="text" name="nombre_pac">
      </div>

    <div class="col-xs-2">
      <label>Buscar Paciente</label>
      <button class="btn btn-blue btn-block" data-toggle="modal" data-target="#modalPaciente"><span class="glyphicon glyphicon-search"></span> </button>       
    </div>

    </div> 

  </div>

  <div class="col-sm-1"></div>
</div><!--Fin row 1-->


<div class="row"><!--Row 2-->
  <div class="col-sm-1"></div>
  <div class="col-sm-10 row2">

    <div class="form-group row">

      <div class="col-xs-2">
      <label for="sel1">Tipo de Venta:</label>
        <select class="form-control" id="tipo_venta" name="tipo_venta">
            <option value="">Seleccione</option>
            <option value="Credito">Crédito</option>
            <option value="Contado-Metrocentro">Contado-Metrocentro</option>
        </select>
      </div>

     
  <div class="col-xs-3">
      <div class="form-group">
      <label for="sel1">Tipo de Pago:</label>
      <select class="form-control" name="tipo_pago" id="tipo_pago"></select>
      </div>      
    </div>

  <div class="col-xs-2">
      <div class="form-group">
      <label for="sel1">Plazo:</label>
      <select class="form-control" name="plazo" id="plazo"></select>
      </div>      
    </div>

      <div class="col-xs-2">
        <label for="ex1">Monto Cuota</label>
        <input class="form-control" id="monto_c" name="monto_c" type="text">
      </div> 

    <div class="col-xs-3">
      <label for="sel1">Sucursal:</label>                
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
      </div>

 
  </div>
</div> 

</div><!--Fin row 2-->


<!--=======AGREGAR PRODUCTOS==============-->

<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-10 row2">

    <div class="form-group row">

<div class="col-xs-3">
   <button class="btn btn-dark btn-block" type="button" data-toggle="modal" data-target="#lista_productos_ventas_Modal"><span class="glyphicon glyphicon-plus"></span> Aros</button>
  </div>

  <div class="col-xs-2">
    <button class="btn btn-dark btn-block" type="button" data-toggle="modal" data-target="#lista_lentes_ventas_Modal"><span class="glyphicon glyphicon-sunglasses"></span>  Lentes</button>  
  </div> 

    <div class="col-xs-2">
    <button class="btn btn-dark btn-block" type="button" data-toggle="modal" data-target="#lista_acc_ventas_Modal"><span class="glyphicon glyphicon-tasks"></span>  Accesorios</button>  
  </div>

      <div class="col-xs-2">
    <button class="btn btn-dark btn-block" type="button" data-toggle="modal" data-target="#lista_ar_ventas_Modal"><span class="glyphicon glyphicon-tasks"></span>  Tipo AR</button>  
  </div>

  <div class="col-xs-3">
    <button class="btn btn-dark btn-block" type="button" data-toggle="modal" data-target="#lista_photo_ventas_Modal"><span class="glyphicon glyphicon-tasks"></span>  Photosensible</button>  
  </div>

  </div><!--form-group-->
    </div> 

</div><!--Fin row 2-->
<!--===============*************************-->



<div class="row"><!--Row 3-->
  <div class="col-sm-1"></div>
  
    <div class="col-sm-10 row2">

<table id="detalles" class="table table-striped">


      <thead>
        <tr class="bg-primary" id="line1">               
          <th class="all" colspan="6"></th> 
               
        </tr>
      </thead>               

          <thead>
           <tr class="bg-success">
                  
                
            <th class="all">Item</th>
            <th>Cantidad</th>
            <th width="30%">Descripcion</th>
         
            <th width="10%">Desc. %</th>
            <th width="10%">P. Unitario</th>
            <th >Subtotal</th>
            </tr>
          </thead>
                  
          <div id="resultados_ventas_ajax"></div>
                 

                 <tbody id="listProdVentas">
                  
                </tbody>

          <thead>            
    <th class="all" colspan="3"><p align="center">SUMAS</p></th> 
    <th class="all" colspan="2"><p align="right"></p></th>

    <th style="background:white" class="all" colspan="2" ><h5 id="subtotal" name="subtotal" align="center">000.00</h5><input type="hidden"></th>
                
        </tr>
        </thead>

<input type="hidden" name="grabar" value="si">
<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>
<input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"];?>"/>
<input type="hidden" name="id_paciente" id="id_paciente"/>                
  </table>
 <div class="boton_registrar">
<button type="button" onClick="registrarVenta()" class="btn btn-blue pull-right btn-block" id="btn_enviar"><i class="fa fa-save" aria-hidden="true"></i>  Registrar Venta</button>
<button type="button" class="btn btn-dark pull-right btn-block abono_ini" onClick="abono_inicial()"><i class="fa fa-save" aria-hidden="true"></i>  Abono Inicial</button>
</div>

    </div> 

  <div class="col-sm-1"></div>
</div><!--Fin row -->

<!--MODAL DE PRUEBA-->


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

