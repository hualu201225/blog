<?php 
class Personal extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Mhome');
	}
//个人中心
	public function my_center(){
		if(isset($_SESSION['username'])){
			$data['article_all'] = $this->db->get('article');
		$data['category'] = $this->Mhome->get_category();
		$data['user_category_id'] = empty($this->uri->segment(3))?1:$this->uri->segment(3);
		//得到左边的分类栏
		$data['get_user_category'] = $this->Mhome->get_user_category();
		//得到已登陆用户的信息
		$data['userinfo'] = $this->Mhome->get_single_userinfo();
		$data['page_title'] = '个人中心';
		$this->load->view('header',$data);
		$this->load->view('my_center/personal_center',$data);
	}else{
		redirect('home/out','refresh');
	}
		

	}
	//上传用户完善的信息
	public function insert_userinfo_ok(){
		if($this->input->post('submit')){
			$query = $this->Mhome->insert_userinfo();
			//如果用户完善的信息成功上传，则重新加载视图
			if($query){
				$data['insert_judge_id'] = $this->input->post('insert_judge_id');
				$username = $_SESSION['username'];
				$res = $this->db->update('users',$data,array('username'=>$username));
				if($res){
					$this->my_center();
				}
				
			}
		}

		if(!isset($_SESSION['username'])){
			redirect('home/out','refresh');
		}
		
	}
	//分类得到用户的其他信息
	public function personal_otherinfo(){
		//得到地址栏第三段的信息
		$num = $this->uri->segment(3);
		//得到$num对应的数据表中id为$num的数据
		$data['get_user_category_only'] = $this->Mhome->get_user_category_only($num);
		// var_dump($data['get_user_category_only']);die;
		//得到$num对应的分类信息
		$data['user_otherinfo'] = $this->Mhome->do_user_otherinfo($num);
		// var_dump($data['user_otherinfo']);die;
		//得到左边的分类栏
		$data['get_user_category'] = $this->Mhome->get_user_category();
		//得到已登陆用户的信息
		$data['userinfo'] = $this->Mhome->get_single_userinfo();
		//得到头部相关信息
		$data['category'] = $this->Mhome->get_category();
		//得到用户分类id
		$data['user_category_id'] = empty($this->uri->segment(3))?1:$this->uri->segment(3);
		$data['page_title'] = '个人中心';
		$this->load->view('header',$data);
		$this->load->view('my_center/personal_center',$data);

		if(!isset($_SESSION['username'])){
			redirect('home/out','refresh');
		}
	}
	//处理用户的其他信息
	public function personal_otherinfo_ok(){
		if($this->input->post('submit')){
			$num = $this->uri->segment(3);
			//上传用户提交的信息到数据库
			$query = $this->Mhome->insert_user_otherinfo($num);
			if($query){
				$this->personal_otherinfo();
			}
			
		}
	}
	//处理用户修改的信息
	public function personal_info_edit(){

	}

}








 ?>