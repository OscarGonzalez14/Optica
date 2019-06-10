
<?php
ob_start();/*IMPORTANTE:ESTE ARCHIVO DE PDF NO ACEPTA LOS ESTILOS DE LIBRERIAS EXTERNAS NI BOOTSTRAP, HAY QUE USAR STYLE COMO ATRIBUTO Y LA ETIQUETA STYLE DEBAJO DE HEAD*/

  require_once("../config/conexion.php"); 

if(isset($_SESSION["id_usuario"]) ){


require_once("../modelos/Ventas.php");
$vent = new Ventas();



$venta=$vent->get_ventas_diarias();

ob_start(); 

   
?>

<link type="text/css" rel="stylesheet" href="dompdf/css/print_static.css"/>
  
  <style type="text/css">
    
    .Estilo1{
      font-size: 13px;
      font-weight: bold;
    }
    .Estilo2{font-size: 13px}
    .Estilo3{font-size: 13px; font-weight: bold;}
    .Estilo4{color: #FFFFFF}

  </style>

  <div align="center" style="color:black; font-weight:bolder; font-size:20px;"> REPORTE DE VENTAS DIARIAS</div>

<?php

         if(is_array($venta)==true and count($venta)==0){

             echo "<span style='font-size:20px; color:red' align='center'><h5>NO HAY VENTAS ESTE DIA</h5></span>";        

         }


      ?>
  <table width="102%" class="change_order_items">
   <tr>
       <th width="5%" ><span class="Estilo11">No. Venta </span></th>
      <th width="25%" bgcolor="#317eac"><span class="Estilo11">Cliente</span></th>
      <th width="5%" bgcolor="#317eac"><span class="Estilo11">Vendedor</span></th>
      <th width="5%" bgcolor="#317eac"><span class="Estilo11">Monto</span></th>
      <th width="10%" bgcolor="#317eac"><span class="Estilo11">Forma de Cobro</span>
      <th width="10%" bgcolor="#317eac"><span class="Estilo11">Fecha</span>
      
      

      </tr>

        <?php


           $pagoTotal=0;

         for($j=0;$j<count($venta);$j++){

           $decision=$venta[$j]["subtotal"];

          $pagoTotal= $pagoTotal + $decision;

         ?>
    <tr class="even_row" style="font-size:10pt">
     
      <td style="text-align: center"><span><?php echo $venta[$j]["numero_venta"];?></span></td>
      <td style="text-align: center"><span><?php echo $venta[$j]["paciente"];?></span></td>
      <td style="text-align: center"><span><?php echo $venta[$j]["id_usuario"];?></span></td>

      <td style="text-align: center"><span><?php echo $venta[$j]["subtotal"];?></span></td>
      <td style="text-align: center"><span><?php echo $venta[$j]["tipo_pago"];?></span></td>      
      <td style="text-align: center"><span><?php echo $fecha=date("d-m-Y",strtotime($venta[$j]["fecha_venta"])); ?></span></td>     
      </tr>

      <?php } ?>


 <!--comienzo de la suma de productos y monto total-->
   <tr class="even_row">
  <td colspan="6" style="text-align: center"><table style="width: 100%; font-size: 8pt;">
   
  <tr>
    <td class="even_row" style="text-align: center">&nbsp;</td>
    <td class="odd_row" style="text-align: right; border-right-style: none;">&nbsp;</td>
  </tr>
  
  <tr>
    <td width="84%" class="even_row" style="font-size:10pt; text-align: center">
      <div align="right"><strong><span style="text-align: right;">TOTAL VENTA:</span></strong></div>
    </td>
    <td width="16%" class="odd_row" style="font-size:12pt" text-align: right; border-right-style: none;">
      <div align="center">
      <strong>
      <?php

       if($pagoTotal!=0){

        echo $pagoTotal;

       } else {

            //echo "US$ ".$pagoTotal;

            echo "US$ ".$pagoTotal; 
       }
 


      ?>
      </strong>
      
      </div>
    </td>
  </tr>
  
  <tr>
    <td class="even_row" style="font-size:10pt; text-align: center"><div align="right"><strong><span style="text-align:right;">TOTAL PRODUCTOS VENDIDOS:</span></strong></div></td>
    <td class="odd_row" style="font-size:12pt;text-align: right; border-right-style: none;"><div align="center"><strong>
      <?php 


      if($pagoTotal!=0){

        echo $total_productos["total"];

       } else {

            echo "0";
       }
      

      ?>
    </strong></div>
  </td>
  </tr> 
  
    </td>
  </tr>     
       <!--termina la suma de productos y monto total-->

</table>




<table style="border-top: 1px solid black; padding-top: 2em; margin-top: 2em;">
  <tr>
    <td style="padding-top: 0em"><span class="Estilo2"><strong> REVISADO  POR: <?php echo $_SESSION["usuario"];?> </strong></span></td>
    <td style="text-align: center; padding-top: 0em;">&nbsp;</td>
  </tr>
  <tr>

    <td style="text-align: center; padding-top: 0em;">&nbsp;</td>
  </tr>
  <tr>
    <td style="padding-top: 0em">&nbsp;</td>
    <td style="text-align: center; padding-top: 0em;">&nbsp;</td>
  </tr>

  <?php 
   $cant1=$pagoTotal;
   $cant2=2;
   $ct=$cant1+$cant2;
   echo $ct;
  ?>
  <tr>
    <td style="padding-top: 0em"><span class="Estilo1">REALIZADO EL DIA <?php echo date("d")?> DE <?php echo Conectar::convertir(date('m'))?> DEL <?php echo date("Y")?></span></td>
    <td style="text-align: center; padding-top: 0em;">&nbsp;</td>
  </tr>
</table>


 </div>


  <?php
  
  $salida_html = ob_get_contents();
  ob_end_clean(); 

    require_once("dompdf/dompdf_config.inc.php");       
    $dompdf = new DOMPDF();
    $dompdf->load_html($salida_html);
    $dompdf->set_paper("letter","landscape");
    //$paper_size = array(0,0,500,1000);
    //$dompdf->set_paper($paper_size);
    $dompdf->render();
    $dompdf->stream("Reporte Diario de Ventas.pdf", array('Attachment'=>'0'));


  } else{

     header("Location:".Conectar::ruta()."vistas/index.php");
  }
    
?>