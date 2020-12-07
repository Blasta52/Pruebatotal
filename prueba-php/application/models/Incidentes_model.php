<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Incidentes_model extends CI_Model {

		public function getIncidentes(){

	        $incidentes = $this->db->select("a.id_incidentes, a.incidente, b.cliente, c.contratista, a.created_at")
	        					->join("clientes b", "b.id_cliente = a.id_cliente")
	        					->join("contratistas c", "c.id_contratista = a.id_contratista")
	        					->get("incidentes a")->result();

	        echo json_encode($incidentes);
		}

		public function nuevoIncidente($incidente,$id_cliente,$id_contratista){	
				
				$data = array (
					'incidente' => $incidente,
					'id_cliente' => $id_cliente,
					'id_contratista' => $id_contratista
				);

				$this->db->insert('incidentes',$data);

				$rest['message'] = "El incidente se registro correctamente";

				echo json_encode($rest);

		}


	}
?>