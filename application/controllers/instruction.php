<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Instruction extends CI_Controller
{
	function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));
	}

	public function index(){

	}
	
	public function company(){
		$menu['current_page'] = "company" 
		$data['company'] =  $this->current_page($val);
		$header = $this->load->view('menu/header','',true);
		$sidebar = $this->load->view('menu/sidebar',$menu,true);
		$body = $this->load->view('menu/mainPage',$data,true);
		$footer = $this->load->view('menu/footer','',true);
		
		echo $header.sidebar.$body.$footer;
	}
	
	public function	accomplishments(){
		$menu['current_page'] = "accomplishments" 
		$data['accomplishments'] =  $this->current_page($val);
		$header = $this->load->view('menu/header','',true);
		$sidebar = $this->load->view('menu/sidebar',$menu,true);
		$body = $this->load->view('menu/mainPage',$data,true);
		$footer = $this->load->view('menu/footer','',true);
		
		echo $header.sidebar.$body.$footer;
	}
	
	public function	access(){
		$menu['current_page'] = "access" 
		$data['access'] =  $this->current_page($val);
		$header = $this->load->view('menu/header','',true);
		$sidebar = $this->load->view('menu/sidebar',$menu,true);
		$body = $this->load->view('menu/mainPage',$data,true);
		$footer = $this->load->view('menu/footer','',true);
		
		echo $header.sidebar.$body.$footer;
	}

	public current_page($current_page, page=1, $list_count=10){
		$this->load->database();
		$this->load->model('board_model','board');

		$search_param['search_key'] = 'category';
		$search_param['search_keyword'] = $current_page;
		
		$result = $this->board->getList($page,$list_count,$search_param);	
		return $result['list'];
	}

}
