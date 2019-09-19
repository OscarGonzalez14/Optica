

// var tabla;

 var tabla_en_envios;

 /*var tabla_en_ventas;
 var tabla_lentes_ventas;
 var tabla_acc_ventas;
 var tabla_ar_ventas;
 var tabla_photo_ventas
 //Función que se ejecuta al inicio*/

function init(){
	
	agregarDetalleEnvio();

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

function agregarDetalleEnvio(){

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



init();