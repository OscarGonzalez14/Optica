
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
  });
