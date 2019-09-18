
 var tabla_en_envios;
 //Función que se ejecuta al inicio
function init(){
	
	listar_envios();
	
}


function listar_envios(){

	tabla_en_envios=$('#lista_productos_envios_data').dataTable(
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


/*
	
function agregarDetalleEnvio(id_producto){
		       $.ajax({
				url:"../ajax/envios.php?op=buscar_producto_en_venta",
				method:"POST",

				data:{id_producto:id_producto},
				cache: false,
				dataType:"json",

				success:function(data){
                       
        
					var objetos = {
						cantidad : 1,
						codProd  : id_producto,
						modelo   : data.modelo,	
						//marca    : data.marca,
						//color    : data.color,				
						//medidas	 : data.medidas,						
						//precio_venta   : data.precio_venta,
						stock    : data.stock
						//categoria    : data.categoria,
													
					};

					detallesEnvio.push(objetos);

						listarDetallesEnvios();

						$('#lista_productos_ventas_Modal').modal("hide");
						$('#lista_acc_ventas_Modal').modal("hide");
						   
                   						
					}//fin success		

				});//fin de ajax		
		    
		  }// fin de funcion


  function listarDetallesEnvios(){

  	  
  	$('#listProdEnvios').html('');

  

  	var filasenvios = ""; 	

      

  	for(var i=0; i<detallesEnvio.length; i++){

  	

	 var filasenvios = filasenvios + "<tr><td>"+(i+1)+
	 "</td> <td name='modelo[]'>"+detallesEnvio[i].modelo+
	 "</td> <td name='color[]'>" +
	 "</td><td><input type='number' class='cantidad input-group-sm' name='cantidad[]' id='cantidad[]' onClick='setCantidad(event, this, "+(i)+");' onKeyUp='setCantidad(event, this, "+(i)+");' value='"+
	 detallesEnvio[i].cantidad+
	 "'></td> <td>  <button href='#' class='btn btn-danger btn-lg' role='button' onClick='eliminarProd(event, "+
	 (i)+");' aria-pressed='true'><span class='glyphicon glyphicon-trash'></span> </button></td> </tr>";

	}

	
	$('#listProdCompras').html(filas);

	
      
  }
*/
init();