<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));
	}

	public function index(){
		$this->main();	
	}
	
	public function main(){
		$data['main_page_image'] =  $this->main_page_image();
		$data['main_page_sub_image'] =  $this->main_page_sub_image();
		$header = $this->load->view('welcome/header','',true);
		$body = $this->load->view('welcome/mainPage',$data,true);
		$footer = $this->load->view('welcome/footer','',true);
		
		echo $header.$body.$footer;
	}
	
	public function main_page_image($page=1, $list_count=10){
		$this->load->database();
		$this->load->model('board_model','board');

		$search_param['search_key'] = 'category';
		$search_param['search_keyword'] = '17';
		
		$result = $this->board->getList($page,$list_count,$search_param);	
		return $result['list'];
	}
	
	public function main_page_sub_image($page=1, $list_count=10){
		$this->load->database();
		$this->load->model('board_model','board');
		
		$search_param['search_key'] = 'category';
		$search_param['search_keyword'] = '16';
		
		$result = $this->board->getList($page,$list_count,$search_param,'asc');	
		return $result['list'];
	}
}
