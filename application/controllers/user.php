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
	    }
	
	    function index() {
	    	$data = $this->session->all_userdata();
	    	if(isset($data['name'])){
	    		$this->layout->view('/user/home', $data);
	    	} else 
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
	    		$data = array(
	    				'id' => $response['id'],
	    				'group_id' => $response['group_id'],
	    				'country_id' => $response['country_id'],
	    				'name' => $response['name'],
	    				'lastname_f' => $response['lastname_f'],
	    				'lastname_m' => $response['lastname_m']);

	    		$this->session->set_userdata($data);

	    		$data = $this->session->all_userdata();

	    		$this->layout->view('/user/home', $data);
	    	}
	    	else{
	    		$data['error'] = TRUE;
	    		$this->layout->view('/user/login',$data);
	    	}
	    }

	    function register(){
	    	$this->layout->view('/user/register');
	    }

	    function logout(){
	    	$this->session_destroy();
	    	$this->layout->view('/user/login');
	    }
	}
	        


?>