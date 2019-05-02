<?php
  
     //conexión a la base de datos

   require_once("../config/conexion.php");

   class Consulta extends Conectar{


    public function get_consultas(){

        $conectar= parent::conexion();
       
        $sql= "select c.fecha_reg,c.id_consulta,p.nombres,c.sugeridos,c.diagnostico,u.usuario 
        from usuarios as u inner join consulta as c on u.id_usuario=c.id_usuario inner join pacientes as p on c.id_paciente=p.id_paciente;";

        $sql=$conectar->prepare($sql);

        $sql->execute();

        return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

         
         }
         

       public function get_detalle_consultas($id_consulta){

          $conectar=parent::conexion();
           parent::set_names();

          $sql="select p.codigo,p.nombres,u.usuario,c.id_consulta,c.motivo,c.patologias,c.id_paciente,c.id_usuario,c.fecha_reg,c.oiesfreasl,c.oicilindrosl,c.oiejesl,c.oiprismal,c.oiadicionl,c.odesferasl,c.odcilndrosl,c.odejesl,c.odprismal,c.odadicionl,c.oiesferasa,c.oicolindrosa,c.oiejesa,c.oiprismaa,c.oiadiciona,c.odesferasa,c.odcilindrosa,c.odejesa ,c.dprismaa,c.oddiciona,c.sugeridos,c.diagnostico,c.medicamento,c.observaciones,c.oiesferasf,c.oicolindrosf,c.oiejesf,c.oiprismaf,c.oiadicionf,c.odesferasf,c.odcilindrosf,c.odejesf,c.dprismaf,c.oddicionf from usuarios as u inner join consulta as c on u.id_usuario=c.id_usuario inner join pacientes as p on c.id_paciente=p.id_paciente where id_consulta=?;";

          //echo $sql; exit();

          $sql=$conectar->prepare($sql);
              

          $sql->bindValue(1,$id_consulta);
          $sql->execute();
          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

       
            
       }


    
   }



?>
