<div class="modal fade" id="agregarLentes" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" align="center"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> ACTUALIZAR CARGO AUTOMATICO</h4>
        </div>
        <div class="modal-body">

    <form class="form-horizontal" method="post" action="../ajax/act_cauto_pac.php">
    <div class="form-group row">
     
      <div class="col-xs-3">
       <label>Codigo de Paciente</label>
    <input type="text" class="form-control" id="codigo" name="codigo" value="<?php $codigos=$codigo->codigo_paciente(); ?>" readonly>
      </div>
   <div class="col-xs-9">
        <label for="ex1">Nombre</label>
        <input class="form-control" id="nombres" name="nombres" type="text" placeholder="Escriba el Nombre del paciente" required>
      </div>

     <div class="col-xs-4">
        <label for="ex1">DUI</label>
        <input class="form-control" id="dui" name="dui" type="text" placeholder="Escriba el DUI del paciente" required>
      </div>

      <div class="col-xs-4">
        <label for="ex2">Telefono del Paciente</label>
        <input class="form-control" id="telefono" type="text" name="telefono">
      </div>

      <div class="col-xs-4">
        <label for="ex3">Edad</label>
        <input class="form-control" id="edad" type="number" name="edad" placeholder="edad" required>
      </div>

      <div class="col-xs-4">
        <label for="ex3">Empresa</label>
        <input class="form-control" id="empresa" type="empresa" name="empresa" placeholder="empresa" required>
      </div>

      <div class="col-xs-6">
        <label for="ex3">Ocupación</label>
        <input class="form-control" id="ocupacion" type="text" name="ocupacion" placeholder="ocupacion del paciente">
      </div>

      

      <div class="col-xs-6">
        <label for="ex3">Correo</label>
        <input class="form-control" id="correo" type="text" name="correo" placeholder="correo del paciente" required>
      </div>


      <div class="col-xs-6">
      <label for="ex3">Tipo de Tarjeta</label>
      <select class='form-control' id='tipo_tarjeta' name='tipo_tarjeta'>
        <option value='0'>Seleccione El tipo de Tarjeta</option>
        <option value='credito'>Credito</option>
        <option value='debito'>Debito</option>  
      </select>
      </div>

      <div class="col-xs-3">
        <label for="ex3">Numero de Tarjeta</label>
        <input class="form-control" id="num_tarjeta" type="text" name="num_tarjeta" placeholder="Ingrese el Numero de Tarjeta" >
      </div>

      <div class="col-xs-3">
        <label for="ex3">Fecha vencimiento tarjeta</label>
        <input class="form-control" id="vencimiento" type="date" name="vencimiento" placeholder="Ingrese el Numero de Tarjeta" >
      </div>

      <input type="hidden" name="tipo_pac" id="tipo_pac" value="c_autom">


  </div>
    <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>
 
 
    <button type="submit" id="agregar" name="agregar" class="btn btn-blue btn-block"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
Guardar</button>

  </form>

  </div>
        <div class="modal-footer">
          <button class="btn btn-dark" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>