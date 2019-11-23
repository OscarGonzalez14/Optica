var detalles = [];

	
function agregarCargoAuto(){

  success:function(data){                    
    var obj = {
			cantidad : 1,
			importe  : 0,
			dscto    : 0,
			moneda   : '$'							
		};
detalles.push(obj);
	listarDetallesActualizacion();       
                   						
}//fin success			    
}// fin de funcion


//***********************************************************************


  function listarDetallesVentas(){

  	$('#listProdVentas').html('');

  	var filas = "";  	
  	var subtotal = 0;
  	var total = 0;
    var subtotalFinal = 0;
  	var totalFinal = 0;

  	for(var i=0; i<detalles.length; i++){	

	if(detalles[i].categoria=='lentes' ){   
    var importe = detalles[i].importe = detalles[i].cantidad * detalles[i].precio_venta;
	    
	importe = detalles[i].importe = detalles[i].importe - 0;
 	//var descmoney = detalles[i].precio_venta-detalles[i].importe;
	var filas = filas + "<tr><td>"+(i+1)+"</td></td><td> <input type='number' class='cantidad' name='cantidad[]' id=cantidad_"+i+" onClick='setCantidad(event, this, "+(i)+");' onKeyUp='setCantidadAjax(event, this, "+(i)+");' value='"+detalles[i].cantidad+"'> </td>  <td name='modelo[]'>"+detalles[i].modelo+"<td><input min='1' max='20' type='number' value='0' readonly name='descuento[]' id='descuento[]'></td> <td name='precio_venta[]'>"+detalles[i].moneda+" "+detalles[i].precio_venta+"</td> <td> <span name='importe[]' id=importe"+i+">"+detalles[i].moneda+" "+detalles[i].importe+"</span> </td></tr>";
	
    subtotal = subtotal + importe;


    subtotalFinal = subtotal;
    subtotalFinal=subtotalFinal.toFixed(2);
			var su = subtotal;
			su=su.toFixed(2);
            var or=parseFloat(su);
            var total= Math.round(or+subtotal);

    totalFinal =total;
}else if(detalles[i].categoria=='accesorios'){
    var importe = detalles[i].importe = detalles[i].cantidad * detalles[i].precio_venta;
	    
	importe = detalles[i].importe = detalles[i].importe - 0;
 	//var descmoney = detalles[i].precio_venta-detalles[i].importe;
var filas = filas + "<tr><td>"+(i+1)+"</td></td><td> <input type='number' class='cantidad' name='cantidad[]' id=cantidad_"+i+" onClick='setCantidad(event, this, "+(i)+");' onKeyUp='setCantidadAjax(event, this, "+(i)+");' value='"+detalles[i].cantidad+"'> </td>  <td name='modelo[]'>"+detalles[i].modelo+"<td><input min='0' max='20' type='number' name='descuento[]' id='descuento[]' onClick='setDescuento(event, this, "+(i)+");' onKeyUp='setDescuento(event, this, "+(i)+");' value='"+detalles[i].dscto+"'></td> <td name='precio_venta[]'>"+detalles[i].moneda+" "+detalles[i].precio_venta+"</td> <td> <span name='importe[]' id=importe"+i+">"+detalles[i].moneda+" "+detalles[i].importe+"</span> </td></tr>";

    subtotal = subtotal + importe;

    subtotalFinal = subtotal.toFixed(2 );

			var su = subtotal;
			su=su.toFixed(2);
            var or=parseFloat(su);
            var total= Math.round(or+subtotal);

    totalFinal =total;
}

else if(detalles[i].categoria=='anti-reflejantes'){

	var importe = detalles[i].importe = detalles[i].cantidad * detalles[i].precio_venta;
	    
	importe = detalles[i].importe = detalles[i].importe - 0;
 	//var descmoney = detalles[i].precio_venta-detalles[i].importe;
	var filas = filas + "<tr><td>"+(i+1)+"</td></td><td> <input type='number' class='cantidad' name='cantidad[]' id=cantidad_"+i+" onClick='setCantidad(event, this, "+(i)+");' onKeyUp='setCantidadAjax(event, this, "+(i)+");' value='"+detalles[i].cantidad+"'> </td>  <td name='modelo[]'>"+detalles[i].modelo+"<td><input min='1' max='20' type='number' value='0' readonly name='descuento[]' id='descuento[]'></td> <td name='precio_venta[]'>"+detalles[i].moneda+" "+detalles[i].precio_venta+"</td> <td> <span name='importe[]' id=importe"+i+">"+detalles[i].moneda+" "+detalles[i].importe+"</span> </td></tr>";
	
    subtotal = subtotal + importe;

    subtotalFinal = subtotal.toFixed(2 );

			var su = subtotal;
			su=su.toFixed(2);
            var or=parseFloat(su);
            var total= Math.round(or+subtotal);

    totalFinal =total;
}
else if(detalles[i].categoria=='photosensibles'){

	var importe = detalles[i].importe = detalles[i].cantidad * detalles[i].precio_venta;
	    
	importe = detalles[i].importe = detalles[i].importe - 0;
 	//var descmoney = detalles[i].precio_venta-detalles[i].importe;
	var filas = filas + "<tr><td>"+(i+1)+"</td></td><td> <input type='number' class='cantidad' name='cantidad[]' id=cantidad_"+i+" onClick='setCantidad(event, this, "+(i)+");' onKeyUp='setCantidadAjax(event, this, "+(i)+");' value='"+detalles[i].cantidad+"'> </td>  <td name='modelo[]'>"+detalles[i].modelo+"<td><input min='1' max='20' type='number' value='0' readonly name='descuento[]' id='descuento[]'></td> <td name='precio_venta[]'>"+detalles[i].moneda+" "+detalles[i].precio_venta+"</td> <td> <span name='importe[]' id=importe"+i+">"+detalles[i].moneda+" "+detalles[i].importe+"</span> </td></tr>";
	
    subtotal = subtotal + importe;

    subtotalFinal = subtotal.toFixed(2 );

			var su = subtotal;
			su=su.toFixed(2);
            var or=parseFloat(su);
            var total= Math.round(or+subtotal);

    totalFinal =total;
}
else if(detalles[i].categoria=='accesorios'){

    var importe = detalles[i].importe = detalles[i].cantidad * detalles[i].precio_venta;
	    
	importe = detalles[i].importe = detalles[i].importe - 0;
 	//var descmoney = detalles[i].precio_venta-detalles[i].importe;
	var filas = filas + "<tr><td>"+(i+1)+"</td></td><td> <input type='number' class='cantidad' name='cantidad[]' id=cantidad_"+i+" onClick='setCantidad(event, this, "+(i)+");' onKeyUp='setCantidadAjax(event, this, "+(i)+");' value='"+detalles[i].cantidad+"'> </td>  <td name='modelo[]'>"+detalles[i].modelo+"<td><input min='1' max='20' type='number' value='0' readonly name='descuento[]' id='descuento[]'></td> <td name='precio_venta[]'>"+detalles[i].moneda+" h"+detalles[i].precio_venta+"</td> <td name='precio_venta[]'><input name='precio_venta[]' id='precio_venta[]'></span> </td></tr>";
	
    subtotal = subtotal + importe;


    subtotalFinal = subtotal;
    subtotalFinal=subtotalFinal.toFixed(2);
			var su = subtotal;
			su=su.toFixed(2);
            var or=parseFloat(su);
            var total= Math.round(or+subtotal);

    totalFinal =total;
}
else{

	var importe = detalles[i].importe = detalles[i].cantidad * detalles[i].precio_venta;
	    
 	importe = detalles[i].importe = detalles[i].importe - (detalles[i].importe * detalles[i].dscto/100);
 	var descmoney = detalles[i].precio_venta-detalles[i].importe;
	var filas = filas + "<tr><td>"+(i+1)+"</td></td><td> <input type='number' class='cantidad' name='cantidad[]' id=cantidad_"+i+" onClick='setCantidad(event, this, "+(i)+");' onKeyUp='setCantidadAjax(event, this, "+(i)+");' value='"+detalles[i].cantidad+"'> </td> <td><input  name='descripcion' id='descripcion' type='text'></td><input min='0' max='20' type='number' name='descuento[]' id='descuento[]' onClick='setDescuento(event, this, "+(i)+");' onKeyUp='setDescuento(event, this, "+(i)+");' value='0'></td> <td name='precio_venta[]'>"+detalles[i].moneda+" "+detalles[i].precio_venta+"</td> <td><input  name='importe' id='importe' type='text'></tr>";
	
    subtotal = subtotal + importe;

    subtotalFinal = subtotal.toFixed(2 );

			var su = subtotal;
			su=su.toFixed(2);
            var or=parseFloat(su);
            var total= Math.round(or+subtotal);

    totalFinal =total;

}//cierre del if
      
}//cierre for

	
	$('#listProdVentas').html(filas);

	//subtotal
	$('#subtotal').html(subtotalFinal);
	$('#subtotal_venta').html(subtotalFinal);

	//total
	$('#total').html(totalFinal);
	$('#total_venta').html(totalFinal);



  }

  /*IMPORTANTE:Event es el objeto del evento que los manejadores de eventos utilizan
parseInt es una función para convertir un valor string a entero
obj.value es el valor del campo de texto*/
  function setCantidad(event, obj, idx){
  	event.preventDefault();
  	detalles[idx].cantidad = parseInt(obj.value);
  	recalcular(idx);
  }

  function setCantidadAjax(event, obj, idx){
  	event.preventDefault();
  	//detalles[idx].cantidad = parseInt(obj.value);

  	//var idx = idx;

  	var id_producto = detalles[idx].codProd;

  	var cantidad_vender = detalles[idx].cantidad = parseInt(obj.value);

    var stock = detalles[idx].stock;

      //alert(idx);
      //alert(cantidad_vender);
      //alert(id_producto);
      //alert(stock);
  	
       $.ajax({
         
         url:"../ajax/ventas.php?op=consulta_cantidad_venta",
         method:"POST",
         data:{id_producto:id_producto, cantidad_vender:cantidad_vender},
         dataType:"json",

         success:function(data){

         	
             //$("#cantidad_"+idx).val(data);


             //console.log(data);


            
              $("#resultados_ventas_ajax").html(data);

                //se pone isNaN porque al ser vacio indica que no es un numero, entonces si valida que es cierto entonces se desabilita el boton del envio del formulario y de agregar productos
                /*si la cantidad a vender es igual a cero o a vacio o si es mayor al stock entonces se desabilita el boton de enviar formulario y de agregar productos*/
	             if(cantidad_vender=="0" || isNaN(cantidad_vender)==true || cantidad_vender>stock){
	             
	            
	             //si la cantidad es mayor al stock el borde se pone en rojo
	             $("#cantidad_"+idx).addClass("rojo");

	             //bloquea el boton "agregar producto"
	             $(".btn_producto").removeAttr("data-target");

	               //oculta el boton "enviar formulario"

	                 $("#btn_enviar").addClass("oculta_boton");

	                
                     // $("div[id=resultados_ajax]").remove();
                     

	              } else {
                     
                     //despues de eliminar agrega el id del mensaje de ajax, ya que se habia removido el mensaje "campo vacio" en la funcion eliminar
	              	 //$("#resultados_ajax").attr("id");
                       
                     // si la cantidad seleccionada es menor al stock entonces remueve la clase rojo
	              	 $("#cantidad_"+idx).removeClass("rojo");


	              	 //Desbloquea el boton "agregar producto"
	                 $(".btn_producto").attr({"data-target":"#lista_productos_ventas_Modal"});

	              
                      //aparece el boton "enviar formulario"

	                 $("#btn_enviar").removeClass("oculta_boton");
	              }
         }

       })


  	recalcular(idx);
  }


  function setDescuento(event, obj, idx){
  	event.preventDefault();
  	detalles[idx].dscto = parseFloat(obj.value);
  	recalcular(idx);
  }
  	
  function recalcular(idx){

  	console.log(detalles[idx].cantidad);
  	console.log((detalles[idx].cantidad * detalles[idx].precio_venta));

    var importe =detalles[idx].importe = detalles[idx].cantidad * detalles[idx].precio_venta;
	importe = detalles[idx].importe = detalles[idx].importe - (detalles[idx].importe * detalles[idx].dscto/100);

 	importeFinal = detalles[idx].moneda+" "+importe;	    
    $('#importe'+idx).html(importeFinal);

 
	calcularTotales();

	  
  }


 function calcularTotales(){
  	
  	var subtotal = 0;

  	var total = 0;

    var subtotalFinal = 0;

  	var totalFinal = 0;

for(var i=0; i<detalles.length; i++){

	subtotal = subtotal + (detalles[i].cantidad * detalles[i].precio_venta) - (detalles[i].cantidad*detalles[i].precio_venta*detalles[i].dscto/100);

          subtotalFinal = subtotal;

          var su = subtotal;
          sub=su.toFixed(2);
          var or=parseFloat(sub);
          var total = Math.round(or+subtotal);

          //concatenar para poner la moneda con el total
          totalFinal = detalles[i].moneda+" "+total;
		
	}

	//subtotal
	$('#subtotal').html(subtotalFinal);
	$('#subtotal_venta').html(subtotalFinal);

	//total
	$('#total').html(totalFinal);
	$('#total_venta').html(totalFinal);
  }



  //*******************************************************************
    /*IMPORTANTE:Event es el objeto del evento que los manejadores de eventos utilizan
parseInt es una función para convertir un valor string a entero
obj.value es el valor del campo de texto*/

  	function  eliminarProd(event, idx){
  		event.preventDefault();
  		console.log('ELIMINAR Eyter');
  		detalles[idx].estado = 0;


  	    $("#cantidad_"+idx).val(1);

  		listarDetallesVentas();
  	}



 //********************************************************************
 


/* {'arrayCompra':JSON.stringify(detalles)}:Esa parte encapsula el arreglo detalles y lo envía como un solo parametro

*/

 function registrarVenta(){
    
    /*IMPORTANTE: se declaran las variables ya que se usan en el data, sino da error*/
    var numero_venta = $("#numero_venta").val();
    var cod_pac = $("#cod_pac").val();
    var nombre_pac = $("#nombre_pac").val();
    var tipo_pago = $("#tipo_pago").val();
    var subtotal = $("#subtotal").html();
    var usuario = $("#usuario").val();
    var tipo_venta = $("#tipo_venta").val();
    var sucursal = $("#sucursal").val();
    var id_usuario = $("#id_usuario").val();
    var id_paciente = $("#id_paciente").val();
    var plazo = $("#plazo").val();
    var descripcion = $("#descripcion").val();
    var importe = $("#importe").val();


    //validamos, si los campos(paciente) estan vacios entonces no se envia el formulario

    if(nombre_pac!="" && sucursal!="" && tipo_venta!="" && tipo_pago!=""){

    $("#descuento").attr('disabled', 'disabled');
     console.log('error!');

    $.ajax({
		url:"../ajax/producto.php?op=registrar_venta",
		method:"POST",
		data:{'arrayVenta':JSON.stringify(detalles), 'numero_venta':numero_venta,'nombre_pac':nombre_pac, 'tipo_pago':tipo_pago,'subtotal':subtotal,'tipo_venta':tipo_venta,'usuario':usuario,'sucursal':sucursal,'id_usuario':id_usuario,'id_paciente':id_paciente,'plazo':plazo,'descripcion':descripcion,'importe':importe},
		cache: false,
		dataType:"html",
		error:function(x,y,z){
			d_pacole.log(x);
			console.log(y);
			console.log(z);
		},    
      
			
		success:function(data){

	    var nombre_pac = $("#nombre_pac").val("");

            
            detalles = [];
            $('#listProdVentas').html('');
            
              //muestra un mensaje de exito
          setTimeout ("bootbox.alert('Se ha registrado la venta con éxito');", 100); 
          
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

   

  //*****************************************************************************
   /*RESFRESCA LA PAGINA DESPUES DE REGISTRAR LA VENTA*/
       function explode(){

	    location.reload();
}
