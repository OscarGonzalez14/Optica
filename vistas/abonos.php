
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

.btn{

    border: 0px;

}


</style>     
<div class="content-wrapper">        
        <!-- Main content -->
    <?php require_once("modal/lista_pacientes_modal.php");?>
    <?php require_once("modal/lista_productos_ventas_modal.php");?>
    <?php require_once("modal/lista_lentes_ventas_modal.php");?>
    <?php require_once("modal/lista_acc_ventas_modal.php");?>
      <?php require_once("modal/abono_inicial.php");?>
<div class="row">
  <div class="col-sm-12"></div>
</div>

 <div class="row">
 <div class="col-sm-1"></div>
  <div class="col-sm-2">
    <a href="abonosmetro.php"><h3><button class="btn btn-blue btn-block" id="metro"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> <span class="glyphicon glyphicon-import" aria-hidden="true"></span> Metrocentro</button></h3></a>
   </div>

   <div class="col-sm-2">
     <a href="abonosmetro.php"><h3><button class="btn btn-blue btn-block" id="metro"  ><span class="glyphicon glyphicon-usd" aria-hidden="true"></span><span class="glyphicon glyphicon-import" aria-hidden="true"></span> Empresarial</button></h3></a>
   </div>

      <div class="col-sm-2">
     <a href="abonosmetro.php"><h3><button class="btn btn-dark btn-block" id="metro" ><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> <span class="glyphicon glyphicon-import" aria-hidden="true"></span> Cargo Automatico</button></h3></a>
   </div>

      <div class="col-sm-3">
     <a href="abonosmetro.php"><h3><button class="btn btn-blue btn-block" id="metro" ><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> <span class="glyphicon glyphicon-import" aria-hidden="true"></span> Créditos Personales</button></h3></a>
   </div>
 <div class="col-sm-2"></div>

 
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

