<?php
/**
 * @var \App\View\AppView $this
 */
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('/components/bootstrap/dist/css/bootstrap.min.css') ?>
    <?= $this->Html->css('/components/font-awesome/css/font-awesome.min.css') ?>
    <?= $this->Html->css('/components/AdminLTE/dist/css/AdminLTE.css') ?>
    <?= $this->Html->css("/components/AdminLTE/dist/css/skins/_all-skins.min.css") ?>
    <?= $this->Html->css("/components/AdminLTE/dist/css/AdminLTE.css") ?>
    <?= $this->Html->css("/components/AdminLTE/plugins/iCheck/square/blue.css") ?>
    <?= $this->Html->script('/components/jquery/dist/jquery.min.js') ?>
    <?= $this->Html->script('/components/bootstrap/dist/js/bootstrap.min.js') ?>
    <?= $this->Html->script('/components/AdminLTE/plugins/iCheck/icheck.min.js') ?>
    <?= $this->Html->script('/components/AdminLTE/dist/js/app.js') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<?= $this->Flash->render() ?>
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>Cake</b>Start</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Faça login para começar a sua sessão</p>

        <form action="" method="post">
            <div class="form-group has-feedback">
                <input name="username" type="text" class="form-control" placeholder="Usuário">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="password" type="password" class="form-control" placeholder="Senha">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Lembrar-me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
