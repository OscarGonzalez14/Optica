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
        </thead>

        <tbody>
          <td align="center"> <h5 id="date"></h5><input type="hidden" name="date" id="date"></td>
          <td align="center"> <h5 id="telefono"></h5><input type="hidden" name="telefono" id="telefono"></td>
          <td align="center"> <h5 id="nombres"></h5><input type="hidden" name="nombres" id="nombres"></td>
          <td align="center"> <h5 id="empresa"></h5><input type="hidden" name="empresa" id="empresa"></td>
      
        </tbody>
      </table>

        <!--Tabla detalles del Credito-->  
      <form id="f1" name="f1">     
      <table  class="table table-striped table-bordered table-condensed table-hover">

              <thead style="background-color: #034f84 ;color: white ">
          <tr>

          <th><p align="center">Monto</p></th>
          <th><p align="center">Abono Anterior</p></th>
          <th><p align="center">Saldo Actual</p></th>
          <th><p align="center">Abono Actual</p></th>
          <th><p align="center"> NuevoSaldo</p></th> 
          <th><p align="center">Forma de Pago</p></th>

          </tr>
        </thead>

        <tbody>
          <tr>
            <td><input class="form-control" type="text" name="monto" id="monto" readonly></td>
            <td><input class="form-control" type="text" name="abono_ant" id="abono_ant" readonly></td>
            <td><input class="form-control" type="text" name="saldo_act" id="saldo_act" onkeyup="calcularc()" readonly></td>
            <td><input class="form-control" type="text" name="abono" id="abono" onkeyup="calcularc()"></td>
            <td><input class="form-control" type="text" name="n_saldo" id="n_saldo" onkeyup="calcularc()"></td>
            <td><h5 id="tipo_pago" align="center"></h5><input type="hidden" name="tipo_pago" id="tipo_pago"></td>
          </tr>
        </tbody>

  </table>
  </form>

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

<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>
<input id="id_credito" type="hidden" name="id_credito">
<input id="id_paciente" type="hidden" name="id_paciente">


      </div>
      <div class="modal-footer">
    <button type="button" onClick="registrar_abono_pacientes()" class="btn btn-dark pull-right btn-block"><i class="fa fa-save" aria-hidden="true"></i>  Registrar Abono</button>
      </div>
    </div>

  </div>
</div>