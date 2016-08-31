<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Holding'), ['action' => 'edit', $holding->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Holding'), ['action' => 'delete', $holding->id], ['confirm' => __('Are you sure you want to delete # {0}?', $holding->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Holdings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Holding'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="holdings view large-9 medium-8 columns content">
    <h3><?= h($holding->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($holding->id) ?></td>
        </tr>
        <tr>
            <th><?= __('IdMember') ?></th>
            <td><?= h($holding->idMember) ?></td>
        </tr>
        <tr>
            <th><?= __('Units') ?></th>
            <td><?= $this->Number->format($holding->units) ?></td>
        </tr>
        <tr>
            <th><?= __('UnitValue') ?></th>
            <td><?= $this->Number->format($holding->unitValue) ?></td>
        </tr>
        <tr>
            <th><?= __('HoldingType') ?></th>
            <td><?= $this->Number->format($holding->holdingType) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($holding->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($holding->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Divisible') ?></th>
            <td><?= $holding->divisible ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
