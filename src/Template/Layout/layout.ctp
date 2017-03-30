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
    <?= $this->Html->css("main.css") ?>
    <?= $this->Html->script('/components/jquery/dist/jquery.min.js') ?>
    <?= $this->Html->script('/components/bootstrap/dist/js/bootstrap.min.js') ?>
    <?= $this->Html->script('/components/AdminLTE/plugins/iCheck/icheck.min.js') ?>
    <?= $this->Html->script('/components/AdminLTE/dist/js/app.js') ?>
    <?= $this->Html->script('main.js') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="skin-blue sidebar-mini" style="height: auto;">

<div class="container clearfix">

</div>
<div class="wrapper">

    <?= $this->element('AdminLTE/header') ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?= $this->element('AdminLTE/sidebar') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <?= $this->Flash->render() ?>

            <?= $this->fetch('content') ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?= $this->element('AdminLTE/footer') ?>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
</body>
</html>
