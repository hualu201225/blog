<!-- 文章管理 -->
<?php if(empty($this->uri->segment(3))): ?>
<!-- 文章添加 -->
<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default bootstrap-admin-no-table-panel">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title"></div>
                </div>
                <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                    <form class="form-horizontal" action="<?=site_url('admin/add_article_ok')?>" method="post">
                        <fieldset>
                            <legend>文章添加</legend>
                            <div class="form-group">
                                 <label class="col-lg-2 control-label" for="select02">所属前台分类</label>
                                <div class="col-lg-10">
                                    <select id="select02" class="selectize-select" style="width: 150px" name="category_belong">
                                        <?php foreach($get_index_category_info as $row): ?>
                                        <option value="<?=$row->category_id?>"><?=$row->category_name?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">文章标题</label>
                                <div class="col-lg-10">
                                    <input type="text" name="title" value="<?php echo set_value('title') ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">文章作者</label>
                                <div class="col-lg-10">
                                    <input type="text" name="author" value="<?php echo set_value('content') ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">文章内容</label>
                                <div class="col-lg-10">
                                    <textarea name="content" id="" cols="30" rows="10" value="<?php echo set_value('content') ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                        
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">文章来源</label>
                                <div class="col-lg-10">
                                    <input type="text" name="source" value="<?php echo set_value('source') ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="date01">文章上传时间</label>
                                <div class="col-lg-10">
                                    <input type="text" name="last_date" value="<?php echo set_value('last_date') ?>" class="form-control datepicker" id="date01" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">发文章的地址</label>
                                <div class="col-lg-10">
                                    <input type="text" name="address" value="<?php echo set_value('address') ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="optionsCheckbox">是否设置为推荐</label>
                                <div class="col-lg-10">
                                    <label class="uniform">
                                        <input class="uniform_on" type="checkbox" name="recommond" id="optionsCheckbox" >
                                           推荐的文章会在用户未登陆时显示在每个分类中
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
<!-- 文章信息编辑/查看 -->
<?php foreach($get_single_article_info as $rows): ?>
<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default bootstrap-admin-no-table-panel">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title"></div>
                </div>
                <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                    <form class="form-horizontal" action="<?=site_url('admin/edit_article_ok/'.$rows->id)?>" method="post">
                        <fieldset>
                            <legend>文章编辑/查看</legend>
                            <div class="form-group">
                                 <label class="col-lg-2 control-label" for="select02">所属前台分类</label>
                                <div class="col-lg-10">
                                    <select id="select02" class="selectize-select" style="width: 150px" name="category_belong">
                                        <option value="<?=$category_id?>"><?=$category_name?></option>
                                        <?php foreach($get_index_category_info as $row): ?>
                                        <option value="<?=$row->category_id?>"><?=$row->category_name?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">文章标题</label>
                                <div class="col-lg-10">
                                    <input type="text" name="title" value="<?=$rows->title?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">文章作者</label>
                                <div class="col-lg-10">
                                    <input type="text" name="author" value="<?=$rows->author?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">文章内容</label>
                                <div class="col-lg-10">
                                    <textarea name="content" id="" cols="30" rows="10" value="" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                        <?=$rows->content?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">文章来源</label>
                                <div class="col-lg-10">
                                    <input type="text" name="source" value="<?=$rows->source?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="date01">文章上传时间</label>
                                <div class="col-lg-10">
                                    <input type="text" name="last_date" value="<?=$rows->last_date?>" class="form-control datepicker" id="date01" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">发文章的地址</label>
                                <div class="col-lg-10">
                                    <input type="text" name="address" value="<?=$rows->address?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="optionsCheckbox">是否设置为推荐</label>
                                <div class="col-lg-10">
                                    <label class="uniform">
                                        <input class="uniform_on" type="checkbox" name="recommond" id="optionsCheckbox" checked="<?php if($rows->recommend == '1'){ echo 'checked';} ?>" >
                                           推荐的文章会在用户未登陆时显示在每个分类中
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