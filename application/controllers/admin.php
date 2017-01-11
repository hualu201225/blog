<?php 
class Admin extends CI_controller{
//用户的管理（后台管理员、注册的用户）----》增、删、改、查等
//文章分类标题的管理----》增、删、改、查等
//具体文章的管理----》增、删、改、查等
//评论管理
	public function __construct(){
		parent::__construct();
		if(isset($_SESSION['admin_username'])){
			$this->load->helper('url');
			$this->load->model('Madmin');
			//获得后台分类列表
			$data['get_admin_category'] = $this->Madmin->get_admin_category();
			$data['active'] = "class='active'"; 
			$data['second_uri'] = $this->uri->segment(2);
			$this->load->view('admin/header',$data);
		}else{
			// unset($_SESSION['login_mistake']);
			redirect('login/index','refresh');
		}
	}

// 后台退出
	public function out(){
		session_destroy();
		redirect('login/index','refresh');
	}

//后台主页
	public function index(){
			unset($_SESSION['login_mistake']);
			$this->load->view('admin/index');
			$this->load->view('admin/footer');
		
		
	}
//用户管理
	public function user_control(){
		//获得用户的所有信息
		$data['get_user_info'] = $this->Madmin->get_user_info();
		$this->load->view('admin/user_control',$data);
		$this->load->view('admin/footer');
	}
//添加用户
	public function add_user(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->view('admin/do_userinfo');
		$this->load->view('admin/footer');
	}
//后台分类列表管理
	public function category_control(){
		$data['get_category_info'] = $this->Madmin->get_category_info();
		$this->load->view('admin/category_control',$data);
		$this->load->view('admin/footer');
	}
// 添加后台分类
	public function add_category(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->view('admin/do_category');
		$this->load->view('admin/footer');
	}
//前台分类列表管理
	public function index_category_control(){
		$data['get_index_category_info'] = $this->Madmin->get_index_category_info();
		$this->load->view('admin/index_category_control',$data);
		$this->load->view('admin/footer');
	}
// 添加前台分类
	public function add_index_category(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->view('admin/do_index_category');
		$this->load->view('admin/footer');
	}

//文章管理
	public function article_control(){
		$data['get_article_info'] = $this->Madmin->get_article_info();
		$this->load->view('admin/article_control',$data);
		$this->load->view('admin/footer');
	}
//添加文章
	public function add_article(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$data['get_index_category_info'] = $this->Madmin->get_index_category_info();
		$this->load->view('admin/do_article',$data);
		$this->load->view('admin/footer');
	}
//评论管理
	public function comment_control(){
		$data['get_comment_info'] = $this->Madmin->get_comment_info();
		$this->load->view('admin/comment_control',$data);
		$this->load->view('admin/footer');
	}
//添加评论
	public function add_comment(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$data['get_article_info'] = $this->Madmin->get_article_info();
		$this->load->view('admin/do_comment',$data);
		$this->load->view('admin/footer');
	}
//后台管理员
	public function admin_user_control(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$data['get_admin_userinfo'] = $this->Madmin->get_admin_userinfo();
		$this->load->view('admin/admin_user_control',$data);
		$this->load->view('admin/footer');
	}
// 添加后台管理员
	public function add_admin_user(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		
		$this->load->view('admin/do_admin_userinfo');
		$this->load->view('admin/footer');
	}


/*用户管理部分*/
// ajax异步判断添加用户名时是否存在并且符合要求
public function ajax_check_user(){
		$username = htmlspecialchars($this->input->post('username'));
		$query['get_userinfo'] = $this->Madmin->get_userinfo();
		$preg = '/^([\d]|[a-z]|[A-Z]){1}([\w]){0,14}([\d]|[a-z]|[A-Z]){1}$/';
		// 首先判断用户名是否为空
		if(empty($username)){
			echo 3;return;
		}else{
			//如果非空，且匹配,就判断用户名是否存在
			if(preg_match($preg,$username)){
				//用户名存在就返回0，表示用户名不可用
				foreach($query['get_userinfo'] as $row){
					if($username == $row->username){
						echo 0;return;
					}
				}
				//用户名不存在的话就返回1，表示用户名可用
				echo 1;return;
			}else{
			//如果不匹配，就返回2
				echo 2;return;
			}
		}	
	}
//新用户成功添加验证
	public function add_user_ok(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		//设置验证规则
		$this->form_validation->set_rules('password','密码','required|alpha_numeric');
		$this->form_validation->set_rules('email', '邮箱', 'required|is_unique[users.email]|valid_email');
		//如果验证不成功，则重新填写注册信息
		if($this->form_validation->run() == FALSE){
			$this->load->view('admin/add_user');
		}else{
		//如果验证成功，则将用户信息写入数据库
			$query = $this->Madmin->insert_user_info();
			redirect('admin/user_control','refresh');
		}
	}
// 用户资料修改
	public function user_edit(){
		$data['single_userinfo'] = $this->Madmin->get_single_user_info($this->uri->segment(3));
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->view('admin/do_userinfo',$data);
		$this->load->view('admin/footer');
			
	}
//用户资料修改成功验证
	public function edit_user_ok(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		//设置验证规则
		$this->form_validation->set_rules('password','密码','required|alpha_numeric');
		$this->form_validation->set_rules('email', '邮箱', 'required|valid_email');
		//如果验证不成功，则重新填写注册信息
		if($this->form_validation->run() == FALSE){
			$this->user_edit();
		}else{
		//如果验证成功，则将用户信息写入数据库
			$query = $this->Madmin->update_user_info($this->uri->segment(3));
			redirect('admin/user_control','refresh');
		}
	}
//删除用户
	public function delete_user(){
		$query = $this->Madmin->delete_user($this->uri->segment(3));
		if($query){
			redirect('admin/user_control','refresh');
		}
	}
/*后台分类列表管理部分*/
	// 后台分类列表修改
	public function category_edit(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$data['get_single_category_info'] = $this->Madmin->get_single_category_info($this->uri->segment(3));
		$this->load->view('admin/do_category',$data);
	}
	//后台分类列表修改成功
	public function edit_category_ok(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		//设置验证规则
		$this->form_validation->set_rules('category_id','分类id','required|numeric|is_unique[admin_category.category_id]');
	
		//如果验证不成功，则重新填写后台分类列表信息
		if($this->form_validation->run() == FALSE){
			$this->category_edit();
		}else{
		//如果验证成功，则将分类列表信息写入数据库
			$query = $this->Madmin->update_category_info($this->uri->segment(3));
			redirect('admin/category_control','refresh');
		}
	}
	//添加后台分类列表
	public function add_category_ok(){
		//以下if语句不起作用，原因未知。。。。。。。。。。。。。
		// if($this->input->post('submit')){
			$query = $this->Madmin->insert_category_info();
			if($query){
				redirect('admin/category_control','refresh');
			}
		// }
	}
	//删除后台分类
	public function delete_category(){
		$query = $this->Madmin->delete_category($this->uri->segment(3));
		if($query){
			redirect('admin/category_control','refresh');
		}
	}
/*前台分类列表管理部分*/
	// 前台分类列表修改
	public function index_category_edit(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$data['get_single_index_category_info'] = $this->Madmin->get_single_index_category_info($this->uri->segment(3));
		$this->load->view('admin/do_index_category',$data);
	}
	//前台分类列表修改成功
	public function edit_index_category_ok(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		//设置验证规则
		$this->form_validation->set_rules('category_id','分类id','required|numeric|is_unique[category.category_id]');
	
		//如果验证不成功，则重新填写后台分类列表信息
		if($this->form_validation->run() == FALSE){
			$this->index_category_edit();
		}else{
		//如果验证成功，则将分类列表信息写入数据库
			$query = $this->Madmin->update_index_category_info($this->uri->segment(3));
			redirect('admin/index_category_control','refresh');
		}
	}
	//添加前台分类列表
	public function add_index_category_ok(){
		//以下if语句不起作用，原因未知。。。。。。。。。。。。。
		// if($this->input->post('submit')){
			$query = $this->Madmin->insert_index_category_info();
			if($query){
				redirect('admin/index_category_control','refresh');
			}
		// }
	}
	//删除前台分类
	public function delete_index_category(){
		$query = $this->Madmin->delete_index_category($this->uri->segment(3));
		if($query){
			redirect('admin/index_category_control','refresh');
		}
	}	

/*文章管理部分*/
	//添加文章成功验证
	public function add_article_ok(){
		$query = $this->Madmin->insert_article_info();
		if($query){
			redirect('admin/article_control','refresh');
		}
	}
	//修改文章内容
	public function article_edit(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$data['get_index_category_info'] = $this->Madmin->get_index_category_info();
		$data['get_single_article_info'] = $this->Madmin->get_single_article_info($this->uri->segment(3));
		//获得分类名、id
		foreach($data['get_single_article_info'] as $rows){
			foreach($data['get_index_category_info'] as $row ){
				if($rows->category_id == $row->category_id){
					$data['category_name'] = $row->category_name;
					$data['category_id'] = $row->category_id;				}
			}
		}
		$this->load->view('admin/do_article',$data);
	}
	//修改文章内容成功
	public function edit_article_ok(){
		$query = $this->Madmin->update_article_info($this->uri->segment(3));
		if($query){
			redirect('admin/article_control','refresh');
		}
	}
	//删除文章
	public function delete_article(){
		$query = $this->Madmin->delete_article($this->uri->segment(3));
		if($query){
			redirect('admin/article_control','refresh');
		}
	}
/*评论管理部分*/
	//评论添加成功验证
	public function add_comment_ok(){
		$query = $this->Madmin->insert_comment_info();
		if($query){
			redirect('admin/comment_control','refresh');
		}
	}
	//评论修改
	public function comment_edit(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$data['get_single_comment_info'] = $this->Madmin->get_single_comment_info($this->uri->segment(3));
		$this->load->view('admin/do_comment',$data);
	}
	//评论修改成功
	public function comment_edit_ok(){
		$query = $this->Madmin->update_comment_info($this->uri->segment(3));
		if($query){
			redirect('admin/comment_control','refresh');
		}
	}
	//删除评论
	public function delete_comment(){
		$query = $this->Madmin->delete_comment($this->uri->segment(3));
		if($query){
			redirect('admin/comment_control','refresh');
		}
	}
/*后台管理员部分*/
	//添加后台管理员成功验证
	public function add_admin_user_ok(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		//设置验证规则
		$this->form_validation->set_rules('username','用户名','required|alpha_numeric|is_unique[admin_user.username]');
		$this->form_validation->set_rules('password','密码','required|alpha_numeric');
		//如果验证不成功，则重新填写管理员信息
		if($this->form_validation->run() == FALSE){
			$this->add_admin_user();
		}else{
		//如果验证成功，则将用户信息写入数据库
			$query = $this->Madmin->insert_admin_userinfo();
			redirect('admin/admin_user_control','refresh');
		}
	}
	//修改后台管理员
	public function admin_user_edit(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$data['single_admin_userinfo'] = $this->Madmin->get_single_admin_userinfo($this->uri->segment(3));
		$this->load->view('admin/do_admin_userinfo',$data);
	}
	//修改管理员成功验证
	public function edit_admin_userinfo_ok(){
		$query = $this->Madmin->update_admin_userinfo($this->uri->segment(3));
		if($query){
			$this->admin_user_control();
		}
	}
	//删除管理员
	public function delete_admin_user(){
		$query = $this->Madmin->delete_admin_user($this->uri->segment(3));
		if($query){
			redirect('admin/admin_user_control','refresh');
		}
	}
	
}



 ?>