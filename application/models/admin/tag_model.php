<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tag_model extends CI_Model {
		
	public function get_all(){
		$this -> db -> order_by('t_tag.tag_id','desc');
		return $this->db->get('t_tag')->result();
	}
	
	public function save_tag($tags){
		$this -> db -> insert_batch('t_tag',$tags);
		
		return $this -> db -> affected_rows();
	}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
}
	