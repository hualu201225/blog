<?php if(empty($this->uri->segment(3))): ?>
<!-- 后台管理员添加 -->
<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default bootstrap-admin-no-table-panel">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title"></div>
                </div>
                <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                    <form class="form-horizontal" action="<?=site_url('admin/add_admin_user_ok')?>" method="post">
                        <fieldset>
                            <legend>添加管理员</legend>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">管理员name</label>
                                <div class="col-lg-10">
                                    <input type="text" name="username" value="<?php echo set_value('username') ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    <p class="help-block msg"><?php echo form_error('username') ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">密码</label>
                                <div class="col-lg-10">
                                    <input type="password" name="password" value="<?php echo set_value('password') ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    <p class="help-block"><?php echo form_error('password') ?></p>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-left:200px" name="submit">添加</button>
                            <button type="reset" class="btn btn-default" style="margin-left:20px">取消</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
<!-- 用户信息编辑查看 -->
<?php foreach($single_admin_userinfo as $rows): ?>
<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default bootstrap-admin-no-table-panel">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title"></div>
                </div>
                <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                    <form class="form-horizontal" action="<?=site_url('admin/edit_admin_userinfo_ok/'.$rows->id)?>" method="post">
                        <fieldset>
                            <legend>编辑/查看管理员信息</legend>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">用户名</label>
                                <div class="col-lg-10">
                                    <input type="text" name="username" value="<?php echo $rows->username ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    <p class="help-block msg"><?php echo form_error('username') ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">密码</label>
                                <div class="col-lg-10">
                                    <input type="password" name="password" value="<?php echo $rows->password ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    <p class="help-block"><?php echo form_error('password') ?></p>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary" style="margin-left:200px" name="submit">确认修改</button>
                            <button type="reset" class="btn btn-default" style="margin-left:20px">取消</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?php endif ?>