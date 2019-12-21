<?php

require_once("../config/conexion.php");

class Recibos extends Conectar{

public function numero_recibo(){

	$conectar=parent::conexion();
	parent::set_names();
		 
	$sql="select numero_recibo from recibos where sucursal= 'Santa Ana';";
		$sql=$conectar->prepare($sql);
	    $sql->execute();
	    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

		  //aqui selecciono solo un campo del array y lo recorro que es el campo numero_venta
		foreach($resultado as $k=>$v){
		    $numero_recibo["numero"]=$v["numero_recibo"];               
		}//fin foreach
//luego despues de tener seleccionado el numero_venta digo que si el campo numero_venta està vacio entonces se le asigna un F000001 de lo contrario ira sumando
	if(empty($numero_recibo["numero"])){
		    echo '0000001';
	}else{
		$num=substr($numero_recibo["numero"] , 1);
		$dig     = $num + 1;
		$fact = str_pad($dig, 6, "0", STR_PAD_LEFT);
		echo '0'.$fact;
		                    //echo 'F'.$new_cod;
		} 
	}

public function numero_orden(){

		    $conectar=parent::conexion();
		    parent::set_names();

		 
		    $sql="select numero_orden from ordenes;";

		    $sql=$conectar->prepare($sql);

		    $sql->execute();
		    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

		       //aqui selecciono solo un campo del array y lo recorro que es el campo numero_venta
		       foreach($resultado as $k=>$v){

		                 $numero_orden["numero"]=$v["numero_orden"];

		               
		          
		             }
		          //luego despues de tener seleccionado el numero_venta digo que si el campo numero_venta està vacio entonces se le asigna un F000001 de lo contrario ira sumando

		        

		                   if(empty($numero_orden["numero"]))
		                {
		                  echo 'AV001';
		                }else
		          
		                  {
		                    $num     = substr($numero_orden["numero"] , 2);
		                    $dig     = $num + 1;
		                    $fact = str_pad($dig, 6, "0", STR_PAD_LEFT);
		                    echo 'AV'.$fact;
		                    //echo 'F'.$new_cod;
		                  } 

		       //return $data;
	}	

public function get_numero_recibo($sucursal){


          $conectar= parent::conexion();
	       
	      $sql= "select max(numero_recibo)+1 as numero_rec from recibos where sucursal=?";

           $sql=$conectar->prepare($sql);
           $sql->bindValue(1, $sucursal);
           $sql->execute();

           return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

}

//FUNCION PARA CARGAR DATOS EN RECIBO INICIAL

public function get_datos_pac_rec_ini($sucursal){


          $conectar= parent::conexion();
	       
	      $sql= "select v.id_ventas,v.sucursal,v.subtotal,v.numero_venta,p.nombres,p.telefono,p.id_paciente from ventas as v join pacientes as p where p.id_paciente=v.id_paciente  and v.sucursal=? order by id_ventas DESC limit 1;";

           $sql=$conectar->prepare($sql);
           $sql->bindValue(1, $sucursal);
           $sql->execute();

           return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

}


}