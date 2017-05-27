<?php
/**
 * @var \App\View\AppView $this
 */
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?= $this->Html->image('user.png',['class'=>'img-circle','alt'=>'Imagem do Usuario']) ?>
            </div>
            <div class="pull-left info">
                <p><?= $currentUser['nome'] ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input id="serach-main-menu" type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul id="main-menu" class="sidebar-menu">
            <li class="header">NAVEGAÇÃO</li>
            <li class="treeview <?= $this->ActiveMenu->toActivate('Dashboard') ?>">
                <?= $this->Html->link('<i class="fa fa-dashboard"></i> <span>Dashboard</span>', ['controller' => 'Dashboard', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li class="treeview <?= $this->ActiveMenu->toActivate('Users') ?>">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Usuários</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><?= $this->Html->link('<i class="fa fa-folder-open-o"></i> Todos Usuários', ['controller' => 'Users', 'action' => 'index'], ['escape' => false]) ?></li>
                    <li><?= $this->Html->link('<i class="fa fa-plus"></i> Novo Usuário', ['controller' => 'Users', 'action' => 'form'], ['escape' => false]) ?></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>