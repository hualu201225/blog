<!-- 详细文章列表管理 -->
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
                                <th>id</th>
                                <th>cate</th>
                                <th>rec</th>
                                <th>title</th>
                                <th>author</th>
                                <th>content</th>
                                <th>etc....</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($get_article_info as $row):  ?>
                            <tr>
                                <td><?=$row->id?></td>
                                <td><?=$row->category_id?></td>
                                <td><?=$row->recommend?></td>
                                <td><?=$row->title?></td>
                                <td><?=$row->author?></td>
                                <td><?php echo substr($row->content,0,51).'...' ?></td>
                                <td><a href="<?=site_url('admin/article_edit/'.$row->id) ?>">更多...</a></td>
                                <td class="actions">
                                    <a href="<?=site_url('admin/article_edit/'.$row->id) ?>">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                             修改
                                        </button>
                                    </a>
                                    
                                    <a href="<?=site_url('admin/delete_article/'.$row->id) ?>"  onclick="return confirm('确定删除吗？')">
                                         <button class="btn btn-sm btn-danger">
                                             <i class="glyphicon glyphicon-trash"></i>
                                              删除
                                        </button>
                                     </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                            <tr>
                            <?php for($i=0;$i<7;$i++){
                                echo ' <td></td>';
                                $i = $i++;
                            } ?>
                             <td class="actions" >
                                    <a href="<?=site_url('admin/add_article') ?>">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                            添加文章
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
       