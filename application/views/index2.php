
<!-- 主体 -->
	<div id="main-content">
	
		<?php foreach($article_all->result() as $row): ?>
			  <div class="col-sm-6 col-md-4 lis" style="margin-top:5px;margin-bottom:5px;height:auto">
			    <div class="thumbnail">
			      <img src="public/images/1.jpg" alt="" style="width:100%;height:250px">
			      <div class="caption">
			        <h3><?=$row->title ?></h3>
			        <div><?php echo substr($row->content,0,210).'....' ?></div>
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
	

	</div>

</div>
</div>
</div>
</body>
</html>
