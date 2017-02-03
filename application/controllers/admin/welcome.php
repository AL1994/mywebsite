<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		$this -> load -> model("admin/article_model");
		$this -> load -> model("admin/tag_model");
		$this -> load -> model("admin/message_model");
		$this -> load -> model("admin/admin_model");
		$this->load->library('pagination');
	}
	public function login(){
		$this->load->view('admin/admin-login');
	}

	public function index(){
		$this->load->view('admin/admin-index');
	}
	
	public function help(){
		$page = $this -> input -> get('per_page');
        if (empty($page)) {
            $page = 0;
        }
		$total = $this -> article_model -> get_all_num();
		
		$config['base_url'] = site_url('admin/help?');//'http://localhost/admin/welcome/help';		
		$config['total_rows'] = $total;
		$config['per_page'] = 5;
		$config['first_link'] = '<<首页';		
		$config['last_link'] = '末页>>';
		$config['next_link'] = '下一页>';
		$config['prev_link'] = '<上一页';
		$config['page_query_string'] = TRUE;
		$this->pagination->initialize($config);
		
		//$total = $this -> article_model -> get_all_num();
		$result = $this -> article_model -> get_all_article($page, $config['per_page']);
		
				
		// $rs = $this->article_model->get_article();
		$this->load->model("admin/category_model");
		$ra = $this->category_model->get_all();
		$data = array(
			'article'=>$result,
			'category'=>$ra,
			'total'=>$total
		);
		$this->load->view('admin/admin-help',$data);
	}
	

	
	public function post(){
		$this -> load -> model('admin/category_model');
		$categories = $this -> category_model -> get_all();
		$this->load->view('admin/post-article', array(
			'categories' => $categories
		));
	}
	public function show(){
		$this->load->view('admin/show');
	}
	
	public function gallery(){
		$this->load->view('admin/admin-gallery');
	}
	
	public function person(){
		$this->load->view('admin/admin-person');
	}
	
	public function message(){
		$rs = $this -> message_model -> get_all_comms();
		//var_dump($rs);die;
		$data = array(
			'comment'=>$rs
		);
		$this -> load -> view('admin/admin-message',$data);
	}
	public function ch(){
		$is_read = $this -> input -> post('is_read');
		$arr = array(
				'is_read'=>$is_read
		);
		$cid = $this -> input -> post('comment_id');
		$rs = $this -> message_model -> do_ch($arr,$cid);
		if($rs){
			echo "success";
		}else{
			echo "false";
		}
	}
	public function user_manage(){
		$rs = $this -> admin_model -> do_user_manage();
		$data = array(
			'user'=>$rs
		);
		$this -> load -> view('admin/admin-user-manage',$data);
	}
	
	public function webIndex(){
		$page = $this -> input -> get('per_page');
        if (empty($page)) {
            $page = 0;
        }
		
		$config['base_url'] = site_url('admin/welcome/webIndex?');//'http://localhost/admin/welcome/help';
		$total = $this -> article_model -> get_all_num();

		$config['total_rows'] = $total;
		$config['per_page'] = 6;
		$config['first_link'] = '<<首页';		
		$config['last_link'] = '末页>>';
		$config['next_link'] = '下一页>';
		$config['prev_link'] = '<上一页';

		$config['page_query_string'] = TRUE;

		$this->pagination->initialize($config);
		
		$result = $this -> article_model -> get_all_article($page, $config['per_page']);
		$tag = $this -> tag_model -> get_all();
		$hot = $this -> article_model -> get_hotArticle();
		$now = $this -> article_model -> get_nowArticle();
		$data = array(
			'article' => $result,
			'tag' => $tag,
			'hot' => $hot,
			'now' => $now
		);
		
		$this->load->view('admin/index',$data);
	}
	
	public function webAbout(){
		$this->load->view('admin/about');
	}
	
	public function webResume(){
		$this->load->view('admin/resume');
	}
	
	public function webArticle(){
		$id = $this->input->get('id');
		$click = $this->input->get('click');
		$comment = $this -> article_model -> get_comment_by_article_id($id);
		$rs = $this->article_model->getOne($id,$click);
		$data = array(
			'article' => $rs,
				'comment' => $comment
		);

		$this->load->view('admin/articleshow',$data);
	}
	
	public function webRecord(){
		$group_time = $this -> article_model -> get_group_time();
		$arr = array();
		$i = 0;
		foreach($group_time as $v){
			$record = $this->article_model->getRecord($v->group_by_time);
			$arr[$i] = $record;
			$i++;
		}
		//var_dump($arr);die;

		$data = array(
			'time'=>$group_time,
			'record'=>$arr
		);
		//var_dump($data);die;
		$this->load->view('admin/record',$data);
	}
	
	public function webCloud(){
		$all_tag = $this->tag_model->get_all();
		$data = array(
			'tags'=>$all_tag
		);
//		function getfirstchar($s0){
//			$fchar = ord($s0{0});
//			if($fchar >= ord("A") and $fchar <= ord("z") )return strtoupper($s0{0});
//			$s1 = iconv("UTF-8","gb2312", $s0);
//			$s2 = iconv("gb2312","UTF-8", $s1);
//			if($s2 == $s0){$s = $s1;}else{$s = $s0;}
//			$asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
//			if($asc >= -20319 and $asc <= -20284) return "A";
//			if($asc >= -20283 and $asc <= -19776) return "B";
//			if($asc >= -19775 and $asc <= -19219) return "C";
//			if($asc >= -19218 and $asc <= -18711) return "D";
//			if($asc >= -18710 and $asc <= -18527) return "E";
//			if($asc >= -18526 and $asc <= -18240) return "F";
//			if($asc >= -18239 and $asc <= -17923) return "G";
//			if($asc >= -17922 and $asc <= -17418) return "I";
//			if($asc >= -17417 and $asc <= -16475) return "J";
//			if($asc >= -16474 and $asc <= -16213) return "K";
//			if($asc >= -16212 and $asc <= -15641) return "L";
//			if($asc >= -15640 and $asc <= -15166) return "M";
//			if($asc >= -15165 and $asc <= -14923) return "N";
//			if($asc >= -14922 and $asc <= -14915) return "O";
//			if($asc >= -14914 and $asc <= -14631) return "P";
//			if($asc >= -14630 and $asc <= -14150) return "Q";
//			if($asc >= -14149 and $asc <= -14091) return "R";
//			if($asc >= -14090 and $asc <= -13319) return "S";
//			if($asc >= -13318 and $asc <= -12839) return "T";
//			if($asc >= -12838 and $asc <= -12557) return "W";
//			if($asc >= -12556 and $asc <= -11848) return "X";
//			if($asc >= -11847 and $asc <= -11056) return "Y";
//			if($asc >= -11055 and $asc <= -10247) return "Z";
//			return null;
//		}
//
//
//		function pinyin1($zh){
//			$ret = "";
//			$s1 = iconv("UTF-8","gb2312", $zh);
//			$s2 = iconv("gb2312","UTF-8", $s1);
//			if($s2 == $zh){$zh = $s1;}
//			for($i = 0; $i < strlen($zh); $i++){
//				$s1 = substr($zh,$i,1);
//				$p = ord($s1);
//				if($p > 160){
//					$s2 = substr($zh,$i++,2);
//					$ret .= getfirstchar($s2);
//				}else{
//					$ret .= $s1;
//				}
//			}
//			return $ret;
//		}
//		if(substr(pinyin1($all_tag[0]->tag_name),0,1) == 'Z'){
//			var_dump(substr(pinyin1($all_tag[0]->tag_name),0,1));die;
//		}

		//var_dump($all_tag);die;
		$this->load->view('admin/cloud',$data);
	}
	
	public function webGuestbook(){
		$page = $this -> input -> get('per_page');
        if (empty($page)) {
            $page = 0;
        }
		
		$config['base_url'] = site_url('admin/welcome/webGuestbook?');//'http://localhost/admin/welcome/help';	
		$total = $this -> message_model -> get_all_num();	
		$config['total_rows'] = $total;
		$config['per_page'] = 5;
		$config['first_link'] = '<<首页';		
		$config['last_link'] = '末页>>';
		$config['next_link'] = '下一页>';
		$config['prev_link'] = '<上一页';
		$config['page_query_string'] = TRUE;
		$this->pagination->initialize($config);
		
		
		$result = $this -> message_model -> get_all_message($page, $config['per_page']);
		
		
		//$rs = $this->message_model->get_all();
		$data = array(
			'message'=>$result,
			'total'=>$total
		);
		$this->load->view('admin/guestbook',$data);
	}
	
	public function mob_index(){
		$this -> load -> view('mobile/index');
	}








}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */