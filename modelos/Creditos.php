<?php
require_once("../config/conexion.php");
class Creditos extends Conectar
{	


	public function get_pacientes_metrocentro()
	{
		$conectar=parent::conexion();
		$sql="select p.id_paciente,c.id_credito,c.monto,c.saldo,p.nombres,p.empresa,p.telefono,v.tipo_pago from creditos as c inner join pacientes as p on c.id_paciente=p.id_paciente join ventas as v where v.numero_venta=c.numero_venta and v.tipo_venta='Contado-Metrocentro' order by id_credito asc;
		";
		$sql=$conectar->prepare($sql);
		$sql->execute();
		return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
	}



public function get_pacientes_empresarial()
  {
    $conectar=parent::conexion();
    $sql="select p.id_paciente,c.id_credito,c.monto,c.saldo,p.nombres,p.empresa,p.telefono,v.tipo_pago,v.sucursal,c.numero_venta,c.id_credito from creditos as c inner join pacientes as p on c.id_paciente=p.id_paciente join ventas as v where v.numero_venta=c.numero_venta and v.tipo_pago='Descuento en Planilla' order by id_credito asc;
    ";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
  }

public function get_pacientes_metro()
  {
    $conectar=parent::conexion();
    $sql="select p.id_paciente,c.id_credito,c.monto,c.saldo,p.nombres,p.empresa,p.telefono,v.tipo_pago,v.sucursal,c.numero_venta,c.id_credito from creditos as c inner join pacientes as p on c.id_paciente=p.id_paciente join ventas as v where v.numero_venta=c.numero_venta and v.tipo_venta='Contado-Metrocentro' order by id_credito asc;
    ";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
  }

  public function get_pacientes_c_automatico()
  {
    $conectar=parent::conexion();
    $sql="select p.id_paciente,c.id_credito,c.monto,c.saldo,p.nombres,p.empresa,p.telefono,v.tipo_pago,v.sucursal,c.numero_venta,c.id_credito from creditos as c inner join pacientes as p on c.id_paciente=p.id_paciente join ventas as v where v.numero_venta=c.numero_venta and v.tipo_pago='Cargo Automatico' order by id_credito asc;
    ";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
  }

  public function get_pacientes_c_personal()
  {
    $conectar=parent::conexion();
    $sql="select p.id_paciente,c.id_credito,c.monto,c.saldo,p.nombres,p.empresa,p.telefono,v.tipo_pago,v.sucursal,c.numero_venta,c.id_credito from creditos as c inner join pacientes as p on c.id_paciente=p.id_paciente join ventas as v where v.numero_venta=c.numero_venta and v.tipo_pago='Creditos Personales' order by id_credito asc;
    ";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
  }
public function get_detalle_paciente($id_paciente){
	$conectar=parent::conexion();
	parent::set_names();
	$sql="select p.id_paciente,c.id_credito,c.monto,c.saldo,p.nombres,p.empresa,p.telefono,v.tipo_pago,a.monto_abono from creditos as c inner join pacientes as p on c.id_paciente=p.id_paciente inner join abonos as a on c.id_credito=a.id_credito join ventas as v where v.numero_venta=c.numero_venta and v.tipo_pago='Efectivo' and p.id_paciente=? and a.id_abono=(select max(id_abono) from abonos) order by id_credito asc;";
	$sql=$conectar->prepare($sql);
	$sql->bindValue(1,$id_paciente);
	$sql->execute();
	return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

//////////////////////REGISTRAR ABONOS
public function agrega_abono_pacientes(){

       
  //echo json_encode($_POST['arrayCompra']);
  $str = '';
  $abonosp = array();
  $abonosp = json_decode($_POST['array_abonos_pacientes']);


   
   $conectar=parent::conexion();


  foreach ($abonosp as $k => $v) {
      
       $abono = $v->abono;
       //$p_abono = $v->$p_abono;

       $id_credito = $_POST["id_credito"];
       $id_usuario = $_POST["id_usuario"];
       $id_paciente = $_POST["id_paciente"];
       $forma_pago = $_POST["forma_pago"];
       $p_abono = $_POST["p_abono"];
       $n_recibo = $_POST["n_recibo"];

        $sql="insert into abonos
        values(null,?,?,now(),?,?,?,?,?);";


        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$abono);
        $sql->bindValue(2,$forma_pago);
        $sql->bindValue(3,$p_abono);
        $sql->bindValue(4,$id_paciente);
        $sql->bindValue(5,$id_usuario);
        $sql->bindValue(6,$id_credito);
        $sql->bindValue(7,$n_recibo);
       
        $sql->execute();
         
        $sql3="select * from creditos where id_credito=?;";


             
             $sql3=$conectar->prepare($sql3);

             $sql3->bindValue(1,$id_credito);
             $sql3->execute();

             $resultado = $sql3->fetchAll(PDO::FETCH_ASSOC);

                  foreach($resultado as $b=>$row){

                    $re["saldo_act"] = $row["saldo"];

                  }

                //la cantidad total es la resta del stock menos la cantidad de productos vendido
                $saldo_total = $row["saldo"] - $abono;

             
               //si existe el producto entonces actualiza el stock en producto
              
               if(is_array($resultado)==true and count($resultado)>0) {
                     
                  //actualiza el stock en la tabla producto

                 $sql4 = "update creditos set 
                      
                      saldo=?
                      where 
                      id_credito=?
                 ";


                $sql4 = $conectar->prepare($sql4);
                $sql4->bindValue(1,$saldo_total);
                $sql4->bindValue(2,$id_credito);
                $sql4->execute();

               } //cierre la condicional


       }//cierre del foreach
      
}



  //////////////FIN REGISTRAR ABONOS  



//REGISTRA CANCELACION

public function agrega_cancelacion(){

       
  //echo json_encode($_POST['arrayCompra']);
  $str = '';
  $cancel = array();
  $cancel = json_decode($_POST['array_abono_cancelacion']);


   
   $conectar=parent::conexion();


  foreach ($cancel as $k => $v) {
      
       $abono_act = $v->abono_act;

       $id_credito = $_POST["id_credito"];
       $id_usuario = $_POST["id_usuario"];
       $id_paciente = $_POST["id_paciente"];
       $forma_pagos = $_POST["forma_pagos"];
       

        $sql="insert into abonos
        values(null,?,?,?,?,?);";


        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$abono_act);
        $sql->bindValue(2,$forma_pagos);
        $sql->bindValue(3,$id_paciente);
        $sql->bindValue(4,$id_usuario);
        $sql->bindValue(5,$id_credito);
       
        $sql->execute();
         
        $sql3="select * from creditos where id_credito=?;";


             
             $sql3=$conectar->prepare($sql3);

             $sql3->bindValue(1,$id_credito);
             $sql3->execute();

             $resultado = $sql3->fetchAll(PDO::FETCH_ASSOC);

                  foreach($resultado as $b=>$row){

                    $re["saldo_act"] = $row["saldo"];

                  }

                //la cantidad total es la resta del stock menos la cantidad de productos vendido
                $saldo_total = $row["saldo"] - $abono_act;

             
               //si existe el producto entonces actualiza el stock en producto
              
               if(is_array($resultado)==true and count($resultado)>0) {
                     
                  //actualiza el stock en la tabla producto

                 $sql4 = "update creditos set 
                      
                      saldo=?
                      where 
                      id_credito=?
                 ";


                $sql4 = $conectar->prepare($sql4);
                $sql4->bindValue(1,$saldo_total);
                $sql4->bindValue(2,$id_credito);
                $sql4->execute();

               } //cierre la condicional


       }//cierre del foreach
      
}



  //////////////FIN REGISTRAR ABONOS  



//METODO PARA VER SI EXISTEN ABONOS ANTERIORES
public function comprobar_abonos_ant($id_paciente,$id_credito){

  $conectar= parent::conexion();

  $sql="select a.id_abono,a.monto_abono,c.id_credito from abonos as a inner join creditos as c on a.id_credito=c.id_credito where a.id_paciente=? and a.id_credito=?;";

  $sql=$conectar->prepare($sql);

  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$id_credito);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}


public function abonos_paciente_inicial($id_paciente,$id_credito){

  $conectar = parent::conexion();

  $sql="select c.id_credito,p.id_paciente,c.monto,c.saldo,p.nombres,p.empresa,p.telefono,v.tipo_pago,
  c.numero_venta,'0' as monto_abono, now() as fecha,round((c.monto/c.plazo)+0.001,2) as abono_act from creditos as c inner join pacientes as p on c.id_paciente=p.id_paciente join ventas as v where v.numero_venta=c.numero_venta and p.id_paciente=? and c.id_credito=?;";

  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$id_credito);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function abonos_paciente_numerov_idp($id_paciente,$id_credito){

  $conectar = parent::conexion();

  $sql="select a.id_abono,p.id_paciente,c.id_credito,c.monto,c.saldo,p.nombres,p.empresa,p.telefono,v.tipo_pago,c.numero_venta,a.monto_abono, now() as fecha,round((c.monto/c.plazo)+0.001,2) as abono_act from abonos as a inner join creditos as c on a.id_credito=c.id_credito inner join pacientes as p on c.id_paciente=p.id_paciente join ventas as v  where v.numero_venta=c.numero_venta and   p.id_paciente=? and c.id_credito=? order by id_abono desc limit 1;";

  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$id_credito);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

  public function detalle_credito_aros($numero_venta){

    $conectar = parent::conexion();

    $sql="select d.numero_venta,p.marca,p.modelo,p.color from detalle_ventas as d, producto as p where d.id_producto=p.id_producto and numero_venta=? and p.categoria='aros';";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$numero_venta);
    $sql->execute();

    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

}    



  public function detalle_credito_lentes($numero_venta){

    $conectar = parent::conexion();

    $sql="select d.numero_venta,p.marca,p.modelo,p.color from detalle_ventas as d, producto as p where d.id_producto=p.id_producto and numero_venta=? and p.categoria='lentes';";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$numero_venta);
    $sql->execute();

    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

} 

  public function detalle_credito_ar($numero_venta){

    $conectar = parent::conexion();

    $sql="select d.numero_venta,p.marca,p.modelo,p.color from detalle_ventas as d, producto as p where d.id_producto=p.id_producto and numero_venta=? and p.categoria='anti-reflejantes';";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$numero_venta);
    $sql->execute();

    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

} 


public function detalle_credito_photo($numero_venta){

    $conectar = parent::conexion();

    $sql="select d.numero_venta,p.marca,p.modelo,p.color from detalle_ventas as d, producto as p where d.id_producto=p.id_producto and numero_venta=? and p.categoria='photosensibles';";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$numero_venta);
    $sql->execute();

    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

} 

public function cobros_pacientes(){

    $conectar = parent::conexion();

    $sql="select p.nombres, p.empresa,p.telefono,a.fecha_abono,max(a.proximo_abono)as pbono,c.monto,c.saldo,datediff(now(), max(proximo_abono)) as estado from pacientes as p inner join abonos as a on p.id_paciente=a.id_paciente inner join creditos as c on c.id_credito=a.id_credito group by(p.nombres);";

          $sql=$conectar->prepare($sql);

          $sql->execute();

          return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);


}


  public function comprobar_recibos_ant($n_recibo){

  $conectar= parent::conexion();

  $sql="select*from abonos where n_recibo=?;
";

  $sql=$conectar->prepare($sql);

  $sql->bindValue(1,$n_recibo);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}
}//FIN DE LA CLASE










