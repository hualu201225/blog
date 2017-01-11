<!-- 文章分类页 -->


<div id="main-content">
		
		<!-- 内容展示部分 -->
		<?php if($category_id == 1): ?>
		<!-- 内容展示部分->当用户点击第一个分类时	-->
			<p class="index_list_title_left" style="margin-top:0px;width:94%">心情日历</p>
			<div class="blank"></div>
			<div id="message_show" class="mood_show">
				<div class="blank"></div>
				<?php if(count($get_article) == 0): ?>
					<div class="message_list">
						还没有心情哦~
					</div>
				<?php else: ?>
					<?php foreach($get_article as $rows): ?>
					<div class="message_list">
						<!-- <div class="img"><img src="public/images/2.jpg" alt="" /></div> -->
						<div class="title" style="float:left;width:100%">
							<span class="name"><?=$rows->author?></span>
							<span class="descript" style="margin-left:10px"><?=$rows->address?></span>
							<!-- <span class="floor_num">第<strong></strong>个心情</span> -->
						</div>
						<div class="content" style="float:left;width:100%">
							<span><?=$rows->content?></span>
						</div>
						<div class="select" style="float:left;width:100%">
							<span class="delete"><a href="" onclick="">点赞&nbsp<span class="glyphicon glyphicon-thumbs-up"></span></a></span>
							<span class="modify"><a href="javascript:;">评论&nbsp<span class="glyphicon glyphicon-edit"></span></a></span>
							<span class="time" style="float:right;font-size:13px;margin-left:5px"><?=$rows->last_date?></span>
						</div>
						
						
					</div>
					
					<!-- 分页 -->
					<!-- <?=$links?> -->
					<?php endforeach ?>
				<?php endif ?>
				
			</div>
		
		<?php else: ?>
		<!-- 内容展示部分->当用户点击其他分类时 -->
			<p class="index_list_title_left" style="margin-top:0px;width:94%">The All</p>
			<div class="blank"></div>
			<?php if(count($get_article) == 0): ?>
					<div class="message_list inner_message" >
						还没有文章哦~
					</div>
			<?php else: ?>
				<?php foreach($get_article as $row): ?>
				<div class="col-sm-6 col-md-4 lis" style="">
				    <div class="thumbnail">
				      <img src="public/images/1.jpg" alt="" style="width:100%;max-height:250px">
				      <div class="caption">
				        <h4><?=$row->title ?></h4>
				        <div style="font-size:13px;text-indent:20px;height:90px"><?php echo substr($row->content,0,210).'....' ?></div>
				        <h5 style="color:#797C80">作者:<?=$row->author?></h5>
				        <h6 style="color:#797C80">来源:<?=$row->source?></h6>
				        <h6 style="color:#797C80">上传时间:<?=$row->last_date?></h6>
				        <p style="text-indent:2rem"></p>
				        <p style="height:20px"><a href="<?php echo 'index.php/home/article_content/'.$row->id ?>" style="display:block;float:right;color:#239494">更多...</a></p>
				        <!-- <p style="display:inline-block"><a href="<?php echo 'index.php/home/article_edit/'.$row->id ?>" class="btn btn-primary" role="button">修改</a> <a href="" class="btn btn-default" role="button" onclick="return confirm('确定删除吗')">删除</a></p> -->
				        <p style="display:inline-block;float:right;line-height:35px"></p>
				        
				      </div>
				    </div>
				</div>
				<?php endforeach ?>
			<?php endif ?>
			
		<?php endif ?>
	
		<!-- 内容编辑部分 -->
		<div class="blank"></div>
	<?php if(!isset($_SESSION['username'])): ?>
		<!-- 登陆判断 -->
		<p class="not_login  category_not_login">登陆即可写文章或者心情哦~~~去&nbsp&nbsp&nbsp&nbsp<a href=""><?=anchor('home/login/','登陆')?></a></p>
	<?php else: ?>
	  <?php if($category_id==1): ?>
	  	<!-- 内容编辑部分->当用户点击第一个分类时 -->
		<p class="index_list_title_left" style="margin-top:10px;border:none;width:100%">写下今天的心情：</p>
		<form action="<?=site_url('home/mood/'.$category_id)?>" method="post" class="up_form" style="width:100%;float:left">
			<textarea name="mood_content" id="" cols="30" rows="10" style="height:50px"></textarea></br>
			<input type="hidden" name="category_id" value="<?=$category_id?>">
			<input type="text" placeholder="地点" name="address" class="descript_input" style="margin-left:5px;margin-top:15px;width:10%;padding-left:5px"/>
			<input type="submit" value="写好了"  name="submit" style="margin-left:5px;margin-top:15px;width:10%"/>	
		</form>
	  <?php else: ?>
	  	<!-- 内容编辑部分->当用户点击其他分类时 -->
		<p class="index_list_title_left" style="margin-top:10px;width:100%">我也写一篇：</p>
		<form action="<?=site_url('home/other_category/'.$category_id)?>" method="post" style="padding-top:30px" class="add_form">
			<!-- <input type="text" placeholder="作者" name="name" class="name_input" value=""/></br> -->
			<input type="text" placeholder="请输入文章的标题" name="article_title" class="title_input" style="" value=""/></br>
			<!-- <input type="file"> -->
			<textarea name="article_content" id="" cols="30" rows="10"></textarea>
			<!-- 隐藏传参(因为如果form表单里的action填的不是本页面而是其他页面的话，n的值是传不过去的，所以用input设置一个隐藏的参数，这样在提交的时候可以post到那个页面) -->
			<input type="hidden" name="category_id" value="<?=$category_id?>">
			<input type="submit" value="写好了" class="submit" name="submit" style=""/>
		</form>
	  <?php endif ?>
	<?php endif ?>





	</div>
</div>
</div>
</div>
</body>
</html>
