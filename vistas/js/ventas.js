var tabla;

var tabla_ventas;

var tabla_ventas_mes;

//Función que se ejecuta al inicio
function init(){
	
	listar();

	
}

//VALDAR TIPO DE PAGO
$(document).ready(function(){
	$("#tipo_venta").change(function () {

					
		$("#tipo_venta option:selected").each(function () {
			id_tipo = $(this).val();
			$.post('../ajax/ventas.php?op=tipo_pago', { id_tipo: id_tipo }, function(data){
				$("#tipo_pago").html(data);
			});            
		});
	})
});
//Función Listar
function listar()
{
	tabla=$('#ventas_data').dataTable(
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
					url: '../ajax/ventas.php?op=buscar_ventas',
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

var abonoi = [];

	
function abono_inicial(){

	
		       $.ajax({
				url:"../ajax/ventas.php?op=ver_ultima_venta",
				method:"POST",

				//data:{id_producto:id_producto},
				cache: false,
				dataType:"json",

				success:function(data){
                       
        
					var objetos = {
						
						monto    : data.monto,	
						telefono : data.telefono,
						nombres  : data.nombres,				
						empresa	 : data.empresa,						
						saldo    : data.saldo,
						abono 	 : 0,
						saldo 	 : 0,
						nletras  : 1,
						mletras	 : 1,
						abono_ant : '00.00',
						moneda	 : '$ '  
													
					};

					abonoi.push(objetos);
					listarAbono();


					}//fin success		

				});//fin de ajax
			$('#detalle_abonos').modal('show');		
		    
		  }
		  // fin de funcion

function listarAbono(){

  	$('#listarAbono').html('');
  
  	for(var i=0; i<abonoi.length; i++){

	var saldo = abonoi[i].saldo = abonoi[i].monto - abonoi[i].saldo;	  
	saldo = abonoi[i].saldo = abonoi[i].monto - abonoi[i].saldo;

	var mletras = abonoi[i].mletras = abonoi[i].monto / abonoi[i].nletras;	  
	mletras = abonoi[i].mletras = abonoi[i].monto /abonoi[i].nletras;

    var filas ="<tr>"+"<td><input type='text' class='nletras' name='nletras' id=nletras"+i+" onkeyup='setLetras(event, this, "+(i)+");' value='"+abonoi[i].nletras+"'></td>"+
 	"<td align'center'> <span name='mletras[]' id=mletras"+i+">"+abonoi[i].moneda+" "+abonoi[i].mletras+"</span> </td>"+
    "<td name='monto[]'>"+"<p align='center'>"+abonoi[i].monto+"</p>"+"</td>"+
    "<td td name='abono_ant[]'>"+abonoi[i].abono_ant+"</td>"+
    "<td><input type='text' class='abono' name='abono' id=abono"+i+" onkeyup='setAbono(event, this, "+(i)+");' value='"+abonoi[i].abono+"'></td>"+
    "<td> <span name='saldo[]' id=saldo"+i+">"+abonoi[i].saldo+"</span> </td>"+"</tr>"+
    "<tr>"+"<td>"+abonoi[i].moneda+"<td>"+"</tr>";
	}

	
	$('#listarAbono').html(filas);
	}

  function setAbono(event, obj, idx){
  	event.preventDefault();
  	abonoi[idx].abono = parseFloat(obj.value);
  	recalculo(idx);
  }

    function setLetras(event, obj, idx){
  	event.preventDefault();
  	abonoi[idx].nletras = parseInt(obj.value);
  	recalculo(idx);
  }

  function recalculo(idx){
  	console.log(abonoi[idx].abono);
  	console.log((abonoi[idx].monto - abonoi[idx].abono));

  	console.log(abonoi[idx].nletras);
  	console.log((abonoi[idx].monto / abonoi[idx].nletras));

    var saldo =abonoi[idx].saldo = abonoi[idx].monto - abonoi[idx].abono;
    var mletras =abonoi[idx].mletras = abonoi[idx].monto / abonoi[idx].nletras;


 	saldoFinal = abonoi[idx].saldo;	    
    $('#saldo'+idx).html(saldoFinal);

     Mletras = abonoi[idx].mletras;
     monto_letras=Mletras.toFixed(2);	    
    $('#mletras'+idx).html(monto_letras);

 	//$("#cantidad_"+idx).val(cantidad_venta);
	calcularTotales();

	  
  }

  	

 $(document).on('click', '.abono_ini', function(){
	 	//toma el valor del id

		$.ajax({
			url:"../ajax/ventas.php?op=ver_ultima_venta",
			method:"POST",
			//data:{numero_venta:numero_venta},
			cache:false,
			dataType:"json",
			success:function(data)
			{


				$("#telefono").html(data.telefono);
				$("#nombres").html(data.nombres);
				$("#empresa").html(data.empresa);
				
                 
                 //puse el alert para ver el error, sin necesidad de hacer echo en la consulta ni nada
				//alert(data);
				
			}
		})
	});

	  //VER DETALLE paciente-VENTA
	 $(document).on('click', '.detalle', function(){
	 	//toma el valor del id
		var numero_venta = $(this).attr("id");

		$.ajax({
			url:"../ajax/ventas.php?op=ver_detalle_paciente_venta",
			method:"POST",
			data:{numero_venta:numero_venta},
			cache:false,
			dataType:"json",
			success:function(data)
			{
				

				$("#paciente").html(data.nombres);
				$("#numero_venta").html(data.numero_venta);
				$("#telefono").html(data.telefono);
				$("#fecha_venta").html(data.fecha_venta);
				$("#vendedor").html(data.usuario);
				$("#sucursal").html(data.sucursal);
                 
                 //puse el alert para ver el error, sin necesidad de hacer echo en la consulta ni nada
				//alert(data);
				
			}
		})
	});

	  //VER DETALLE VENTA
	 $(document).on('click', '.detalle', function(){
	 	//toma el valor del id
		var numero_venta = $(this).attr("id");

		$.ajax({
			url:"../ajax/ventas.php?op=ver_detalle_venta",
			method:"POST",
			data:{numero_venta:numero_venta},
			cache:false,
			//dataType:"json",
			success:function(data)
			{
				
				$("#detalles").html(data);
                 
                 //puse el alert para ver el error, sin necesidad de hacer echo en la consulta ni nada
				//alert(data);
				
			}
		})
	});
     

     //CAMBIAR ESTADO DE LA VENTA

   
    function cambiarEstado(id_ventas, numero_venta, est){
    

    //alert(numero_compra);
    	

	bootbox.confirm("¿Estas seguro que quieres anular esta compra?", function(result){
		if(result)
		{


			$.ajax({
				url:"../ajax/ventas.php?op=cambiar_estado_venta",
				 method:"POST",
				//data:dataString,
				//toma el valor del id y del estado
				data:{id_ventas:id_ventas,numero_venta:numero_venta, est:est},
				cache: false,
				
				success:function(data){
	              
	              //alert(data);
                 $('#ventas_data').DataTable().ajax.reload();

                  //refresca el datatable de ventas por fecha
                 $('#ventas_fecha_data').DataTable().ajax.reload();


                 //refresca el datatable de ventas por fecha - mes
                 $('#ventas_fecha_mes_data').DataTable().ajax.reload();
                 

				}

			});

		   } 

	  });//bootbox


	  }

	   //CONSULTA VENTAS-FECHA
           $(document).on("click","#btn_venta_fecha", function(){


           	var fecha_inicial= $("#datepicker").val();
           	var fecha_final= $("#datepicker2").val();

           	//alert(fecha_inicial);
           	//alert(fecha_final);

        //validamos si existe las fechas entonces se ejecuta el ajax

        if(fecha_inicial!="" && fecha_final!=""){

	       // BUSCA LAS COMPRAS POR FECHA
	      tabla_ventas= $('#ventas_fecha_data').DataTable({

	    
	       "aProcessing": true,//Activamos el procesamiento del datatables
	       "aServerSide": true,//Paginación y filtrado realizados por el servidor
	      dom: 'Bfrtip',//Definimos los elementos del control de tabla
	      buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],

	         "ajax":{
	            url:"../ajax/ventas.php?op=buscar_ventas_fecha",
                type : "post",
				//dataType : "json",
				data:{fecha_inicial:fecha_inicial,fecha_final:fecha_final},						
				error: function(e){
					console.log(e.responseText);

				},

	          
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
			 
			    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			 
			    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			 
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

			   }, //cerrando language

			    //"scrollX": true



	      });

	        }//cerrando condicional de las fechas

	    });

      //****************************************************************

      
         //FECHA VENTA POR MES

           $(document).on("click","#btn_venta_fecha_mes", function(){

           	//var proveedor= $("#proveedor").val();

           	var mes= $("#mes").val();
           	var ano= $("#ano").val();

           	//alert(mes);
           	//alert(ano);

        //validamos si existe las fechas entonces se ejecuta el ajax

        if(mes!="" && ano!=""){

	       // BUSCA LAS COMPRAS POR FECHA
	      var tabla_ventas_mes= $('#ventas_fecha_mes_data').DataTable({
	        
	       "aProcessing": true,//Activamos el procesamiento del datatables
	       "aServerSide": true,//Paginación y filtrado realizados por el servidor
	      dom: 'Bfrtip',//Definimos los elementos del control de tabla
	      buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],

	         "ajax":{
	            url:"../ajax/ventas.php?op=buscar_ventas_fecha_mes",
                type : "post",
				//dataType : "json",
				data:{mes:mes,ano:ano},						
				error: function(e){
					console.log(e.responseText);

				},

	          
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
			 
			    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			 
			    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			 
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

			   }, //cerrando language

			    //"scrollX": true



	      });

	        }//cerrando condicional de las fechas

	    });



init();