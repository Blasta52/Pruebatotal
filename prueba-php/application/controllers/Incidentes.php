<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once("./application/middleware/Autentication_middleware.php");

	class Incidentes extends CI_Controller {

		private $id_contratista;

		public function __construct() {

            parent::__construct();
            $this->load->model('incidentes_model', 'model');
            header('Content-Type: application/json');
            $middleware = new Autentication_middleware();
            $key = config_item("jwt_secret_key");
            $jwt = $_SERVER["HTTP_AUTHORIZATION"];
            $decod=$middleware->ValidarToken ($jwt,$key);
            $this->id_contratista=$decod->data->id;

            
        }

	    public function getIncidentes(){

	        $this->model->getIncidentes();

	    }

	    public function nuevoIncidente(){

	        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	        {   
	            $this->model->nuevoIncidente($_POST['incidente'],$_POST['id_cliente'],$this->id_contratista);
	        }
	        else
	        {   
	            show_404();
	        }


	    }

 	}

 ?>