<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this -> load -> model("admin/admin_model");
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

	public function check_login()
	{
		$username = $this -> input -> post('username');
		$password = $this -> input -> post('password');
		//var_dump($username);die;
		
		$result = $this -> admin_model -> get_by_name_pwd($username, $password);

		if($result){
			//echo "<script>location.href='admin/welcome/index';</script>";
			//var_dump($result);
			//$this->load->view('admin/admin-index');
			echo 'success';
		}else{
			echo 'fail';
		}
	}
	
	public function dianZan(){
		$zan = $this->input->post('click_zan');
		$id = $this->input->post('article_id');
		//var_dump($id);die;

		$result = $this->admin_model->zanUpdate($id,$zan);
		
		if($result){
			echo 'success';
		}else{
			echo 'fail';
		}
	}

	public function web_register(){
		$this -> load -> view('admin/web_register');
	}
	public function c_register(){
		$name = $this -> input -> post('username');
		$pass = $this -> input -> post('password');
		//var_dump($name);die;
		$data = array(
			'username' => $name,
			'password' => $pass
		);
		$result = $this -> admin_model -> m_register($data);
		if($result){
			echo "success";
		}else{
			echo "false";
		}
	}
	public function check_user(){
		$name = $this -> input -> post('username');
		$result = $this -> admin_model -> do_cu($name);
		if($result){
			echo "success";
		}else{
			echo "false";
		}
	}

	public function web_login(){
		$this -> load -> view('admin/web_login');
	}
	public function c_login(){
		$name = $this -> input -> post('username');
		$pass = $this -> input -> post('password');
		//var_dump($name);die;
		$data = array(
				'username' => $name,
				'password' => $pass
		);
		$result = $this -> admin_model -> m_login($data);
		//var_dump($result);die;
		if($result){
			$this->session->set_userdata('user',$result);
			//var_dump($this -> session -> userdata('user'));die;
			//$this -> welcome -> webIndex();
			//redirect('admin/welcome/webIndex');
			echo "success";
		}else{
			echo "false";
		}
	}
	public function login_out(){
		$this -> session -> unset_userdata('user');
		redirect('admin/welcome/webIndex');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */