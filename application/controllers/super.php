<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Super extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation','security','session','tank_auth'));
		$this->lang->load('tank_auth');
		
		if(!$this->tank_auth->is_logged_in()) {
			redirect(base_url().'auth');	
		}
        

	}

	public function index()
	{
		$this->getMainEditPage();	
	}
	
	public function getMainEditPage(){
		$this->load->database();
		$this->load->model('super_model','super');
		
        $this->session->set_userdata('last_page', current_url());

		$data['logo'] = $this->super->get(1);
		$data['slogun'] = $this->super->get(2);

        $result = $this->get_image(0);
		$data['main_image'] = $result['list'];
        $result = $this->get_image(1);
		$data['sub_image'] = $result['list'];

		
		$header = $this->load->view('super/header','',true);
		$body = $this->load->view('super/mainEditForm',$data,true);
		$footer = $this->load->view('super/footer','',true);

		echo $header.$body.$footer;
	}
	
    public function getIntroEditPage(){
		$this->load->database();
		$this->load->model('super_model','super');
		

        $this->session->set_userdata('last_page', current_url());

        $result = $this->get_image(3);
		$data['list'] = $result['list'];

		$header = $this->load->view('super/header','',true);
		$body = $this->load->view('super/introEditForm',$data,true);
		$footer = $this->load->view('super/footer','',true);

		echo $header.$body.$footer;
	}

    public function getTrainingEditPage(){
		$this->load->database();
		$this->load->model('super_model','super');

        $this->session->set_userdata('last_page', current_url());

        $result = $this->get_image(4);
		$data['list'] = $result['list'];

		$header = $this->load->view('super/header','',true);
		$body = $this->load->view('super/trainingEditForm',$data,true);
		$footer = $this->load->view('super/footer','',true);

		echo $header.$body.$footer;
	}

    public function getTourEditPage(){
		$this->load->database();
		$this->load->model('super_model','super');

        $this->session->set_userdata('last_page', current_url());

        $result = $this->get_image(5);
		$data['list'] = $result['list'];

		$header = $this->load->view('super/header','',true);
		$body = $this->load->view('super/tourEditForm',$data,true);
		$footer = $this->load->view('super/footer','',true);

		echo $header.$body.$footer;
	}

    public function getPlanningEditPage(){
		$this->load->database();
		$this->load->model('super_model','super');

        $this->session->set_userdata('last_page', current_url());
        
        $result = $this->get_image(6);
		$data['list'] = $result['list'];

		$header = $this->load->view('super/header','',true);
		$body = $this->load->view('super/planningEditForm',$data,true);
		$footer = $this->load->view('super/footer','',true);

		echo $header.$body.$footer;
	}

    public function getBoardEditPage($page=1, $list_count=10){
		$this->load->database();
		$this->load->model('super_model','super');

        $this->session->set_userdata('last_page', current_url());

		$result = $this->get_image(7,$page,$list_count);

		$data['list'] = $result['list'];
		$data['pagination'] = $result['pagination'];

		$header = $this->load->view('super/header','',true);
		$body = $this->load->view('super/boardEditForm',$data,true);
		$footer = $this->load->view('super/footer','',true);

		echo $header.$body.$footer;
	}


	public function get_image($val, $page=1, $list_count=10){
		$this->load->database();
		$this->load->model('super_model','super');
		
		$search_param['search_key'] = 'category';
		$search_param['search_keyword'] = $val;
		
		$result = $this->super->getList($page,$list_count,$search_param,'asc');	
		return $result;
	}

	public function register(){
		$this->load->database();
		$this->load->model('super_model','super');

		$data['document'] = null;
		$data['category_list'] = $this->super->category_getList();

		$header = $this->load->view('super/header','',true);
		$body = $this->load->view('super/registerForm',$data,true);
		$footer = $this->load->view('super/footer','',true);

		echo $header.$body.$footer;
	}
    
    public function writeBoard(){
		$header = $this->load->view('super/header','',true);
		$body = $this->load->view('super/writeForm','',true);
		$footer = $this->load->view('super/footer','',true);

		echo $header.$body.$footer;
	}
	
	public function createDirectory(){
		// create directory
		!is_dir('files') ? mkdir('files',0777) : null;
		!is_dir('files/temp') ? mkdir('files/temp',0777) : null;
		!is_dir('files/filebox') ? mkdir('files/filebox',0777) : null;
		!is_dir('files/filebox/img') ? mkdir('files/filebox/img',0777) : null;
		!is_dir('files/filebox/binary') ? mkdir('files/filebox/binary',0777) : null;
	}

	public function inputData(){
		$this->load->library('uploadhandler');
		$this->load->helper('date');
		$this->load->database();

		$this->createDirectory();
		
		$this->load->model('super_model','super');
				
		$args = new stdClass;
				
		$args->title = $this->input->get_post('title');
		$args->sub_title = $this->input->get_post('sub_title');
		$args->category = $this->input->get_post('category');
        $args->link_url = $this->input->get_post('link_url');
		$args->discription = $this->input->get_post('content');
		$args->writer = $this->session->userdata('username');
		$args->ip = $this->input->ip_address();
		$args->create_at = standard_date('DATE_ATOM',time());

		if($upload_data = $this->uploadhandler->upload()){
			$args->full_path = $upload_data['full_path'];
			$args->file_path = $upload_data['file_path'];
			$args->original_file_name = $upload_data['orig_name'];
			$args->encrypted_file_name = $upload_data['file_name'];
			$args->image_width = $upload_data['image_width'];
			$args->image_height = $upload_data['image_height'];
			$args->image_thumb_path = $upload_data['image_thumb_path'];
		}	

		$ret_data = $this->super->insert($args);

		redirect($this->session->userdata('last_page'),'refresh');
	}
	
	public function modify($no){
		$this->load->database();
		
		$this->load->model('super_model','super');
		
		$data['document'] = $this->super->get($no);
		$data['category_list'] = $this->super->category_getList();
		
		$header = $this->load->view('super/header','',true);
		$body = $this->load->view('super/registerForm',$data,true);
		$footer = $this->load->view('super/footer','',true);
		
		echo $header.$body.$footer;
	}

	public function modifyImage(){
        $this->load->library('uploadhandler');
		$this->load->helper('date');
		$this->load->database();

		$this->createDirectory();

		$this->load->model('super_model','super');
				
		$args = new stdClass;
				
		$no = $this->input->get_post('no');
		$args->writer = $this->session->userdata('username');
		$args->ip = $this->input->ip_address();
		$args->update_at = standard_date('DATE_ATOM',time());
			
		if($upload_data = $this->uploadhandler->upload()){
			$args->full_path = $upload_data['full_path'];
			$args->file_path = $upload_data['file_path'];
			$args->original_file_name = $upload_data['orig_name'];
			$args->encrypted_file_name = $upload_data['file_name'];
			$args->image_width = $upload_data['image_width'];
			$args->image_height = $upload_data['image_height'];
			$args->image_thumb_path = $upload_data['image_thumb_path'];
		    
            $ret_data = $this->super->update($args,$no);
		}		
		redirect($this->session->userdata('last_page'),'refresh');
	}
    
    public function modifyData(){
		$this->load->library('uploadhandler');
		$this->load->helper('date');
		$this->load->database();

		$this->createDirectory();

		$this->load->model('super_model','super');
				
		$args = new stdClass;
				
		$no = $this->input->get_post('no');
		$args->title = $this->input->get_post('title');
		$args->sub_title = $this->input->get_post('sub_title');
		$args->category = $this->input->get_post('category');
		$args->discription = $this->input->get_post('content');
		$args->writer = $this->session->userdata('username');
		$args->ip = $this->input->ip_address();
		$args->update_at = standard_date('DATE_ATOM',time());
			
		if($upload_data = $this->uploadhandler->upload()){
			$args->full_path = $upload_data['full_path'];
			$args->file_path = $upload_data['file_path'];
			$args->original_file_name = $upload_data['orig_name'];
			$args->encrypted_file_name = $upload_data['file_name'];
			$args->image_width = $upload_data['image_width'];
			$args->image_height = $upload_data['image_height'];
			$args->image_thumb_path = $upload_data['image_thumb_path'];
		}		
		$ret_data = $this->super->update($args,$no);
			
		redirect(base_url().'super/getMainEditPage','refresh');
	}

	public function deleteImage(){
		$this->load->database();
		$this->load->model('super_model','super');
		$no = $this->input->get_post('no');
		$this->super->delete($no);
	}
	
	public function category(){
		$this->load->database();
		$this->load->model('super_model','super');

		$data['list'] = $this->super->category_getList();
		$header = $this->load->view('super/header','',true);
		$body = $this->load->view('super/categoryForm',$data,true);
		$footer = $this->load->view('super/footer','',true);
		
		echo $header.$body.$footer;
	}

	public function save_category(){
		
		$this->load->helper('date');
		$this->load->database();

		$this->createDirectory();
		
		$this->load->model('super_model','super');
				
		$args = new stdClass;
				
		$args->category = $this->input->get_post('category');
		$args->writer = $this->session->userdata('username');
		$args->ip = $this->input->ip_address();
		$args->create_at = standard_date('DATE_ATOM',time());

		$ret_data = $this->super->insert_category($args);

	}

	public function delete_category(){
        $this->load->database();
        $this->load->model('super_model','super');
        $no = $this->input->get_post('no');
        $this->super->delete_category($no);
    }

}
