<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Element extends CI_Controller {

	    function __construct() {
	        parent::__construct();
	    }
	
	    function index() {
			//Titulo de la página de la vista
			$data['title_for_layout'] = 'Bienvenido';

			$user = $this->session->all_userdata();
			
			echo '<pre>'. print_r($user,1).'</pre>'; die;

			$this->load->model('Element_model','Element',TRUE);
			echo '<pre>'. print_r($this->Element->get(),1).'</pre>';
			
			//echo '<pre>'. print_r($this->Element->get(),1).'</pre>';	        
	        $this->layout->view('/Element/test',$data);
	    }
	}
	        


?>