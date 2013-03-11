<?php
class Super_model extends CI_Model {
	var $table = 'super';

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function insert($data){
		return $this->db->insert($this->table, $data);
	}
	
	public function get($no){
		$this->db->where('no', $no);
		$query = $this->db->get($this->table);

		if($query->num_rows() == 1) return $query->result();
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
	
	public function delete($no)
	{
		$this->db->where('no', $no);
		$this->db->delete($this->table);
	}
	
	public function update($data, $no){
		if($this->db->update($this->table,$data, array('no' => $no))) return $no;
		return null;
	}
	
	public function category_getList(){
		$query = $this->db->get("category");
		return $query->result();
	}
	
	public function insert_category($data){
		return $this->db->insert('category', $data);
	}
	
	public function delete_category($no)
	{
		$this->db->where('no', $no);
		$this->db->delete('category');
	}

}
