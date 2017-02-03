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
		$this->load->library('pagination');
	}
	public function index()
	{
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */