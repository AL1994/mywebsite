<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Article extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//$this->load->library('pagination');
		$this->load->helper(array('form', 'url','date'));
		$this -> load -> model("admin/article_model");
		$this -> load -> model("admin/tag_model");
	}


	public function post() {
		$this -> load -> view('admin/login');
	}

	public function search() {
		$keyword = $this -> input -> get('keyword');
		$result = $this -> article_model -> get_all_tags($keyword);
		
		echo json_encode($result);
	}
	
	public function add() {
			$title = htmlspecialchars($this ->input ->post('title'));
			$categoryId = $this -> input -> post('category_id');
			$str_tags = $this -> input -> post('tag');
			$str_tags=htmlspecialchars($this -> input -> post('tag'));
			$content = htmlspecialchars($this ->input ->post('content1'));

			//大图开始
			$config['upload_path'] = "./uploads/news";
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999).$config['file_ext'];  //.$config['file_ext'];
			$config['max_size'] = 5*1024;
			$this->load->library('upload', $config);

			if( !$this->upload->do_upload('imgSrc')){
				
		  		$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin/post-article', $error);
				// redirect('admin/welcome/post');
		    }else{	  		
		  		$upload_data = $this->upload->data();
				
				//缩略图
				// 1、当$config['create_thumb']等于FALSE并且$config['new_image']没有指定 
				// 时，会调整原图的大小 
				// 2、当$config['create_thumb']等于TRUE并且$config['new_image']没有指定 
				// 时，生成文件名为(原图名_thumb.扩展名) 
				//  
				// 3、当$config['create_thumb']等于FALSE并且$config['new_image']指定时， 
				// 生成文件名为$config['new_image']的值 
				//  
				// 4、当$config['create_thumb']等于TRUE并且$config['new_image']指定时， 
				// 生成文件名为(原图名_thumb.扩展名) rary'] = 'gd2';//imagemagick
				$config1['source_image'] = './uploads/news/' . $upload_data['file_name'];
				//$config1['source_image'] = 'uploads/news/1.jpg';
				$config1['new_image'] = './uploads/news/thumbs';
				// $config1['create_thumb'] = TRUE;
				$config1['maintain_ratio'] = FALSE;//维持比例
				// $config['thumb_marker'] = '_thumb';
				$config1['width'] = '100';
				$config1['height'] = '100';
				$this->load->library('image_lib', $config1);
        		$result=$this->image_lib->resize();
        		
				
				//存t_tag表
				$all_tags = $this -> tag_model -> get_all();
				//var_dump($all_tags);die;
				$arr_tags = explode('，', $str_tags);
				//var_dump($arr_tags);die;	
				for($i=0; $i<count($all_tags); $i++){
					for($j=0; $j<count($arr_tags); $j++){
						if($all_tags[$i]->tag_name == $arr_tags[$j]){
							array_splice($arr_tags,$j,1);// 删数组中的元素，从那删，删几个
						}
					}
				}
			
				//var_dump($arr_tags);die;
			    if(count($arr_tags) > 0){
			    	$data = array();
			    	foreach ($arr_tags as $s_tag) {
						array_push($data,array('tag_name'=>$s_tag));
					}
					$this -> tag_model -> save_tag($data);
			    }
				
				//存t_aricle表
				$datestring = "%Y%m";
				$time = time();
				$group_time = mdate($datestring, $time);
				$data=array(
					'title'=>$title,
					'content'=>$content,
					'img_src' => 'uploads/news/' . $upload_data['file_name'],
	                'thumbs_img_src' =>'uploads/news/thumbs/' . $upload_data['file_name'],
					'click'=>0,
					'click_zan'=>0,
					'category_id'=>$categoryId,
					'tag_names'=>$str_tags,
					'group_by_time'=>$group_time
				);
				$result = $this -> article_model -> insert($data);
				
				
				$da = array(
					'upload_data' => $this->upload->data()
				);
				if($result){
					$this->load->view('admin/show',$da);
					// redirect('admin/welcome/show',$da);
				}else{
					echo "失败";
				}
		
			}
					
		}

	public function edit_article(){
			$this -> load -> model("admin/category_model");
			$ra = $this->category_model->get_all();
			$id = $this->input->get('id');
			$rs = $this->article_model->get_update_article($id);

			$data = array(
				'article'=>$rs,
				'category'=>$ra
			);
			
			$this->load->view('admin/edit_article',$data);
		}
		
	public function do_edit_article(){
			$id = $this->input->get('id');	
			//var_dump($id);die;	
			$title = $this->input->post('title');
			$tags = $this->input->post('tag');
			$content = $this->input->post('content');
			$categoryId = $this->input->post('category_id');
			
			
			//大图开始
			$config['upload_path'] = "./uploads/news";
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999).$config['file_ext'];  //
			$config['max_size'] = 5*1024;
			$this->load->library('upload', $config);
			
			if( !$this->upload->do_upload('userfile')){
				
		  		$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin/edit_article', $error);
				// redirect('admin/welcome/post');
		    }else{	  		
		  		$upload_data = $this->upload->data();
				
				//缩略图
				// 1、当$config['create_thumb']等于FALSE并且$config['new_image']没有指定 
				// 时，会调整原图的大小 
				// 2、当$config['create_thumb']等于TRUE并且$config['new_image']没有指定 
				// 时，生成文件名为(原图名_thumb.扩展名) 
				//  
				// 3、当$config['create_thumb']等于FALSE并且$config['new_image']指定时， 
				// 生成文件名为$config['new_image']的值 
				//  
				// 4、当$config['create_thumb']等于TRUE并且$config['new_image']指定时， 
				// 生成文件名为(原图名_thumb.扩展名) rary'] = 'gd2';//imagemagick
				$config1['source_image'] = './uploads/news/' . $upload_data['file_name'];
				//$config1['source_image'] = 'uploads/news/1.jpg';
				$config1['new_image'] = './uploads/news/thumbs';
				// $config1['create_thumb'] = TRUE;
				$config1['maintain_ratio'] = FALSE;//维持比例
				// $config['thumb_marker'] = '_thumb';
				$config1['width'] = '100';
				$config1['height'] = '100';
				$this->load->library('image_lib', $config1);
        		$result=$this->image_lib->resize();
				
				
				//存t_tag表
				$all_tags = $this -> tag_model -> get_all();
				//var_dump($all_tags);die;
				$arr_tags = explode('，', $tags);
				//var_dump($arr_tags);die;	
				for($i=0; $i<count($all_tags); $i++){
					for($j=0; $j<count($arr_tags); $j++){
						if($all_tags[$i]->tag_name == $arr_tags[$j]){
							array_splice($arr_tags,$j,1);
						}
					}
				}
			
				//var_dump($arr_tags);die;
			    if(count($arr_tags) > 0){
			    	$data = array();
			    	foreach ($arr_tags as $s_tag) {
						array_push($data,array('tag_name'=>$s_tag));
					}
					$this -> tag_model -> save_tag($data);
			    }
				
				
				$data=array(
						'title'=>$title,
						'content'=>$content,
						'img_src' => 'uploads/news/' . $upload_data['file_name'],
		                'thumbs_img_src' =>'uploads/news/thumbs/' . $upload_data['file_name'],
						'click'=>100,
						'category_id'=>$categoryId,
						'tag_names'=>$tags
						);
			
				$result = $this->article_model->update_article($id,$data);
				
				$da = array(
					'upload_data' => $this->upload->data()
				);
				
				if($result){
					$this->load->view('admin/show',$da);
				}else{
					echo "失败";
				}
			
			}
			
		}

	public function del_article_byId(){
		$id = $this->input->get('id');
		$rs = $this->article_model->del_article($id);
		
	}
	
	public function toSearch(){
		$search =  $this->input->post('search');
        $rs = $this->article_model->do_toSearch($search);
		$ra = $this -> article_model ->do_toSearch_num($search);
        $data = array(
            'article'=>$rs,
            'total'=>$ra
        );
        $this->load->view('admin/admin-help',$data);
	}
	
	public function tagArticle(){
		$tname = $this->input->get('tname');
		//var_dump($tname);
		$rs = $this->article_model -> tagSearch($tname);
		$data = array(
			'article'=>$rs
		);
		
		$this->load->view('admin/showTag',$data);
	}

	
	public function post_comm(){
		$uid = $this -> input -> post('user_id');
		$aid = $this -> input -> post('article_id');
		$cont = $this -> input -> post('content');
		$arr = array(
			'user_id'=>$uid,
				'article_id'=>$aid,
				'content'=>$cont
		);
		$result = $this -> article_model -> save_comm($arr);
		if($result){
			echo "success";
		}else{
			echo "false";
		}
	}





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
