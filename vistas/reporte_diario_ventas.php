
<?php
ob_start();

  require_once("../config/conexion.php"); 

if(isset($_SESSION["id_usuario"]) ){


require_once("../modelos/Ventas.php");
$vent = new Ventas();


//Ventas Contado
$contado_cheque=$vent->reporte_diario_contado_cheques_pdf();
$contado_efectivo=$vent->reporte_diario_contado_efectivo_pdf();
$contado_tarjeta=$vent->reporte_diario_contado_tarjeta_pdf();
$contado_automatico=$vent->reporte_diario_contado_cargoa_pdf();

//ventas Credito
$credito_efectivo= $vent->reporte_diario_credito_efectivo_pdf();
$credito_cheque= $vent->reporte_diario_credito_cheque_pdf();
$credito_tarjeta = $vent->reporte_diario_credito_tarjeta_pdf();
$credito_automatico = $vent->reporte_diario_credito_cargo_pdf();
$prueba = $vent->reporte_recuperado_contado_cheques_pdf();

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
<p><h3 align="center">RESUMEN DE COBROS  Y VENTAS  DE <?php  echo date("d-m-Y"); ?></h3></p>
<table width="102%" class="change_order_items">
   <tr>
      <th bgcolor="#C6C9CF"><span class="Estilo11">Tipo Venta</span></th>
      <th bgcolor="#C6C9CF" colspan="5"><span class="Estilo11">Forma Cobro</span></th>
      <th bgcolor="#C6C9CF"><span class="Estilo11">Subtotal</span></th>     
    </tr>
   


    <tr>
      <td></td>
      <td bgcolor="#C9E2F1" align="center">Efectivo</td>
      <td align="center">Cheque</td>
      <td bgcolor="#C9E2F1" align="center">Tarjeta</td>
      <td align="center">Cargo Automatico</td>
      <td  bgcolor="#C9E2F1" align="center">Otros</td>
      <td align="center">Cobrado</td>
    </tr>
 <?php
//////////SUBTOTALES VENTAS CONTADO
$cheques_contado = $contado_cheque[0]["abono"];
$efectivo_contado = $contado_efectivo[0]["abono"];
$tarjeta_contado = $contado_tarjeta[0]["abono"];
$automatico_cargo = $contado_automatico[0]["abono"];
$subtotal_efectivo = $cheques_contado+$efectivo_contado+$tarjeta_contado+$automatico_cargo;


///SUBTOTALES VENTAS CREDITO
$efectivo_credito= $credito_efectivo[0]["monto_abono"];
$cheque_credito= $credito_cheque[0]["monto_abono"];
$tarjeta_credito = $credito_tarjeta[0]["monto_abono"];
$automatico_credito = $credito_automatico[0]["monto_abono"];
$subtotal_credito = $efectivo_credito+$cheque_credito+$tarjeta_credito+$automatico_credito;

$total = $subtotal_efectivo+$subtotal_credito;
 ?>

    <tr>
      <td>Ventas Contado</td>
      <td align="center"><strong><?php echo "$"." ".$contado_efectivo[0]["abono"]; ?></strong></td>
      <td align="center"><strong><?php echo "$"." ".$contado_cheque[0]["abono"]; ?></strong></td> 
      <td align="center"><strong><?php echo "$"." ".$contado_tarjeta[0]["abono"]; ?></strong></td> 
      <td align="center"><strong><?php echo "$"." ".$contado_automatico[0]["abono"]; ?></td> 
      <td></td>
      <td align="center"><strong><?php echo "$"." ".$subtotal_efectivo; ?></td>     
    </tr>

      <tr>
      <td>Ventas Credito</td>
      <td align="center"><strong><?php echo "$"." ".$credito_efectivo[0]["monto_abono"]; ?></strong></td>
      <td align="center"><strong><?php echo "$"." ".$credito_cheque[0]["monto_abono"]; ?></strong></td> 
      <td align="center"><strong><?php echo "$"." ".$credito_tarjeta[0]["monto_abono"]; ?></strong></td> 
      <td align="center"><strong><?php echo "$"." ".$credito_automatico[0]["monto_abono"]; ?></td> 
      <td></td>
      <td align="center"><strong><?php echo "$"." ".$subtotal_credito; ?></td>     
    </tr>

   <tr>
      <th colspan="6"><span class="Estilo11"><h3><strong>TOTAL</strong></h3></span></th>
      <th bgcolor="#E5E2EA"><span class="Estilo11"><h3><?php echo $total; ?></h3></span></th>     
    </tr>
</table>

<table>
<?php
  $dec=0;

  for($j=0;$j<count($prueba);$j++){
    $dec=$dec+$prueba[$j]["abono"];

  }
  echo $dec;
?>
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