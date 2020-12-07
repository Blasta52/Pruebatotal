<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Controller {

    	public function __construct() {
            parent::__construct();
            $this->load->model('Login_model', 'model');
            header('Content-Type: application/json');
        }


        // controlador de registro de contratista
        public function registration(){

        // ejecuta la funcion del modelo verificando que sea post 
        	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        	{
        		$this->model->registration($_POST['contratista']);
        	}
        	else
        	{
        		show_404();
        	}
        }

        public function login(){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {
                $this->model->login($_POST['contratista']);
            }
            else
            {
                show_404();
            }   
        }

	}




 ?>