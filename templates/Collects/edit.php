<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Collect $collect
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $collect->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $collect->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Collects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="collects form content">
            <?= $this->Form->create($collect) ?>
            <fieldset>
                <legend><?= __('Edit Collect') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('gym_id', ['options' => $gyms]);
                    echo $this->Form->control('part_id', ['options' => $parts]);
                    echo $this->Form->control('purpose_id', ['options' => $purposes]);
                    echo $this->Form->control('prefecture_id', ['options' => $prefectures]);
                    echo $this->Form->control('city');
                    echo $this->Form->control('limit');
                    echo $this->Form->control('time');
                    echo $this->Form->control('content');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
