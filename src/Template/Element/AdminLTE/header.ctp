<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>C</b>ST</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Cake</b>Start</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?= $this->Html->image('user.png',['class'=>'user-image','alt'=>'Imagem do Usuario']) ?>
                        <span class="hidden-xs"><?= $currentUser['nome'] ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?= $this->Html->image('user.png',['class'=>'img-circle','alt'=>'Imagem do Usuario']) ?>

                            <p>
                                <?= $currentUser['nome'] ?>
                                <small>Cadastrado em. <?= $currentUser['created']->format('d/m/Y') ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?= $this->Html->link('Profile',['controller'=>'Users','action'=>'profile'],['class'=>'btn btn-default btn-flat']) ?>
                            </div>
                            <div class="pull-right">
                                <?= $this->Html->link('Sair',['controller'=>'Users','action'=>'logout'],['class'=>'btn btn-default btn-flat']) ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>