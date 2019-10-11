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

  <style>
    #tamanoModal{
      width: 75% !important;
    }
     #encabezado{
        background-color: #034f84;
        color: white;
    }


  </style>
  <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper"> 
       
        <!-- Main content -->
        <section class="content">
             
             <div id="resultados_ajax"></div>

             <h2>Modulo de Pacientes Suscritos</h2>

            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                        

                                               

                        

                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive">
                          
                          <table id="paciente_planes_data" class="table table-bordered table-striped">

                            <thead>
                              
                                <tr>
                                  
                                <th>Nombres</th>
                                <th>DUI</th>
                                <th>Numero de Tarjeta</th>
                                <th>Celular</th>
                                <th>Correo</th>                                
                                <th width="10%">Editar</th>
                           
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
    
    <!--FORMULARIO VENTANA MODAL-->
  
<div class="modal fade" id="pacienteplanesModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> AFILIAR PACIENTE</h4>
        </div>
<div class="modal-body">

  <form method="post" id="paciente_form">
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

      <div class="col-xs-6">
        <label for="ex3">Correo</label>
        <input class="form-control" id="correo" type="text" name="correo" placeholder="correo del paciente" required>
      </div>

      <div class="col-xs-4">
        <label for="ex2">Telefono del Paciente</label>
        <input class="form-control" id="telefono" type="text" name="telefono">
      </div>

      <div class="col-xs-4">
        <label for="ex3">Edad</label>
        <input class="form-control" id="edad" type="number" name="edad" placeholder="edad" required>
      </div>

      <div class="col-xs-6">
        <label for="ex3">Numero de Tarjeta</label>
        <input class="form-control" id="tarjeta_n" type="text" name="tarjeta_n" placeholder="ocupacion del paciente">
      </div>

      <div class="col-xs-6">
        <label for="ex3">Empresa</label>
        <input class="form-control" id="empresa" type="text" name="empresa" placeholder="empresa" placeholder="Escriba la empresa donde labora el paciente">
      </div>


      <div class="col-xs-12">
        <h3 align="center">Agregar Beneficiarios</h3>
      </div>

<table class="table">

    <thead class="thead-light">
      <tr>
        <th style="text-align:center">No.</th>
        <th style="text-align:center">NOMBRE DEL BENEFICIARIO</th>
        <th style="text-align:center">PARENTESCO</th>
        <th style="text-align:center">EDAD</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td> <input type="text" class="form-control" placeholder="Nombre del Primer Beneficiario" name="nombreb1" ></td>
        <td> <input type="text" class="form-control" placeholder="parentesco primer beneficiario" name="oicilindrosl" ></td>
        <td> <input type="text" class="form-control" placeholder="edad primer beneficiario" name="oiejesl" ></td>

      </tr>
      <tr>
        <td>2</td>
        <td> <input type="text" class="form-control" placeholder="Nombre del Segundo Beneficiario" name="odesferasl"></td>
        <td> <input type="text" class="form-control" placeholder="parentesco segundo beneficiario" name=""></td>
        <td> <input type="text" class="form-control" placeholder="edad primer beneficiario" name=""></td> 
      </tr>

      <tr>
        <td>3</td>
        <td> <input type="text" class="form-control" placeholder="Nombre del Tercer Beneficiario" name="odesferasl"></td>
        <td> <input type="text" class="form-control" placeholder="parentesco del tercer beneficiario" name=""></td>
        <td> <input type="text" class="form-control" placeholder="edad del tercer beneficiario" name=""></td> 
      </tr>

      <tr>
        <td>4</td>
        <td> <input type="text" class="form-control" placeholder="Nombre del Cuarto Beneficiario" name="odesferasl"></td>
        <td> <input type="text" class="form-control" placeholder="parentesco del cuarto beneficiario" name=""></td>
        <td> <input type="text" class="form-control" placeholder="edad del cuarto beneficiario" name="edad del cuarto beneficiario"></td> 
      </tr>


    </tbody>
  </table>


    </div>

  <input type="hidden" name="id_paciente" id="id_paciente"/>
  <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>
 

<button type="submit"  class="btn btn-primary btn-block"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
AFILIAR</button>
  </form>

  </div>
        <div class="modal-footer">
          <button class="btn btn-dark" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

 <!--FIN FORMULARIO VENTANA MODAL-->


  
  <?php  } else {

       require("noacceso.php");
  }
   
  ?><!--CIERRE DE SESSION DE PERMISO -->

<?php

  require_once("footer.php");
?>

<script type="text/javascript" src="js/paciente.js"></script>

<?php
   
  } else {

        header("Location:".Conectar::ruta()."vistas/index.php");

  }

  

?>

