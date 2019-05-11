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
    $sql="select p.id_paciente,c.id_credito,c.monto,c.saldo,p.nombres,p.empresa,p.telefono,v.tipo_pago,v.sucursal from creditos as c inner join pacientes as p on c.id_paciente=p.id_paciente join ventas as v where v.numero_venta=c.numero_venta and v.tipo_pago='Descuento en Planilla' order by id_credito asc;
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

public function agrega_abono_paciente(){

   
  $conectar=parent::conexion();
        
       $id_credito = $_POST["id_credito"];
       $id_usuario = $_POST["id_usuario"];
       $id_paciente = $_POST["id_paciente"];
       $abono = $_POST["abono"];

        $sql="insert into abonos
        values(null,?,?,?,?);";


        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$abono);
        $sql->bindValue(2,$id_paciente);
        $sql->bindValue(3,$id_usuario);
        $sql->bindValue(4,$id_credito);
       
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
      
}

public function abonos_empresarial(){

  $sql=" select p.id_paciente,c.id_credito,c.monto,c.saldo,p.nombres,p.empresa,p.telefono,v.tipo_pago,c.numero_venta from creditos as c inner join pacientes as p on c.id_paciente=p.id_paciente join ventas as v where v.numero_venta=c.numero_venta and v.tipo_pago='Descuento en Planilla' and p.id_paciente=17 and c.numero_venta='0000007' order by id_credito asc;;";
}

  //////////////FIN REGISTRAR ABONOS   
}//FIN DE LA CLASE










