<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<base href="<?=base_url()?>">
	<link rel="stylesheet" href="public/css/personal_center.css">
</head>
<body>
	<!-- 左边列表栏 -->
	<div class="left">
		<!-- 放已经有的信息 -->
	<?php if(!isset($_SESSION['sex'])): ?>
		<?php foreach($userinfo as $row): ?>
		<div class="personal_info">
			<span class="title">已有信息：</span></br></br>
			<div class="already_info" style="height:120px">头像：<img src="public/images/3.jpg" alt=""><a href="">修改</a></div>
			<div class="already_info">昵称：<?=$row->username?>&nbsp&nbsp&nbsp&nbsp<a href="">修改</a></div>
			<div class="already_info">签名：<?=$row->sign?>&nbsp&nbsp&nbsp&nbsp<a href="">修改</a></div>
			<div class="already_info">等级：菜芽</div>
		</div>
		<?php endforeach ?>
		<div class="blank"><span>完善信息：</span> </div>
		<!-- 放需要完善的资料 -->
		
		<form action="<?=site_url('personal/insert_userinfo_ok')?>" class="needto_add" method="post">
			性别：<input type="radio" checked="checked" name="sex" value="男">男<input type="radio" name="sex" value="女">女</br></br>
			生日：<input type="text" name="birthday" placeholder="请输入你的生日"></br></br>
			住址：<input type="text" name="residence" placeholder="请输入你的住址">
			<input type="submit" value="确认提交信息" class="submit" name="submit">
		</form>
	<?php else: ?>
		<?php foreach($userinfo as $row): ?>
			<div class="personal_info">
			<div class="blank" style="width:100%"><span>基本信息：</span> </div>
			<div class="already_info" style="height:120px;line-height:120px"><p style="height:100%;line-height:120px;display:inline-block;float:left">头像：</p><img src="public/images/3.jpg" alt=""><a href="">修改</a></div>
			<div class="already_info">昵称：<?=$row->username?>&nbsp&nbsp&nbsp&nbsp<a href="">修改</a></div>
			<div class="already_info">签名：<?=$row->sign?>&nbsp&nbsp&nbsp&nbsp<a href="">修改</a></div>
			<div class="already_info">性别：<?=$row->sex?>&nbsp&nbsp&nbsp&nbsp<a href="">修改</a></div>
			<div class="already_info">生日：<?=$row->birthday?>&nbsp&nbsp&nbsp&nbsp<a href="">修改</a></div>
			<div class="already_info">住址：<?=$row->residence?>&nbsp&nbsp&nbsp&nbsp<a href="">修改</a></div>
			<div class="already_info">等级：菜芽</div>
			</div>
		<?php endforeach ?>
	<?php endif ?>
	</div>
</body>
</html>