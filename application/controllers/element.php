<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Element extends CI_Controller {

	    function __construct() {
	        parent::__construct();
	    }
	
	    function index() {
			//Titulo de la página de la vista
			$data['title_for_layout'] = 'Bienvenido';
						
			$this->load->model('Element_model','Element',TRUE);
			$data['elements'] = $this->Element->get_3_best($this->session->userdata('visit_id'));
						
	        $this->layout->view('/Element/index',$data);
	    }
	}
	        


?>