<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estado $estado
 */
?>
<div>
    <?= $this->Form->create($estado) ?>
    <fieldset>
        <legend><?= __('Edit Estado') ?></legend>
        <?php
            echo $this->Form->control('estado');
            echo $this->Form->control('uf');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
