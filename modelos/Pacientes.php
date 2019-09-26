<?php

require_once("../config/conexion.php");


class Paciente extends Conectar
{

public function get_pacientes(){

          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from pacientes";

          $sql=$conectar->prepare($sql);
          $sql->execute();

          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
       }

  public function codigo_paciente(){

    $conectar=parent::conexion();
    parent::set_names();

     
    $sql="select codigo from pacientes;";

    $sql=$conectar->prepare($sql);

    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);


        foreach($resultado as $k=>$v){

        $codigo["numero"]=$v["codigo"];
                   
                 }               

          if(empty($codigo["numero"]))
              {
                 echo 'AV000001';
              }else
              
                {
                  $num     = substr($codigo["numero"] , 2);
                  $dig     = $num + 1;
                  $fact = str_pad($dig, 6, "0", STR_PAD_LEFT);
                  echo 'AV'.$fact;
                        
                } 

      }

  
   public function registrar_paciente($codigo,$nombres,$telefono,$edad,$ocupacion,$empresa,$correo,$id_usuario,$dui){


           $conectar= parent::conexion();
           parent::set_names();

           $sql="insert into pacientes
           values(null,?,?,?,?,?,?,?,null,?,?);";

          
            $sql=$conectar->prepare($sql);

            $sql->bindValue(1, $_POST["codigo"]);
            $sql->bindValue(2, $_POST["nombres"]);
            $sql->bindValue(3, $_POST["telefono"]);
            $sql->bindValue(4, $_POST["edad"]);
            $sql->bindValue(5, $_POST["ocupacion"]);
            $sql->bindValue(6, $_POST["empresa"]);
            $sql->bindValue(7, $_POST["correo"]);
            $sql->bindValue(8, $_POST["id_usuario"]);
            $sql->bindValue(9, $_POST["dui"]);
            $sql->execute();
      
         
        }


   public function editar_paciente($telefono,$edad,$ocupacion,$empresa,$correo,$id_usuario,$id_paciente){


           $conectar= parent::conexion();
           parent::set_names();

           $sql="update pacientes set 

                   telefono=?,
                   edad=?,
                   ocupacion=?,
                   empresa=?,
                   correo=?,
                   id_usuario=?
                   where 
                   id_paciente=?

                ";

          
            $sql=$conectar->prepare($sql);

            $sql->bindValue(1, $_POST["telefono"]);
            $sql->bindValue(2, $_POST["edad"]);
            $sql->bindValue(3, $_POST["ocupacion"]);
            $sql->bindValue(4, $_POST["empresa"]);
            $sql->bindValue(5, $_POST["correo"]);
            $sql->bindValue(6, $_POST["id_usuario"]);
            $sql->bindValue(7, $_POST["id_paciente"]);
            $sql->execute();
      
         
        }

 public function valida_registro($telefono){

          $conectar= parent::conexion();
          parent::set_names();

          $sql="select * from pacientes where   telefono=?";

                $sql=$conectar->prepare($sql);
                $sql->bindValue(1, $telefono);
                $sql->execute();

                return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

        }

public function eliminar_paciente($id_paciente)
        {

        $conectar=parent::conexion();

        $sql="delete from pacientes where id_paciente=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_paciente);
        $sql->execute();

        return $resultado=$sql->fetch(PDO::FETCH_ASSOC);   

}

 public function get_paciente_por_id($id_paciente){

          $conectar= parent::conexion();

          //$output = array();

          $sql="select * from pacientes where id_paciente=?";

                $sql=$conectar->prepare($sql);

                $sql->bindValue(1, $id_paciente);
                $sql->execute();

                return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

        }

public function get_pacientes_auto(){

          $conectar=parent::conexion();
          parent::set_names();

          $sql="select *from pacientes where tipo_pac='c_autom';";

          $sql=$conectar->prepare($sql);
          $sql->execute();

          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

}


}