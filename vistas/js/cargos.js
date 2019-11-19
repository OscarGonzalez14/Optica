
var tabla_autos;
//Función que se ejecuta al inicio
function init(){
	
	//listar();

	//llama la lista de pacientes en ventana modal en ventas.php
    //listar_en_ventas();

    listar_act_auto();

	

    
    //cambia el titulo de la ventana modal cuando se da click al boton
	$("#add_button").click(function(){

		     //habilita los campos cuando se agrega un registro nuevo
			  $("#cedula").attr('disabled', false);
			  $("#nombre").attr('disabled', false);
			  $("#apellido").attr('disabled', false);
			
			$(".modal-title").text("Agregar paciente");
		
	  });

	
}



function listar_act_auto()
{
	tabla_autos = $('#paciente_cargo_data').dataTable(
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
					url: '../ajax/paciente.php?op=listar_autos',
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

var cargos = [];

  
function realizar_cargo(id_paciente){

        $('#agregarCargo').modal('show');
  
        $.ajax({
        url:"../ajax/creditos.php?op=mostrar_pac_cargo",
        method:"POST",

        data:{id_paciente:id_paciente},
        cache: false,
        dataType:"json",

        success:function(data){
                       
        $("#monto_name").val(data.nombres);
        $("#monto_name").attr('disabled','disabled');
        $("#code").val(data.codigo);
        //$("#ntarjeta").attr('disabled','disabled');
        $("#ntarjeta").val(data.numero_tarjeta );
        $("#ntarjeta").attr('disabled','disabled');
        $("#fecha").val(data.fecha_vencimiento_tarjeta);
        $("#fecha").attr('disabled','disabled');
        //$("#id_credito").val(data.id_credito);
        //$("#id_paciente").val(data.id_paciente);


          var objects = {
            codPac   : data.codigo_paciente,
            id_paciente : id_paciente,
            //numero_venta : data.numero_venta,
            dui    : data.dui,  
            empresa : data.empresa,
            telefono : data.telefono,
            //saldo    : data.saldo,
            abono    : 0,
            saldo    : 0,
            correo : correo, 
            moneda   : '$ '           
                          
          };

          cargos.push(objects);
          listar_cargos_pac();
          //cancelar_abono_pac();


          }//fin success    

        });//fin de ajax
     // $('#detalle_abonos_pac').modal('show');   
        
      }
      // fin de funcion

function listar_cargos_pac(){

$('#listarCargos').html('');
    var filas = "";
  
for(var i=0; i<cargos.length; i++){


    var filas ="<tr>"+
    "<td name='dui[]'>"+"<p align='center'>"+cargos[i].dui+"</p>"+"</td>"+
    "<td name='telefono[]' align='center'>"+cargos[i].telefono+"</td>"+
    "<td name='empresa[]' align='center'>"+cargos[i].empresa+"</td>"+
    "<td align='center'><input class='form-control' size='4' type='text' class='monto' name='monto' id='monto'></td>"+
    "<td align='center'><input class='form-control' size='4' type='text' class='plazo' name='plazo' id='plazo' onmouseout='setAbono(event, this, "+(i)+");' ></td>"+
    "<td align='center'><input class='form-control' size='4' type='text' class='abonadas' name='abonadas' id='abonadas'></td>"+
    "<td align='center'><input class='form-control' size='4' type='text' class='m_abonado' name='m_abonado' id='m_abonado'></td>"+

    +"</tr>";
  }

  
  $('#listarCargos').html(filas);
  }



 
 function registrar_cargo_pacientes(){
    
    /*IMPORTANTE: se declaran las variables ya que se usan en el data, sino da error*/

    var codigo = $("#code").val();
    //var id_paciente = $("#id_paciente").val();
    var paciente_name = $("#paciente_name").val();
    //var fecha_ = $("#pacien").val();
    var id_usuario = $("#id_usuario").val();
    var plazo =$("#plazo").val();
    var abonadas =$("#abonadas").val();
    var m_abonado =$("#m_abonado").val();
    var recibos = $("#recibos").val();
    var monto = $("#monto");
    var numero_venta = "07";
    var tipo_pago = "Cargo Automatico";
    var paciente ="generico";
    var usuario = "mauricio";
    var tipo_venta ="Credito";
    var sucursal = "Metrocentro";


    //validamos, si los campos(paciente) estan vacios entonces no se envia el formulario
if(m_abonado != ""){
    $.ajax({
    url:"../ajax/creditos.php?op=registrar_cargos_pacientes",
    method:"POST",
    data:{'array_cargos_pacientes':JSON.stringify(cargos),'sucursal':sucursal,'tipo_venta':tipo_venta,'usuario':usuario,'numero_venta':numero_venta,'codigo':codigo,'paciente_name':paciente_name,'plazo':plazo,'abonadas':abonadas,'m_abonado':m_abonado,'recibos':recibos,'monto':monto,'tipo_pago':tipo_pago},
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

            
            cargos = [];
            //$('#listProdVentas').html('');
      $('#errores_ajax').html(data);      
            
              //muestra un mensaje de exito
          setTimeout ("bootbox.alert('Se ha Realizado el Cargo con exito');", 100); 
          
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


init();