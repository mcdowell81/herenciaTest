<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Family'), ['action' => 'edit', $family->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Family'), ['action' => 'delete', $family->id], ['confirm' => __('Are you sure you want to delete # {0}?', $family->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Families'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Family'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="families view large-9 medium-8 columns content">
    <h3><?= h($family->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($family->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($family->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($family->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($family->modified) ?></td>
        </tr>
    </table>
</div>

<div class="families view large-9 medium-8 columns content">
    <h3>MEMBERS</h3>
    <table class="vertical-table">
        <?php foreach ($members as $member): ?>
            <tr>
                <th><?= $member->name ?></th>
                <td>
                    <span>HOLDING: </span>
                    <?php foreach ($member->holdings as $holding):
                        
                        if ( $holding->holdingType == MONEYHOLDING ) {
                            $unitTypeName = '€';
                        } else if ( $holding->holdingType == GROUNDHOLDING ) {
                            $unitTypeName = 'm2'; 
                        } else {
                            $unitTypeName = 'prop.';
                        }?>
                    
                        <span><?= $holding->units ?> <?= $unitTypeName ?>, </span>
                    
                    <?php endforeach; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
