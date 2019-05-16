var tabla_creditos;
var tabla_creditos_empresarial;

//Función que se ejecuta al inicio
function init(){
  
  
}

function actualizar(){

  location.reload();

  lista_creditos_empresarial();

 } 

function lista_creditos()
{
  $('#titulo').html('Clientes Metrocentro');
  tabla_creditos=$('#creditos_data').dataTable(
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
          url: '../ajax/creditos.php?op=c_metrocentro',
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
            saldo    : data.saldo,
            abono    : 0,
            saldo    : 0,
            saldo_ant : data.saldo, 
            moneda   : '$ '           
                          
          };

          abonosp.push(objects);
          listar_abono_pac();


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
    "<td align='center'><input class='form-control' size='4' type='text' class='abono' name='abono' id=abono"+i+" onkeyup='setAbono(event, this, "+(i)+");' value='"+abonosp[i].abono+"'></td>"+
    "<td align='center'><span name='saldo[]' id=saldo"+i+">"+abonosp[i].saldo+"</span> </td>"+
    "<td align='center'>"+
        "<select class='form-control' id='forma_pago' name='forma_pago'><option value='0'>Seleccione</option><option value='Efectivo'>Efectivo</option><option value='Tarjeta de Credito'>Tarjeta de Credito</option><option value='Tarjeta de Debito'>Tarjeta de Debito</option><option value='Cargo Automatico'>Cargo Automatico</option></select>"+
    "</td>"
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
    console.log((abonosp[idx].saldo_ant - abonosp[idx].abono));

    console.log(abonosp[idx].nletras);
    console.log((abonosp[idx].monto / abonosp[idx].nletras));

    var saldo =abonosp[idx].saldo = abonosp[idx].saldo_ant - abonosp[idx].abono;
    var mletras =abonosp[idx].mletras = abonosp[idx].monto / abonosp[idx].nletras;


  saldoFinal = abonosp[idx].saldo;
  saldoFinalRed=saldoFinal.toFixed(2);      
    $('#saldo'+idx).html(saldoFinalRed);

     Mletras = abonosp[idx].mletras;
     monto_letras=Mletras.toFixed(2);     
    $('#mletras'+idx).html(monto_letras);

  //$("#cantidad_"+idx).val(cantidad_venta);
  calcularTotales();

    
  }
 
 function registrar_abono_pacientes(){
    
    /*IMPORTANTE: se declaran las variables ya que se usan en el data, sino da error*/

    var id_usuario = $("#id_usuario").val();
    var id_paciente = $("#id_paciente").val();
    var id_credito =$("#id_credito").val();
    var forma_pago =$("#forma_pago").val();
    //var abono = $("#abono").val();

    //validamos, si los campos(paciente) estan vacios entonces no se envia el formulario
if(forma_pago != 0){
    $.ajax({
    url:"../ajax/creditos.php?op=registrar_abono_pacientes",
    method:"POST",
    data:{'array_abonos_pacientes':JSON.stringify(abonosp),'id_usuario':id_usuario,'id_paciente':id_paciente,'id_credito':id_credito,'forma_pago':forma_pago},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      d_pacole.log(x);
      console.log(y);
      console.log(z);
    },    
      
      
    success:function(data){

      var abono = $("#abono").val("");

            
            abonosp = [];
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

  


init();