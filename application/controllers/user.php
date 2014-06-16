<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class User extends CI_Controller {

	    function __construct() {
	        parent::__construct();
	        $this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->database();
			$this->load->model('user_model');
			$this->load->model('sexes_model');
			$this->load->model('country_model');
	    }
	
	    function index() {
	    	$data = $this->session->all_userdata();
	    	if(isset($data['name'])){
	    		redirect('/element/', 'refresh');
	    	} else 
	    		$this->layout->setLayout('layout_login');
	    		$this->layout->view('/user/login');

			/*
			$this->load->model('User_model','User',TRUE);
	        echo '<pre>'. print_r($this->User->get(),1).'</pre>';
	        echo 'SWA!';
	        */
	    }

	    function checkLogin(){
	    	$user = $_POST['username'];
	    	$pass = $_POST['password'];

	    	$response = $this->user_model->check($user,$pass);

	    	if($response != null){
	    		//obtenemos el ip del visitante
				//$ip = $_SERVER['REMOTE_ADDR'];
				//de prueba pondremos una ip chilena
				$ip='200.9.100.75';
				$location = json_decode(file_get_contents('http://freegeoip.net/json/'.$ip));
				
				//obtenemos el codigo de país
				$country_code = $location->country_code;
				$this->load->model('Country_model','Country',TRUE);

				$visit_id = $this->Country->get_country_id($country_code);
				
	    		$data = array(
	    				'id' => $response['id'],
	    				'group_id' => $response['group_id'],
	    				'country_id' => $response['country_id'],
	    				'name' => $response['name'],
	    				'lastname_f' => $response['lastname_f'],
	    				'lastname_m' => $response['lastname_m'],
	    				'visit_id' => $visit_id);

	    		$this->session->set_userdata($data);

	    		$data = $this->session->all_userdata();

	    		redirect('/element/', 'refresh');
	    	}
	    	else{
	    		$data['error'] = TRUE;
	    		$this->layout->setLayout('layout_login');
	    		$this->layout->view('/user/login',$data);
	    	}
	    }

	    function register(){
	    	$data['sexes_option'] = $this->sexes_model->get_assoc_array();
	    	$data['country_option'] = $this->country_model->get_assoc_array();
	    	$this->layout->view('/user/register',$data);
	    }

	    function checkRegister(){
	    	if($_POST){
	    		$username = $_POST['username'];

	    		$response_usr = $this->user_model->exist('username',$username);

	    		if($response_usr){

	    			$data['error'] = 2;
	    			$this->layout->view('/user/register',$data);

	    		} else {

	    			$mail = $_POST['mail'];
	    			$response_ml = $this->user_model->exist('mail',$mail);

	    			if($response_ml){

	    				$data['error'] = 3;
	    				$this->layout->view('/user/register',$data);

	    			} else {
	    				array_pop($_POST);
	    				$test = $this->user_model->insert($_POST);

	    				if(!$test){

	    					$data['error'] = 4;
	    					$this->layout->view('/user/register',$data);

	    				} else {

	    					$data['error'] = 0;
	    					$this->layout->view('/user/register',$data);
	    					
	    				}
	    			}
	    		}
	    	}
	    	else{
	    		$data['error'] = 1;
	    		$this->layout->view('/user/register',$data);
	    	}
	    }

	    function profile_data(){
	    	$userdata = $this->session->all_userdata();
	    	if(isset($userdata['id'])){
	    		$data = $this->user_model->get_array($userdata['id']);
	    		$data['sex_name']=$this->sexes_model->get_assoc_array()[$data['sex_id']];
	    		$data['country_name']=$this->country_model->get_assoc_array()[$data['country_id']];
	    		$this->layout->view('/user/profile',$data);

	    	} else {
	    		$this->layout->setLayout('layout_login');
	    		$this->layout->view('/user/login');
	    	}
	    }

	    function changePass(){
	    	if($_POST){
	    		$this->user_model->changePass($_POST['id'],$_POST['password']);
	    	}
	    	redirect('/user/profile_data', 'refresh');
	    }

	    function logout(){
	    	$this->session->sess_destroy();
	    	redirect('/user/', 'refresh');
	    }
	}
	        


?>