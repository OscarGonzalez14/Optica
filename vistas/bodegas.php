<?php

   require_once("../config/conexion.php");

    if(isset($_SESSION["id_usuario"])){

           
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bodegas</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/stilos.css">


   </head>
<body>

<div id="tabla-planes">
    <h3 class="header-planes" style="color:white">BODEGAS</h3>

<div class="tabla-planes">

    <div class="col-p">
      <div class="table-plan" id="sa">
        <h2 class="tit-plan">Bodega Santa Ana</h2>
        <br>
          <a class="show_bdsa">Ingresar Productos</a>
          <a>Existencias</a>
          <a>Historial de Ingresos</a>
      </div>
    </div>

    <div class="col-p">
      <div class="table-plan" id="mt">
        <h2 class="tit-plan">Bodega Metrocentro</h2>
        <br>
          <a>Ingresar Productos</a>
          <a>Existencias</a>
          <a>Historial de Ingresos</a>
      </div>
    </div>

    <div class="col-p">
      <div class="table-plan" id="sm">
        <h2 class="tit-plan">Bodega San Miguel</h2>
        <br>
          <a>Ingresar Productos</a>
          <a>Existencias</a>
          <a>Historial de Ingresos</a>
      </div>
    </div>

  
</div>
</div><!--====/item bodegas=====-->

<br>

<div class="tabla-planes">
  holap.dotted {border-style: dotted;}
p.dashed {border-style: dashed;}
p.solid {border-style: solid;}
p.double {border-style: double;}
p.groove {border-style: groove;}
p.ridge {border-style: ridge;}
p.inset {border-style: inset;}
p.outset {border-style: outset;}
p.none {border-style: none;}
p.hidden {border-style: hidden;}
p.mix {border-style: dotted dashed solid double;}
</div>

</body>
</html>
 <?php  } else {

       require("noacceso.php");
  }
   
  ?><!--CIERRE DE SESSION DE PERMISO -->

