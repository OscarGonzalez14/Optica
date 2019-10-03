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
    
<div class="modal fade" id="agregarCargo" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" align="center"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> REALIZAR CARGO AUTOMATICO</h4>
        </div>
        <div class="modal-body">

    <form class="form-horizontal" method="post">
    <div class="form-group row">

    <div class="col-xs-2">
        <label for="ex3">Codigo</label>
        <input class="form-control" id="code" type="text" name="code">
    </div>

    <div class="col-xs-6">
        <label for="ex3">Nombre del Paciente</label>
        <input class="form-control" id="monto_name" type="text" name="monto_name" >
    </div>
     
    <div class="col-xs-2">
        <label for="ex3">Numero de Tarjeta</label>
        <input class="form-control" id="ntarjeta" type="text" name="ntarjeta">
    </div>

    <div class="col-xs-2">
        <label for="ex3">Fecha de Venc.</label>
        <input class="form-control" id="fecha" type="text" name="fecha" >
    </div>
 <br>
    <!--TABLA DETALLA PACIENTE CARGO-->    
    <table  class="table table-striped table-bordered table-condensed table-hover">
        <thead style="background-color: #034f84 ;color: white ">
          <tr><th style="background-color:white"></th></tr>
          <tr>

          <th><p align="center"> DUI</p></th>
          <th><p align="center"> Telefono</p></th>
          <th><p align="center"> Empresa</p></th>
          <th><p align="center"> Monto</p></th>
          <th><p align="center"> Plazo</p></th>
          <th><p align="center"> Cuotas Abonadas</p></th> 
          <th><p align="center"> Total abonado</p></th>
          
          </tr>
        </thead>

        <tbody id="listarCargos"></tbody>

      </table>
    <!--FIN TABLA DETALLA PACIENTE CARGO-->

  <div class="col-xs-12">
      <label for="ex3">Concepto</label>
      <input class="form-control" id="concepto" type="text" name="concepto" >
  </div>

    <div class="col-xs-12">
      <label for="ex3">Recibos</label>
      <input class="form-control" id="recibos" type="text" name="recibos" >
  </div>

 
  </div>
    <input type="hidden" name="id_paciente" id="id_paciente"/>
    <input type="hidden" name="tipo_pago" id="tipo_pago" value="Cargo Automatico"/>
    <input type="hidden" name="id_usuarios" id="id_usuarios" value="<?php echo $_SESSION["id_usuario"];?>"/>
    
        <input class="form-control" id="numero_venta" name="numero_venta" type="hidden" value="<?php $codigo=$venta->numero_venta();?>" >


 
 
    <button type="submit" class="btn btn-blue btn-block" onClick="registrar_cargo_pacientes()"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
GUARDAR CARGO AUTOMATICO</button>

  </form>

  </div>
        <div class="modal-footer">
          <button class="btn btn-dark" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
  
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

