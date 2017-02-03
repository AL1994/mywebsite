<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	
	public function get_by_name_pwd($name, $pwd)
	{
		$query = $this -> db -> get_where('t_admin', array('admin_name'=>$name, 'admin_pwd' => $pwd));
		//var_dump($query);die;
		return $this->db->affected_rows();
	}

	public function do_user_manage(){
		$this -> db -> order_by('t_user.add_time','desc');
		return $this -> db -> get('t_user') -> result();
	}


	public function zanUpdate($id,$zan){

		$arr = array(
			'click_zan' => $zan+1
		);
		
		$this->db->where('article_id',$id);
		$this->db->update('t_article',$arr);
		
		return $this->db->affected_rows();
	}

	public function m_register($data){
		$this -> db -> insert('t_user',$data);
		return $this -> db -> affected_rows();
	}
	public function do_cu($name){
		return $this -> db -> get_where('t_user',array('username'=>$name)) -> num_rows();
	}

	public function m_login($data){
		return $this -> db -> get_where('t_user',$data) -> row();
	}








}
