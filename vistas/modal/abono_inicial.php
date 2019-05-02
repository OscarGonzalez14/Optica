 <style>
    #tamanoModal{
      width: 75% !important;
    }
     #encabezado{
        background-color: #034f84;
        color: white;
    }

  </style>

   <div class="modal fade" id="detalle_abonos">
          <div class="modal-dialog modal-lg">
            <div class="bg-warning">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center"><i class="fa fa-usd" aria-hidden="true"></i> ABONO INICIAL</h4>
              </div>
              <div class="modal-body">

                 <div class="container box">
        
        <!--column-12 -->
<div class="table-responsive">          
    <div class="box-body">
<!--Tabla generalidades del paciente-->
      <table  class="table table-striped table-bordered table-condensed table-hover">
        <thead style="background-color:#A9D0F5">
          <tr>
            <th>Fecha</th>
            <th>Telefono</th>
            <th>Recibí de:</th>
            <th> Empresa</th>
          </tr>
        </thead>

        <tbody>
          <td> <h5 id="date"></h5><input type="hidden" name="date" id="date"></td>
          <td> <h5 id="telefono"></h5><input type="hidden" name="telefono" id="telefono"></td>
          <td> <h5 id="nombres"></h5><input type="hidden" name="nombres" id="nombres"></td>
          <td> <h5 id="empresa"></h5><input type="hidden" name="empresa" id="empresa"></td>
        </tbody>

      </table>
        <!--Tabla detalles del Credito-->       
      <table  class="table table-striped table-bordered table-condensed table-hover">
        <thead style="background-color:#A9D0F5">
          <tr>
          <th>Cantidad Letras</th>
          <th>Monto Letra</th>
          <th>Valor de la Venta</th>
          <th>Abonos Anteriores</th>
          <th>Abono Actual</th>
          <th>Saldo</th> 
          <th>Forma de Pago</th>

          </tr>
        </thead>

        <tbody id="listarAbono"></tbody>

      </table>


                         
    </div>
   <!--BOTON CERRAR DE LA VENTANA MODAL-->
    <div class="modal-footer" id="footer">
    <button type="button" class="btn btn-dark pull-right" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
    </div>

    </div>
    </div>
                  </div>
              <!--modal body-->
              </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

     

    

        
  