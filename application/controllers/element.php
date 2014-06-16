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

	    function add() {
			//Titulo de la página de la vista
			$data['title_for_layout'] = 'Bienvenido';
						
			$this->load->model('Country_model','Country',TRUE);
						
			$data['Countries'] = $this->Country->get_assoc_array();
						
	        $this->layout->view('/Element/add',$data);
	    }

	    function end_add(){
	    	//echo '<pre>'. print_r($_FILES,1).'</pre>';
	    	$data = $_POST;
	    	
	    	$data['user_id'] = $this->session->userdata('id');

			$this->load->model('Element_model','Element',TRUE);						
	        
			$config['upload_path'] = './assets/files/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())			{
				$error = array('error' => $this->upload->display_errors());
			
			}
			else{
				$data_pic = array('upload_data' => $this->upload->data());
				$data['picture'] = $data_pic['upload_data']['file_name'];
			}	
			$id = $this->Element->insert($data);						

			redirect('/element/', 'refresh');
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
	    	$data['created'] = date("Y-m-d H:i:s");

	    	$this->load->model('Comment_model','Comment',TRUE);
	    	
	    	
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

	    function restaurant($country_id = null) {
			//Titulo de la página de la vista
			$data['title_for_layout'] = 'Restaurantes';
						
			$this->load->model('Country_model','Country',TRUE);
			$this->load->model('Element_model','Element',TRUE);
			
			$data['Countries'] = $this->Country->get_assoc_array();
			
			if(!is_null($country_id)){
				$data['Elements'] = $this->Element->get_elements_by_country($country_id,2);
			}
			//echo '<pre>'. print_r($data,1).'</pre>';	
	        $this->layout->view('/Element/restaurant',$data);
	    }

	    function rent($country_id = null) {
			//Titulo de la página de la vista
			$data['title_for_layout'] = 'Hoteles/Alquileres';
						
			$this->load->model('Country_model','Country',TRUE);
			$this->load->model('Element_model','Element',TRUE);
			
			$data['Countries'] = $this->Country->get_assoc_array();
			
			if(!is_null($country_id)){
				$data['Elements'] = $this->Element->get_elements_by_country($country_id,1);
			}
			//echo '<pre>'. print_r($data,1).'</pre>';	
	        $this->layout->view('/Element/rent',$data);
	    }

	     function places($country_id = null) {
			//Titulo de la página de la vista
			$data['title_for_layout'] = 'Tour';
						
			$this->load->model('Country_model','Country',TRUE);
			$this->load->model('Element_model','Element',TRUE);
			
			$data['Countries'] = $this->Country->get_assoc_array();
			
			if(!is_null($country_id)){
				$data['Elements'] = $this->Element->get_elements_by_country($country_id,3);
			}
			//echo '<pre>'. print_r($data,1).'</pre>';	
	        $this->layout->view('/Element/places',$data);
	    }

	    function remove($id = null) {
	    	
			$data_ue = array('elements_id' => $id);
			$data_el = array('id' => $id);
			$data_cm = array('element_id' => $id);

			$this->load->model('User_Element_model','UserElement',TRUE);
			$this->load->model('Element_model','Element',TRUE);
			$this->load->model('Comment_model','Comment',TRUE);
			
			$this->UserElement->delete($data_ue);
			$this->Comment->delete($data_cm);
			$this->Element->delete($data_el);

	    	redirect($_SERVER['HTTP_REFERER'], 'refresh');
	    }	 
	}
	        


?>