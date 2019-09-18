<?php

require_once("../config/conexion.php");

   class Envios extends Conectar{        
    //obtiene el registro por id despues de editar
    public function get_producto_por_id($id_producto){

      $conectar= parent::conexion();

      //$output = array();

        $sql="select * from producto where id_producto=?";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1, $id_producto);
        $sql->execute();

        return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);


    }
}