<?php
/**
 * @var \App\Model\Entity\User $user
 */
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span></button>
    <h4 class="modal-title">Detalhes - <small><?= $user->nome ?></small></h4>
</div>
<div class="modal-body">
    <table class="table table-hover">
        <tbody>
        <tr>
            <td class="text-bold">Id:</td>
            <td><?= $user->id ?></td>
        </tr>
        <tr>
            <td class="text-bold" >Nome:</td>
            <td><?= $user->nome ?></td>
        </tr>
        <tr>
            <td class="text-bold" >Usuário:</td>
            <td><?= $user->username ?></td>
        </tr>
        <tr>
            <td class="text-bold" >E-mail:</td>
            <td><?= $user->email ?></td>
        </tr>
        <tr>
            <td class="text-bold" >Nível de Acesso:</td>
            <td><?= $roles[$user->role] ?></td>
        </tr>
        <tr>
            <td class="text-bold" >Criado em:</td>
            <td><?= $user->created->format('d/m/Y') ?></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="modal-footer">
    <button type="button" class="btn pull-left" data-dismiss="modal">Close</button>
</div>
