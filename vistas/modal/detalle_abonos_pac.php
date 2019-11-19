 <style>
    #tamModal{
      width: 85% !important;
    }
     #head{
        background-color: #034f84;
        color: white;
    }
</style>
<!-- Modal -->
<div id="detalle_abonos_pac" class="modal fade" role="dialog">
  <div class="modal-dialog" id="tamModal">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" id="head">
      <div id="errores_ajax"></div>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h5 class="modal-title" align="center"><i class="fa fa-usd" aria-hidden="true"></i> ABONO INICIAL</h5>
      </div>
      <div class="modal-body">

      <div class="row">

      <div class="col-sm-3">
          <div class="input-group">
          <span class="input-group-addon">Fecha: </span>
          <input id="fecha" type="text" class="form-control" name="fecha" placeholder="---">
          </div>
      </div>
      
      <div class="col-sm-4">
          <div class="input-group">
          <span class="input-group-addon">Recibí de: </span>
          <input id="nombre_pac" type="text" class="form-control" name="nombre_pac" placeholder="---">
          </div>
      </div>
      <div class="col-sm-3">
          <div class="input-group">
          <span class="input-group-addon">Teléfono: </span>
          <input id="telefonos" type="text" class="form-control" name="telefonos" placeholder="---">
          </div>
      </div>
      <div class="col-sm-2">
          <div class="input-group">
          <span class="input-group-addon"># Recibos:</span>
          <input id="recibo" type="text" class="form-control" name="recibo" value="0">
          </div>
      </div>
      </div>
      <br>

      <div class="row">
              <div class="col-sm-4">
          <div class="input-group">
          <span class="input-group-addon">Empresa: </span>
          <input id="empresas" type="text" class="form-control" name="empresas" placeholder="---">
          </div>
      </div>
      
      <div class="col-sm-6">
          <div class="input-group">
          <span class="input-group-addon">Cantidad en Letras: </span>
          <input id="" type="text" class="form-control" name="" placeholder="---">
          </div>
      </div>
      <div class="col-sm-2">
          <div class="input-group">
          <span class="input-group-addon">$: </span>
          <input id="" type="text" class="form-control" name="" placeholder="---">
          </div>
      </div>
      </div>
      <br>
        <!--Tabla detalles del Credito-->       
      <table  class="table table-striped table-bordered table-condensed table-hover">
        <thead style="background-color: #034f84 ;color: white ">
          <tr>

          <th><p align="center"> Valor de la Venta</p></th>
          <th><p align="center"> Abonos Anteriores</p></th>
          <th><p align="center"> Saldo Actual</p></th>
          <th><p align="center"> Abono Actual</p></th>
          <th><p align="center"> NuevoSaldo</p></th> 
          <th><p align="center"> Forma de Pago</p></th>
          <th><p align="center"> Próximo Abono</p></th>

          </tr>
        </thead>

        <tbody id="listarAbono"></tbody>

      </table>

<div class="row">
  <div class="col-sm-4">
  <div class="input-group">
  <span class="input-group-addon">Marca de Aro</span>
  <input id="marca_aros" type="text" class="form-control" name="marca_aros" placeholder="---">
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
  <input id="modelo_lente" type="text" class="form-control" name="modelo_lente" placeholder="---">
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
  <input id="tipo_photo" type="text" class="form-control" name="tipo_photo" >
  </div>
  </div>
</div>


<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>
<input id="id_credito" type="hidden" name="id_credito">
<input id="id_paciente" type="hidden" name="id_paciente">


      </div>
      <div class="modal-footer">
<button type="button" onClick="registrar_abono_pacientes()" class="btn btn-dark pull-right" id="btn_enviar"><i class="fa fa-save" aria-hidden="true"></i>  Registrar Abono</button>
  <button type="button" class="btn btn-blue pull-left" id="btn_enviar" data-dismiss="modal"><i class="fa fa-save" aria-hidden="true"></i>  Cerrar</button>
      </div>
    </div>

  </div>
</div>