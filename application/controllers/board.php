<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Board extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		
		if(!$this->tank_auth->is_logged_in()) {
			redirect(base_url().'auth');	
		}
	}

	public function index()
	{
		$this->boardList();	
	}
	
	public function boardList($page=1,$list_count=10){
		$this->load->database();
		
		$this->load->model('board_model','board');
		
		$search_param = null;
		$data['search_key'] = '';
		$data['search_keyword'] = '';
		
		if($this->input->get_post('search_key') && $this->input->get_post('search_keyword')){
			$search_param = array();
			$data['search_key'] =  $search_param['search_key'] = $this->input->get_post('search_key');
			$data['search_keyword'] = $search_param['search_keyword'] = $this->input->get_post('search_keyword');
		}
		$result = $this->board->getList($page,$list_count,$search_param);
		
		$data['list'] = $result['list'];
		$data['pagination'] = $result['pagination'];
		
		$header = $this->load->view('board/header','',true);
		$body = $this->load->view('board/listForm',$data,true);
		$footer = $this->load->view('board/footer','',true);

		echo $header.$body.$footer;
	}
	
	public function register(){
		$this->load->database();
		$this->load->model('board_model','board');

		$data['document'] = null;
		$data['category_list'] = $this->board->category_getList();

		$header = $this->load->view('board/header','',true);
		$body = $this->load->view('board/registerForm',$data,true);
		$footer = $this->load->view('board/footer','',true);

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
		$this->load->library('session');
		$this->load->helper('date');
		$this->load->database();

		$this->createDirectory();
		
		$this->load->model('board_model','board');
				
		$args = new stdClass;
				
		$args->title = $this->input->get_post('title');
		$args->sub_title = $this->input->get_post('sub_title');
		$args->category = $this->input->get_post('category');
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

		$ret_data = $this->board->insert($args);
		
		redirect(base_url().'board/boardList','refresh');
	}
	
	public function modify($no){
		$this->load->database();
		
		$this->load->model('board_model','board');
		
		$data['document'] = $this->board->get($no);
		$data['category_list'] = $this->board->category_getList();
		
		$header = $this->load->view('board/header','',true);
		$body = $this->load->view('board/registerForm',$data,true);
		$footer = $this->load->view('board/footer','',true);
		
		echo $header.$body.$footer;
	}
	
	public function modifyData(){
		$this->load->library('uploadhandler');
		$this->load->library('session');
		$this->load->helper('date');
		$this->load->database();

		$this->createDirectory();

		$this->load->model('board_model','board');
				
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
		$ret_data = $this->board->update($args,$no);
			
		redirect(base_url().'board/boardList','refresh');
	}

	public function delete(){
		$this->load->database();
		$this->load->model('board_model','board');
		$no = $this->input->get_post('no');
		$this->board->delete($no);
	}
	
	public function category(){
		$this->load->database();
		$this->load->model('board_model','board');

		$data['list'] = $this->board->category_getList();
		$header = $this->load->view('board/header','',true);
		$body = $this->load->view('board/categoryForm',$data,true);
		$footer = $this->load->view('board/footer','',true);
		
		echo $header.$body.$footer;
	}

	public function save_category(){
		
		$this->load->library('session');
		$this->load->helper('date');
		$this->load->database();

		$this->createDirectory();
		
		$this->load->model('board_model','board');
				
		$args = new stdClass;
				
		$args->category = $this->input->get_post('category');
		$args->writer = $this->session->userdata('username');
		$args->ip = $this->input->ip_address();
		$args->create_at = standard_date('DATE_ATOM',time());

		$ret_data = $this->board->insert_category($args);

	}

	public function delete_category(){
		$this->load->database();
		$this->load->model('board_model','board');
		$no = $this->input->get_post('no');
		$this->board->delete_category($no);
	}

}
