<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Logradouro $logradouro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Logradouros'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="logradouros form large-9 medium-8 columns content">
    <?= $this->Form->create($logradouro) ?>
    <fieldset>
        <legend><?= __('Add Logradouro') ?></legend>
        <?php
            echo $this->Form->control('estado');
            echo $this->Form->control('uf');
            echo $this->Form->control('cep');
            echo $this->Form->control('complemento');
            echo $this->Form->control('bairro');
            echo $this->Form->control('cidade');
            echo $this->Form->control('user_id');

            // $this->Form->input('Model.field', array(
            //     'type' => 'select',
            //     'multiple' => 'checkbox',
            //     'options' => array(
            //             'Value 1' => 'Label 1',
            //             'Value 2' => 'Label 2'
            //     )
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
