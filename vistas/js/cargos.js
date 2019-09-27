
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

function realizar_cargo(id_paciente)
{
	$.post("../ajax/paciente.php?op=mostrar_pac_cargo",{id_paciente : id_paciente}, function(data, status)
	{
		data = JSON.parse(data);



		  console.log(data);
		

		
		$('#agregarCargo').modal('show');					

			$('#paciente_cargo').val(data.nombres);
			//$("#paciente_cargo").attr('disabled', 'disabled');

			$('#code').val(data.codigo);
			//$("#code").attr('disabled', 'disabled');

			$('#ntarjeta').val(data.numero_tarjeta);
			//$("#ntarjeta").attr('disabled', 'disabled');

			$('#fecha').val(data.fecha_vencimiento_tarjeta);
			//$("#fecha").attr('disabled', 'disabled');

			$('#id_paciente').val(data.id_paciente);

			$('#id_usurios').val(data.id_paciente);				


			//$('.modal-title').text("Nueva Consulta");


		      
		
				
		});
        
        
	}


function registrarCargoAuto(){
    
    /*IMPORTANTE: se declaran las variables ya que se usan en el data, sino da error*/
    var monto_cargo = $("#monto_cargo").val();
    var plazo_cargo = $("#plazo_cargo").val();
    var concepto = $("#concepto").val();
    var n_venta = $("#numero_venta");
    var id_usuario = $("#id_usuarios").val();
    var id_paciente = $("#id_paciente").val();
    var tipo_pago = $("#tipo_pago").val();
    var codigo_paciente = $("#code").val();
    var nombre_pac = $("#paciente_cargo").val();
    //validamos, si los campos(paciente) estan vacios entonces no se envia el formulario

    if(monto_cargo != ""){

    //$("#descuento").attr('disabled', 'disabled');
     console.log('error!');

    $.ajax({
		url:"../ajax/producto.php?op=registrar_cargo",
		method:"POST",
		data:{tipo_pago:tipo_pago,id_usuario:id_usuario,id_paciente:id_paciente,monto_cargo:monto_cargo,plazo_cargo:plazo_cargo,concepto:concepto,nombre_pac:nombre_pac,codigo_paciente:codigo_paciente},
		cache: false,
		dataType:"html",
		error:function(x,y,z){
			d_pacole.log(x);
			console.log(y);
			console.log(z);
		},    
      
			
		success:function(data){

	    //var nombre_pac = $("#nombre_pac").val("");

            
            //detalles = [];
            //$('#listProdVentas').html('');
            
              //muestra un mensaje de exito
          setTimeout ("bootbox.alert('Se ha registrado el cargo con éxito');", 100); 
          
          //refresca la pagina, se llama a la funtion explode
          setTimeout ("explode();", 2000); 
         	
		}

	});	

	 //cierre del condicional de validacion de los campos del paciente

	 } else{

	 	 bootbox.alert("Debe llenar todos los campos");
	 	 return false;
	 } 	
	
  }	


init();