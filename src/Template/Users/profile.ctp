<div class="box">
    <div class="box-header with-border">
        <div class="row">
            <div class="col-md-10">
                <h3 style="margin-top: 5px;" class="box-title">Usuário</h3>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>
    <?= $this->Form->create($user) ?>
    <div class="box-body">
        <div class="row">
            <div class="col-md-6"><?= $this->Form->control('username',['label'=>'Nome de Usuário']) ?></div>
            <div class="col-md-6"><?= $this->Form->control('email') ?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><?= $this->Form->control('password',['label'=>'Senha']) ?></div>
            <div class="col-md-6"><?= $this->Form->control('confirm_password',['label'=>'Repita a Senha','type'=>'password']) ?></div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <div class="row">
            <div class="col-md-12">
                <?= $this->Form->button('<i class="fa fa-check"></i> Salvar',['escape'=>false,'class'=>'btn btn-success btn-flat']) ?>
                <?= $this->Html->link('<i class="fa fa-close"></i> Cancelar',$this->request->referer(),['escape'=>false,'class'=>'btn btn-default btn-flat pull-right']) ?>
            </div>
        </div>
    </div>
    <!-- /.box-footer-->
    <?= $this->Form->end() ?>
</div>


