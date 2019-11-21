<?php

   require_once("../config/conexion.php");

    if(isset($_SESSION["id_usuario"])){

           
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bodegas</title>
    <script src="https://use.fontawesome.com/385b4d76c6.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/stilos.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" ></script>

</head>
<body>
<?php require_once("modal/lista_productos_bodega.php");?>
<div id="tabla-planes">
    <h3 class="header-planes" style="color:white"> GESTIÓN DE BODEGAS</h3>

<div class="tabla-planes">

    <div class="col-p">
      <div class="table-plan" id="sa">
        <br>
          <a class="show_bdsa" data-toggle="modal" data-target="#lista_productos_bodegas_Modal">Ingresar Productos</a>
          <a>Existencias</a>
          <a>Historial de Ingresos</a>
      </div>
    </div>
</div>

  
</div>
</div><!--====/item bodegas=====-->

<br>

<div class="tabla-planes"><!--Items Productos-->
  <form>
    <div class="form-group col-md-12">
      <label for="sucursal">Seleccionar Bodega</label>
      <select id="sucursal" class="form-control">
        <option selected value="">Seleccionar</option>
        <option value="Metrocentro">Metrocentro</option>
        <option value="Santa Ana">Santa Ana</option>
        <option value="San Miguel">San Miguel</option>
      </select>
    </div>
  <div style="overflow-x:auto;">
  <table class="w3-table w3-bordered" id="tabla_bodegas">
    <thead>
      <tr>                
        <th style="text-align: center; font-size:20px; font-family: 'Helvetica';">Item</th>
        <th style="text-align: center; font-size:20px; font-family: 'Helvetica';">Producto</th>
        <th style="text-align: center; font-size:20px; font-family: 'Helvetica';">Stock</th>
        <th style="text-align: center; font-size:20px; font-family: 'Helvetica';">Cantidad</th>
        <th style="text-align: center; font-size:20px; font-family: 'Helvetica';">Eliminar</th>
      </tr>
    </thead>

    <tbody id="listIngresoSA">
      
    </tbody>    

  </table>
</div>
<br>
<button type="button" class="btn btn-primary btn-block" onclick="registrarIngreso()">Registrar Ingreso</button>
</form>
</div><!-- Fin Items Productos-->


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/bodegas.js"></script>

</body>
</html>
 <?php  } else {

       require("noacceso.php");
  }
   
  ?><!--CIERRE DE SESSION DE PERMISO --><!--
<script type="text/javascript" src="js/bodegas.js"></script>-->


