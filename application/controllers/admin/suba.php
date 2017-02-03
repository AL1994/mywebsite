<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suba extends CI_Controller {


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
	//组件
	public function rotate(){
		$this -> load -> view('abs/rotate');
	}
	public function auto(){
		$this -> load -> view('abs/demo');
	}
	//c3/jq动画
	public function revolve_cube(){
		$this -> load -> view('abs/revolve_cube');
	}
	public function carrousel(){
		$this -> load -> view('abs/carrousel');
	}
	public function photo_wall(){
		$this -> load -> view('abs/photo_wall');
	}
	public function c3_photo_wall(){
		$this -> load -> view('abs/c3_photo_wall');
	}
	public function five_circles(){
		$this -> load -> view('abs/five_circles');
	}
	public function photo_slither(){
		$this -> load -> view('abs/photo_slither');
	}


	public function text(){
		$this->load->helper('date');
		$datestring = "Year: %Y Month: %m Day: %d - %h:%i:%s: %a";
		$time = time();
		mdate($datestring, $time);
		var_dump(mdate($datestring, $time));die;
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */