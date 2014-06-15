<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class User extends CI_Controller {

	    function __construct() {
	        parent::__construct();
	    }
	
	    function index() {
			$this->load->model('User_model','User',TRUE);
	        echo '<pre>'. print_r($this->User->get(),1).'</pre>';
	        echo 'SWA!';
	    }
	}
	        


?>