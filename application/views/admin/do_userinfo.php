<!-- 添加用户 -->
<script type="text/javascript" src="public/bootstrap/js/jquery.min.js"></script>
<script type="text/javascript">
    // ajax异步判断用户信息是否正确
    $(function(){
    //判断用户名
        //失去焦点事件
        $('input[name=username]').blur(function(){
            //得到用户名
            var index = $(this).val();
            $.ajax({
                url : "<?php echo site_url('home/ajax_check_user') ?>",
                type: 'post',
                dataType : 'html',
                data : {username:index},
                success : function(data){
                    if(data == '0'){
                        $('.msg').html('用户名已存在！请重新输入');
                    }else if(data == '1'){
                        $('.msg').html('用户名可用');
                    }else if(data == '2'){
                        $('.msg').html('用户名格式不正确');
                    }else{
                        $('.msg').html('用户名不能为空');
                    }
                }
            })
        })
    })
    </script>
<?php if(empty($this->uri->segment(3))): ?>
<!-- 用户添加 -->
<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default bootstrap-admin-no-table-panel">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title"></div>
                </div>
                <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                    <form class="form-horizontal" action="<?=site_url('admin/add_user_ok')?>" method="post">
                        <fieldset>
                            <legend>添加用户</legend>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">用户名</label>
                                <div class="col-lg-10">
                                    <input type="text" name="username" value="<?php echo set_value('username') ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    <p class="help-block msg">用户名must为字母、数字或下划线，开头字母不得为下划线!</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">密码</label>
                                <div class="col-lg-10">
                                    <input type="password" name="password" value="<?php echo set_value('password') ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    <p class="help-block"><?php echo form_error('password') ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">邮箱</label>
                                <div class="col-lg-10">
                                    <input type="email" name="email" value="<?php echo set_value('email') ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    <p class="help-block"><?php echo form_error('email') ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">性别</label>
                                <div class="col-lg-10" style="line-height:40px">
                                    <input type="radio" name="sex" value="男" checked="checked" style="width:10px;"  class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'><span style="float:left;margin-left:10px;">男</span>
                                    <input type="radio" name="sex" value="女" style="width:10px;margin-left:10px"  class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'><span style="float:left;margin-left:10px;">女</span>
        
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="date01">生日</label>
                                <div class="col-lg-10">
                                    <input type="text" name="birthday" value="<?php echo set_value('birthday') ?>" class="form-control datepicker" id="date01" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">签名</label>
                                <div class="col-lg-10">
                                    <input type="text" name="sign" value="<?php echo set_value('sign') ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">居住地</label>
                                <div class="col-lg-10">
                                    <input type="text" name="residence" value="<?php echo set_value('residence') ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">兴趣爱好</label>
                                <div class="col-lg-10">
                                    <input type="text" name="hobby" value="<?php echo set_value('hobby') ?>" placeholder="输入兴趣爱好时请用 ‘,’ 隔开" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">看过的书</label>
                                <div class="col-lg-10">
                                    <input type="text" name="book_readed" value="<?php echo set_value('book_readed') ?>" placeholder="输入看过的书时请用 ‘,’ 隔开" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">去过的地方</label>
                                <div class="col-lg-10">
                                    <input type="text" name="place_gone" value="<?php echo set_value('place_gone') ?>" placeholder="输入去过的地方时请用 ‘,’ 隔开" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">完成的计划</label>
                                <div class="col-lg-10">
                                    <input type="text" name="plan_done" value="<?php echo set_value('plan_done') ?>" placeholder="输入完成的计划时请用 ‘,’ 隔开" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">想要达成的目标</label>
                                <div class="col-lg-10">
                                    <input type="text" name="not_done" value="<?php echo set_value('not_done') ?>" placeholder="输入想要达成的目标时请用 ‘,’ 隔开" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="optionsCheckbox">是否已完善资料</label>
                                <div class="col-lg-10">
                                    <label class="uniform">
                                        <input class="uniform_on" type="checkbox" name="insert_judge_id" id="optionsCheckbox" >
                                           第一次登陆个人中心时就已完善资料则勾选
                                    </label>
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
<?php foreach($single_userinfo as $rows): ?>
<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default bootstrap-admin-no-table-panel">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title"></div>
                </div>
                <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                    <form class="form-horizontal" action="<?=site_url('admin/edit_user_ok/'.$rows->uid)?>" method="post">
                        <fieldset>
                            <legend>编辑/查看用户信息</legend>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">用户名</label>
                                <div class="col-lg-10">
                                    <input type="text" name="username" value="<?php echo $rows->username ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    <p class="help-block msg">用户名must为字母、数字或下划线，开头字母不得为下划线!</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">密码</label>
                                <div class="col-lg-10">
                                    <input type="password" name="password" value="<?php echo $rows->password ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    <p class="help-block"><?php echo form_error('password') ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">邮箱</label>
                                <div class="col-lg-10">
                                    <input type="email" name="email" value="<?php echo $rows->email ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    <p class="help-block"><?php echo form_error('email') ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">性别</label>
                                <div class="col-lg-10" style="line-height:40px">
                                    <input type="radio" name="sex" value="男" checked="<?php if($rows->sex == '男') echo 'checked' ?>" style="width:10px;"  class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'><span style="float:left;margin-left:10px;">男</span>
                                    <input type="radio" name="sex" value="女" checked="<?php if($rows->sex == '女') echo 'checked' ?>"style="width:10px;margin-left:10px"  class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'><span style="float:left;margin-left:10px;">女</span>
        
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="date01">生日</label>
                                <div class="col-lg-10">
                                    <input type="text" name="birthday" value="<?php echo $rows->birthday ?>" class="form-control datepicker" id="date01" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">签名</label>
                                <div class="col-lg-10">
                                    <input type="text" name="sign" value="<?php echo $rows->sign ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">居住地</label>
                                <div class="col-lg-10">
                                    <input type="text" name="residence" value="<?php echo $rows->residence ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">兴趣爱好</label>
                                <div class="col-lg-10">
                                    <input type="text" name="hobby" value="<?php echo $rows->hobby ?>" placeholder="输入兴趣爱好时请用 ‘,’ 隔开" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">看过的书</label>
                                <div class="col-lg-10">
                                    <input type="text" name="book_readed" value="<?php echo $rows->book_readed ?>" placeholder="输入看过的书时请用 ‘,’ 隔开" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">去过的地方</label>
                                <div class="col-lg-10">
                                    <input type="text" name="place_gone" value="<?php echo $rows->place_gone ?>" placeholder="输入去过的地方时请用 ‘,’ 隔开" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">完成的计划</label>
                                <div class="col-lg-10">
                                    <input type="text" name="plan_done" value="<?php echo $rows->plan_done ?>" placeholder="输入完成的计划时请用 ‘,’ 隔开" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">想要达成的目标</label>
                                <div class="col-lg-10">
                                    <input type="text" name="not_done" value="<?php echo $rows->not_done ?>" placeholder="输入想要达成的目标时请用 ‘,’ 隔开" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="optionsCheckbox">是否已完善资料</label>
                                <div class="col-lg-10">
                                    <label class="uniform">
                                        <input class="uniform_on" type="checkbox" name="insert_judge_id" checked="<?php if($rows->insert_judge_id == '1') echo 'checked' ?>" id="optionsCheckbox" >
                                           第一次登陆个人中心时就已完善资料则勾选
                                    </label>
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