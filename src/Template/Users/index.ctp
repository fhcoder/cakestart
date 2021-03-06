<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Usuarios</h3>
                    <div class="box-tools">
                        <?= $this->Form->create(null,['type'=>'get','valueSources'  =>  [ 'query' ,  'context' ],'class'=>'form-inline']) ?>
                        <?= $this->Form->input('search',['label'=>false,'placeholder'=>'Buscar','class'=>'form-control pull-right']) ?>
                        <?= $this->Form->button('<i class="fa fa-search"></i>',['escape'=>false,'class'=>'btn btn-defualt btn-flat']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Usuário</th>
                            <th>Email</th>
                            <th>Nível</th>
                            <th>Opções</th>
                        </tr>
                        <?php foreach ($users as $user) {?>
                            <tr>
                                <td><?= $user->id ?></td>
                                <td><?= $user->nome ?></td>
                                <td><?= $user->username ?></td>
                                <td><?= $user->email ?></td>
                                <td><?= $user->role ?></td>
                                <td>
                                    <?= $this->Html->link('<i class="fa fa-eye"></i> Ver',['action'=>'view',$user->id],['class'=>'btn btn-success btn-flat modal-detail','escape'=>false,'data-id'=>$user->id]) ?>
                                    <?= $this->Html->link('<i class="fa fa-edit"></i> Editar',['action'=>'form',$user->id],['class'=>'btn btn-primary btn-flat','escape'=>false]) ?>
                                    <?= $this->Form->postLink('<i class="fa fa-trash"></i> Excluir',['action'=>'delete',$user->id],['class'=>'btn btn-danger btn-flat','escape'=>false,'confirm'=>'Deseja realmente excluir esse registro?']) ?>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody></table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->HtmlUtil->buildPagination($this->Paginator) ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
<div id="modal-detail-user" class="modal fade modal-default">
    <div class="modal-dialog">
        <div id="modal-detail-content" class="modal-content">

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    $('.modal-detail').click(function(e){
       e.preventDefault();
       var id = $(this).attr('data-id');
       $('#modal-detail-content').load('<?= \Cake\Routing\Router::url(['action'=>'view']) ?>/'+id,function(){
           $('#modal-detail-user').modal('show');
       });
    });

</script>