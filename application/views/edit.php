
		<div id="main-content">
		<?php foreach($get_article_detail as $row): ?>
		<form action="" method="post" style="padding-top:60px" class="up_form">
			<input type="text" placeholder="作者" name="name" class="name_input" value="<?=$row->author?>"/></br>
			<input type="text" placeholder="请输入文章的标题" name="title" class="title_input" style="width:530px;" value="<?=$row->title?>"/></br>
			<textarea name="message" id="" cols="30" rows="10"><?=$row->content ?></textarea>
			<div class="img_space">
			选择一个头像吧：</br>
				
				<?php 
				//对图片进行循环再遍历
				for($i=1;$i<=7;$i++){
					$img_path = 'public/images/'.$i.'.jpg';
					$img_arr[] = $img_path;
				}
				foreach($img_arr as $v): ?>
				<input type="radio" name="img" value="<?php echo $v ?>" alt="" /><img src="<?php echo $v ?>" alt="" />
				<?php endforeach ?>
				

			</div>
			<!-- 隐藏传参(因为如果form表单里的action填的不是本页面而是其他页面的话，n的值是传不过去的，所以用input设置一个隐藏的参数，这样在提交的时候可以post到那个页面) -->
			<input type="hidden" name="n"  value=""/>
			<input type="submit" value="修改好了"  style="margin-left:50px;margin-top:150px"/>
			
		</form>
	<?php endforeach ?>
		</div>



		
	</div>
	</div>
	</div>
</body>
</html>