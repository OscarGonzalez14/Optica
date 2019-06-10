var tabla_creditos;
var tabla_creditos_empresarial;
var tabla_creditos_c_aut;
var tabla_creditos_c_pers;
var tabla_creditos_metro;
var tabla_cobros_pac;

//Función que se ejecuta al inicio
function init(){
  
  listar_cobros_pac();
  
}

function actualizar(){

  location.reload();

  lista_creditos_empresarial();

 } 
function listar_cobros_pac()
{

    $('#cobros_data thead tr:eq(1) th').each( function () {
        var title = $('#cobros_data thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Buscar '+title+'" />' );
    } );
  
  tabla_cobros_pac=$('#cobros_data').dataTable(
  {
    "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginación y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
      buttons: [              
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],
    "ajax":
        {
          url: '../ajax/creditos.php?op=buscar_cobros_paciente',
          type : "get",
          dataType : "json",            
          error: function(e){
            console.log(e.responseText);  
          }
        },
    "bDestroy": true,
    "responsive": true,
    "bInfo":true,
    "iDisplayLength": 10,//Por cada 10 registros hace una paginación
      "order": [[ 0, "desc" ]],//Ordenar (columna,orden)
      
      "language": {
 
          "sProcessing":     "Procesando...",
       
          "sLengthMenu":     "Mostrar _MENU_ registros",
       
          "sZeroRecords":    "No se encontraron resultados",
       
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
       
          "sInfo":           "Mostrando un total de _TOTAL_ registros",
       
          "sInfoEmpty":      "Mostrando un total de 0 registros",
       
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
       
          "sInfoPostFix":    "",
       
          "sSearch":         "Buscar:",
       
          "sUrl":            "",
       
          "sInfoThousands":  ",",
       
          "sLoadingRecords": "Cargando...",
       
          "oPaginate": {
       
              "sFirst":    "Primero",
       
              "sLast":     "Último",
       
              "sNext":     "Siguiente",
       
              "sPrevious": "Anterior"
       
          },
       
          "oAria": {
       
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
       
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
       
          }

         }//cerrando language
         
  }).DataTable();

        tabla_cobros_pac.columns().every(function (index) {
        $('#cobros_data thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            tabla_cobros_pac.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });
}

function lista_creditos_metro()
{
  $('#titulo').html('Pacientes Metrocentro');
  tabla_creditos_metro=$('#creditos_data').dataTable(
  {
    "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginación y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
      buttons: [              
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],
    "ajax":
        {
          url: '../ajax/creditos.php?op=pacientes_metrocentro',
          type : "get",
          dataType : "json",            
          error: function(e){
            console.log(e.responseText);  
          }
        },
    "bDestroy": true,
    "responsive": true,
    "bInfo":true,
    "iDisplayLength": 10,//Por cada 10 registros hace una paginación
      "order": [[ 0, "desc" ]],//Ordenar (columna,orden)
      
      "language": {
 
          "sProcessing":     "Procesando...",
       
          "sLengthMenu":     "Mostrar _MENU_ registros",
       
          "sZeroRecords":    "No se encontraron resultados",
       
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
       
          "sInfo":           "Mostrando un total de _TOTAL_ registros",
       
          "sInfoEmpty":      "Mostrando un total de 0 registros",
       
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
       
          "sInfoPostFix":    "",
       
          "sSearch":         "Buscar:",
       
          "sUrl":            "",
       
          "sInfoThousands":  ",",
       
          "sLoadingRecords": "Cargando...",
       
          "oPaginate": {
       
              "sFirst":    "Primero",
       
              "sLast":     "Último",
       
              "sNext":     "Siguiente",
       
              "sPrevious": "Anterior"
       
          },
       
          "oAria": {
       
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
       
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
       
          }

         }//cerrando language
         
  }).DataTable();
}


function lista_creditos_empresarial()
{

 /*$('#creditos_data thead tr:eq(1) th').each( function () {
        var title = $('#creditos_data thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input size="15" type="text" placeholder="Buscar por: '+title+'" />' );
    } ); */
       

  $('#titulo').html('Clientes Empresarial');
  tabla_creditos_empresarial=$('#creditos_data').dataTable(
  {
    "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginación y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
      buttons: [              
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],
    "ajax":
        {
          url: '../ajax/creditos.php?op=pacientes_empresarial',
          type : "get",
          dataType : "json",            
          error: function(e){
            console.log(e.responseText);  
          }
        },
    "bDestroy": true,
    "responsive": true,
    "bInfo":true,
    "iDisplayLength": 10,//Por cada 10 registros hace una paginación
      "order": [[ 0, "desc" ]],//Ordenar (columna,orden)
      
      "language": {
 
          "sProcessing":     "Procesando...",
       
          "sLengthMenu":     "Mostrar _MENU_ registros",
       
          "sZeroRecords":    "No se encontraron resultados",
       
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
       
          "sInfo":           "Mostrando un total de _TOTAL_ registros",
       
          "sInfoEmpty":      "Mostrando un total de 0 registros",
       
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
       
          "sInfoPostFix":    "",
       
          "sSearch":         "Buscar:",
       
          "sUrl":            "",
       
          "sInfoThousands":  ",",
       
          "sLoadingRecords": "Cargando...",
       
          "oPaginate": {
       
              "sFirst":    "Primero",
       
              "sLast":     "Último",
       
              "sNext":     "Siguiente",
       
              "sPrevious": "Anterior"
       
          },
       
          "oAria": {
       
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
       
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
       
          }

         }//cerrando language
         
  }).DataTable();

          /*tabla_creditos_empresarial.columns().every(function (index) {
        $('#creditos_data thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            tabla_creditos_empresarial.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });*/
}

function lista_creditos_c_aut()
{

 /*$('#creditos_data thead tr:eq(1) th').each( function () {
        var title = $('#creditos_data thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input size="15" type="text" placeholder="Buscar por: '+title+'" />' );
    } ); */
       

  $('#titulo').html('Pacientes Cargo Automatico');
  tabla_creditos_c_aut=$('#creditos_data').dataTable(
  {
    "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginación y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
      buttons: [              
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],
    "ajax":
        {
          url: '../ajax/creditos.php?op=get_pacientes_c_automatico',
          type : "get",
          dataType : "json",            
          error: function(e){
            console.log(e.responseText);  
          }
        },
    "bDestroy": true,
    "responsive": true,
    "bInfo":true,
    "iDisplayLength": 10,//Por cada 10 registros hace una paginación
      "order": [[ 0, "desc" ]],//Ordenar (columna,orden)
      
      "language": {
 
          "sProcessing":     "Procesando...",
       
          "sLengthMenu":     "Mostrar _MENU_ registros",
       
          "sZeroRecords":    "No se encontraron resultados",
       
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
       
          "sInfo":           "Mostrando un total de _TOTAL_ registros",
       
          "sInfoEmpty":      "Mostrando un total de 0 registros",
       
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
       
          "sInfoPostFix":    "",
       
          "sSearch":         "Buscar:",
       
          "sUrl":            "",
       
          "sInfoThousands":  ",",
       
          "sLoadingRecords": "Cargando...",
       
          "oPaginate": {
       
              "sFirst":    "Primero",
       
              "sLast":     "Último",
       
              "sNext":     "Siguiente",
       
              "sPrevious": "Anterior"
       
          },
       
          "oAria": {
       
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
       
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
       
          }

         }//cerrando language
         
  }).DataTable();

          /*tabla_creditos_empresarial.columns().every(function (index) {
        $('#creditos_data thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            tabla_creditos_empresarial.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });*/
}
  

function lista_creditos_personal()
{

 /*$('#creditos_data thead tr:eq(1) th').each( function () {
        var title = $('#creditos_data thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input size="15" type="text" placeholder="Buscar por: '+title+'" />' );
    } ); */
       

  $('#titulo').html('Pacientes Crédito Personal');
  tabla_creditos_c_pers=$('#creditos_data').dataTable(
  {
    "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginación y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
      buttons: [              
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],
    "ajax":
        {
          url: '../ajax/creditos.php?op=get_pacientes_c_personal',
          type : "get",
          dataType : "json",            
          error: function(e){
            console.log(e.responseText);  
          }
        },
    "bDestroy": true,
    "responsive": true,
    "bInfo":true,
    "iDisplayLength": 10,//Por cada 10 registros hace una paginación
      "order": [[ 0, "desc" ]],//Ordenar (columna,orden)
      
      "language": {
 
          "sProcessing":     "Procesando...",
       
          "sLengthMenu":     "Mostrar _MENU_ registros",
       
          "sZeroRecords":    "No se encontraron resultados",
       
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
       
          "sInfo":           "Mostrando un total de _TOTAL_ registros",
       
          "sInfoEmpty":      "Mostrando un total de 0 registros",
       
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
       
          "sInfoPostFix":    "",
       
          "sSearch":         "Buscar:",
       
          "sUrl":            "",
       
          "sInfoThousands":  ",",
       
          "sLoadingRecords": "Cargando...",
       
          "oPaginate": {
       
              "sFirst":    "Primero",
       
              "sLast":     "Último",
       
              "sNext":     "Siguiente",
       
              "sPrevious": "Anterior"
       
          },
       
          "oAria": {
       
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
       
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
       
          }

         }//cerrando language
         
  }).DataTable();

  /*tabla_creditos_empresarial.columns().every(function (index) {
        $('#creditos_data thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            tabla_creditos_empresarial.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });*/
}

function calcularc()
{
  saldo_act=document.f1.saldo_act.value;
  abono=document.f1.abono.value;
  saldo_n=parseFloat(saldo_act)-parseFloat(abono);
  document.f1.n_saldo.value=saldo_n;
}


   

  //*****************************************************************************

///FIN REGISTRA ABONOS
    

 $(document).on('click', '.abonos', function(){
    //toma el valor del id
    var id_paciente=$(this).attr("id");

    $.ajax({
      url:"../ajax/creditos.php?op=listar_creditos_paciente",
      method:"POST",
      data:{id_paciente:id_paciente},
      cache:false,
      dataType:"json",
      success:function(data)
      {


        $("#telefono").html(data.telefono);
        $("#nombres").html(data.nombres);
        $("#empresa").html(data.empresa);
        $("#c_numeros").html(data.monto);
        $("#id_paciente").val(data.id_paciente);
        $("#id_credito").val(data.id_credito);
        $("#monto").val(data.monto);
        $("#abono_ant").val(data.monto_abono);
        $("#tipo_pago").html(data.tipo_pago);
        $("#saldo_act").val(data.saldo);

        $('#detalle_abonos').modal('show');
                 //puse el alert para ver el error, sin necesidad de hacer echo en la consulta ni nada
        //alert(data);
        
      }
    })
  });

 //ver detalle Aros Ultima Venta

  $(document).on('click', '.abonos', function(){
    //toma el valor del id

    $.ajax({
      url:"../ajax/ventas.php?op=ver_ultima_venta_aros",
      method:"POST",
      //data:{numero_venta:numero_venta},
      cache:false,
      dataType:"json",
      success:function(data)
      {


        $("#marca_aro").val(data.marca);
        $("#marca_aro").attr('disabled','disabled');
        $("#modelo_aro").val(data.modelo);
        $("#modelo_aro").attr('disabled','disabled');
        $("#color_aro").val(data.color);
        $("#color_aro").attr('disabled','disabled');
                 
                 //puse el alert para ver el error, sin necesidad de hacer echo en la consulta ni nada
        //alert(data);
        
      }
    })
  });


function registrar_abono_pacientes(){

    var id_usuario = $("#id_usuario").val();
    var id_paciente = $("#id_paciente").val();
    var id_credito =$("#id_credito").val();
    var abono = $("#abono").val();

    console.log(id_usuario);
    console.log(abono);

    $.ajax({
    url:"../ajax/creditos.php?op=agregar_abono_pacientes",
    method:"POST",
    data:{'id_usuario':id_usuario,'id_paciente':id_paciente,'id_credito':id_credito,'abono':abono},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      d_pacole.log(x);
      console.log(y);
      console.log(z);
    },     
      
    success:function(data){

      var abono = $("#abono").val("");

      setTimeout ("bootbox.alert('Se ha Realizado el Abono con exito');", 100); 
          
          //refresca la pagina, se llama a la funtion explode
      setTimeout ("explode();", 2000);           
    }

  }); 

 }

function explode(){
    $('#detalle_abonos').modal('hide');
    lista_creditos();
}

var abonosp = [];

  
function abonoPaciente(id_paciente, id_credito){

  
        $.ajax({
        url:"../ajax/creditos.php?op=buscar_abonos_paciente",
        method:"POST",

        data:{id_paciente:id_paciente, id_credito:id_credito},
        cache: false,
        dataType:"json",

        success:function(data){
                       
        $("#nombre_pac").val(data.nombres);
        $("#nombre_pac").attr('disabled','disabled');
        $("#telefonos").val(data.telefono);
        $("#telefonos").attr('disabled','disabled');
        $("#fecha").val(data.fecha);
        $("#fecha").attr('disabled','disabled');
        $("#empresas").val(data.empresa);
        $("#empresas").attr('disabled','disabled');
        $("#id_credito").val(data.id_credito);
        $("#id_paciente").val(data.id_paciente);


          var objects = {
            codPac   : data.codigo_paciente,
            numero_venta : data.numero_venta,
            monto    : data.monto,  
            abono_ant : data.monto_abono,
            abono_act : data.abono_act,
            saldo    : data.saldo,
            abono    : 0,
            saldo    : 0,
            saldo_ant : data.saldo, 
            moneda   : '$ '           
                          
          };

          abonosp.push(objects);
          listar_abono_pac();
          //cancelar_abono_pac();


          }//fin success    

        });//fin de ajax
      $('#detalle_abonos_pac').modal('show');   
        
      }
      // fin de funcion

function listar_abono_pac(){

$('#listarAbono').html('');
    var filas = "";
  
    for(var i=0; i<abonosp.length; i++){

var saldo = abonosp[i].saldo = abonosp[i].saldo_ant - abonosp[i].saldo;    
  saldo = abonosp[i].saldo = abonosp[i].saldo_ant - abonosp[i].saldo;

  var mletras = abonosp[i].mletras = abonosp[i].monto / abonosp[i].nletras;    
  mletras = abonosp[i].mletras = abonosp[i].monto /abonosp[i].nletras;

    var filas ="<tr>"+
    "<td name='monto[]'>"+"<p align='center'>"+abonosp[i].moneda+" "+abonosp[i].monto+"</p>"+"</td>"+
    "<td name='abono_ant[]' align='center'>"+abonosp[i].moneda+" "+abonosp[i].abono_ant+"</td>"+
    "<td name='saldo_ant[]' align='center'>"+abonosp[i].moneda+" "+abonosp[i].saldo_ant+"</td>"+
    "<td align='center'><input class='form-control' size='4' type='text' class='abono' name='abono' id=abono"+i+" onmouseout='setAbono(event, this, "+(i)+");' value='"+abonosp[i].abono_act+"'></td>"+
    "<td align='center'><span name='saldo[]' id=saldo"+i+">"+abonosp[i].saldo+"</span> </td>"+
    "<td align='center'>"+
        "<select class='form-control' id='forma_pago' name='forma_pago'><option value='0'>Seleccione</option><option value='Efectivo'>Efectivo</option><option value='Tarjeta de Credito'>Tarjeta de Credito</option><option value='Tarjeta de Debito'>Tarjeta de Debito</option><option value='Cargo Automatico'>Cargo Automatico</option><option value='Cheque'>Cheque</option></select>"+
    "</td>"+
    "<td><div class='form-group'><input type='date' class='form-control' id='p_abono' name='p_abono'></div></td>"
    +"</tr>";
  }

  
  $('#listarAbono').html(filas);
  }


function setAbono(event, obj, idx){
    event.preventDefault();
    abonosp[idx].abono = parseFloat(obj.value);
    recalculo(idx);
  }

    function setLetras(event, obj, idx){
    event.preventDefault();
    abonosp[idx].nletras = parseInt(obj.value);
    recalculo(idx);
  }

  function recalculo(idx){
    console.log(abonosp[idx].abono);
    console.log((abonosp[idx].saldo_ant - abonosp[idx].abono_act));

    console.log(abonosp[idx].nletras);
    console.log((abonosp[idx].monto / abonosp[idx].nletras));

    var saldo =abonosp[idx].saldo = abonosp[idx].saldo_ant - abonosp[idx].abono_act;
    var mletras =abonosp[idx].mletras = abonosp[idx].monto / abonosp[idx].nletras;


  saldoFinal = abonosp[idx].saldo;
  saldoFinalRed=saldoFinal.toFixed(2);      
    $('#saldo'+idx).html(saldoFinalRed);

     Mletras = abonosp[idx].mletras;
     monto_letras=Mletras.toFixed(2);     
    $('#abono'+idx).html(monto_letras);

   //$("#cantidad_"+idx).val(cantidad_venta);
  //calcularTotales();

    
  }
 
 function registrar_abono_pacientes(){
    
    /*IMPORTANTE: se declaran las variables ya que se usan en el data, sino da error*/

    var id_usuario = $("#id_usuario").val();
    var id_paciente = $("#id_paciente").val();
    var id_credito =$("#id_credito").val();
    var forma_pago =$("#forma_pago").val();
    var p_abono = $("#p_abono").val();
    var n_recibo=$("#recibo").val();
    var abono=$("#abono").val();

    //validamos, si los campos(paciente) estan vacios entonces no se envia el formulario
if(forma_pago != 0 && n_recibo != 0){
    $.ajax({
    url:"../ajax/creditos.php?op=registrar_abono_pacientes",
    method:"POST",
    data:{'array_abonos_pacientes':JSON.stringify(abonosp),'id_usuario':id_usuario,'id_paciente':id_paciente,'id_credito':id_credito,'forma_pago':forma_pago,'p_abono':p_abono,'n_recibo':n_recibo},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      d_pacole.log(x);
      console.log(y);
      console.log(z);
    },    
      
      
    success:function(data){

console.log(data);
      var abono = $("#abono").val("");

            
            abonosp = [];
            //$('#listProdVentas').html('');
      $('#errores_ajax').html(data);      
            
              //muestra un mensaje de exito
          setTimeout ("bootbox.alert('Se ha Realizado el Abono con exito');", 100); 
          
          //refresca la pagina, se llama a la funtion explode
          setTimeout ("explode();", 2000); 
          
    }

  }); 

  }else{

  } //cierre del condicional de validacion de los campos del paciente
  
     bootbox.alert("Debe llenar todos los campos");
     return false;
  }
   

  //*****************************************************************************
   /*RESFRESCA LA PAGINA DESPUES DE REGISTRAR LA VENTA*/
       function explode(){

      location.reload();
}
///FIN REGISTRA ABONOS

//VER DETALLE DE CREDITOS
$(document).on('click', '.abonarp', function(){
    //toma el valor del id
    var numero_venta = $(this).attr("id");

    $.ajax({
      url:"../ajax/creditos.php?op=buscar_detalle_credito_aros",
      method:"POST",
      data:{numero_venta:numero_venta},
      cache:false,
      dataType:"json",
      success:function(data)
      {
        
        $("#marca_aros").val(data.marca);
        $("#marca_aros").attr('disabled','disabled');
        $("#modelo_aro").val(data.modelo);
        $("#modelo_aro").attr('disabled','disabled');
        $("#color_aro").val(data.color );
        $("#color_aro").attr('disabled','disabled');
        $('#cancela_abono').modal('show');
          
      }
    })
  });

  $(document).on('click', '.abonarp', function(){
    //toma el valor del id
    var numero_venta = $(this).attr("id");

    $.ajax({
      url:"../ajax/creditos.php?op=buscar_detalle_credito_lentes",
      method:"POST",
      data:{numero_venta:numero_venta},
      cache:false,
      dataType:"json",
      success:function(data)
      {

        $("#modelo_lente").val(data.modelo);
        $("#modelo_lente").attr('disabled','disabled');
          
      }
    })
  });


  $(document).on('click', '.abonarp', function(){
    //toma el valor del id
    var numero_venta = $(this).attr("id");

    $.ajax({
      url:"../ajax/creditos.php?op=buscar_detalle_credito_ar",
      method:"POST",
      data:{numero_venta:numero_venta},
      cache:false,
      dataType:"json",
      success:function(data)
      {

        $("#tipo_ar").val(data.modelo);
        $("#tipo_ar").attr('disabled','disabled');
          
      }
    })
  });

 $(document).on('click', '.abonarp', function(){
    //toma el valor del id
    var numero_venta = $(this).attr("id");

    $.ajax({
      url:"../ajax/creditos.php?op=buscar_detalle_credito_photo",
      method:"POST",
      data:{numero_venta:numero_venta},
      cache:false,
      dataType:"json",
      success:function(data)
      {

        $("#tipo_photo").val(data.modelo);
        $("#tipo_photo").attr('disabled','disabled');
          
      }
    })
  });

//////////////////////////CANCELAR ABONO

var cancel = [];

  
function cancelarAbono(id_paciente, id_credito){

  
        $.ajax({
        url:"../ajax/creditos.php?op=buscar_abonos_paciente",
        method:"POST",

        data:{id_paciente:id_paciente, id_credito:id_credito},
        cache: false,
        dataType:"json",

        success:function(data){
                       
        $("#nombre_paciente").val(data.nombres);
        $("#nombre_paciente").attr('disabled','disabled');
        $("#telefono_pac").val(data.telefono);
        $("#telefono_pac").attr('disabled','disabled');
        $("#fechas").val(data.fecha);
        $("#fechas").attr('disabled','disabled');
        $("#empresa_p").val(data.empresa);
        $("#empresa_p").attr('disabled','disabled');
        $("#id_creditos").val(data.id_credito);
        $("#id_pacientes").val(data.id_paciente);
        $('#cancelacion_p').modal('show');

         var objetos = {
            codPac   : data.codigo_paciente,
            numero_venta : data.numero_venta,
            monto    : data.monto,  
            abono_ant : data.monto_abono,
            abono_act : data.saldo,
            saldo_act    : data.saldo,
            abono    : 0,
            saldo    : 0,
            saldo_ant : data.saldo, 
            moneda   : '$ '           
                          
          };

          cancel.push(objetos);
          cancelar_abono_pac();


          }//fin success    

        });//fin de ajax
         
        
}
//FIN

function cancelar_abono_pac(){

$('#cancela_abonos').html('');
    var filas2 = "";
  
    for(var i=0; i<cancel.length; i++){

var saldo = cancel[i].saldo = cancel[i].saldo_ant - cancel[i].saldo;    
  saldo = cancel[i].saldo = cancel[i].saldo_ant - cancel[i].saldo;

  var mletras = cancel[i].mletras = cancel[i].monto / cancel[i].nletras;    
  mletras = cancel[i].mletras = cancel[i].monto /cancel[i].nletras;

    var filas2 ="<tr>"+
    "<td name='monto[]'>"+"<p align='center'>"+cancel[i].moneda+" "+cancel[i].monto+"</p>"+"</td>"+
    "<td name='abono_ant[]' align='center'>"+cancel[i].moneda+" "+cancel[i].abono_ant+"</td>"+
    "<td name='saldo_ant[]' align='center'>"+cancel[i].moneda+" "+cancel[i].saldo_ant+"</td>"+
    "<td align='center'><input class='form-control' size='4' type='text' class='abono' name='abono' id=abono"+i+" onmouseout='setAbono(event, this, "+(i)+");' value='"+cancel[i].abono_act+"'></td>"+
    "<td align='center'><span name='saldo[]' id=saldo"+i+">"+cancel[i].saldo+"</span> </td>"+
    "<td align='center'>"+
        "<select class='form-control' id='forma_pagos' name='forma_pagos'><option value='0'>Seleccione</option><option value='Efectivo'>Efectivo</option><option value='Tarjeta de Credito'>Tarjeta de Credito</option><option value='Tarjeta de Debito'>Tarjeta de Debito</option><option value='Cargo Automatico'>Cargo Automatico</option></select>"+
    "</td>"
    +"</tr>";
  }

  
  $('#cancela_abonos').html(filas2);
  }

  function registrar_cancelacion(){
    
    /*IMPORTANTE: se declaran las variables ya que se usan en el data, sino da error*/

    var id_usuario = $("#id_usuario").val();
    var id_paciente = $("#id_pacientes").val();
    var id_credito =$("#id_creditos").val();
    var forma_pagos =$("#forma_pagos").val();
    //var abono = $("#abono").val();

    //validamos, si los campos(paciente) estan vacios entonces no se envia el formulario
if(forma_pagos != 0){
    $.ajax({
    url:"../ajax/creditos.php?op=registrar_abono_cancelacion",
    method:"POST",
    data:{'array_abono_cancelacion':JSON.stringify(cancel),'id_usuario':id_usuario,'id_paciente':id_paciente,'id_credito':id_credito,'forma_pagos':forma_pagos},
    cache: false,
    dataType:"html",

      
    success:function(data){

      var abono = $("#abono").val("");

            
            cancel = [];
            //$('#listProdVentas').html('');
            
              //muestra un mensaje de exito
          setTimeout ("bootbox.alert('Se ha Realizado el Abono con exito');", 100); 
          
          //refresca la pagina, se llama a la funtion explode
          setTimeout ("explode();", 2000); 
          
    }

  }); 

  }else{

  } //cierre del condicional de validacion de los campos del paciente
  
     bootbox.alert("Debe llenar todos los campos");
     return false;
  }
 
/*function cobrosPaciente(){

        var empresa = $("#b_empresa").val();

        $.ajax({
        url:"../ajax/creditos.php?op=buscar_cobros_paciente",
        method:"POST",

        data:{empresa:empresa},
        cache: false,
        dataType:"json",

        success:function(data){
                       
       
          control_cobros_pac();
          //cancelar_abono_pac();


          }//fin success    

        });//fin de ajax
 
        
      }

*/
init();