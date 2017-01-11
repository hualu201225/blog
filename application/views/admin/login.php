<!DOCTYPE html>
<html class="bootstrap-admin-vertical-centered">
    <head>
    <base href="<?=base_url()?>">
        <title>博客系统-登录</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="public/css/admin/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="public/css/admin/bootstrap-theme.min.css">

        <!-- Bootstrap Admin Theme -->
        <link rel="stylesheet" media="screen" href="public/css/admin/bootstrap-admin-theme.css">

        <!-- Custom styles -->
        <style type="text/css">
            .alert{
                margin: 0 auto 20px;
            }
        </style>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="js/html5shiv.js"></script>
           <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bootstrap-admin-without-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                        华露的博客--后台管理系统
                    </div>
                    <form method="post" action="<?=site_url('login/login_ok')?>" class="bootstrap-admin-login-form">
                        <h1>Login</h1>
                        <div class="form-group">
                            <input class="form-control" type="text" name="username" placeholder="请输入用户名">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="password" placeholder="请输入密码">
                            <p style="color:red"><?php if(isset($_SESSION['login_mistake'])){echo $_SESSION['login_mistake'];} ?></p>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="remember_me" checked="checked">
                                记住我
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary" type="submit">登陆</button>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="public/js/jquery.min.js"></script>
        <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(function() {
                // Setting focus
                $('input[name="email"]').focus();

                // Setting width of the alert box
                var alert = $('.alert');
                var formWidth = $('.bootstrap-admin-login-form').innerWidth();
                var alertPadding = parseInt($('.alert').css('padding'));

                if (isNaN(alertPadding)) {
                    alertPadding = parseInt($(alert).css('padding-left'));
                }

                $('.alert').width(formWidth - 2 * alertPadding);
            });
        </script>
    </body>
</html>