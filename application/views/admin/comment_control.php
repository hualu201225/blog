<!-- 评论管理 -->
    <div class="row">
       <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!-- <div class="text-muted bootstrap-admin-box-title">Table with actions</div> -->
                </div>
                <div class="bootstrap-admin-panel-content">
                    <table class="table bootstrap-admin-table-with-actions">
                        <thead>
                            <tr>
                                <th>article_id</th>
                                <th>author</th>
                                <th>content</th>
                                <th>last_date</th>
                                <th>descript</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($get_comment_info as $row):  ?>
                            <tr>
                                <td><?=$row->article_id?></td>
                                <td><?=$row->author?></td>
                                <td><?=$row->content?></td>
                                <td><?=$row->last_date?></td>
                                <td><?=$row->descript?></td>
                                <td class="actions">
                                    <a href="<?=site_url('admin/comment_edit/'.$row->id) ?>">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                             修改
                                        </button>
                                    </a>
                                    
                                    <a href="<?=site_url('admin/delete_comment/'.$row->id) ?>"  onclick="return confirm('确定删除吗？')">
                                         <button class="btn btn-sm btn-danger">
                                             <i class="glyphicon glyphicon-trash"></i>
                                              删除
                                        </button>
                                     </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                            <tr>
                            <?php for($i=0;$i<5;$i++){
                                echo ' <td></td>';
                                $i = $i++;
                            } ?>
                             <td class="actions" >
                                    <a href="<?=site_url('admin/add_comment') ?>">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                            添加评论
                                        </button>
                                    </a>
                                   
                                </td>
                            </tr>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
       