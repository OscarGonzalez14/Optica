<div class="modal fade" id="agregarAccesorio" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" align="center"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> CREAR ACCESORIOS</h4>
        </div>
        <div class="modal-body">

    <form class="form-horizontal" method="post" action="../ajax/regAccesorios.php" ">
    <div class="form-group row">
     
     <div class="col-xs-2">
        <label for="ex1">Categoria</label>
        <select class="form-control" id="cat_acc" name="cat_acc">
          <option value="Estuches">Estuches</option>
          <option value="Franelas">Franelas</option>
          <option value="Soluciones">Soluciones</option>
        </select>
      </div>
      <div class="col-xs-10">
        <label for="ex1">Descripción</label>
        <input class="form-control" name="des_acc" type="text" placeholder="Descripcion del Accesorio" required>
      </div>

      <div class="col-xs-4">
        <label for="ex3">Marca</label>
        <input class="form-control" type="text" name="marca_acc" placeholder="marca">
      </div>

      <div class="col-xs-4">
        <label for="ex3">Precio de Venta</label>
        <input class="form-control"  type="text" name="precio_acc" placeholder="precio">
      </div>

      <div class="col-xs-4">
        <label for="ex3">Ubicación</label>
        <input class="form-control" type="text" name="ubicacion_acc" placeholder="ubicacion">
      </div>

     </div>
       <input type="hidden" name="categoria_acc" value="accesorios" />
    <button type="submit" name="agregar" class="btn btn-blue btn-block"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
Guardar</button>
  </form>

  </div>
        <div class="modal-footer">
          <button class="btn btn-dark" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>