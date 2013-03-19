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
		$data['page'] = $this->super->get_page($number);
		$data['sel'] = $data['page'][0]->category_parent;
		$data['sub_sel'] = $number;
		$header = $this->load->view('welcome/header',$data,true);
		//$sidebar = $this->load->view('page/sidebar',$data,true);
		$body = $this->load->view('welcome/page',$data,true);
		$footer = $this->load->view('welcome/footer','',true);
		
		echo $header.$body.$footer;

        /*if($data['sel'] == 3)
		    echo $header.$sidebar.$body.$footer;
        else
		    echo $header.$body.$footer;
            */
	}
    
    public function board($page=1, $list_count=10){
        $this->load->database();
		$this->load->model('super_model','super');

        $search_param['search_key'] = 'category_parent';
		$search_param['search_keyword'] = 0;
		
		$result = $this->super->getBoardList($page,$list_count,$search_param,'asc');	
        
        $data['menu'] = $this->super->make_menu();
        $data['logo'] = $this->super->get(1);
		$data['sel'] = '7';

		$data['list'] = $result['list'];
		$data['pagination'] = $result['pagination'];

        $header = $this->load->view('welcome/header',$data,true);
		$body = $this->load->view('welcome/board',$data,true);
		$footer = $this->load->view('welcome/footer','',true);
		
		echo $header.$body.$footer;
    }
    
    public function getBoard($no){
		$this->load->database();
		$this->load->model('super_model','super');

		$data['document'] = $this->super->getBoard($no);	
		
        $data['menu'] = $this->super->make_menu();
        $data['logo'] = $this->super->get(1);
		$data['sel'] = '7';

        $header = $this->load->view('welcome/header',$data,true);
		$body = $this->load->view('welcome/boardForm',$data,true);
		$footer = $this->load->view('welcome/footer','',true);
		
		echo $header.$body.$footer;
	}

}
