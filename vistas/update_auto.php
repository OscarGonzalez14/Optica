<?php

   require_once("../config/conexion.php");

    if(isset($_SESSION["id_usuario"])){
    
    require_once("../modelos/Usuarios.php");
    require_once("../modelos/Pacientes.php");
    $codigo = new Paciente();
    
       
       
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

             <h2>Modulo de Pacientes</h2>

            <div class="row">
              <div class="col-md-12">
                  <div class="box">
     

                    <h1 class="box-title">
                            <button class="btn btn-dark btn-lg"  data-toggle="modal" data-target="#agregarLentes"><i class="fa fa-plus" aria-hidden="true"></i>Actualizar Paciente C_Auto</button></h1>                            


                        <div class="box-tools pull-right">
                        </div>
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
    
<script type="text/javascript" src="js/paciente.js"></script>

  
  <?php  } else {

       require("noacceso.php");
  }
   
  ?><!--CIERRE DE SESSION DE PERMISO -->

<?php

  require_once("footer.php");
?>


<?php
   
  } else {

        header("Location:".Conectar::ruta()."vistas/index.php");

  }

  

?>

