<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>   

<script>
function genPDF(){

  html2canvas(document.getElementById("detalle_consultas"), {
    onrendered: function(canvas){
      var img = canvas.toDataURL("image/png");
      var doc= new jsPDF();
      doc.addImage(img, 'JPEG',0,0);
      doc.save('Reporte de consultas.pdf');

    }
  });
}
</script>

   <div class="modal fade" id="detalle_consulta">
          <div class="modal-dialog modal-lg" id="tamanoModal">

            <div class="bg-warning">


  <div class="modal-body" id="reportepdf">

  <div class="container box">
        
        <!--column-12 -->
        <div class="table-responsive">
         
  <div class="box-body" id="reportcons">


               
    <table id="detalle_consultas" class="table table-striped table-bordered table-condensed table-hover">
        <thead style="background-color:#ffffff" >
          <tr>
            <th colspan="2"><p align="center"><h5><strong>Optica AV Plus</strong></h5></p></th>

           </p></th>
            <th colspan="2"><p align="center"><h4><strong>Reporte de Consultas</strong></h4></p></th>
            <th colspan="1"><p align="center"><h5>2260-1653</h5></p></th> 
            <th colspan="1"><p align="center"><h5><strong>Sucursal:</strong> Metrocentro</h5></p></th> 
   
   
          </tr>
        </thead>


        <!---->
        <thead style="background-color:#A9D0F5" >
          <tr>
            <th colspan="2"><p align="center">Codigo</p></th>
            <th colspan="2"><p align="center">Paciente</p></th>
            <th><p colspan="1" align="center">Fecha de consulta</p></th>
            <th><p colspan="1" align="left">Atendido por: </p></th>
          </tr>
        </thead>
          <tbody>                            
              <tr>

                <td colspan="2"><p id="codigo" name="codigo" align="center"></p></td>
                <td colspan="2"><p id="nombres" name="nombres" align="center"></p></td>
                <td><p colspan="1" id="fecha_reg" name="fecha_reg" align="center"></p></td>
                <td><p colspan="1" id="usuario" name="usuario" align="left"></p></td> 
   
          </tbody>

      <thead    style="background-color:#A9D0F5" align="center">
          <tr>
            <th colspan="6"><p align="center">Diagnostico</p></th>
          
          </tr>
        </thead>
          <tbody>                            
              <tr>
               
                <td colspan="6"><p id="diagnostico" name="diagnostico" align="center"></p></td>     
              </tr>
          </tbody>

  <thead style="background-color:#E8E8E8" align="center">
          <tr>
            <th colspan="6"><p align="center"><strong>Lensometria</strong></p></th>
          
          </tr>
        </thead>

          </tbody>

    <thead class="thead-light">
      <tr>
        <th style="text-align:center">OJO</th>
        <th style="text-align:center">ESFERAS</th>
        <th style="text-align:center">CILIDROS</th>
        <th style="text-align:center">EJE</th>
        <th style="text-align:center">PRISMA</th>
        <th style="text-align:center">ADICION</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>OI</td>
        <td> <p name="oiesfreasl" id="oiesfreasl" align="center"></p></td>
        <td> <p name="oicilindrosl" id="oicilindrosl" align="center"></p></td>
        <td> <p name="oiejesl" id="oiejesl" align="center"></p></td>
        <td> <p name="oiprismal" id="oiprismal" align="center"></p></td>
        <td> <p name="oiadicionl" id="oiadicionl" align="center"></p></td>
        
      </tr>
      <tr>
        <td>OD</td>
        <td> <p name="odesferasl" id="odesferasl" align="center"></p></td>
        <td> <p name="odcilndrosl" id="odcilndrosl" align="center"></p></td>
        <td> <p name="odejesl" id="odejesl" align="center"></p></td>
        <td> <p name="odprismal" id="odprismal" align="center"></p></td>
        <td> <p name="odadicionl" id="odadicionl" align="center"></p></td>
        
      </tr>
    </tbody>

     <thead style="background-color:#E8E8E8" align="center">
        <tr>
          <th colspan="6"><p align="center"><strong>RX Autorefractometro</strong></p></th>          
         </tr>
    </thead>


    <thead class="thead-light">
      <tr>
        <th style="text-align:center">OJO</th>
        <th style="text-align:center">ESFERAS</th>
        <th style="text-align:center">CILIDROS</th>
        <th style="text-align:center">EJE</th>
        <th style="text-align:center">PRISMA</th>
        <th style="text-align:center">ADICION</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>OI</td>
        <td> <p name="oiesferasa" id="oiesferasa" align="center"></p></td>
        <td> <p name="oicolindrosa" id="oicolindrosa" align="center"></p></td>
        <td> <p name="oiejesa" id="oiejesa" align="center"></p></td>
        <td> <p name="oiprismaa" id="oiprismaa" align="center"></p></td>
        <td> <p name="oiadiciona" id="oiadiciona" align="center"></p></td>
        
      </tr>
      <tr>
        <td>OD</td>
        <td> <p name="odesferasa" id="odesferasa" align="center"></p></td>
        <td> <p name="odcilindrosa" id="odcilindrosa" align="center"></p></td>
        <td> <p name="odejesa" id="odejesa" align="center"></p></td>
        <td> <p name="dprismaa" id="dprismaa" align="center"></p></td>
        <td> <p name="oddiciona" id="oddiciona" align="center"></p></td>        
      </tr>

      <tr>
          <th colspan="6"><p align="center"><strong>RX Final</strong></p></th>          
      </tr>

    </tbody>

        <thead class="thead-light">
      <tr>
        <th style="text-align:center">OJO</th>
        <th style="text-align:center">ESFERAS</th>
        <th style="text-align:center">CILIDROS</th>
        <th style="text-align:center">EJE</th>
        <th style="text-align:center">PRISMA</th>
        <th style="text-align:center">ADICION</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>OI</td>
        <td> <p name="oiesferasf" id="oiesferasf" align="center"></p></td>
        <td> <p name="oicolindrosf" id="oicolindrosf" align="center"></p></td>
        <td> <p name="oiejesf" id="oiejesf" align="center"></p></td>
        <td> <p name="oiprismaf" id="oiprismaf" align="center"></p></td>
        <td> <p name="oiadicionf" id="oiadicionf" align="center"></p></td>
        
      </tr>
      <tr>
        <td>OD</td>
        <td> <p name="odesferasf" id="odesferasf" align="center"></p></td>
        <td> <p name="odcilindrosf" id="odcilindrosf" align="center"></p></td>
        <td> <p name="odejesf" id="odejesf" align="center"></p></td>
        <td> <p name="dprismaf" id="dprismaf" align="center"></p></td>
        <td> <p name="oddicionf" id="oddicionf" align="center"></p></td>        
      </tr>

      
    </tbody>

     <thead style="background-color:#A9D0F5" >
          <tr>
            <th colspan="3"><p align="center">Medicamento</p></th>
            <th colspan="3"><p align="center">Lentes sugeridos</p></th>

          </tr>
        </thead>
          <tbody>                            
              <tr>

                <td colspan="3"><p id="medicamento" name="medicamento" align="center"></p></td>
                <td colspan="3"><p id="sugeridos" name="sugeridos" align="center"></p></td>
            </tr>
                
          </tbody>

        <thead style="background-color:#A9D0F5" >
          <tr>
            <th colspan="6"><p align="center">Observaciones</p></th>
          </tr>
        </thead>
          <tbody>                            
              <tr>
                <td colspan="6"><p id="observaciones" name="observaciones" align="center"></p></td>  
            </tr>
                
          </tbody>

        </table>




                         
            </div>
            <!-- /.box-body -->

              <!--BOTON CERRAR DE LA VENTANA MODAL-->
             <div class="modal-footer">
                <button type="button" class="btn btn-dark pull-left" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
              <a href="javascript:genPDF()"><button type="button" class="btn btn-blue pull-right"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button></a>                
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

     

    

        
  