<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Collect[]|\Cake\Collection\CollectionInterface $collects
 */
?>
<h3 class="fw-bold mb-0">全ての募集一覧</h3>
<p class="mb-5 fw-bold"><?= count($collects) ?>件の募集があります</p>
<div class="collects index content row">
    <div class="col-4 left-contents border-end" style="height: 100%;">
        <p class="border-start border-primary border-5 ps-3">絞り込み</p>
        <?= $this->Form->create($filter, ['action' => '/collects/filter']) ?>
    </div>
    <div class="col-8">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('gym_id') ?></th>
                    <th><?= $this->Paginator->sort('part_id') ?></th>
                    <th><?= $this->Paginator->sort('purpose_id') ?></th>
                    <th><?= $this->Paginator->sort('prefecture_id') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('limit') ?></th>
                    <th><?= $this->Paginator->sort('time') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($collects as $collect): ?>
                <tr>
                    <td><?= $collect->has('user') ? $this->Html->link($collect->user->name, ['controller' => 'Users', 'action' => 'view', $collect->user->id]) : '' ?></td>
                    <td><?= $collect->has('gym') ? $this->Html->link($collect->gym->name, ['controller' => 'Gyms', 'action' => 'view', $collect->gym->id]) : '' ?></td>
                    <td><?= $collect->has('part') ? $this->Html->link($collect->part->name, ['controller' => 'Parts', 'action' => 'view', $collect->part->id]) : '' ?></td>
                    <td><?= $collect->has('purpose') ? $this->Html->link($collect->purpose->id, ['controller' => 'Purposes', 'action' => 'view', $collect->purpose->id]) : '' ?></td>
                    <td><?= $collect->has('prefecture') ? $this->Html->link($collect->prefecture->name, ['controller' => 'Prefectures', 'action' => 'view', $collect->prefecture->id]) : '' ?></td>
                    <td><?= h($collect->city) ?></td>
                    <td><?= $this->Number->format($collect->limit) ?></td>
                    <td><?= h(Date('n/j　g：i',strtotime($collect->time))) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
