<!-- 前台分类列表管理 -->
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
                                <th>category_id</th>
                                <th>category_name</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($get_index_category_info as $row): ?>
                            <tr>
                                <td><?=$row->category_id?></td>
                                <td><?=$row->category_name?></td>
                                <td class="actions">
                                    <a href="<?=site_url('admin/index_category_edit/'.$row->category_id) ?>">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                             修改
                                        </button>
                                    </a>
                                    
                                    <a href="<?=site_url('admin/delete_index_category/'.$row->category_id) ?>"  onclick="return confirm('确定删除吗？')">
                                         <button class="btn btn-sm btn-danger">
                                             <i class="glyphicon glyphicon-trash"></i>
                                              删除
                                        </button>
                                     </a>
                                </td>
                            </tr>
                        <?php endforeach ?> 
                            <tr>
                            <?php for($i=0;$i<2;$i++){
                                echo ' <td></td>';
                                $i = $i++;
                            } ?>
                             <td class="actions" >
                                    <a href="<?=site_url('admin/add_index_category') ?>">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                            添加分类列表
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
       