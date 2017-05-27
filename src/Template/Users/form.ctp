<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Usuario</h3>
                    <div class="box-tools">

                    </div>
                </div>
                <?= $this->Form->create($user) ?>
                <!-- /.box-header -->
                <div class="box-body">

                <div class="row">
                        <div class="col-md-6">
                            <?= $this->Form->input('nome',['label'=>'Nome Completo']) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->input('username',['label'=>'Nome de Usuário']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->input('email',['label'=>'E-mail']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $this->Form->input('password',['label'=>'Senha']) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->input('confirm_password',['label'=>'Confirme a Senha','type'=>'password']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->input('role',['options'=>$roles,'label'=>'Nível de Acesso']) ?>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->button('<i class="fa fa-check"> Salvar</i>',['class'=>'btn btn-success btn-flat','escape'=>false]) ?>
                        </div>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>