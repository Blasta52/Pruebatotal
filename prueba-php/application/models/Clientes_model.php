<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Clientes_model extends CI_Model {

		
		public function eliminarCliente($id_cliente){

		$total = $this->db->where("id_cliente",$id_cliente)
							->where("state != 'eliminado'")
						 	->get("clientes")
						 	->num_rows();
			if ($total > 0) {

				// Validar si tiene incidencias
				$inc= $this->db->where("id_cliente",$id_cliente)
						 	->get("incidentes")
						 	->num_rows();

					if ($inc == 0) {
							

						$data= array(

						     "state"=>"eliminado"
						);

						$this->db->where("id_cliente",$id_cliente)->update('clientes',$data);

						$rest['message'] = "El cliente fue eliminado correctamente";

						echo json_encode($rest);

					}
					else {

						http_response_code(422);
						$rest['message'] = "No es posible eliminar al cliente ya que tiene incidentes asignados";

						echo json_encode($rest);	

					}


			}
			else{

				http_response_code(422);
				$rest['message'] = "No se encontrò el cliente,es posible que ya haya sido eliminado";

				echo json_encode($rest);

			}




		}


		public function getClientes(){

	        $clientes = $this->db->where("state != 'eliminado'")->get("clientes")->result();

	        echo json_encode($clientes);
		}


	public function actualizarCliente($cliente,$id_cliente){

		$total = $this->db->where("cliente",$cliente)
						  ->where('id_cliente !=',$id_cliente)
					 	  ->get("clientes")
					 	  ->num_rows();
		

		if ($total == 0 ) {

		$data = array(

			'cliente' => $cliente

		);

		$this->db->where('id_cliente',$id_cliente)->update('clientes',$data);
		
		$rest['message'] = "El cliente se actualizo correctamente";

		echo json_encode($rest);

		}
		else{

			http_response_code(422);
			$rest['message'] = "Ya existe un cliente con este nombre";

			echo json_encode($rest);

		}


	}


		
		public function nuevoCliente($cliente){	
				
			$total = $this->db->where("cliente",$cliente)
					 		->get("clientes")
					 		->num_rows();
			if ($total == 0) {
			
				$data = array (

					'cliente' => $cliente,
					
				);

				$this->db->insert('clientes',$data);
				
				$rest['message'] = "El cliente se registro correctamente";

				echo json_encode($rest);

				

			}
			else{

				http_response_code(422);
				$rest['message'] = "El cliente ya se encuentra registrado";

				echo json_encode($rest);


			}


		}




	}
?>