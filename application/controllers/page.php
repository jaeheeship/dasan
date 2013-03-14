<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller
{
	function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));
	}
    
    public function go($number){
        $this->load->database();
		$this->load->model('super_model','super');

        $data['menu'] = $this->super->make_menu();
        $data['logo'] = $this->super->get(1);
		$data['slogun'] = $this->super->get(2);
		$data['page'] = $this->super->get_page($number);
		$data['sel'] = $data['page'][0]->category_parent;
		$data['sub_sel'] = $data['page'][0]->category;
		$header = $this->load->view('welcome/header',$data,true);
		$sidebar = $this->load->view('welcome/sidebar',$data,true);
		$body = $this->load->view('welcome/layout',$data,true);
		$footer = $this->load->view('welcome/footer','',true);
		
        if($data['sel'] == 3)
		    echo $header.$sidebar.$body.$footer;
        else
		    echo $header.$body.$footer;
	}
}
