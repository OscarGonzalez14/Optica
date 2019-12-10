

 <style>
    #tamModal{
      width: 75% !important;
    }
     #head{
        background-color: #034f84;
        color: white;
    }
</style>

<!-- Modal -->
<div id="detalle_abonos" class="modal fade" role="dialog">
  <div class="modal-dialog" id="tamModal">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" id="head">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title" align="center"><i class="fa fa-usd" aria-hidden="true"></i> ABONO INICIAL</h5>
      </div>
      <div class="modal-body">
     <!--Tabla generalidades del paciente-->
      <table  class="table table-striped table-bordered table-condensed table-hover">
        <thead>
          <tr>
            <th><p align="center">Fechas</p></th>
            <th><p align="center">Telefono</p></th>
            <th><p align="center" p>Recibí de:</p></th>
            <th> <p align="center">Empresa</p></th>
            <th colspan="4"><p align="center"> Cantidad en Letras</p></th>
            <th> <p align="center">No. Recibo</p></th>
          </tr>
        </thead>

        <tbody>
          <td align="center"> <h5 id="date"></h5><input type="hidden" name="date" id="date"></td>
          <td align="center"> <h5 id="telefono"></h5><input type="hidden" name="telefono" id="telefono"></td>
          <td align="center"> <h5 id="nombres"></h5><input type="hidden" name="nombres" id="nombres"/></td>
          <td align="center"> <h5 id="empresa"></h5><input type="hidden" name="empresa" id="empresa"></td>
          <td align="center" colspan="4" id="cant_letras"><input type="text" class="form-control" id="texto"></td>
          <td align="center"><input type="text" name="num_recibo" id="num_recibo" class="form-control" readonly> </td>
        </tbody>
      </table>

        <!--Tabla detalles del Credito-->       
      <table  class="table table-striped table-bordered table-condensed table-hover">
        <thead style="background-color: #034f84 ;color: white ">
          <tr>

          <th><p align="center">Valor de la Venta</p></th>
          <th><p align="center">Abono Actual</p></th>
          <th><p align="center"> NuevoSaldo</p></th> 
          <th><p align="center">Forma de Pago</p></th>
          <th><p align="center">Proximo Abono</p></th>

          </tr>
        </thead>

        <tbody id="listarAbon">
          <td align='center'><input class='form-control' size='4' type='text' class='monto' name='monto' id="monto" style="text-align: right;"></td>
          <td align='center'><input class='form-control' size='4' type='text' class='numero' name='numero' id="numero" onkeyup="nuevo_saldo()" style="text-align: right;"></td>
          <td align='center'><input class='form-control' size='4' type='text' class='saldo' name='saldo' id="saldo" style="text-align: right;"></td>
          <td align='center'><select class='form-control' id='forma_pago' name='forma_pago'><option value=''>Seleccione</option><option value='Efectivo'>Efectivo</option><option value='Tarjeta de Credito'>Tarjeta de Credito</option><option value='Tarjeta de Debito'>Tarjeta de Debito</option><option value='Cargo Automatico'>Cargo Automatico</option><option value='Cheque'>Cheque</option></select></td>
          <td><input type='text' class='form-control' id='datepicker' name='pr_abono'></td>

        </tbody>

      </table>

<div class="row">
  <div class="col-sm-4">
  <div class="input-group">
  <span class="input-group-addon">Marca de Aro</span>
  <input id="marca_aro" type="text" class="form-control" name="marca_aro" placeholder="---">
  </div>
  </div>
  <div class="col-sm-4">
      <div class="input-group">
  <span class="input-group-addon">Modelo</span>
  <input id="modelo_aro" type="text" class="form-control" name="modelo_aro" >
  </div>
  </div>
  <div class="col-sm-4">
      <div class="input-group">
  <span class="input-group-addon">Color</span>
  <input id="color_aro" type="text" class="form-control" name="color_aro" >
  </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-4">
  <div class="input-group">
  <span class="input-group-addon">Diseño de Lente</span>
  <input id="dis_lente" type="text" class="form-control" name="dis_lente" placeholder="---">
  </div>
  </div>
  <div class="col-sm-4">
      <div class="input-group">
  <span class="input-group-addon">Tipo de AR</span>
  <input id="tipo_ar" type="text" class="form-control" name="tipo_ar" >
  </div>
  </div>
  <div class="col-sm-4">
      <div class="input-group">
  <span class="input-group-addon">Marca de Photosensible</span>
  <input id="photo" type="text" class="form-control" name="photo" >
  </div>
  </div>
</div>


<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>
<input id="id_credito" type="hidden" name="id_credito">
<input id="id_paciente" type="hidden" name="id_paciente">


      </div>
      <div class="modal-footer">
    <button type="button" onClick="registrarAbono()" class="btn btn-dark pull-right btn-block" id="btn_enviar"><i class="fa fa-save" aria-hidden="true"></i>  Registrar Abono</button>
      </div>
    </div>

  </div>
</div>

<script>

function nuevo_saldo(){

  var monto = document.getElementById("monto").value;
  var abono = document.getElementById("numero").value;
  var saldo = monto-abono;

  document.getElementById("saldo").value = saldo;
}

    document.getElementById("numero").addEventListener("keyup",function(e){
    document.getElementById("texto").value = NumeroALetras(this.value);
});
 
 
function Unidades(num){
 
  switch(num)
  {
    case 1: return "UN";
    case 2: return "DOS";
    case 3: return "TRES";
    case 4: return "CUATRO";
    case 5: return "CINCO";
    case 6: return "SEIS";
    case 7: return "SIETE";
    case 8: return "OCHO";
    case 9: return "NUEVE";
  }
 
  return "";
}
 
function Decenas(num){
 
  decena = Math.floor(num/10);
  unidad = num - (decena * 10);
 
  switch(decena)
  {
    case 1:
      switch(unidad)
      {
        case 0: return "DIEZ";
        case 1: return "ONCE";
        case 2: return "DOCE";
        case 3: return "TRECE";
        case 4: return "CATORCE";
        case 5: return "QUINCE";
        default: return "DIECI" + Unidades(unidad);
      }
    case 2:
      switch(unidad)
      {
        case 0: return "VEINTE";
        default: return "VEINTI" + Unidades(unidad);
      }
    case 3: return DecenasY("TREINTA", unidad);
    case 4: return DecenasY("CUARENTA", unidad);
    case 5: return DecenasY("CINCUENTA", unidad);
    case 6: return DecenasY("SESENTA", unidad);
    case 7: return DecenasY("SETENTA", unidad);
    case 8: return DecenasY("OCHENTA", unidad);
    case 9: return DecenasY("NOVENTA", unidad);
    case 0: return Unidades(unidad);
  }
}//Unidades()
 
function DecenasY(strSin, numUnidades){
  if (numUnidades > 0)
    return strSin + " Y " + Unidades(numUnidades)
 
  return strSin;
}//DecenasY()
 
function Centenas(num){
 
  centenas = Math.floor(num / 100);
  decenas = num - (centenas * 100);
 
  switch(centenas)
  {
    case 1:
      if (decenas > 0)
        return "CIENTO " + Decenas(decenas);
      return "CIEN";
    case 2: return "DOSCIENTOS " + Decenas(decenas);
    case 3: return "TRESCIENTOS " + Decenas(decenas);
    case 4: return "CUATROCIENTOS " + Decenas(decenas);
    case 5: return "QUINIENTOS " + Decenas(decenas);
    case 6: return "SEISCIENTOS " + Decenas(decenas);
    case 7: return "SETECIENTOS " + Decenas(decenas);
    case 8: return "OCHOCIENTOS " + Decenas(decenas);
    case 9: return "NOVECIENTOS " + Decenas(decenas);
  }
 
  return Decenas(decenas);
}//Centenas()
 
function Seccion(num, divisor, strSingular, strPlural){
  cientos = Math.floor(num / divisor)
  resto = num - (cientos * divisor)
 
  letras = "";
 
  if (cientos > 0)
    if (cientos > 1)
      letras = Centenas(cientos) + " " + strPlural;
    else
      letras = strSingular;
 
  if (resto > 0)
    letras += "";
 
  return letras;
}//Seccion()
 
function Miles(num){
  divisor = 1000;
  cientos = Math.floor(num / divisor)
  resto = num - (cientos * divisor)
 
  strMiles = Seccion(num, divisor, "MIL", "MIL");
  strCentenas = Centenas(resto);
 
  if(strMiles == "")
    return strCentenas;
 
  return strMiles + " " + strCentenas;
 
  //return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);
}//Miles()
 
function Millones(num){
  divisor = 1000000;
  cientos = Math.floor(num / divisor)
  resto = num - (cientos * divisor)
 
  strMillones = Seccion(num, divisor, "UN MILLON", "MILLONES");
  strMiles = Miles(resto);
 
  if(strMillones == "")
    return strMiles;
 
  return strMillones + " " + strMiles;
 
  //return Seccion(num, divisor, "UN MILLON", "MILLONES") + " " + Miles(resto);
}//Millones()
 
function NumeroALetras(num,centavos){
  var data = {
    numero: num,
    enteros: Math.floor(num),
    centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
    letrasCentavos: "",
  };
  if(centavos == undefined || centavos==false) {
    data.letrasMonedaPlural="DOLARES";
    data.letrasMonedaSingular="DOLAR";
  }else{
    data.letrasMonedaPlural="CENTAVOS";
    data.letrasMonedaSingular="CENTAVOS";
  }
 
  if (data.centavos > 0)
    data.letrasCentavos = "CON " + NumeroALetras(data.centavos,true);
 
  if(data.enteros == 0)
    return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
  if (data.enteros == 1)
    return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
  else
    return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
}//NumeroALetras()


      $('#datepicker').datepicker({
      /*dateFormat: 'dd-mm-yy',
      autoclose: true*/
       format: "dd/mm/yyyy",
        /*clearBtn: true,
        language: "es",*/
        autoclose: true,
        /*keyboardNavigation: false,
        todayHighlight: true*/
    })
</script>