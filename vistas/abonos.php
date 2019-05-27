
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
<h5 align="center">ABONOS</h5>
  <div class="col-sm-12"></div>
</div>

 <div class="row">
 <div class="col-sm-1"></div>
  <div class="col-sm-2">
    <a href="#"><h3><button class="btn btn-blue btn-block abonos" id="metro" onClick="lista_creditos_metro()"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> <span class="glyphicon glyphicon-import" aria-hidden="true"></span> Metrocentro</button></h3></a>
   </div>

   <div class="col-sm-2">
<h3><button class="btn btn-blue btn-block" id="empresarial" onClick="lista_creditos_empresarial()" ><span class="glyphicon glyphicon-usd" aria-hidden="true"></span><span class="glyphicon glyphicon-import" aria-hidden="true"></span> Empresarial</button></h3>
   </div>

      <div class="col-sm-3">
  <h3><button class="btn btn-dark btn-block" id="c_automatico" onClick="lista_creditos_c_aut()" ><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> <span class="glyphicon glyphicon-import" aria-hidden="true"></span> Cargo Automatico</button></h3>
   </div>

      <div class="col-sm-3">
<h3><button class="btn btn-blue btn-block" id="metro" onClick="lista_creditos_personal()"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> <span class="glyphicon glyphicon-import" aria-hidden="true"></span> Créditos Personales</button></h3>
   </div>
 <div class="col-sm-1"></div>
 
 </div><!--FIN ROW 1-->  


 <!--ROW 2-->   
<div class="row">

  <div class="col-sm-12">
  <h4 align="center" id="titulo"></h4>
   <table id="creditos_data" class="table table-bordered table-striped">
     <thead>
       <tr>
        <th>Paciente</th>
        <th >Monto</th>
        <th>Saldo</th>
        <!--<th>Telefono</th>
        <th>Empresa</th>-->
        <th>Sucursal</th>
        <th>Abonar</th>        
        <th>Cancelar</th>
        <th>Imprimir</th>
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


<script type="text/javascript" src="js/creditos.js"></script>
<!--<script type="text/javascript" src="js/ventas.js"></script>-->



<?php
   
  } else {

         header("Location:".Conectar::ruta()."vistas/index.php");

     }

?>

