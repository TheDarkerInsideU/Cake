<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div>
    <?= $this->Form->create($cliente) ?>
    <fieldset>
        <legend>
            <?= __('Edit Cliente') ?>
        </legend>
        <?php
            echo $this->Form->control('status',
                ['options' => ['Ativo' => 'Ativo',
                'Inativo' => 'Inativo', 'Em processo' => 'Em processo'],
                'empty' => 'Escolha um!!']);
            // echo $this->Form->control('user_id', ['empty' => 'Escolha um!!']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
