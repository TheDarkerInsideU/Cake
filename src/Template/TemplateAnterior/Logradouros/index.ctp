<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Logradouro[]|\Cake\Collection\CollectionInterface $logradouros
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Logradouro'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="logradouros index large-9 medium-8 columns content">
    <h3><?= __('Logradouros') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('uf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cep') ?></th>
                <th scope="col"><?= $this->Paginator->sort('complemento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bairro') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($logradouros as $logradouro): ?>
            <tr>
                <td><?= $this->Number->format($logradouro->id) ?></td>
                <td><?= h($logradouro->estado) ?></td>
                <td><?= h($logradouro->uf) ?></td>
                <td><?= h($logradouro->cep) ?></td>
                <td><?= h($logradouro->complemento) ?></td>
                <td><?= h($logradouro->bairro) ?></td>
                <td><?= h($logradouro->cidade) ?></td>
                <td><?= $logradouro->has('user') ? $this->Html->link($logradouro->user->id, ['controller' => 'Users', 'action' => 'view', $logradouro->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $logradouro->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $logradouro->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $logradouro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logradouro->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
