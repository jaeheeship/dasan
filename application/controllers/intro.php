<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));
	}

	public function index(){

	}
	
    public function getIntroPage(){
		$this->load->database();
		$this->load->model('super_model','super');
		
        $result = $this->getIntroPageList(3);
		$data['currentPage'] = "intro";
		$data['list'] = $result['list'];

		$header = $this->load->view('super/header',$data,true);
		$body = $this->load->view('super/introEditForm',$data,true);
		$footer = $this->load->view('super/footer','',true);

		echo $header.$body.$footer;
	}

    public function getIntroPageList($val, $page=1, $list_count=10){
		$this->load->database();
		$this->load->model('super_model','super');
		
		$search_param['search_key'] = 'category';
		$search_param['search_keyword'] = $val;
		
		$result = $this->super->getList($page,$list_count,$search_param,'asc');	
		return $result;
	}

}
