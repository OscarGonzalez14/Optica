
 $(document).on('click', '#recibo_ini', function(){
    //toma el valor del id
    var sucursal = document.getElementById('sucursal').value;

    $.ajax({
      url:"../ajax/creditos.php?op=get_numero_recibo",
      method:"POST",
      data:{sucursal:sucursal},
      cache:false,
      dataType:"json",
      success:function(data)
      {

        $("#num_recibo").val(data.numero_rec);

       // $('#detalle_abonos').modal('show');
                 //puse el alert para ver el error, sin necesidad de hacer echo en la consulta ni nada
        //alert(data);
        
      }
    })
    $('#detalle_abonos').modal("show");
  });


$(document).on('click', '#recibo_ini', function(){
    //toma el valor del id
    var sucursal = document.getElementById('sucursal').value;

    $.ajax({
      url:"../ajax/creditos.php?op=get_datos_recibo_inicial",
      method:"POST",
      data:{sucursal:sucursal},
      cache:false,
      dataType:"json",
      success:function(data)
      {

        $("#num_venta_rec_ini").val(data.numero_venta);
        $("#monto").val(data.subtotal);
        $("#telefono_ini").val(data.telefono);
        $("#nombres_ini").val(data.nombres);
        $("#id_paciente_ini").val(data.id_paciente);
        //$("#num_venta_rec_ini").val(data.numero_venta);

       // $('#detalle_abonos').modal('show');
                 //puse el alert para ver el error, sin necesidad de hacer echo en la consulta ni nada
        //alert(data);
        
      }
    })
   // $('#detalle_abonos').modal("show");
  });

function registra_abono_inicial(){
    
    /*IMPORTANTE: se declaran las variables ya que se usan en el data, sino da error*/

    var id_usuario = $("#id_usuario_ini").val();
    var id_paciente = $("#id_paciente_ini").val();
    var monto =$("#numero").val();
    //var forma_pago =$("#forma_pago").val();
   // var pr_abono = $("#pr_abono").val();
    var num_recibo=$("#num_recibo").val();
    var num_venta=$("#num_venta_rec_ini").val();
    var sucursal =$("#sucursal").val();

    //validamos, si los campos(paciente) estan vacios entonces no se envia el formulario
if(monto!=""){
    $.ajax({
    url:"../ajax/ventas.php?op=registrar_abono",
    method:"POST",
    data:{id_usuario:id_usuario,id_paciente:id_paciente, monto:monto, num_venta: num_venta,num_recibo:num_recibo,sucursal:sucursal},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      d_pacole.log(x);
      console.log(y);
      console.log(z);
    },        
      
    success:function(data){
    var nombre_pac = $("#saldo").val("");
    setTimeout ("bootbox.alert('Se ha Realizado el Abono con exito');", 100);
    //refresca la pagina, se llama a la funtion explode
    setTimeout ("explode();", 2000);          
    }

  }); 

  }else{
    bootbox.alert("Debe llenar todos los campos");
    return false;
  } //cierre del condicional de validacion de los campos del paciente
  
    
  }

   

  //*****************************************************************************
   /*RESFRESCA LA PAGINA DESPUES DE REGISTRAR LA VENTA*/
       function explode(){

      location.reload();
}