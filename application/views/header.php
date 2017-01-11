 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title><?=$page_title?></title>
	<!-- 以下代码可以使页面所有的路径都从根目录开始加载 -->
	<base href="<?=base_url()?>" />
	<link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="public/css/message.css" />
	<script type="text/javascript" src="public/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="public/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
<div id="wrap">
<div id="main" class="clearfix">
	
	
<div class="container">
<!-- 头部 -->
	<header id="header">
		<h1>这个夏天有点黏~~</h1>
		<?php if(isset($_SESSION['username'])): ?>
		<span class="login"><?php echo $_SESSION['username'] ?>,欢迎肥来!&nbsp&nbsp&nbsp&nbsp
		&nbsp&nbsp&nbsp&nbsp<a href="" style=""><?=anchor('personal/my_center','个人中心')?></a>&nbsp&nbsp&nbsp&nbsp<a href=""><?=anchor('home/out','退出')?></a></span>
		<?php else: ?>
		<span class="login"><a href=""><?=anchor('home/login','登陆')?></a>&nbsp&nbsp/&nbsp&nbsp<a href=""><?=anchor('home/register','注册')?></a></span>
		<?php endif ?>
		<ul class="nav nav-pills">
		<li role="presentation" class="active"><a href="<?php echo site_url('home/index') ?>">首页</a></li>
		<?php foreach($category as $row): ?>
		<li role="presentation"><a href="<?php echo '/home/category/'.$row->category_id ?>"><?=$row->category_name?></a></li>
		<?php endforeach ?>
		</ul>
	</header>