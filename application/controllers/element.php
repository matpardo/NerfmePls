<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Element extends CI_Controller {

	    function __construct() {
	        parent::__construct();
	    }
	
	    function index() {
			$data['title_for_layout'] = 'Bienvenido';

			$this->load->model('Element_model','Element',TRUE);
	        //echo '<pre>'. print_r($this->Element->get(),1).'</pre>';	        
	        $this->layout->view('/Element/index',$data);
	    }
	}
	        


?>