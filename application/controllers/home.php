<?php 
class Home extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Mhome');
		$this->load->library('pagination');
	}

//默认控制器，显示首页
	public function index(){
		//装载模型
		// $this->load->model('Mhome');
		//调用模型中的get_category()方法，获得返回的分类数据表中的对象，存到数组中
		$data['article_all'] = $this->db->get('article');
		$data['category'] = $this->Mhome->get_category();
		$data['page_title'] = '华露的博客';
		$this->load->view('header',$data);
		$this->load->view('index');
	}
//点击分类标题跳到对应分类页面下
	public function category(){
	//调用模型中的get_article()方法，获得返回的文章数据表中的对象，存到数组中
		$data['get_article'] = $this->Mhome->get_article($this->uri->segment(3));
	//获得该分类下文章的评论
	// var_dump($data['get_article']);die;
		$data['category'] = $this->Mhome->get_category();
	//获得分类名称
		$res = $this->Mhome->category_name($this->uri->segment(3));
	//显示在title中
		foreach($res as $row){
			$data['page_title'] = $row->category_name;
		}
		
	//获得分类id
		$data['category_id'] = $this->uri->segment(3);

		$this->load->view('header',$data);
		$this->load->view('category');

		
	}
// 处理分类页上传的心情
	public function mood(){
		if($this->input->post('submit')){
			$query = $this->Mhome->insert_mood_info();
			if($query){
				$this->category();
			}
		}
	}
// 处理分类页上传的其他分类文章
	public function other_category(){
		if($this->input->post('submit')){
			$query = $this->Mhome->insert_other_category_info();
			if($query){
				$this->category();
			}
		}
	}
//点击“更多”按钮显示文章所有内容
	public function article_content(){
		$data['get_article_detail'] = $this->Mhome->get_article_detail($this->uri->segment(3));
		// var_dump($data['get_article_detail']);die;
		$data['category'] = $this->Mhome->get_category();
		//获得分类名称
		$res = $this->Mhome->article_name($this->uri->segment(3));
		//获得评论内容
		$data['get_comments'] = $this->Mhome->get_comments($this->uri->segment(3));
		//获得二级评论内容
		
		
		
		//显示在title中
		foreach($res as $row){
			$data['page_title'] = $row->title;
		}
		$this->load->view('header',$data);
		$this->load->view('show');

	}

//评论成功
	public function comment_ok(){
		if($this->input->post('submit')){
			$query = $this->Mhome->article_comment();
			if($query){
				$url = 'article_content/'.$this->input->post('article_id');
				header("location:$url");
			}
			
		}
	}
//二级评论
	public function second_comments(){
		// var_dump($_POST);die;
		$data['article_id'] = $this->input->post('article_id');
		$data['belong'] = $this->input->post('belong_id');
		$data['content'] = ltrim(strrchr($this->input->post('comment_content'),':'),':');
		$data['author'] = $this->input->post('author');
		// $data['descript'] = empty($this->input->post('descript'))?$this->input->post('descript'):'无';
		$data['last_date'] = date('Y-m-d H:i:s',time());
		//将获得的评论上传到数据库
		$this->db->insert('comments',$data);
		$be_comments_name = $this->input->post('be_comments_name');
		$str = <<<str
		<div class="inner_comments" style="float:left;margin-top:5px;width:100%">				
			<div class="img" style="width:35px;height:35px;"><img src="public/images/2.jpg" alt="" /></div>
			<span class="name" style="margin-left:20px">{$data['author']}</span>&nbsp<span style="color:#9B9B9B">回复</span>&nbsp<span>{$be_comments_name}:</span>
			<span class="comment_content" style="margin-left:10px;width:auto;color:#9B9B9B">{$data['content']}</span>
			<span class="time" style="float:right">{$data['last_date']}</span>
			<span class="hidden_comment_id" style="display:none">{$data['belong']}</span>
			<div class="select" style="height:20px">
				<span class="delete"><a href="javascript:;" onclick=""><span class="glyphicon glyphicon-thumbs-up"></span></a></span>
				<span class="modify"><a href="javascript:;"><span class="glyphicon glyphicon-edit"></span></a></span>
			</div>
		</div>
str;

		echo $str;
		// var_dump($data);
		// return $this->db->insert('comments',$data);
	}

//分页
	public function page(){
		//装载类文件,就会自动生成pagination属性，可以在下面被调用
		$this->load->library('pagination');
		//每页显示10条数据
		$page_size = 10;

		$this->load->helper('url');
		$config['base_url'] = site_url('home/page');
		//一共有多少条数据
		$config['total_rows'] = 100;
		//每页显示条数
		$config['per_page'] = $page_size;
		$config['first_link'] = "第一页";
		$config['next_link'] = "下一页";
		$config['uri_segment'] = 3;//分页的数据查询偏移量在哪一段上

		$this->pagination->initialize($config);//查询的是在数据库中的偏移量

		//获取分页的偏移量
		$offset = intval($this->uri->segment(3));//与
		$sql = "selecct * from stu limit $offset,$page_size";
		echo $sql;

		//创建分页的页数
		$data['links'] = $this->pagination->create_links();
	}

//点击“修改”按钮修改文章内容
	public function article_edit(){
		$data['get_article_detail'] = $this->Mhome->get_article_detail($this->uri->segment(3));
		$data['category'] = $this->Mhome->get_category();
		$this->load->view('header',$data);
		$this->load->view('edit');
	}
//验证码
	public function code(){
		$this->load->library('form_validation');
		$this->load->helper('captcha');
		$vals = array(
			'word' => rand(1000,9999),//使用自己生成的数据
		    'img_path' => './captcha/',//此目录需要手动创建
		    'img_url' => base_url().'./captcha/',
		    // 'font_path' => './path/to/fonts/texb.ttf',//如果要设置中文验证码，则要上传一个中文字体文件
		    'img_width' => '150',
		    'img_height' => 30,
		    'expiration' => 7200//过期时间，时间到了会自动删除图片
		);
		$cap = create_captcha($vals);
		//将数据存入数据库
		$data = array(
		    'captcha_time' => $cap['time'],
		    'ip_address' => $this->input->ip_address(),
		    'word' => $cap['word']
	    );
	    $this->db->insert('captcha',$data);
		

		// session_start();
		// $_SESSION['cap'] = $cap['word'];
		//验证时，直接对比$_SESSION['cap']即可
	}	
//登陆
	public function login(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$this->load->view('login');
	}

	public function login_ok(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$data['username'] = $this->input->post('name');
		$data['password'] = $this->input->post('password');
		$query['get_userinfo'] = $this->Mhome->get_userinfo();
		foreach($query['get_userinfo'] as $row){
			if($data['username'] == $row->username && $data['password'] == $row->password){
					$_SESSION['username'] = $data['username'];
					redirect('home/index','refresh');
					if($this->input->post('auto') == 'on'){
						setcookie(session_name(),session_id(),time()+3600*24*7,'/');
					}
			}
		}
		$res['error_info'] = '用户名或密码错误，请重新输入';
		$this->load->view('login',$res);
		
	}

//注册
	public function register(){
		
		$this->load->library('form_validation');
		$this->load->view('register');
	}
	public function register_ok(){
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		//设置验证规则
		// $this->form_validation->set_rules('name','用户名','');
		$this->form_validation->set_rules('password','密码','required|alpha_numeric');
		$this->form_validation->set_rules('passconf', '再次输入的密码', 'required');
		$this->form_validation->set_rules('email', '邮箱', 'required|is_unique[users.email]|valid_email');
		//如果验证不成功，则重新填写注册信息
		if($this->form_validation->run() == FALSE){
			$this->load->view('register');
		}else{
		//如果验证成功，则将用户信息写入数据库
			$data['username'] = $this->input->post('name');
			$data['password'] = $this->input->post('password');
			$query['passconf'] = $this->input->post('passconf');
			$data['email'] = $this->input->post('email');
			//如果再次确认的密码和第一次填的相同，那么将数据传入数据库
			if($data['password'] == $query['passconf']){
				$res = $this->db->insert('users',$data);
				if($res){
					//如果用户信息成功写入数据库，则设置session值，然后跳转到首页
					$_SESSION['username'] = $data['username'];
					redirect('home/index','refresh');
				}
				redirect('home/index','refresh');
			}else{
				$res['passconf_error_info'] = '密码与第一次输入的密码不一致，请确认密码' ;
				$this->load->view('register',$res);
			}
			
		}
		

	}

// ajax异步判断注册时用户名是否存在并且符合要求
	public function ajax_check_user(){
		$username = htmlspecialchars($this->input->post('username'));
		$query['get_userinfo'] = $this->Mhome->get_userinfo();
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


//退出登陆
	public function out(){
		session_destroy();
		redirect('home/index','refresh');
	}










}




 ?>