<script type="text/javascript">
	$(function(){
		$('#main-content #message_show .second_comments').hide();
		var num;
		$('#main-content #message_show .message_list .select .modify a').click(function(){
			$(this).parent().parent('.select').parent('.message_list').find('.second_comments').toggle();				
		//点击评论获取该一级评论发布者及该评论的id
			//获取该评论发布者，显示在编辑框中
			var author = $(this).parent().parent('.select').siblings('.title').find('.name').text();
			$(this).parent().parent('.select').parent('.message_list').find('.up_form').find('textarea').html('@'+author+':');
			$(this).parent().parent('.select').parent('.message_list').find('.up_form').find('.be_comments_name').attr('value',author);
			//获取该评论的id，用ajax异步上传到后台数据库
			var comment_id = $(this).parent().parent('.select').find('.hidden_comment_id').text();
			$(this).parent().parent('.select').parent('.message_list').find('.up_form').find('.belong_id').attr('value',comment_id);
			num = parseInt($(this).find('strong').text())+1;
		})

		//表单提交
		$('form[name=second_comments]').submit(function(){
			$.ajax({
				url : "<?php echo site_url('home/second_comments')?>",
				type : 'post',
				dataType: 'html',
				data : $(this).serialize(),
				success : function(data){
					$('#main-content #message_show .second_comments .second_comments_show').append(data);
					// ？？？？问题：评论的数量不能相应地增加，append的部分也不能相应地添加，每次提交所有的评论下面都会添加一次
				}

			})
			var flag = 1;
			
		})
	})
</script>
<script type="text/javascript">
	$(function(){
		//点击评论获取该一级评论下的二级评论的评论发布者及该评论的id
			$('#main-content #message_show .message_list .second_comments .second_comments_show .inner_comments .select .modify a').click(function(){
				//获取该评论发布者，显示在编辑框中
				var author_second = $(this).parent().parent('.select').siblings('.name').text();
				// alert(author_second);
				$(this).parent().parent('.select').parent('.inner_comments').parent('.second_comments_show').siblings('.up_form').find('textarea').html('@'+author_second+':');
				$(this).parent().parent('.select').parent('.inner_comments').parent('.second_comments_show').siblings('.up_form').find('.be_comments_name').attr('value',author_second);
				//获取该评论的id，用ajax异步上传到后台数据库
				var comment_id_second = $(this).parent().parent('.select').siblings('.hidden_comment_id').text();
				// alert(comment_id_second);
				$(this).parent().parent('.select').parent('.inner_comments').parent('.second_comments_show').siblings('.up_form').find('.belong_id').attr('value',comment_id_second);
				
			})	
			
		
	})
</script>
<div id="main-content">
<!-- 文章显示区 -->
<?php foreach($get_article_detail as $row): ?>
		<h2 style="text-align:center;"><?=$row->title?></h2>
		<span style="float:right;margin-right:30px;">作者:<?=$row->author?></span>
		<span style="float:right;margin-right:30px;">来源:<?=$row->source?></span>
		<span style="float:right;margin-right:30px;">上传时间:<?=$row->last_date?></span></br>
		<div style="text-indent:20px;line-height:25px;margin-top:20px;padding:0 20px 0 20px"><pre style=""><?php echo trim($row->content)?></pre></div>

<?php endforeach ?>
<!-- 评论查看区		 -->
	<div class="blank"></div>
	<div id="message_show">
		<p class="message_list_title">所有评论   <font>(<?php echo count($get_comments) ?>)</font></p>
		<?php if(count($get_comments) == 0){ ?>
			<div class="message_list">
				还没有评论哦~
			</div>
		<?php }else{foreach($get_comments as $k => $art_row):?>
			<div class="message_list">
				<div class="img"><img src="public/images/2.jpg" alt="" /></div>
				<div class="title">
					<span style="float:left">昵称：</span><span class="name"><?=$art_row->author?></span>
					<span class="descript">心情:<?=$art_row->descript?></span>
					<span class="floor_num">第<strong><?=$k+1?></strong>楼</span>
					<span class="hidden_id" style="display:none"><?=$art_row->id?></span>
				</div>
				<div class="content">
					<span style=""><?=$art_row->content?></span>
				</div>
				<div class="select">
					<span class="time"><?=$art_row->last_date?></span>
					<span class="delete"><a href="" onclick="">点赞&nbsp<span class="glyphicon glyphicon-thumbs-up"></span></a></span>
					<input type="hidden" name="hidden_modify" value="<?=$art_row->author?>">
					<span class="hidden_comment_id" style="display:none"><?=$art_row->id?></span><!-- 获得该评论的id -->
					<span class="modify"><a href="javascript:;">评论(<strong><?php echo count($this->Mhome->get_second_comments($this->uri->segment(3),$art_row->id)) ?></strong>)</a></span>
				</div>
				<!-- 二级评论 -->
				<div class="second_comments" style="">

						<!-- 二级评论显示 -->
							<!-- 获得二级评论内容 -->
						
						<div class="second_comments_show" style="float:right;width:100%;margin-top:5px">
							<?php 
								$get_second_comments = $this->Mhome->get_second_comments($this->uri->segment(3),$art_row->id);
								if(!empty($get_second_comments)){ 
								foreach($get_second_comments as $rows):
							?>
							<div class="inner_comments" style="float:left;margin-top:5px;width:100%">
								<div class="img" style="width:35px;height:35px;"><img src="public/images/2.jpg" alt="" /></div>
								<span class="name" style="margin-left:20px"><?=$rows['author']?></span>&nbsp<span style="color:#9B9B9B">回复</span>&nbsp<span><?=$art_row->author?>:</span>
								<span class="comment_content" style="margin-left:10px;width:auto;color:#9B9B9B"><?=$rows['content']?></span>
								<span class="time" style="float:right"><?=$art_row->last_date?></span>
								<span class="hidden_comment_id" style="display:none"><?=$rows['id']?></span><!-- 获得该评论的id -->
								<div class="select" style="height:20px">
									<span class="delete"><a href="javascript:;" onclick=""><span class="glyphicon glyphicon-thumbs-up"></span></a></span>
									<span class="modify"><a href="javascript:;"><span class="glyphicon glyphicon-edit"></span></a></span>
								</div>
							</div>
							<?php endforeach;}?> 
						</div>
						
						<!-- 二级评论提交 -->

						<form action="javascript:;" method="post" class="up_form " name="second_comments" style="float:right;width:80%;margin-bottom:0px"> 
							<textarea name="comment_content" id="" cols="30" rows="10"></textarea>
							<input type="text" placeholder="签个名儿呗" name="author" class="name_input" style="margin-left:5px;margin-top:40px;padding-left:5px;height:25px;"/>
							<input type="hidden" name="be_comments_name" class="be_comments_name">
							<!-- <input type="text" placeholder="心情" name="descript" class="descript_input" style="margin-left:5px;margin-top:10px;height:25px;padding:5px"/> -->
							<!-- 被此条评论所评论的文章id -->
							<input type="hidden" name="article_id" value="<?=$art_row->article_id?>">
							<!-- 被此条评论所评论的评论id -->
							<input type="hidden" name="belong_id" value="" class="belong_id">
							<input type="submit" value="写好了"  name="submit" style="margin-left:5px;margin-top:10px;width:20%"/>
							
						</form>

				</div>
			</div>
		<?php endforeach;} ?>
	</div>
<!-- 评论区 -->

	<?php if(!isset($_SESSION['username'])): ?>
			<!-- <p class="not_login" >登陆即可评论哦~~~去&nbsp&nbsp&nbsp&nbsp<a href=""><?=anchor('home/login/','登陆')?></a></p> -->
		<div class="blank"></div>
		<p class="message_list_title">评论区</p>
		<form action="<?php echo site_url('home/comment_ok')?>" method="post" class="up_form">

			<textarea name="comment_content" id="" cols="30" rows="10"></textarea></br>
			<input type="text" placeholder="签个名儿呗" name="comment_name" class="name_input" style="margin-left:5px;margin-top:40px;padding:5px;height:25px;"/>
			<input type="text" placeholder="心情" name="comment_descript" class="descript_input" style="margin-left:5px;margin-top:10px;height:25px;padding:5px"/>
			<input type="hidden" name="article_id" value="<?=$row->id?>">
			<input type="submit" value="写好了"  name="submit" style="margin-left:5px;margin-top:10px;width:20%"/>
			
		</form>
	<?php else: ?>	
		<div class="blank"></div>
		<p class="message_list_title">评论区</p>
		<form action="<?php echo site_url('home/comment_ok')?>" method="post" class="up_form">
			<textarea name="comment_content" id="" cols="30" rows="10"></textarea></br>
			<!-- <input type="text" placeholder="签个名儿呗" name="comment_name" class="name_input" style="margin-left:5px;width:"/> -->
			<input type="text" placeholder="心情" name="comment_descript" class="descript_input" style="margin-left:5px;margin-top:80px;height:25px;padding:5px"/>
			<input type="hidden" name="article_id" value="<?=$row->id?>">
			<input type="hidden" name="belong_id" value="">
			<input type="submit" value="写好了"  name="submit" style="margin-left:5px;margin-top:10px;width:20%"/>
			
		</form>
	<?php endif ?>


	
</div>
</body>
</html>