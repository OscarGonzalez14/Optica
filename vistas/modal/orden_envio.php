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
<div id="orden_envio" class="modal fade" role="dialog">
  <div class="modal-dialog" id="tamModal">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" id="head">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title" align="center"></i>ORDEN DE ENVIO</h5>
      </div>
      <div class="modal-body">

<div class="row"><!--inicio row1-->

  <div class="col-sm-3">
      <label>Fecha Envio: </label>
      <strong><span data-toggle="tooltip" id="date" class="badge bg-blue"></span></strong>
  </div>

  <div class="col-sm-2"><label>Usuario: </label>
    <span data-toggle="tooltip" class="badge bg-blue" id="comprador" name="comprador"><?php echo $_SESSION["usuario"];?></h4>
  </div>

  <div class="col-sm-3">
      <select class="form-control" name="categoria" id="categoria" required>
          <option  value="">Suc. origen</option>
              <?php
                for($i=0; $i<sizeof($cat);$i++){
                             
                             ?>
                              <option value="<?php echo $cat[$i]["categoria"]?>"><?php echo $cat[$i]["categoria"];?></option>
                             <?php
                           }
                        ?>
                      
                    </select>

              </div>
  <div class="col-sm-3">
      <select class="form-control" name="categoria" id="categoria" required>
          <option  value="">Suc. Destino</option>
              <?php
                for($i=0; $i<sizeof($cat);$i++){
                             
                             ?>
                              <option value="<?php echo $cat[$i]["categoria"]?>"><?php echo $cat[$i]["categoria"];?></option>
                             <?php
                           }
                        ?>
                      
                    </select>

              </div>

</div><!--Fin row1-->     

  <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>
      <input id="id_credito" type="hidden" name="id_credito">
      <input id="id_paciente" type="hidden" name="id_paciente">


      </div>
      <div class="modal-footer">
    <button type="button" onClick="registrar_abono_pacientes()" class="btn btn-dark pull-right btn-block"><i class="fa fa-save" aria-hidden="true"></i> Realizar Envio</button>
      </div>
    </div>

  </div>
</div>