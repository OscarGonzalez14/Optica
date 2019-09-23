

// var tabla;

 var tabla_en_envios;

 /*var tabla_en_ventas;
 var tabla_lentes_ventas;
 var tabla_acc_ventas;
 var tabla_ar_ventas;
 var tabla_photo_ventas
 //Función que se ejecuta al inicio*/

function init(){
	
	listarEnvio();

	 //llama la lista de productos en ventana modal en compras.php
	//listar_en_compras();


	//llama la lista de productos en ventana modal en ventas.php
	/*listar_en_ventas();
	listar_lentes_en_ventas();
	listar_acc_en_ventas();
	listar_ar_en_ventas()
	listar_photo_en_ventas()*/
	 //cuando se da click al boton submit entonces se ejecuta la funcion guardaryeditar(e);
	$("#producto_form").on("submit",function(e)
	{

		guardaryeditar(e);	
	})
    
    //cambia el titulo de la ventana modal cuando se da click al boton
	$("#add_button").click(function(){

		   
		    /*habilita los campos categoria, producto, moneda ya que si se 
            editaba uno que tenia registro asociado entonces al crear un nuevo registro aparecian los campos deshabilitados*/
			 $("#categoria").attr('disabled', false);
			 $("#producto").attr('disabled', false);
			 $("#moneda").attr('disabled', false);
			
			
			$(".modal-title").text("Agregar Aros");
		
	  });

	
}

function listarEnvio(){

	tabla_en_envios=$('#lista_envios_data').dataTable(
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
					url: '../ajax/envios.php?op=listar_en_envios',
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

function registrarMovimiento(){
    
    /*IMPORTANTE: se declaran las variables ya que se usan en el data, sino da error*/
    var sucursal_origen = $("#sucursal_origen").val();
    var sucursal_destino = $("#sucursal_destino").val();
    var numero_envio = $("#numero_envio").val();

    //var comprador = $("#comprador").html();
  
    var id_usuario = $("#id_usuario").val();
 
    if(detallesE != ""){
    

     console.log('Proof');
   
    $.ajax({
		url:"../ajax/envios.php?op=registrar_ingreso",
		method:"POST",
		data:{'arrayIngreso':JSON.stringify(detallesE), 'sucursal_origen':sucursal_origen,'sucursal_destino':sucursal_destino,'id_usuario':id_usuario,'numero_envio':numero_envio},
		cache: false,		
		dataType:"html",
		error:function(x,y,z){
			console.log(x);
			console.log(y);
			console.log(z);
		},
         

		success:function(data){

			console.log(data);
                         
            detalles = [];
            $('#listProdEnvios').html('');



          setTimeout ("bootbox.alert('Se ha registrado el envio con éxito');", 100); 
          
 
          setTimeout ("explode();", 2000); 

         	
		}


	});	

	 //cierre del condicional de validacion de los campos del producto,proveedor,pago

	 } else{

	 	 bootbox.alert("Debe agregar al menos un item y una sucursal");
	 	 return false;
	 } 	
	
  }


init();