<!-- 个人中心 -->
<div id="main-content">
		<div class="blank" style="height:0px;margin-top:10px"></div>
		<!-- 左边列表栏 -->
		<div class="left_category">
			<!-- 放头像昵称以及签名等 -->
			<div class="personal_info">
				<img src="public/images/3.jpg" alt="">
				<?php foreach($userinfo as $row): ?>
				<p class="name"><?php echo $row->username ?></p></br>
				<p class="sign" style="text-overflow:ellipsis;width:97px;overflow:hidden"><nobr>签名：<?=$row->sign?></nobr></p></br>
				<p class="sign">等级：菜芽</p>
				<?php endforeach ?>
			</div>
			<div class="blank"><span>个人档</span> </div>
			<!-- 放个人中心的各种栏目 -->
			<ul>
				<?php foreach($get_user_category as $row): ?>
				<li><a href="<?php echo 'index.php/personal/personal_otherinfo/'.$row->user_category_id ?>" target=""><?=$row->user_category_name?></a></li>
				<?php endforeach ?>
				
			</ul>	
		</div>
	
		<!-- 右边分类栏 -->
		<div class="right_category">
		<!-- 如果点击左边那分类栏第一项 -->
		<?php if($user_category_id == 1): ?>
			<?php foreach($userinfo as $out_row): ?>
			<?php if($out_row->insert_judge_id == 0): ?>
				<?php foreach($userinfo as $row): ?>
					<div class="blank" style="margin-top:5px"><span>基本信息：</span> </div>
				<div class="personal_info">
					<div class="already_info" style="height:120px;"><span style="line-height:120px;float:left">头像：</span><img src="public/images/3.jpg" alt=""><a href="" style="line-height:120px">修改</a></div>
					<div class="already_info">昵称：<?=$row->username?>&nbsp&nbsp&nbsp&nbsp<a href="">修改</a></div>
					<div class="already_info">签名：<?=$row->sign?>&nbsp&nbsp&nbsp&nbsp<a href="">修改</a></div>
					<div class="already_info">等级：菜芽</div>
				</div>
				<!-- 放需要完善的资料 -->
				<div class="blank" style="margin-top:120px"><span>完善信息：</span> </div>
				<form action="<?=site_url('personal/insert_userinfo_ok')?>" class="needto_add" method="post">
					性别：<input type="radio" checked="checked" name="sex" value="男">男<input type="radio" name="sex" value="女">女</br></br>
					生日：<input type="text" name="birthday" placeholder="请输入你的生日"></br></br>
					住址：<input type="text" name="residence" placeholder="请输入你的住址">
					<input type="hidden" name="insert_judge_id" value="1">
					<input type="submit" value="确认提交信息" class="submit" name="submit">
				</form>
				<?php endforeach ?>
			<?php else: ?>
			

				<?php foreach($userinfo as $row): ?>
					<div class="personal_info">
					<div class="blank" style="width:100%"><span>基本信息：</span> </div>
					<div class="already_info" style="height:120px;line-height:120px"><p style="height:100%;line-height:120px;display:inline-block;float:left">头像：</p><img src="public/images/3.jpg" alt=""><a href="">修改</a></div>
					<div class="already_info">昵称：<span class="inner_span"><?=$row->username?></span>	&nbsp&nbsp&nbsp&nbsp<a href="javascript:;">修改</a></div>
					<div class="already_info">签名：<span class="inner_span"><?=$row->sign?></span>&nbsp&nbsp&nbsp&nbsp<a href="">修改</a></div>
					<div class="already_info">性别：<span class="inner_span"><?=$row->sex?></span>&nbsp&nbsp&nbsp&nbsp<a href="">修改</a></div>
					<div class="already_info">生日：<span class="inner_span"><?=$row->birthday?></span>&nbsp&nbsp&nbsp&nbsp<a href="">修改</a></div>
					<div class="already_info">住址：<span class="inner_span"><?=$row->residence?></span>&nbsp&nbsp&nbsp&nbsp<a href="">修改</a></div>
					<div class="already_info">等级：<span class="inner_span">菜芽</span></div>
					</div>
				<?php endforeach ?>
			<?php endif ?>
			<?php endforeach ?>
		<!-- 如果点击其他几项 -->
		<?php else: ?>
			<div class="personal_info">
			<?php foreach($get_user_category_only as $row): ?>
				<div class="blank" style="width:100%"><span>添加<?=$row->user_category_name?>：</span> </div>
				<form action="<?=site_url('personal/personal_otherinfo_ok/'.$row->user_category_id)?>" class="needto_add" method="post">
				<span><?=$row->user_category_name?>：</span>	<input type="text" name="otherinfo" class="hobby" style="border:1px #239494 solid">
				<input type="submit" value="添加" class="submit" name="submit" style="padding:3px;background:#969696;width:40px">
			</form>
			</div>
			<div class="personal_info">
				<div class="blank" style="width:100%"><span><?=$row->user_category_name?>：</span> </div>
			<?php endforeach ?>
				<ul>
				<?php foreach($user_otherinfo as $otherinfo_row): ?>
					<?php if(empty($otherinfo_row)): ?>
						<li>还没有<?=$row->user_category_name?>哦~~</li>
					<?php else: ?>
						<li><?=$otherinfo_row?></li>
					<?php endif ?>
				<?php endforeach ?>
				</ul>
			</div>
		<?php endif ?>
		</div>
		<!-- 右边分类栏结束 -->
</div>	

<!-- 基本信息修改特效 -->
<!-- 
<script type="text/javascript">
	$(function(){
		alert(1);
	})

</script> -->
</body>
</html>