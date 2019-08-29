<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Logradouro $logradouro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $logradouro->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $logradouro->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Logradouros'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="logradouros form large-9 medium-8 columns content">
    <?= $this->Form->create($logradouro) ?>
    <fieldset>
        <legend><?= __('Edit Logradouro') ?></legend>
        <?php
            echo $this->Form->control('estado');
            echo $this->Form->control('uf');
            echo $this->Form->control('cep');
            echo $this->Form->control('complemento');
            echo $this->Form->control('bairro');
            echo $this->Form->control('cidade');
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
