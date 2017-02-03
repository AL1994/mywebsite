<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model {

	public function get_article(){
		$this->db->select('t_article.*,t_category.category_name as category_name');
		$this->db->from('t_category');
		$this->db->join("t_article",'t_article.category_id=t_category.category_id');
		$this->db->order_by('t_article.article_id',"desc");
		$query = $this->db->get();
		
		return $query->result();
		
	}
	
	
	public function get_all_tags($keyword)
	{
		$this->db->like('tag_name', $keyword); 
		return $this -> db -> get('t_tag') -> result();
	}
	
	public function insert($data) {
		$this -> db ->insert('t_article',$data);
		return $this->db->affected_rows();
	}
	
	
	public function get_update_article($id){
			// $this->db->select("t_category.*","t_categroy.categroy_name as category_name");
			// $this->db->from("t_article");
			// $this->db->join("t_category","t_article.article_id = $id");
			// $rs = $this->db->get()->result();
			
			$arr = array(
				'article_id'=>$id
			);
			$query = $this->db->get_where('t_article',$arr);
			return $query->result();			
		}
	public function update_article($id,$data){
		$this->db->where('article_id',$id);
		$query = $this->db->update('t_article',$data);
		
		return $this->db->affected_rows();
		
	}
	
	
	public function del_article($id){
		$this->db->where('article_id',$id);
		$this->db->delete('t_article');
	}

	public function get_all_num()
	{
		return $this->db->get('t_article')->num_rows();
	}
	
	public function get_all_article($startno, $pagesize){
		$query = $this -> db -> query("select arti.*, cate.category_name, arti_comms.comms
							  from t_article arti, t_category cate, (select arti.article_id, count(comm.article_id) comms from t_article arti left join t_comment comm on arti.article_id=comm.article_id group by arti.article_id) arti_comms
							  where arti.category_id=cate.category_id and arti_comms.article_id=arti.article_id order by arti.article_id desc limit $startno,$pagesize");
//		$this->db->select('t_article.*,t_category.category_name as category_name');
//		$this->db->from('t_category');
//		$this->db->join("t_article",'t_article.category_id=t_category.category_id');
//
//		$this->db->order_by('t_article.article_id',"desc");
//		$this -> db -> limit($pagesize, $startno);
		return $query -> result();
	
	}
	
	public function get_hotArticle(){
		$this->db->select('t_article.*,t_category.category_name as category_name');
		$this->db->from('t_category');
		$this->db->join("t_article",'t_article.category_id=t_category.category_id');
		
		$this->db->order_by('t_article.click_zan',"desc");	
		$this -> db -> limit(6, 0);
		return $this->db->get()->result();	
	}
	public function get_nowArticle(){
		$this->db->select('t_article.*,t_category.category_name as category_name');
		$this->db->from('t_category');
		$this->db->join("t_article",'t_article.category_id=t_category.category_id');
		
		$this->db->order_by('t_article.article_id',"desc");
		$this -> db -> limit(6, 0);
		return $this->db->get()->result();
	}
	
	public function do_toSearch($search){
		$this->db->select("t_article.*,t_category.category_name as category_name");
        $this->db->like('title',$search);
        //$this->db->where('user_id', $id);
        $this->db->from("t_category");
        $this->db->join("t_article","t_article.category_id=t_category.category_id");

        $ra = $this->db->get()->result();
        return $ra;
	}

	public function do_toSearch_num($search){
		$this->db->select("t_article.*,t_category.category_name as category_name");
        $this->db->like('title',$search);
        //$this->db->where('user_id', $id);
        $this->db->from("t_category");
        $this->db->join("t_article","t_article.category_id=t_category.category_id");

        $ra = $this->db->get()->num_rows();
        return $ra;
	}
	
		public function tagSearch($tag){
		$this->db->select("t_article.*,t_category.category_name as category_name");
        $this->db->like('tag_names',$tag);
        //$this->db->where('user_id', $id);
        $this->db->from("t_category");
        $this->db->join("t_article","t_article.category_id=t_category.category_id");
		$this->db->order_by('t_article.article_id','desc');
        $ra = $this->db->get()->result();
        return $ra;
	}
	
	

	public function getOne($id,$click){
		$arr=array(
			'article_id'=>$id		
		);
		$ar = array(
			'click'=>$click+'1'
		);
		$this->db->where('article_id',$id);
		$this->db->update('t_article',$ar);
	
		$query = $this->db->get_where('t_article',$arr);
		return $query->result();
	}
	public function get_comment_by_article_id($id){
		$this -> db -> select('comment.content, us.username, comment.add_time');
		$this -> db -> from('t_comment comment');
		$this -> db -> join('t_user us','comment.user_id=us.user_id');
		$this -> db -> where("comment.article_id",$id);
		$this -> db -> where('comment.is_read','1');
		return $this -> db -> get() -> result();
	}
	
	public function getRecord($t){
		$query = $this -> db -> query("select art.*, arti_comms.comms from t_article art, (select arti.article_id, count(comm.article_id) comms from t_article arti left join t_comment comm on arti.article_id=comm.article_id group by arti.article_id) arti_comms
										where art.group_by_time=$t and arti_comms.article_id=art.article_id order by art.add_time desc");
		return $query->result();
	}

	public function get_group_time(){

		return $this -> db -> query('select art.group_by_time from t_article art group by art.group_by_time order by art.group_by_time desc') -> result();
	}

	public function save_comm($arr){
		$this -> db -> set($arr);
		$this -> db -> insert('t_comment');
		return $this -> db -> affected_rows();
	}
	
	
	
	
}
