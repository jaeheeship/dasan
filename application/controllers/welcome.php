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
        $this->load->database();
		$this->load->model('super_model','super');

        $data['menu'] = $this->super->make_menu();
        $data['logo'] = $this->super->get(1);
        $data['sel'] = "";
		$data['slogun'] = $this->super->get(2);
		$data['main_page_image'] =  $this->get_main_image(0);
		$data['main_page_sub_image'] =  $this->get_main_image(1);
		$header = $this->load->view('welcome/header',$data,true);
		$body = $this->load->view('welcome/mainPage',$data,true);
		$footer = $this->load->view('welcome/footer','',true);
		
		echo $header.$body.$footer;
	}
	
	public function get_main_image($val, $page=1, $list_count=10){
		$this->load->database();
		$this->load->model('super_model','super');
		
		$search_param['search_key'] = 'category';
		$search_param['search_keyword'] = $val;
		
		$result = $this->super->getList($page,$list_count,$search_param,'asc');	
		return $result['list'];
	}
}
