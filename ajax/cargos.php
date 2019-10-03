<?php

switch () {
case "buscar_p_cargo":



		$datos=$creditos->($_POST["id_paciente"]);

	      if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					$output["id_paciente"] = $row["id_paciente"];
					
					
				}
		
		     

	        }

	    echo json_encode($output);  

		break	        

}