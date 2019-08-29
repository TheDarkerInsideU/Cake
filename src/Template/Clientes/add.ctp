<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
    // $session = $this->getRequest()->getSession();
    // $nome = $session->read('Auth.User.nome');
    // $id = $session->read('Auth.User.id');
?>
<div>
    <?= $this->Form->create($cliente) ?>
    <fieldset>
        <legend>
            <?= __('Add Cliente') ?>
        </legend>
        <?php
            echo $this->Form->control('status', 
                ['options' => ['Ativo' => 'Ativo', 'Inativo' => 'Inativo',
                'Em processo' => 'Em processo'], 'empty' => 'Escolha um!!']);
            // echo $this->Form->control('user_id', ['empty' => $nome]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
