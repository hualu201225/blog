<?php 
class Madmin extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
//获得后台栏目分类
	public function get_admin_category(){
		$query = $this->db->get('admin_category');
		return $query->result();
	}
/*用户管理部分*/
	//获得用户的所有信息
	public function get_user_info(){
		$query = $this->db->get('users');
		return $query->result();
	}
	//上传添加的新用户的所有信息
	public function insert_user_info(){
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['email'] = $this->input->post('email');
		$data['sex'] = $this->input->post('sex');	
		$data['birthday'] = $this->input->post('birthday');	
		$data['sign'] = $this->input->post('sign');		
		$data['residence'] = $this->input->post('residence');	
		$data['hobby'] = $this->input->post('hobby');	
		$data['book_readed'] = $this->input->post('book_readed');	
		$data['place_gone'] = $this->input->post('place_gone');	
		$data['plan_done'] = $this->input->post('plan_done');	
		$data['not_done'] = $this->input->post('not_done');
		$data['insert_judge_id'] = $this->input->post('insert_judge_id') == 'on' ? '1':'0';
		$query = $this->db->insert('users',$data);	
		return $query;
	}	
	//更新修改的用户的所有信息
	public function update_user_info($id){
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['email'] = $this->input->post('email');
		$data['sex'] = $this->input->post('sex');	
		$data['birthday'] = $this->input->post('birthday');	
		$data['sign'] = $this->input->post('sign');		
		$data['residence'] = $this->input->post('residence');	
		$data['hobby'] = $this->input->post('hobby');	
		$data['book_readed'] = $this->input->post('book_readed');	
		$data['place_gone'] = $this->input->post('place_gone');	
		$data['plan_done'] = $this->input->post('plan_done');	
		$data['not_done'] = $this->input->post('not_done');
		$data['insert_judge_id'] = $this->input->post('insert_judge_id') == 'on' ? '1':'0';
		$query = $this->db->update('users',$data,array('uid'=>$id));
		return $query;
	}
	//获得某个用户的信息
	public function get_single_user_info($uid){
		$query = $this->db->where('uid =',$uid)->get('users');
		return $query->result();
	}
	//删除某个用户的信息
	public function delete_user($uid){
		$query = $this->db->delete('users',array('uid '=> $uid));
		return $query;
	}
/*后台分类列表管理部分*/
	public function get_category_info(){
		$query = $this->db->get('admin_category');
		return $query->result();
	}
	//获得某个后台分类列表的信息
	public function get_single_category_info($category_id){
		$query = $this->db->where('category_id =',$category_id)->get('admin_category');
		return $query->result();
	}
	//添加后台分类列表
	public function insert_category_info(){
		$data['category_id'] = $this->input->post('category_id');
		$data['category_name'] = $this->input->post('category_name');
		$data['category_controller'] = $this->input->post('category_controller');
		$query = $this->db->insert('admin_category',$data);
		return $query;
	}
	//更新某个后台分类列表的信息
	public function update_category_info($category_id){
		$data['category_id'] = $this->input->post('category_id');
		$data['category_name'] = $this->input->post('category_name');
		$data['category_controller'] = $this->input->post('category_controller');
		$query = $this->db->update('admin_category',$data,array('category_id'=>$category_id));
		return $query;
	}
	//删除某个后台分类列表的信息
	public function delete_category($category_id){
		$query = $this->db->delete('admin_category',array('category_id '=> $category_id));
		return $query;
	}
/*前台分类列表管理部分*/
	public function get_index_category_info(){
		$query = $this->db->get('category');
		return $query->result();
	}
	//获得某个前台分类列表的信息
	public function get_single_index_category_info($category_id){
		$query = $this->db->where('category_id =',$category_id)->get('category');
		return $query->result();
	}
	//添加前台分类列表
	public function insert_index_category_info(){
		$data['category_id'] = $this->input->post('category_id');
		$data['category_name'] = $this->input->post('category_name');
		$query = $this->db->insert('category',$data);
		return $query;
	}
	//更新某个前台分类列表的信息
	public function update_index_category_info($category_id){
		$data['category_id'] = $this->input->post('category_id');
		$data['category_name'] = $this->input->post('category_name');
		$query = $this->db->update('category',$data,array('category_id'=>$category_id));
		return $query;
	}
	//删除某个前台分类列表的信息
	public function delete_index_category($category_id){
		$query = $this->db->delete('category',array('category_id '=> $category_id));
		return $query;
	}
/*文章管理部分*/
	//获得所有的文章信息
	public function get_article_info(){
		$query = $this->db->get('article');
		return $query->result();
	}
	//获得某一文章信息
	public function get_single_article_info($article_id){
		$query = $this->db->where('id =',$article_id)->get('article');
		return $query->result();
	}
	//添加文章
	public function insert_article_info(){
		$data['category_id'] = $this->input->post('category_belong');
		$data['title'] = $this->input->post('title');
		$data['author'] = $this->input->post('author');
		$data['content'] = $this->input->post('content');
		$data['source'] = $this->input->post('source');
		$data['last_date'] = is_null($this->input->post('last_date'))?$this->input->post('last_date'):date('Y-m-d H:i:s',time());
		$data['address'] = $this->input->post('address');
		if($this->input->post('recommend') == 'on'){
			$data['recommend'] = 1;
		}
		$data['recommend'] = 0;
		$query = $this->db->insert('article',$data);
		return $query;	
	}
	//更新文章内容
	public function update_article_info($id){
		$data['category_id'] = $this->input->post('category_belong');
		$data['title'] = $this->input->post('title');
		$data['author'] = $this->input->post('author');
		$data['content'] = $this->input->post('content');
		$data['source'] = $this->input->post('source');
		$data['last_date'] = is_null($this->input->post('last_date'))?$this->input->post('last_date'):date('Y-m-d H:i:s',time());
		$data['address'] = $this->input->post('address');
		if($this->input->post('recommend') == 'on'){
			$data['recommend'] = 1;
		}
		$data['recommend'] = 0;
		$query = $this->db->update('article',$data,array('id'=>$id));
		return $query;
	}
	//删除文章
	public function delete_article($id){
		$query = $this->db->delete('article',array('id'=>$id));
		return $query;
	}
/*评论管理部分*/
	//获得所有评论
	public function get_comment_info(){
		$query = $this->db->get('comments');
		return $query->result();
	}
	//获得某一评论信息
	public function get_single_comment_info($id){
		$query = $this->db->where('id =',$id)->get('comments');
		return $query->result();
	}
	//上传评论
	public function insert_comment_info(){
		$data['article_id'] = $this->input->post('article_id');
		$data['author'] = $this->input->post('author');
		$data['content'] = $this->input->post('content');
		$data['last_date'] = is_null($this->input->post('last_date'))?$this->input->post('last_date'):date('Y-m-d H:i:s',time());
		$data['descript'] = $this->input->post('descript');
		$query = $this->db->insert('comments',$data);
		return $query;
	}
	//更新评论信息
	public function update_comment_info($id){
		$data['article_id'] = $this->input->post('article_id');
		$data['author'] = $this->input->post('author');
		$data['content'] = $this->input->post('content');
		$data['last_date'] = is_null($this->input->post('last_date'))?$this->input->post('last_date'):date('Y-m-d H:i:s',time());
		$data['descript'] = $this->input->post('descript');
		$query = $this->db->update('comments',$data,array('id'=>$id));
		return $query;
	}
	//删除某一评论
	public function delete_comment($id){
		$query = $this->db->delete('comments',array('id'=>$id));
		return $query;
	}
/*后台管理员部分*/
	//获得所有管理员信息
	public function get_admin_userinfo(){
		$query = $this->db->get('admin_user');
		return $query->result();
	}
	//获得某个管理员信息
	public function get_single_admin_userinfo($id){
		$query = $this->db->where('id =',$id)->get('admin_user');
		return $query->result();
	}
	//上传新管理员
	public function insert_admin_userinfo(){
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$query = $this->db->insert('admin_user',$data);
		return $query;
	}
	//更新某管理员信息
	public function update_admin_userinfo($id){
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$query = $this->db->update('admin_user',$data,array('id'=>$id));
		return $query;
	}
	//删除某管理员信息
	public function delete_admin_user($id){
		$query = $this->db->delete('admin_user',array('id'=>$id));
		return $query;
	}
}







 ?>