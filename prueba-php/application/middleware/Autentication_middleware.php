<?php 
use Firebase\JWT\JWT;

class Autentication_middleware {

    public function __construct() {
            
        
    }

    public function ValidarToken ($jwt,$key) {
		try {

			$data = JWT::decode($jwt, $key, array('HS256'));

			return $data;
		   
		} catch (Exception $e) {
		    	
		    http_response_code(401);
			$resterror['message'] = "El token ya expiro o es incorrecto";

			echo json_encode($resterror);	

			die();

		}
    }


}

?>