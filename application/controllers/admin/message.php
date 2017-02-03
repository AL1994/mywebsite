<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this -> load -> model("admin/message_model");
		$this -> load -> model("admin/article_model");
	}

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
	
	public function save_m(){
		$name = $this->input->post('mName');
		$content = $this->input->post('content');
		$arr = array(
			'messager_name'=>$name,
			'content'=>$content
		);
		$ra = $this->message_model->dosave_m($arr);
		if($ra){
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
			
			//$result = $this->message_model->get_all();
			$data = array(
			'message'=>$result,
			'total'=>$total
			);
			$this->load->view('admin/guestbook',$data);
					
		}
		
		
	}


	public function del_comment_byId(){
		$cid = $this -> input -> get('id');
		$this -> message_model -> del_comment($cid);
	}








}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */