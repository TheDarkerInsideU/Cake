<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Logradouros'), ['controller' => 'Logradouros', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Logradouro'), ['controller' => 'Logradouros', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
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
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefone') ?></th>
            <td><?= h($user->telefone) ?></td>
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
        <h4><?= __('Related Logradouros') ?></h4>
        <?php if (!empty($user->logradouros)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Estado') ?></th>
                <th scope="col"><?= __('Uf') ?></th>
                <th scope="col"><?= __('Cep') ?></th>
                <th scope="col"><?= __('Complemento') ?></th>
                <th scope="col"><?= __('Bairro') ?></th>
                <th scope="col"><?= __('Cidade') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->logradouros as $logradouros): ?>
            <tr>
                <td><?= h($logradouros->id) ?></td>
                <td><?= h($logradouros->estado) ?></td>
                <td><?= h($logradouros->uf) ?></td>
                <td><?= h($logradouros->cep) ?></td>
                <td><?= h($logradouros->complemento) ?></td>
                <td><?= h($logradouros->bairro) ?></td>
                <td><?= h($logradouros->cidade) ?></td>
                <td><?= h($logradouros->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Logradouros', 'action' => 'view', $logradouros->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Logradouros', 'action' => 'edit', $logradouros->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Logradouros', 'action' => 'delete', $logradouros->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logradouros->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
