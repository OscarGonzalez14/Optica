<?php
   
   require_once("../config/conexion.php");

   if(isset($_SESSION["id_usuario"])){
    

    //require_once("../modelos/Clientes.php");

    //$cliente= new Cliente();

    //$clientes= $cliente->get_clientes();
    
    
?>


<!-- INICIO DEL HEADER - LIBRERIAS -->
<?php require_once("header.php");?>

<!-- FIN DEL HEADER - LIBRERIAS -->



  <?php if($_SESSION["reporte_ventas"]==1)
     {

     ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


   <div class="container-fluid bg-red text-white text-center mh-50">
        
           CONTROL DE COBROS POR EMPRESA
  </div>
  
 <div class="panel panel-default">
        
        <div class="panel-body">

   <div class="row  col-sm-5 col-sm-offset-3">
        
        <div class="">

             <div class="form-group">
               <label for="sel1">Seleccione una Empresa:</label>
                <select class="form-control" id="b_empresa" name="b_empresa">
                  <option value="Gobernacion">Gobernacion</option>
                  <option>Hospital Saldaña</option>
                  <option>EPA</option>
                  <option>Los Chorys</option>
                </select>
              </div>

             <button type="button" class="btn btn-primary busca_emp">BUSCAR</button>           


       </div>
      </div>

    </div>
</div>
<table id="cobros_data" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Empresa</th>
                  <th>Télefono</th>
                  <th>Ultimo Abono</th>
                  <th>Fecha Abono</th>
                  <th>Monto</th>
                  <th>Estado</th>              
                </tr>
            </thead>
                 <tbody>
                 </tbody>
            </table>

</div>
  <!-- /.content-wrapper -->


  <?php  } else {

       require("noacceso.php");
  }
   
  ?><!--CIERRE DE SESSION DE PERMISO -->

   
   <?php require_once("footer.php");?>

  
<?php
   }

?>