 <style>
    #tamanoModal{
      width: 75% !important;
    }
     #encabezado{
        background-color: #034f84;
        color: white;
    }

  </style>


   <div class="modal fade" id="detalle_venta">
          <div class="modal-dialog modal-lg">
            <div class="bg-warning">
              <div class="modal-header" id="encabezado">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center"><i class="fa fa-search-plus" aria-hidden="true"></i> DETALLE DE VENTA</h4>
              </div>
              <div class="modal-body">

                 <div class="container box">
        
        <!--column-12 -->
<div class="table-responsive">          
    <div class="box-body">
               
      <table id="detalle_paciente" class="table table-striped table-bordered table-condensed table-hover">

        <thead style="background-color:#A9D0F5">
          <tr>
            <th>Paciente</th>
            <th>Telefono</th>
            <th>No. Venta </th>
            <th>Fecha Venta</th>
            <th>Vendedor</th>
            <th>Sucursal</th>
          </tr>
        </thead>

        <tbody>
                            
          <td> <h5 id="paciente"></h5><input type="hidden" name="paciente" id="paciente"></td>
          <td> <h5 id="telefono"></h5><input type="hidden" name="telefono" id="telefono"></td>
          <td><h5 id="numero_venta"></h5><input type="hidden" name="numero_venta" id="numero_venta"></td>
          <td><h5 id="fecha_venta"></h5><input type="hidden" name="fecha_venta" id="fecha_venta"></td>
          <td><h5 id="vendedor"></h5><input type="hidden" name="vendedor" id="vendedor"></td>
          <td><h5 id="sucursal"></h5><input type="hidden" name="sucursal" id="sucursal"></td>



        </tbody>

      </table>


                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                              <thead style="background-color:#A9D0F5">
                                    <th>Cantidad</th>
                                    <th colspan="2">Producto</th>
                                    <th>Precio Unitario</th>
                                    <th>Descuento</th>
                                    <th>Total</th>
                                </thead>
                                        
                               
                            </table>
                          </div>

                         
            </div>
            <!-- /.box-body -->

              <!--BOTON CERRAR DE LA VENTANA MODAL-->
             <div class="modal-footer" id="footer">
                <button type="button" class="btn btn-dark pull-right" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
                
              </div>
              <!--modal-footer-->
          <!--</div>-->
          <!-- /.box -->

        </div>
        <!--/.col (12) -->
      </div>
      <!-- /.row -->
       
     
              </div>
              <!--modal body-->
              </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

     

    

        
  