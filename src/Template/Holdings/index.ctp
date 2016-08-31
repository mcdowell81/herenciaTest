<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Holding'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="holdings index large-9 medium-8 columns content">
    <h3><?= __('Holdings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('idMember') ?></th>
                <th><?= $this->Paginator->sort('units') ?></th>
                <th><?= $this->Paginator->sort('unitValue') ?></th>
                <th><?= $this->Paginator->sort('holdingType') ?></th>
                <th><?= $this->Paginator->sort('divisible') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($holdings as $holding): ?>
            <tr>
                <td><?= h($holding->id) ?></td>
                <td><?= h($holding->idMember) ?></td>
                <td><?= $this->Number->format($holding->units) ?></td>
                <td><?= $this->Number->format($holding->unitValue) ?></td>
                <td><?= $this->Number->format($holding->holdingType) ?></td>
                <td><?= h($holding->divisible) ?></td>
                <td><?= h($holding->created) ?></td>
                <td><?= h($holding->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $holding->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $holding->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $holding->id], ['confirm' => __('Are you sure you want to delete # {0}?', $holding->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
