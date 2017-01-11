<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
 <head>
 	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
 	<base href="<?=base_url()?>" />
 	<link rel="stylesheet" href="public/css/message.css" />
 	
 	<title>登陆页面</title>
 </head>
 <body>
 	<form action="<?=site_url('home/login_ok')?>" method="post" class="login_form" name="login_form">
 		<p class="login">登陆</p>
 		<div class="blank"></div>
		<span class="login_info">用户名</span><input type="text" placeholder="请输入用户名" name="name" value="<?php echo set_value('name') ?>"/>
		<div class="blank"></div>
		<span class="login_info">密码</span><input type="password" placeholder="请输入密码" name="password"/>
		<div class="blank"><?php echo isset($error_info)?$error_info:''; ?></div>
		<!-- <span class="login_info">验证码</span><input type="text" placeholder="请输入验证码" name="code"/>
		
		<div class="blank"></div> -->
		<input type="checkbox" checked="checked"style="width:150px;height:10px;margin-top:15px" name="auto"/>一周内自动登陆
 		<input type="submit"  value="登陆" class="submit"/>
 		<p class="not_login">还没注册？~~~去&nbsp&nbsp&nbsp&nbsp<a href=""><?=anchor('home/register/','注册')?></a></p>
 	</form>

 	
 </body>
 </html>