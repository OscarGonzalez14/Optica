
var tabla_creditos;

//Función que se ejecuta al inicio
function init(){
  
  //lista_credito();

  
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

function calcularc()
{
  abono_ant=document.f1.abono_ant.value;
  abono=document.f1.abono.value;
  saldo_n=parseFloat(abono_ant)-parseFloat(abono);
  document.f1.n_saldo.value=saldo_n;
}

function registrarAbono(){
    
    /*IMPORTANTE: se declaran las variables ya que se usan en el data, sino da error*/

    var id_usuario = $("#id_usuario").val();
    var id_paciente = $("#id_paciente").val();
    var id_credito =$("#id_credito").val();


    //validamos, si los campos(paciente) estan vacios entonces no se envia el formulario

    $.ajax({
    url:"../ajax/ventas.php?op=registrar_abono",
    method:"POST",
    data:{'arrayAbonos':JSON.stringify(abonoi),'id_usuario':id_usuario,'id_paciente':id_paciente,'id_credito':id_credito},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      d_pacole.log(x);
      console.log(y);
      console.log(z);
    },    
      
      
    success:function(data){

      var nombre_pac = $("#saldo").val("");

            
            abonoi = [];
            //$('#listProdVentas').html('');
            
              //muestra un mensaje de exito
          setTimeout ("bootbox.alert('Se ha Realizado el Abono con exito');", 100); 
          
          //refresca la pagina, se llama a la funtion explode
          setTimeout ("explode();", 2000); 
          
    }

  }); 

   //cierre del condicional de validacion de los campos del paciente
  
  }

   

  //*****************************************************************************
   /*RESFRESCA LA PAGINA DESPUES DE REGISTRAR LA VENTA*/
       function explode(){

      location.reload();
}
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
        $("#abono_ant").val(data.saldo);
         $("#tipo_pago").html(data.tipo_pago);

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



init();