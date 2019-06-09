
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


</style>     
<div class="content-wrapper">        
        <!-- Main content -->



<?php require_once("modal/detalle_abonos_pac.php");?>
<?php require_once("modal/cancelar_abono.php");?>
<?php require_once("modal/detalle_venta_modal.php");?>


<div class="row">
<h5 align="center"><strong>Corte de Caja Diario</strong></h5>
  <div class="col-sm-12"></div>
</div>

 <div class="row">
 <div class="col-sm-2"></div>
  <div class="col-sm-3">
    <a href="#"><h3><button class="btn btn-primary btn-block abonos" id="c_ventas" onClick="corte_ventas()"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Corte de Caja Ventas</button></h3></a>
   </div>

   <div class="col-sm-3">
<h3><button class="btn btn-edit btn-block" id="empresarial" onClick="corte_recuperado()" ><i class="fa fa-file-excel-o" aria-hidden="true"></i> Corte de Caja Recuperado</button></h3>
   </div>

      <div class="col-sm-2">
  <h3><button class="btn btn-danger btn-block" id="c_automatico" onClick="lista_creditos_c_aut()" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Consolidado</button></h3>
   </div>


 <div class="col-sm-1"></div>
 
 </div><!--FIN ROW 1-->  


 <!--ROW 2-->   
<div class="row">

  <div class="col-sm-12">
  <h4 align="center" id="titulo"></h4>
   <table id="corte_data" class="table table-bordered table-striped">
     <thead>
       <tr>
        <th>Factura</th>
        <th >Recibo</th>
        <th>Cliente</th>
        <th>Vendedor</th>
        <th>Total Fac.</th>
        <th>Anticipos Ant.</th>
        <th>Cobro</th>
        <th>Tipo Venta</th>        
        <th>Forma de Pago</th>
        <th>Saldo Act</th>
        <th>Fecha</th>
       </tr>
     </thead>
     <tbody>
     </tbody>
   </table> 
  </div>

</div>

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
document.getElementById("fecha").innerHTML = d + "/" + m + "/" + y;
 </script>
  

   
  <?php  } else {

       require("noacceso.php");
  }
  
   
  ?><!--CIERRE DE SESSION DE PERMISO -->

   <?php require_once("footer.php");?>


<script type="text/javascript" src="js/ventas.js"></script>
<!--<script type="text/javascript" src="js/ventas.js"></script>-->



<?php
   
  } else {

         header("Location:".Conectar::ruta()."vistas/index.php");

     }

?>


