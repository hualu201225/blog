<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<base href="<?=base_url()?>">
	<link rel="stylesheet" href="public/css/personal_center.css">
	<script>
	</script>
</head>
<body>
	<!-- 左边列表栏 -->
	<div class="left">
		<!-- 放已经有的信息 -->
		<div class="personal_info">
		<?php foreach($get_user_category as $row): ?>
			<div class="blank" style="width:100%"><span>添加<?=$row->user_category_name?>：</span> </div>
			<form action="<?=site_url('personal/personal_otherinfo_ok')?>" class="needto_add" method="post">
			<?=$row->user_category_name?>：<input type="text" name="otherinfo" class="hobby" style="border:1px #239494 solid">
			<input type="submit" value="添加" class="submit" name="submit" style="padding:3px;background:#969696">
		</form>
		</div>
		<div class="personal_info">
			<div class="blank" style="width:100%"><span><?=$row->user_category_name?>：</span> </div>
		<?php endforeach ?>
			<ul>
			<?php foreach($userinfo as $row): ?>
				<?php if(!empty($row)): ?>
					<li><?=$row?></li>
				<?php endif ?>
			<?php endforeach ?>
			</ul>
		</div>
			
	</div>
</body>
</html>