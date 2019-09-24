<?php

   require_once("../config/conexion.php");
   require_once("../modelos/Categorias.php");

   $categoria = new Categoria();
   $cat = $categoria->get_categorias();

    if(isset($_SESSION["id_usuario"])){
       
       
?>



<?php
 
  require_once("header.php");

?>



<?php if($_SESSION["usuarios"]==1)
     {

     ?>


  <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
             
             <div id="resultados_ajax"></div>

             <h2>Listado de Requisiones</h2>

            <div class="row">
              <div class="col-md-12">

                <div class="box">

                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive">
                          
                          <table id="requisiones_data" class="table table-bordered table-striped">

                            <thead>
                              
                                <tr>
                                  
                                <th>Codigo</th>
                                <th>S.Origen</th>
                                <th>S.Destino</th>
                                <th>Usuario</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                               



                                </tr>
                            </thead>

                            <tbody>
                              

                            </tbody>


                          </table>
                     
                    </div>
                  
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
    
   
                 

        </div>


               <div class="modal-footer">

                 <input type="hidden" name="id_usuario" id="id_usuario"/>

                 <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
         
          <button type="button" onclick="limpiar()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
            
                 

               </div>



            </div>
           

         </form>


      </div>

    </div>

     
     
  <?php  } else {

       require("noacceso.php");
  }
   
  ?>--><!--CIERRE DE SESSION DE PERMISO -->


<?php

  require_once("footer.php");
?>

<script type="text/javascript" src="js/envios.js"></script>



<?php
   
  } else {

        header("Location:".Conectar::ruta()."vistas/index.php");

  }

  

?>

