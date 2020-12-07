<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once("./application/middleware/Autentication_middleware.php");

	class Clientes extends CI_Controller {


		private $id_contratista;

		public function __construct() {
            parent::__construct();
            $this->load->model('clientes_model', 'model');
            header('Content-Type: application/json');
            $middleware = new Autentication_middleware();
            $key = config_item("jwt_secret_key");
            $jwt = $_SERVER["HTTP_AUTHORIZATION"];
            $decod=$middleware->ValidarToken ($jwt,$key);
            $this->id_contratista=$decod->data->id;
        }

	    public function eliminarCliente(){

	        $id_cliente = $this->input->post('id_cliente');
	        $this->model->eliminarCliente($id_cliente);

	    }

	    public function getClientes(){

	        $this->model->getClientes();

	    }

	    public function actualizarCliente(){

	        $cliente = $this ->input-> post('cliente');
	        $id_cliente = $this ->input->post('id_cliente');
	        $this->model->actualizarCliente($cliente,$id_cliente);

	     }



	     public function nuevoCliente(){

	        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	        {   
	            $this->model->nuevoCliente($_POST['cliente']);
	        }
	        else
	        {   
	            show_404();
	        }


	    }

 	}

 ?>