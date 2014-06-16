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

	    function view($id = null) {
			$this->load->model('Element_model','Element',TRUE);
	    	
	    	if($this->Element->exist($id) == 0){
	    		$this->layout->view('/Error/404',array('Error' => 'No existe este elemento.','title_for_layout'=>'Error 404' ));
	    	}
	    	else{
				//Titulo de la página de la vista
				$data['title_for_layout'] = 'Elemento';		
				//datos del elemento
				$conditions = array('id' => $id);
				$data['Element'] = $this->Element->get($conditions);
				//Datos asociados al elemento, País
				$this->load->model('Country_model','Country',TRUE);			
				$conditions = array('id' => $data['Element']['country_id']);
				$data['Country'] = $this->Country->get_array($conditions);
				//Datos asociados al elemento, Comentarios
				$this->load->model('Comment_model','Comment',TRUE);							
				$data['Comments'] = $this->Comment->get_comments($data['Element']['id']);
				
				//Datos asociados al elemento, LIKES
				$this->load->model('User_Element_model','UserElement',TRUE);							
				$data['Likes']['count'] = $this->UserElement->count_likes($data['Element']['id']);
				$data['Likes']['liked'] = $this->UserElement->did_like($data['Element']['id'],$this->session->userdata('id'));


		        $this->layout->view('/Element/view',$data);
	    		
	    	}
	    }

	    function process_comments(){
	    	$data = $_POST;
	    	$data['user_id'] = $this->session->userdata('id');

	    	$this->load->model('Comment_model','Comment',TRUE);
	    	//echo '<pre>'. print_r($data,1).'</pre>';	
	    	
	    	$this->Comment->insert($data);

	    	redirect('/element/view/'.$data['element_id'], 'refresh');
	    }

	    function process_likes(){	    	
	    	$data['users_id'] = $this->session->userdata('id');
	    	$data['elements_id'] = $_POST['element_id_like'];
	    	
	    	$this->load->model('User_Element_model','UserElement',TRUE);
	    	
	    	$this->UserElement->insert($data);

	    	redirect('/element/view/'.$data['elements_id'], 'refresh');
	    }
	}
	        


?>