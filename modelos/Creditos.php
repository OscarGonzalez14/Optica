<?php

require_once("../config/conexion.php");

class Creditos extends Conectar
{	
	public function get_pacientes_metrocentro()
	{
		$conectar=parent::conexion();
		$sql="select p.id_paciente,c.id_credito,c.monto,c.saldo,p.nombres,p.empresa,p.telefono,v.tipo_pago from creditos as c inner join pacientes as p on c.id_paciente=p.id_paciente join ventas as v where v.numero_venta=c.numero_venta and v.tipo_pago='Efectivo' order by id_credito asc;
		";
		$sql=$conectar->prepare($sql);
		$sql->execute();
		return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

	}

public function get_detalle_paciente($id_paciente){

	$conectar=parent::conexion();
	parent::set_names();

	$sql="select p.id_paciente,c.id_credito,c.monto,c.saldo,p.nombres,p.empresa,p.telefono,v.tipo_pago from creditos as c inner join pacientes as p on c.id_paciente=p.id_paciente join ventas as v where v.numero_venta=c.numero_venta and v.tipo_pago='Efectivo'and p.id_paciente=?  order by id_credito asc;";

	$sql=$conectar->prepare($sql);
	$sql->bindValue(1,$id_paciente);
	$sql->execute();
	return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

}

}//FIN DE LA CLASE