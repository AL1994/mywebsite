<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Message_model extends CI_Model
{
	public function get_all_comms(){
		$this -> db -> select('arti.article_id, arti.title, us.username, comm.comment_id, comm.content, comm.add_time, comm.is_read');
		$this -> db -> from('t_article arti');
		$this -> db -> join('t_comment comm','comm.article_id=arti.article_id');
		$this -> db -> join('t_user us','us.user_id=comm.user_id');
		$this -> db -> order_by('comm.add_time','desc');
		return $this -> db -> get() -> result();
	}
	public function do_ch($arr,$cid){
		$this -> db -> update("t_comment",$arr,"comment_id = $cid");
		$query =  $this -> db -> affected_rows();
		//var_dump($query);die;
		return $query;
	}
	public function del_comment($cid){
		$this->db->where('comment_id', $cid);
		$this->db->delete('t_comment');
	}



	public function dosave_m($arr){
		$query = $this->db->insert('t_message',$arr);
		return $this->db->affected_rows();
	}
	
	public function get_all_num(){
		return $this->db->get('t_message')->num_rows();
	}
	
	public function get_all_message($startno, $pagesize){
		$this->db->order_by('t_message.message_id',"desc");
		$this -> db -> limit($pagesize, $startno);
		return $this->db->get('t_message')->result();
	}


}