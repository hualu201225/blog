<?php 
class Mhome extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
//获得分类数据表
	public function get_category(){
		$category = $this->db->get('category');
		return $category->result();
	}
//获得文章数据表
	public function get_article($id){
		//如果有用户登陆，那么获取该用户的文章列表
		if(isset($_SESSION['username'])){
			$username = $_SESSION['username'];
			//获得article数据表中id和传入的数值一样的内容
			$num = $this->db->where(array('category_id ='=>$id,'author =' =>$username))->get('article');
			return $num->result();
		}else{
			//如果没有用户登陆，那么获取用户名为hualu的文章列表
			//获得article数据表中id和传入的数值一样的内容
			$num = $this->db->where(array('category_id ='=>$id,'author =' =>'hualu'))->get('article');
			return $num->result();
		}
		
	}
//获得对应id的分类的名称
	public function category_name($id){
		$name = $this->db->where('category_id =',$id)->get('category');
		return $name->result();

	}
//获得对应id的文章的名字，返回数组
	public function article_name($id){
		$name = $this->db->where('id =',$id)->get('article');
		return $name->result();
	}

//获得对应id的文章的所有信息，返回对象
	public function get_article_detail($id){
		$detail = $this->db->where('id =',$id)->get('article');
		return $detail->result();
	}
//处理用户提交的每日心情
	public function insert_mood_info(){
		$data['content'] = $this->input->post('mood_content');
		$data['address'] = $this->input->post('address');
		$data['author'] = $_SESSION['username'];
		$data['category_id'] = $this->input->post('category_id');
		$data['last_date'] = date('Y-m-d H:i:s',time());
		$query = $this->db->insert('article',$data);
		return $query;
	}
//处理用户提交的其他分类的内容
	public function insert_other_category_info(){
		$data['content'] = $this->input->post('article_content');
		$data['author'] = $_SESSION['username'];
		$data['title'] = $this->input->post('article_title');
		$data['category_id'] = $this->input->post('category_id');
		$data['last_date'] = date('Y-m-d H:i:s',time());
		$query = $this->db->insert('article',$data);
		return $query;
	}
//处理用户提交的评论，并传入数据库
	public function article_comment(){
			//接收用户提交的评论
			$data['content'] = $this->input->post('comment_content');
			$data['author'] = isset($_SESSION['username'])?$_SESSION['username']:$this->input->post('comment_name');
			$data['descript'] = empty($this->input->post('comment_descript'))?'阳光':$this->input->post('comment_descript');
			$data['article_id'] = $this->input->post('article_id');
			$data['belong'] = empty($this->input->post('belong_id'))?0:$this->input->post('belong_id');//一级评论的belong_id为0,二级评论的belong_id为一级评论的id
			$data['last_date'] = date('Y-m-d H:i:s',time());
			//用户登陆后可直接使用用户自身的名字
			//将数据传入数据库
			return $this->db->insert('comments',$data);
	}

//获得一级评论内容
	public function get_comments($id){
		$comments = $this->db->where(array('article_id'=>$id,'belong'=>0))->get('comments');
		return $comments->result();
	}
//获得评论中article为固定值的所有评论
	public function get_article_comments($id){
		$comments = $this->db->where(array('article_id'=>$id))->get('comments');
		return $comments->result_array();
	}


// 获得所有二级评论内容
public function get_second_comments($article_id,$belong_id){//$comments为所有article_id相同的评论
		$arr = array();
		$comments = $this->db->where(array('article_id'=>$article_id))->get('comments');
		foreach($comments->result_array() as $v){
			if($v['belong']== $belong_id){
				$arr[] = $v;
				$arr = array_merge($arr,$this->get_second_comments($article_id,$v['id']));
			}
			
		}

		return $arr;
}


//得到用户所有信息
	public function get_userinfo(){
		$query = $this->db->get('users');
		return $query->result();
	}
	//获得已登录用户信息	
	public function get_single_userinfo(){
		$username = $_SESSION['username'];
		$query = $this->db->where('username =',$username)->get('users');
		return $query->result();
	}
	//获得用户个人中心列表分类栏
	public function get_user_category(){
		$query = $this->db->get('user_category');
		return $query->result();
	}
	//获得对应的用户个人中心列表分类栏名字
	public function get_user_category_only($num){
		$query = $this->db->where('user_category_id  =',$num)->get('user_category');
		return $query->result();
	}
	//添加已登录用户完善的基本信息
	public function insert_userinfo(){
		$username = $_SESSION['username'];
		$data['sex'] = $this->input->post('sex');
		$data['birthday'] = empty($this->input->post('birthday'))?date('Y-m-d H:i:s',time()):$this->input->post('birthday');
		$data['residence'] = $this->input->post('residence');
		$query = $this->db->update('users',$data,array('username'=> $username));
		return $query;
	}
	//添加已登录用户的其他信息
	public function insert_user_otherinfo($num){
		$username = $_SESSION['username'];
		$otherinfo = $this->input->post('otherinfo');
		//获得原先已有的信息
		$res = $this->get_single_userinfo();
		$data = array();
		foreach($res as $row){
			//将各种分类信息进行区分
			switch ($num) {
				case '2':
					$name = $row->hobby;//爱好
					$data['hobby'] = $otherinfo.','.$name;
					break;
				case '3':
					$name = $row->book_readed;//读过的书
					$data['book_readed'] = $otherinfo.','.$name;
					break;
				case '4':
					$name = $row->place_gone;//去过的地方
					$data['place_gone'] = $otherinfo.','.$name;
					break;
				case '5':
					$name = $row->plan_done;//完成的计划
					$data['plan_done'] = $otherinfo.','.$name;
					break;
				case '6':
					$name = $row->not_done;//想要达成的目标
					$data['not_done'] = $otherinfo.','.$name;
					break;
				default:
					$name = '';
					break;
			}
			
		}
	
		$query = $this->db->update('users',$data,array('username'=> $username));
		return $query;
	}
	//处理用户的其他分类信息(将字符串转化成数组来使用)
	public function do_user_otherinfo($num){
		$res = $this->Mhome->get_single_userinfo();
		$arr = array();
		foreach($res as $row){
				//将各种分类信息进行区分
			switch ($num) {
				case '2':
					$name = $row->hobby;//爱好
					break;
				case '3':
					$name = $row->book_readed;//读过的书
					break;
				case '4':
					$name = $row->place_gone;//去过的地方
					break;
				case '5':
					$name = $row->plan_done;//完成的计划
					break;
				case '6':
					$name = $row->not_done;//想要达成的目标
					break;
				default:
					$name = '';
					break;
			}
		}
		$arr = explode(',',rtrim($name,','));
		return $arr;
	}

}




 ?>