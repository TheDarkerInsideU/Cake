<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div>
    <h5 class="nav navbar-nav navbar-right" style="margin-right: 0.8%;">
        <?= $this->Html->link(__('Edit'), 
            ['controller' => 'Clientes', 'action' => 'edit', $cliente->id]) ?>
        ||
        <?= $this->Form->postLink(__('Delete'), 
            ['controller' => 'Clientes', 'action' => 'delete', $cliente->id], 
            ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?>
    </h5>
    <h3>
        <?= h($cliente->id) ?>
    </h3>
    <table class="vertical-table">
        <tr>
            <th scope="row">
                <?= __('User') ?>
            </th>
            <td>
                <?= $cliente->has('user') ? $this->Html->link($cliente->user->nome,
                    ['controller' => 'Users', 'action' => 'view', $cliente->user->id]) : '' ?>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <?= __('Id') ?>
            </th>
            <td>
                <?= $this->Number->format($cliente->id) ?>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <?= __('Status') ?>
            </th>
            <td>
                <?= h($cliente->status) ?>
            </td>
        </tr>
    </table>
</div>
