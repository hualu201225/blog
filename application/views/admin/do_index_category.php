<!-- 前台分类列表处理 -->
<?php if(!empty($this->uri->segment(3))): ?>
<!-- 修改某个前台分类 -->
<?php foreach($get_single_index_category_info as $rows): ?>
<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default bootstrap-admin-no-table-panel">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title"></div>
                </div>
                <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                    <form class="form-horizontal" action="<?=site_url('admin/edit_index_category_ok/'.$rows->category_id)?>" method="post">
                        <fieldset>
                            <legend>编辑前台列表</legend>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">category_id</label>
                                <div class="col-lg-10">
                                    <input type="text" name="category_id" value="<?php echo $rows->category_id ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    <p class="help-block msg"><?php echo form_error('category_id') ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">category_name</label>
                                <div class="col-lg-10">
                                    <input type="text" name="category_name" value="<?php echo $rows->category_name ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    <p class="help-block">填写前台分类列表名称</p>
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
<?php else: ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default bootstrap-admin-no-table-panel">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title"></div>
                </div>
                <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                    <form class="form-horizontal" action="<?=site_url('admin/add_index_category_ok')?>" method="post">
                        <fieldset>
                            <legend>添加前台分类</legend>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">category_id</label>
                                <div class="col-lg-10">
                                    <input type="text" name="category_id" value="" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    <p class="help-block msg"><?php echo form_error('category_id') ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">category_name</label>
                                <div class="col-lg-10">
                                    <input type="text" name="category_name" value="" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    <p class="help-block">填写前台分类列表名称</p>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">category_controller</label>
                                <div class="col-lg-10">
                                    <input type="text" name="category_controller" value="" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    <p class="help-block">填写后台分类列表对应的模板文件</p>
                                </div>
                            </div> -->
                            <button type="submit" class="btn btn-primary" style="margin-left:200px" name="submit">确认添加</button>
                            <button type="reset" class="btn btn-default" style="margin-left:20px">取消</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>