
<!-- 用户信息表 -->
    <div class="row">
       <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title">所有用户</div>
                </div>
                <div class="bootstrap-admin-panel-content">
                    <table class="table bootstrap-admin-table-with-actions">
                        <thead>
                            <tr>
                                <th>uid</th>
                                <th>username</th>
                                <th>password</th>
                                <th>email</th>
                                <th>sex</th>
                                <th>birthday</th>
                                <th>etc....</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php foreach($get_user_info as $row): ?>
                            <tr>
                                <td><?=$row->uid?></td>
                                <td><?=$row->username?></td>
                                <td><?=$row->password?></td>
                                <td><?=$row->email?></td>
                                <td><?=$row->sex?></td>
                                <td><?=$row->birthday?></td>
                                <td><a href="<?=site_url('admin/user_edit/'.$row->uid) ?>">更多...</a></td>
                               
                                <td class="actions">
                                    <a href="<?=site_url('admin/user_edit/'.$row->uid) ?>">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                             修改
                                        </button>
                                    </a>
                                    
                                    <a href="<?=site_url('admin/delete_user/'.$row->uid) ?>"  onclick="return confirm('确定删除吗？')">
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
                                    <a href="<?=site_url('admin/add_user') ?>">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                            添加用户
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
       