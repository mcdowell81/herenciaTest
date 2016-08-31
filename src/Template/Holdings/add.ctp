<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Holdings'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="holdings form large-9 medium-8 columns content">
    <?= $this->Form->create($holding) ?>
    <fieldset>
        <legend><?= __('Add Holding') ?></legend>
        <?php
            echo $this->Form->input('idMember');
            echo $this->Form->input('units');
            echo $this->Form->input('unitValue');
            echo $this->Form->input('holdingType');
            echo $this->Form->input('divisible');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
