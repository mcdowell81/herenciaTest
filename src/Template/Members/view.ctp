<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Member'), ['action' => 'edit', $member->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Member'), ['action' => 'delete', $member->id], ['confirm' => __('Are you sure you want to delete # {0}?', $member->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Members'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Member'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="members view large-9 medium-8 columns content">
    <h3><?= h($member->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($member->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($member->name) ?></td>
        </tr>
        <tr>
            <th><?= __('IdFamily') ?></th>
            <td><?= h($member->idFamily) ?></td>
        </tr>
        <tr>
            <th><?= __('IdParent') ?></th>
            <td><?= h($member->idParent) ?></td>
        </tr>
        <tr>
            <th><?= __('Birthdate') ?></th>
            <td><?= h($member->birthdate) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($member->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($member->modified) ?></td>
        </tr>
    </table>
    
    <h3>CHILDRENS</h3>
    <table class="vertical-table">
        <?php foreach ($childrens as $children): ?>
            <tr>
                <th><?= $children->name ?></ths>
            </tr>
        <?php endforeach; ?>
    </table>

    <h3>PRIMOGENITO = <?= $firstBorn->name ?></h3>

    <h3>PATRIMONIO</h3>
    <table class="vertical-table">
        <?php foreach ($holdings as $holding): ?>
            <?php
                if ( $holding->holdingType == MONEYHOLDING ) {
                    $unitTypeName = '€';
                } else if ( $holding->holdingType == GROUNDHOLDING ) {
                    $unitTypeName = 'm2'; 
                } else {
                    $unitTypeName = 'prop.';
                }
            ?>
            <tr>
                <th><?= $holding->units ?> <?= $unitTypeName ?></th>
            </tr>
        <?php endforeach; ?>
    </table>
    
    <?= $this->Html->link(__('GRANT'), ['action' => 'grant', $member->id]) ?>
</div>

