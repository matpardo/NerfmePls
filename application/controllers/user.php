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
	    	if($this->session->userdata('id')){
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
	    	if(empty($_POST)){
	    		redirect('/user');
	    	}

	    	$user = $_POST['username'];
	    	$pass = $_POST['password'];

	    	$response = $this->user_model->check($user,$pass);

	    	if($response != null){
	    		if(! $response['status']){
	    			$data['error'] = TRUE;
	    			$data['message'] = 'Usuario Banneado!';
		    		$this->layout->setLayout('layout_login');
		    		$this->layout->view('/user/login',$data);
		    		return;		    		
	    		}
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
	    	if($this->session->userdata('id')){
	    		redirect('/element/', 'refresh');
	    	}
	    	$this->layout->setLayout('layout_login');
	    	$data['sexes_option'] = $this->sexes_model->get_assoc_array();
	    	$data['country_option'] = $this->country_model->get_assoc_array();
	    	$this->layout->view('/user/register',$data);
	    }

	    function checkRegister(){
	    	$data['sexes_option'] = $this->sexes_model->get_assoc_array();
	    	$data['country_option'] = $this->country_model->get_assoc_array();
	    	if($_POST){
	    		$username = array(
	    					'username' => $_POST['username']
	    					);

	    		$response_usr = $this->user_model->get_array($username);

	    		if($response_usr){

	    			$data['error'] = 2;
	    			$this->layout->view('/user/register',$data);

	    		} else {

	    			$mail = array(
	    					'mail' => $_POST['mail']
	    					);
	    			$response_ml = $this->user_model->get_array($mail);

	    			if($response_ml){

	    				$data['error'] = 3;
	    				$this->layout->view('/user/register',$data);

	    			} else {

	    				array_pop($_POST);
	    				$_POST['created'] = date('Y-m-d H:i:s');
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
	    	if(! $this->session->userdata('id')){
	    		redirect('/user/', 'refresh');
	    	}

	    	$userdata = $this->session->all_userdata();
	    	if(isset($userdata['id'])){
	    		$data = $this->user_model->get_array($userdata['id']);
	    		$data['sexes_option'] = $this->sexes_model->get_assoc_array();
	    		$data['country_option'] = $this->country_model->get_assoc_array();
	    		$data['sex_name']=$this->sexes_model->get_assoc_array()[$data['sex_id']];
	    		$data['country_name']=$this->country_model->get_assoc_array()[$data['country_id']];
	    		$this->layout->view('/user/profile',$data);

	    	} else {
	    		$this->layout->setLayout('layout_login');
	    		$this->layout->view('/user/login');
	    	}
	    }

	    function changeField(){
	    	if($_POST){
	    		$this->user_model->changeField($_POST['id'],$_POST['field'],$_POST['value']);
	    		$response = $this->user_model->get_array(array('id'=>($_POST['id'])));
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
	    		}
	    	}
	    	redirect('/user/profile_data', 'refresh');
	    }

	    function admin(){
	    	if(! $this->session->userdata('id')){
	    		redirect('/user/', 'refresh');
	    	}

	    	$userdata = $this->session->all_userdata();
	    	if(isset($userdata['id']) && isset($userdata['group_id']) && $userdata['group_id'] == 1){
	    		$data['travelers_option'] = $this->user_model->get_assoc_array_travelers();
	    		$this->layout->view('/user/admin',$data);
	    	} else {
	    		$this->layout->setLayout('layout_login');
	    		$this->layout->view('/user/login');
	    	}
	    }

	    function upgradeTraveler(){
        	if($_POST){
	    		$this->user_model->upgradeTraveler($_POST['id']);
	    	}
	    	redirect('/user/admin', 'refresh');
    	}

    	function banTraveler(){
       		if($_POST){
	    		$this->user_model->banTraveler($_POST['id']);
	    	}
	    	redirect('/user/admin', 'refresh');
    	}

	    function logout(){
	    	$this->session->sess_destroy();
	    	redirect('/user/', 'refresh');
	    }
	}
	        


?>