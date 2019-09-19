  <style>
    #tamanoModal{
      width: 65% !important;
    }
     #encabezados{
        background-color: #034f84;
        color: white;
    }
     #info{
        background-color: white;

    }

  </style>

   <div class="modal fade" id="modalEnvios">
          <div class="modal-dialog" id="tamanoModal">
           <!--antes tenia un class="modal-content" y lo cambié por bg-warning para que tuviera fondo blanco, deberia haber sido un color naranja claro pero me salió un color blanco de casualidad--> 
            <div class="bg-info" id="info">
              <div class="modal-header" id="encabezados">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></i> Orden de Envio Aros</h4>
              </div>
              <div class="modal-body">

                 <div class="container box">
        
        <!--column-12 -->
        <div class="table-responsive">
         
             <div class="box-body">
             <table id="lista_envios_data" class="table table-bordered table-striped">
               
                <thead>
                  <tr>
                    <th class="all">Modelo</th>
                    <th class="all">Marca</th>
                    <th class="min-desktop">Color</th>
                    <th class="min-desktop">Medidas</th>
                    <th class="min-desktop">Stock</th>
                   
                    <th class="min-desktop">Agregar</th>
                   
                  
                  </tr>
                </thead>

               
              </table>
            </div>
            <!-- /.box-body -->

              <!--BOTON CERRAR DE LA VENTANA MODAL-->
             <div class="modal-footer">
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

       

        
  
