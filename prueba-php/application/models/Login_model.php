<?php 

	use Firebase\JWT\JWT;

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login_model extends CI_Model {

	 	// funcion para registrar los contratistas 
		public function registration($contratista)
		{	

		// consulta si el contratista ya esta registrado 	
			$total = $this->db->where('contratista',trim($contratista))
							  ->get("contratistas")
							  ->num_rows();
		
		// si no esta registrado lo agrega
			if($total == 0)
			{
				$data = array(
					'contratista' => $contratista
				);

				$this->db->insert("contratistas", $data);


				$rest['message'] = "Usuario registrado correctamente, ya puede ingresar";

				echo json_encode($rest);
				
			}
		// si ya esta registrado mostrara mensaje de error
			else 
			{
				http_response_code(422);
				$rest['message'] = "El usuario ya se encuentra registrado";

				echo json_encode($rest);
			}
			

		}	




		
		// funcion iniciar sesion
		public function login($contratista)
		{

		// consulta si el contratista se encuentra registrado
			$account = $this->db->where("contratista", $contratista)
								->get("contratistas")
								->row();

			// si se encuentra registrado le permite iniciar sesion
			if ($account) 
			{
				$time = time();

				// la llave secreta la definimos en el config
				$key = config_item("jwt_secret_key");

				// se define la imformacion que va a ir en el token
				$token = array(
				    'iat' => $time, // Tiempo que inició el token
				    'exp' => $time + (60*60), // Tiempo que expirará el token (+1 hora)
				    'data' => [ // información del usuario
				        'id' => $account->id_contratista,
				        'name' =>$account->contratista
				    ]

				);
				// se genera el token
				$jwt = JWT::encode($token, $key);

				// $data = JWT::decode($jwt, $key, array('HS256'));

				$respuesta["token"]=$jwt;
				$respuesta["contratista"]=$contratista;

				echo json_encode($respuesta);
			}
			else{

				http_response_code(422);
				$resterror['message'] = "El usuario no se encuentra registrado";

				echo json_encode($resterror);	

			}


		}

	}		
			
?>