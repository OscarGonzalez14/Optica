
<?php

 require_once("../config/conexion.php");

    if(isset($_SESSION["id_usuario"])){

     require_once("../modelos/Creditos.php");

     
       $venta = new Creditos();
    
?>


<!-- INICIO DEL HEADER - LIBRERIAS -->
<?php require_once("header.php");?>

<!-- FIN DEL HEADER - LIBRERIAS -->



  <?php if($_SESSION["ventas"]==1)
     {

     ?>

<style>

  .tam,
  .tam:hover,
  .tam:active{

    weight: 400;

  }
.container {
  padding-left: 0 !important;
  padding-right: 0 !important;
  width: 100% !important;
}

.size{
  width: 330px;
}

</style>     
<div class="content-wrapper">        
        <!-- Main content -->



<?php require_once("modal/detalle_abonos_pac.php");?>
<?php require_once("modal/cancelar_abono.php");?>
<?php require_once("modal/detalle_venta_modal.php");?>


<div class="row">
<h5 align="center">CONTROL DE COBROS</h5>
  <div class="col-sm-12"></div>
</div>

<div class="container" style="padding-top: 5%;">
   <table id="cobros_data" class="table table-bordered table-striped">
     <thead>
       <tr>
            <th width="20%">Empresa</th>
            <th width="20%">Cliente</th>
            <th>Télefono</th>
            <th>Ult. Abono</th>

            <th>Prox. Abono</th>
            <th>Monto</th>
            <th>Saldo</th>
            <th>Estado</th> 
       </tr>
              <tr>
        <th>Empresa</th>
            <th><div class="size">Cliente</div></th>
            <th style="visibility: hidden;">Télefono</th>
            <th style="visibility: hidden;">Ultimo Abono</th>
          
            <th style="visibility: hidden;">Fecha Abono</th>
            <th style="visibility: hidden;">Monto</th>
            <th style="visibility: hidden;">Saldo</th>
            <th style="visibility: hidden;">Estado</th> 
       </tr>
     </thead>
     <tbody>
     </tbody>
   </table> 
  </div>

</div>

</div><!-- /.content-wrapper -->
 


   
  <?php  } else {

       require("noacceso.php");
  }
  
   
  ?><!--CIERRE DE SESSION DE PERMISO -->

   <?php require_once("footer.php");?>


<script type="text/javascript" src="js/creditos.js"></script>
<!--<script type="text/javascript" src="js/ventas.js"></script>-->



<?php
   
  } else {

         header("Location:".Conectar::ruta()."vistas/index.php");

     }

?>


