<!-- 评论管理 -->
<?php if(empty($this->uri->segment(3))): ?>
<!-- 评论添加 -->
<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default bootstrap-admin-no-table-panel">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title"></div>
                </div>
                <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                    <form class="form-horizontal" action="<?=site_url('admin/add_comment_ok')?>" method="post">
                        <fieldset>
                            <legend>评论添加</legend>
                            <div class="form-group">
                                 <label class="col-lg-2 control-label" for="select02">所评论的文章id</label>
                                <div class="col-lg-10">
                                    <select id="select02" class="selectize-select" style="width: 150px" name="article_id">
                                        <?php foreach($get_article_info as $row): ?>
                                        <option value="<?=$row->id?>"><?=$row->id?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">评论者</label>
                                <div class="col-lg-10">
                                    <input type="text" name="author" value="<?php echo set_value('author') ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">评论内容</label>
                                <div class="col-lg-10">
                                    <input type="text" name="content" value="<?php echo set_value('content') ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="date01">评论时间</label>
                                <div class="col-lg-10">
                                    <input type="text" name="last_date" value="<?php echo set_value('last_date') ?>" class="form-control datepicker" id="date01" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">心情描述</label>
                                <div class="col-lg-10">
                                    <input type="text" name="descript" value="<?php echo set_value('descript') ?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    
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
<?php foreach($get_single_comment_info as $rows): ?>
<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default bootstrap-admin-no-table-panel">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title"></div>
                </div>
                <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                    <form class="form-horizontal" action="<?=site_url('admin/edit_comment_ok/'.$rows->id)?>" method="post">
                          <fieldset>
                            <legend>评论编辑</legend>
                            <div class="form-group">
                                 <label class="col-lg-2 control-label" for="select02">所评论的文章id</label>
                                <div class="col-lg-10">
                                    <select id="select02" class="selectize-select" style="width: 150px" name="article_id">
                                        <option value="<?=$this->uri->segment(3)?>"><?=$this->uri->segment(3)?></option>
                                        <?php foreach($get_article_info as $row): ?>
                                        <option value="<?=$row->id?>"><?=$row->id?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">评论者</label>
                                <div class="col-lg-10">
                                    <input type="text" name="author" value="<?=$rows->author?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">评论内容</label>
                                <div class="col-lg-10">
                                    <input type="text" name="content" value="<?=$rows->content?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="date01">评论时间</label>
                                <div class="col-lg-10">
                                    <input type="text" name="last_date" value="<?=$rows->last_date?>" class="form-control datepicker" id="date01" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="typeahead">心情描述</label>
                                <div class="col-lg-10">
                                    <input type="text" name="descript" value="<?=$rows->descript?>" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    
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