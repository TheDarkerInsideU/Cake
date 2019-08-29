<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div>
    <h5 class="nav navbar-nav navbar-right" style="margin-right: 0.8%;">
        <?= $this->Html->link(__('Add Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?>
        ||
        <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $user->id]) ?>
        ||
        <?= $this->Form->postLink(__('Delete'), 
        ['controller' => 'Users', 'action' => 'delete', $user->id], 
        ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
    </h5>
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($user->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <!-- <tr>
            <th scope="row"></?= __('Password') ?></th>
            <td></?= h($user->password) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Telefone') ?></th>
            <td><?= h($user->telefone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cep') ?></th>
            <td><?= h($user->cep) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bairro') ?></th>
            <td><?= h($user->bairro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cidade') ?></th>
            <td><?= h($user->cidade) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= h($user->estado->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Clientes') ?></h4>
        <?php if (!empty($user->clientes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->clientes as $clientes): ?>
            <tr>
                <td><?= h($clientes->id) ?></td>
                <td><?= h($clientes->status) ?></td>
                <td><?= h($clientes->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clientes', 'action' => 'view', $clientes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), 
                    ['controller' => 'Clientes', 'action' => 'delete', $clientes->id], 
                    ['confirm' => __('Are you sure you want to delete # {0}?', $clientes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
