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
            <th><p align="center">Fecha</p></th>
            <th><p align="center">Telefono</p></th>
            <th><p align="center" p>Recibí de:</p></th>
            <th> <p align="center">Empresa</p></th>
            <th colspan="2"><p align="center"> Cantidad en Letras</p></th>
            <th> <p align="center">No. Recibo</p></th>
          </tr>
        </thead>

        <tbody>
          <td align="center"> <h5 id="date"></h5><input type="hidden" name="date" id="date"></td>
          <td align="center"> <h5 id="telefono"></h5><input type="hidden" name="telefono" id="telefono"></td>
          <td align="center"> <h5 id="nombres"></h5><input type="hidden" name="nombres" id="nombres"></td>
          <td align="center"> <h5 id="empresa"></h5><input type="hidden" name="empresa" id="empresa"></td>
          <td align="center" colspan="2"><input type="text" class="form-control"></td>
          <td align="center"><input type="text" name="num_recibo" id="num_recibo" value="0" class="form-control"> </td>
        </tbody>
      </table>

        <!--Tabla detalles del Credito-->       
      <table  class="table table-striped table-bordered table-condensed table-hover">
        <thead style="background-color: #034f84 ;color: white ">
          <tr>

          <th><p align="center">Valor de la Venta</p></th>
          <th><p align="center">Abonos Anteriores</p></th>
          <th><p align="center">Saldo Actual</p></th>
          <th><p align="center">Abono Actual</p></th>
          <th><p align="center"> NuevoSaldo</p></th> 
          <th><p align="center">Forma de Pago</p></th>
          <th><p align="center">Proximo Abono</p></th>

          </tr>
        </thead>

        <tbody id="listarAbono"></tbody>

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