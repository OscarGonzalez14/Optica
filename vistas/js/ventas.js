var tabla;

var tabla_ventas;

var tabla_ventas_mes;

var tabla_corte_caja;

var tabla_ventas_sucursal;

//Función que se ejecuta al inicio
function init(){
	
	listar();

	
}

//VALDAR TIPO DE PAGO

//VALIDAR CUOTA
$(document).ready(function(){
	$("#tipo_pago").change(function () {
					
		$("#tipo_pago option:selected").each(function () {
			m_cuotas = $(this).val();
			$.post('../ajax/ventas.php?op=monto_cuotas', { m_cuotas: m_cuotas }, function(data){
				$("#plazo").html(data);
			});            
		});
	})
});


var abonoi = [];

function listar()
{

	$('#ventas_data thead tr:eq(1) th').each( function () {
        var title = $('#ventas_data thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Buscar '+title+'" />' );
    } ); 
  
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

	    tabla.columns().every(function (index) {
        $('#ventas_data thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            tabla.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });
}
	
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
						tipo_pago : data.tipo_pago,
						abono 	 : 0,
						saldo 	 : 0,
						saldo_ant : data.saldo,	
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

	var saldo = abonoi[i].saldo = abonoi[i].saldo_ant - abonoi[i].saldo;	  
	saldo = abonoi[i].saldo = abonoi[i].saldo_ant - abonoi[i].saldo;

	var mletras = abonoi[i].mletras = abonoi[i].monto / abonoi[i].nletras;	  
	mletras = abonoi[i].mletras = abonoi[i].monto /abonoi[i].nletras;

    var filas ="<tr>"+
    "<td name='monto[]'>"+"<p align='center'>"+abonoi[i].moneda+" "+abonoi[i].monto+"</p>"+"</td>"+
    "<td name='abono_ant[]' align='center'>"+abonoi[i].abono_ant+"</td>"+
    "<td name='saldo_ant[]' align='center'>"+abonoi[i].saldo_ant+"</td>"+
    "<td align='center'><input class='form-control' size='4' type='text' class='abono' name='abono' id=abono"+i+" onkeyup='setAbono(event, this, "+(i)+");' value='"+abonoi[i].abono+"'></td>"+
    "<td align='center'><span name='saldo[]' id=saldo"+i+">"+abonoi[i].saldo+"</span> </td>"+
    "<td align='center'>"+
        "<select class='form-control' id='forma_pago' name='forma_pago'><option value=''>Seleccione</option><option value='Efectivo'>Efectivo</option><option value='Tarjeta de Credito'>Tarjeta de Credito</option><option value='Tarjeta de Debito'>Tarjeta de Debito</option><option value='Cargo Automatico'>Cargo Automatico</option><option value='Cheque'>Cheque</option></select>"+
	"<td><div class='form-group'><input type='date' class='form-control' id='pr_abono' name='pr_abono'></div></td>"
        +
    "</td>"
    +"</tr>";
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
  	console.log((abonoi[idx].saldo_ant - abonoi[idx].abono));

  	console.log(abonoi[idx].nletras);
  	console.log((abonoi[idx].monto / abonoi[idx].nletras));

    var saldo =abonoi[idx].saldo = abonoi[idx].saldo_ant - abonoi[idx].abono;
    var mletras =abonoi[idx].mletras = abonoi[idx].monto / abonoi[idx].nletras;


 	saldoFinal = abonoi[idx].saldo;
 	saldoFinalRed=saldoFinal.toFixed(2);	    
    $('#saldo'+idx).html(saldoFinalRed);

     Mletras = abonoi[idx].mletras;
     monto_letras=Mletras.toFixed(2);	    
    $('#mletras'+idx).html(monto_letras);

 	//$("#cantidad_"+idx).val(cantidad_venta);
	calcularTotales();

	  
  }
////REGiSTRAR ABONOS

function registrarAbono(){
    
    /*IMPORTANTE: se declaran las variables ya que se usan en el data, sino da error*/

    var id_usuario = $("#id_usuario").val();
    var id_paciente = $("#id_paciente").val();
    var id_credito =$("#id_credito").val();
    var forma_pago =$("#forma_pago").val();
    var pr_abono = $("#pr_abono").val();
    var num_recibo=$("#num_recibo").val();

    //validamos, si los campos(paciente) estan vacios entonces no se envia el formulario
if(forma_pago!="" && num_recibo != 0){
    $.ajax({
		url:"../ajax/ventas.php?op=registrar_abono",
		method:"POST",
		data:{'arrayAbonos':JSON.stringify(abonoi),'id_usuario':id_usuario,'id_paciente':id_paciente,'id_credito':id_credito,'forma_pago':forma_pago,'pr_abono':pr_abono,'num_recibo':num_recibo},
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
  	
////DETALLES DE ABONO INICIAL******************************
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
				$("#c_numeros").html(data.monto);
				$("#id_paciente").val(data.id_paciente);
				$("#id_credito").val(data.id_credito);

                 
                 //puse el alert para ver el error, sin necesidad de hacer echo en la consulta ni nada
				//alert(data);
				
			}
		})
	});

 //ver detalle Aros Ultima Venta

  $(document).on('click', '.abono_ini', function(){
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
//ver detalle LENTE Ultima Venta

  $(document).on('click', '.abono_ini', function(){
	 	//toma el valor del id

		$.ajax({
			url:"../ajax/ventas.php?op=ver_ultima_venta_lentes",
			method:"POST",
			//data:{numero_venta:numero_venta},
			cache:false,
			dataType:"json",
			success:function(data)
			{


				$("#dis_lente").val(data.modelo);
				$("#dis_lente").attr('disabled','disabled');
			
                 
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
				

				$("#nombres").html(data.nombres);
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

 function corte_ventas()
{

   tabla_corte_caja=$('#corte_data').dataTable(
  {
    "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginación y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
buttons: [   

             {
                extend: 'excelHtml5',
				text : 'Guardar Ventas Excel',
				filename: function(){
                var n = new Date();
                y = n.getFullYear();
				m = n.getMonth() + 1;
				d = n.getDate();
				

                return 'Ventas'+" de " + d +"-"+m+"-"+ y ;
            }
            }

            ],
    "ajax":
        {
          url: '../ajax/ventas.php?op=corte_caja',
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


function corte_recuperado()
{

   tabla_corte_recuperado=$('#corte_data').dataTable(
  {




    "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginación y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
      buttons: [   

             {
                extend: 'excelHtml5',
				text : 'Guardar Excel',
				filename: function(){
                var n = new Date();
                y = n.getFullYear();
				m = n.getMonth() + 1;
				d = n.getDate();
				

                return 'Recuperado'+" de " + d +"-"+m+"-"+ y ;
            }
            }

            ],
    "ajax":
        {
          url: '../ajax/ventas.php?op=corte_recuperado',
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

//LISTA PRODUCTOS EN VENTA POR SUSCURSAL
$(document).on("click","#ventas_aros_suc", function(){
	var sucursal= $("#sucursal").val();

if(sucursal!=""){

tabla_ventas_sucursal= $('#lista_productos_ventas_data').DataTable({

	    
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
	            url:"../ajax/ventas.php?op=buscar_ventas_sucursal",
                type : "post",
				//dataType : "json",
				data:{sucursal:sucursal},						
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

	        }else{
	        	alert("Seleccione la Sucursal");
	        }//cierre condicional 

	    });

      //****************************************************************


$(document).ready( function () {
var currentDate = new Date()
var day = currentDate.getDate()
var month = currentDate.getMonth() + 1
var year = currentDate.getFullYear()

var d = day + "-" + month + "-" + year;
})

init();