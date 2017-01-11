<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
 <head>
 	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
 	<base href="<?=base_url()?>" />
	<script type="text/javascript" src="public/bootstrap/js/jquery.min.js"></script>
 	<link rel="stylesheet" href="public/css/message.css" />
 	<title>注册</title>
 	<script type="text/javascript">
 	// ajax异步判断用户信息是否正确
 	$(function(){
 	//判断用户名
 		//失去焦点事件
 		$('input[name=name]').blur(function(){
 			//得到用户名
 			var index = $(this).val();
 			$.ajax({
 				url : "<?php echo site_url('home/ajax_check_user') ?>",
 				type: 'post',
 				dataType : 'html',
 				data : {username:index},
 				success : function(data){
 					if(data == '0'){
 						$('.msg').html('用户名已存在！请重新输入');
 					}else if(data == '1'){
 						$('.msg').html('用户名可用');
 					}else if(data == '2'){
 						$('.msg').html('用户名格式不正确');
 					}else{
 						$('.msg').html('用户名不能为空');
 					}
 				}
 			})
 		})
 	})
	</script>
 </head>
 <body>
 		
 	<form action="<?=site_url('home/register_ok')?>" method="post" class="register_form">
	
 		<p class="login">注册</p>
 		<div class="blank"></div>
		<span class="login_info">用户名</span><input type="text" placeholder="请输入用户名" name="name" value="<?php echo set_value('name') ?>"/>
		<div class="blank msg"></div>
		<span class="login_info">密码</span><input type="password" placeholder="请输入密码" name="password" value="<?php echo set_value('password') ?>"/>
		<div class="blank"><?php echo form_error('password') ?></div>
		<span class="login_info">确认密码</span><input type="password" placeholder="请确认密码" name="passconf" value="<?php echo set_value('passconf') ?>"/>
		<div class="blank"><?php echo isset($passconf_error_info)?$passconf_error_info:''; ?></div>
		<span class="login_info">邮箱</span><input type="text" placeholder="请输入邮箱地址" name="email" value="<?php echo set_value('email') ?>"/>
		<div class="blank"><?php echo form_error('email') ?></div>
		<!-- <span class="login_info">个人介绍</span></br><textarea name="introduce" id="" cols="30" rows="10" ></textarea>
		<div class="blank"></div> -->
 		<input type="submit"  value="注册" class="submit" name="submit"/>
 		<a  class="backto_index" href="<?php echo site_url('home/index') ?>">返回首页</a>
 	</form>
 	
 </body>
 </html>