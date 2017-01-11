<!DOCTYPE html>
<html>
    <head>
    <base href="<?=base_url()?>">
    
        <title>华露的博客--后台管理系统</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="public/css/admin/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="public/css/admin/bootstrap-theme.min.css">

        <!-- Bootstrap Admin Theme -->
        <link rel="stylesheet" media="screen" href="public/css/admin/bootstrap-admin-theme.css">
        <link rel="stylesheet" media="screen" href="public/css/admin/bootstrap-admin-theme-change-size.css">

        <!-- Datatables -->
        <link rel="stylesheet" media="screen" href="public/css/admin/DT_bootstrap.css">
		<link rel="stylesheet" media="screen" href="public/css/admin/admin.css">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="js/html5shiv.js"></script>
           <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bootstrap-admin-with-small-navbar">
        <!-- small 最上方小导航 -->
        <nav class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar-sm" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left bootstrap-admin-theme-change-size">
                                <li class="text">Change size:</li>
                                <li><a class="size-changer small">Small</a></li>
                                <li><a class="size-changer large active">Large</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="javascript:;">日志 <i class="glyphicon glyphicon-bell"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:;">设置<i class="glyphicon glyphicon-cog"></i></a>
                                </li>
                                <li>
                                    <a href="<?=site_url('home/index')?>">查看博客<i class="glyphicon glyphicon-share-alt"></i></a>
                                </li>
                                <li>
                                    <a href="<?=site_url('admin/out')?>">退出登陆<i class="glyphicon glyphicon-share-alt"></i></a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- main / 上方导航栏-->
        <nav class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar bootstrap-admin-navbar-under-small" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="javascript:;">华露的博客--后台管理系统</a>
                        </div>
                        <!-- <div class="collapse navbar-collapse main-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="javascript:;">Link</a></li>
                                <li><a href="javascript:;">Link</a></li>
                                <li class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle" data-hover="dropdown">Dropdown <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation" class="dropdown-header">Dropdown header</li>
                                        <li><a href="javascript:;">Action</a></li>
                                        <li><a href="javascript:;">Another action</a></li>
                                        <li><a href="javascript:;">Something else here</a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation" class="dropdown-header">Dropdown header</li>
                                        <li><a href="javascript:;">Separated link</a></li>
                                        <li><a href="javascript:;">One more separated link</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div> --><!-- /.navbar-collapse -->
                    </div>
                </div>
            </div><!-- /.container -->
        </nav>

        <div class="container">
            <!-- left, vertical navbar & content -->
            <div class="row">
                <!-- 左边导航栏 -->
                <div class="col-md-2 bootstrap-admin-col-left">
                    <ul class="nav navbar-collapse collapse bootstrap-admin-navbar-side">
                        <?php foreach($get_admin_category as $row): ?>
                        <li <?php if($second_uri == $row->category_controller){echo 'class=active'; }?> >
                            <a href="<?=site_url('admin/'.$row->category_controller)?>"><i class="glyphicon glyphicon-chevron-right"></i><?=$row->category_name?></a>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>

                <!-- content -->
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-header">
                            <?php foreach($get_admin_category as $row): ?>
                                <?php if($second_uri == $row->category_controller): ?>
                                <h1><?=$row->category_name?></h1>
                                <?php endif ?>
                            <?php endforeach ?>
                            </div>
                        </div>
                    </div> 
               
