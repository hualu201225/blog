<?php 
class Login extends CI_Controller{
	//登陆
	public function index(){
		// unset($_SESSION['login_mistake']);
		//开启表单验证
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		//设置验证规则
		$this->form_validation->set_rules('username','用户名','required|alpha_numeric');
		$this->form_validation->set_rules('password','密码','required|alpha_numeric');
		$this->load->view('admin/login');
	}
	//后台登陆验证
	public function login_ok(){
		$this->load->model('Madmin');
		$admin = $this->Madmin->get_admin_userinfo();
		foreach($admin as $row){
			if($row->username == $this->input->post('username') && $row->password == $this->input->post('password')){
				if($this->input->post('remember_me') == 'on'){
					setcookie(session_name(),session_id(),time()+3600*24*7,'/');
				}
				$_SESSION['admin_username'] = $this->input->post('username');
				redirect('admin/index','refresh');
			}	
		}
		$_SESSION['login_mistake'] = '用户名或密码错误,请重新输入！';
		redirect('login/index','refresh');
	}

	
}









 ?>