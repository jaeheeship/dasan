<?php
class Super_model extends CI_Model {
	var $table = 'page';

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function insert($data){
		return $this->db->insert($this->table, $data);
	}
    
    public function insert_board($data){
		return $this->db->insert('board', $data);
	}
	
	public function get($no){
		$this->db->where('no', $no);
		$query = $this->db->get($this->table);

		if($query->num_rows() == 1) return $query->result();
		return NULL;
	}

    public function get_page($no){
		$this->db->where('no', $no);
		$query = $this->db->get($this->table);

		if($query->num_rows() == 1) return $query->result();
		return NULL;
	}

    public function get_category($category){
		$this->db->where('category_parent', $category);
		$query = $this->db->get('category');

		if($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	public function getList($page=1,$list_count=10,$search_param=null,$order="desc"){
		$this->db->order_by("no", $order);
		$this->db->limit($list_count , ($page-1)*$list_count );
		
		$this->db->where($search_param['search_key'],$search_param['search_keyword']);
		$query = $this->db->get($this->table);

		$this->db->where($search_param['search_key'],$search_param['search_keyword']);
		$total_rows = $this->db->count_all_results($this->table);
	
		$pagination['page'] = $page ;
		$pagination['list_count'] = $list_count ;
		$pagination['total_rows'] = $total_rows ;
		$pagination['page_count'] = ceil($total_rows / $list_count) ;
	
		$result['list'] = $query->result() ;
		$result['pagination'] = $pagination ;
	
		return $result ;
	}

    public function updateBoard($data, $no){
		if($this->db->update('board',$data, array('no' => $no))) return $no;
		return null;
	}
    
    public function getBoard($no){
        $this->db->where('no', $no);
		$query = $this->db->get('board');

		if($query->num_rows() == 1) return $query->row();
		return NULL;

    }

    public function getBoardList($page=1,$list_count=10,$search_param=null,$order="desc"){
		$this->db->order_by("no", $order);
		$this->db->limit($list_count , ($page-1)*$list_count );
		
		$this->db->where($search_param['search_key'],$search_param['search_keyword']);
		$query = $this->db->get('board');

		$this->db->where($search_param['search_key'],$search_param['search_keyword']);
		$total_rows = $this->db->count_all_results('board');
	
		$pagination['page'] = $page ;
		$pagination['list_count'] = $list_count ;
		$pagination['total_rows'] = $total_rows ;
		$pagination['page_count'] = ceil($total_rows / $list_count) ;
	
		$result['list'] = $query->result() ;
		$result['pagination'] = $pagination ;
	
		return $result ;
	}

	
	public function delete($no)
	{
		$this->db->where('no', $no);
		$this->db->delete($this->table);
	}
    
    public function delete_board($no)
	{
		$this->db->where('no', $no);
		$this->db->delete('board');
	}

    public function delete_page($no)
	{
        $this->db->select('category');
		$this->db->where('no', $no);
		$query = $this->db->get($this->table);
        $this->delete_category($query->row()->category);
        $this->delete($no); 
	}
	
	public function update($data, $no){
		if($this->db->update($this->table,$data, array('no' => $no))) return $no;
		return null;
	}

    public function update_category($data, $no){
		if($this->db->update("category",$data, array('no' => $no))) return $no;
		return null;
	}
	
	public function category_getList(){
		$query = $this->db->get("category");
		return $query->result();
	}
	
	public function insert_category($data){
		if($this->db->insert('category', $data)){
            return $this->db->insert_id();
        }
            return -1;
	}
	
	public function delete_category($no)
	{
		$this->db->where('no', $no);
		$this->db->delete('category');
	}
    
    public function make_menu()
    {
        $this->db->select("no,category,category_parent,link_url");
        $this->db->where("category_parent != 0");
        $query = $this->db->get("category"); 
        
        $list = array();
        $temp =  array();

        foreach($query->result() as $row)
        {
                if(!isset($list[$row->category_parent])){
                    $list[$row->category_parent] = array(); 
                }
                $temp['no'] = $row->no;
                $temp['title'] = $row->category;
                $temp['link_url'] = $row->link_url;
                $list[$row->category_parent][] = $temp; 
        }
        return $list;
    }

    function get_user(){

    }

    function set_password_key($user_id, $new_pass_key)
	{
		$this->db->set('new_password_key', $new_pass_key);
		$this->db->set('new_password_requested', date('Y-m-d H:i:s'));
		$this->db->where('id', $user_id);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}


}
