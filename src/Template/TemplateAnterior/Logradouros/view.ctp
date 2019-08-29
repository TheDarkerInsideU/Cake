<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Logradouro $logradouro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Logradouro'), ['action' => 'edit', $logradouro->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Logradouro'), ['action' => 'delete', $logradouro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logradouro->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Logradouros'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Logradouro'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="logradouros view large-9 medium-8 columns content">
    <h3><?= h($logradouro->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= h($logradouro->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Uf') ?></th>
            <td><?= h($logradouro->uf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cep') ?></th>
            <td><?= h($logradouro->cep) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Complemento') ?></th>
            <td><?= h($logradouro->complemento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bairro') ?></th>
            <td><?= h($logradouro->bairro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cidade') ?></th>
            <td><?= h($logradouro->cidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $logradouro->has('user') ? $this->Html->link($logradouro->user->id, ['controller' => 'Users', 'action' => 'view', $logradouro->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($logradouro->id) ?></td>
        </tr>
    </table>
</div>
