<?php

   require_once("../config/conexion.php");

    if(isset($_SESSION["id_usuario"])){
    
    require_once("../modelos/Usuarios.php");
    require_once("../modelos/Pacientes.php");
    $codigo = new Paciente();
    
    require_once("../modelos/Ventas.php");
     
    $venta = new Ventas();
    
       
       
?>

<?php 
  require_once("header.php");
?>

  <?php if($_SESSION["pacientes"]==1)
     {

     ?>


  </style>
  <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper"> 
           <?php require_once("modal/c_auto_pacientes.php");?>

        <!-- Main content -->
        <section class="content">
             
             <div id="resultados_ajax"></div>

             <h2>Actualizar Cargos Automáticos</h2>

            <div class="row">
            <div class="col-sm-1"></div>  

 
            <h1 class="box-title">
              <button class="btn btn-danger"  data-toggle="modal" data-target="#agregarLentes"><i class="fa fa-plus" aria-hidden="true"></i><strong> Crear Paciente C_Auto</strong></button></h1>                   
            </div>

            <div class="panel-body table-responsive">
                          
                          <table id="paciente_cargo_data" class="table table-bordered table-striped">

                            <thead>
                              
                                <tr>
                                  
                                <th>Codigo</th>
                                <th>Nombres</th>
                                <th>DUI</th>
                                <th>Empresa</th>
                                <th>Num. Tarjeta</th>                               
                                <th width="10%">Crear Cargo</th>
                                <th width="10%">Abonar</th>

                                </tr>
                            </thead>

                            <tbody>
                              

                            </tbody>


                          </table>
                     
                    </div>
                  
                    <!-- /.box-header -->
                    <!-- centro -->
                  
                  
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
    

  
  <?php  } else {

       require("noacceso.php");
  }
   
  ?><!--CIERRE DE SESSION DE PERMISO -->

<?php

  require_once("footer.php");
?>

<script type="text/javascript" src="js/cargos.js"></script>


<?php
   
  } else {

        header("Location:".Conectar::ruta()."vistas/index.php");

  }

  

?>

