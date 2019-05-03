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
            <th> <p align="center">$</p></th>
          </tr>
        </thead>

        <tbody>
          <td align="center"> <h5 id="date"></h5><input type="hidden" name="date" id="date"></td>
          <td align="center"> <h5 id="telefono"></h5><input type="hidden" name="telefono" id="telefono"></td>
          <td align="center"> <h5 id="nombres"></h5><input type="hidden" name="nombres" id="nombres"></td>
          <td align="center"> <h5 id="empresa"></h5><input type="hidden" name="empresa" id="empresa"></td>
          <td align="center" colspan="2"><input type="text" class="form-control"></td>
          <td align="center"> <h5 id="c_numeros"></h5><input type="hidden" name="c_numeros" id="c_numeros"></td>
        </tbody>
      </table>

        <!--Tabla detalles del Credito-->       
      <table  class="table table-striped table-bordered table-condensed table-hover">
        <thead style="background-color: #034f84 ;color: white ">
          <tr>

          <th><p align="center">Valor de la Venta</p></th>
          <th><p align="center">Abonos Anteriores</p></th>
          <th><p align="center">Abono Actual</p></th>
          <th><p align="center">Saldo</p></th> 
          <th><p align="center">Forma de Pago</p></th>

          </tr>
        </thead>

        <tbody id="listarAbono"></tbody>

      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Registrar Abono</button>
      </div>
    </div>

  </div>
</div>