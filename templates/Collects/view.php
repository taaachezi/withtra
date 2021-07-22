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
            <?= $this->Html->link(__('Edit Collect'), ['action' => 'edit', $collect->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Collect'), ['action' => 'delete', $collect->id], ['confirm' => __('Are you sure you want to delete # {0}?', $collect->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Collects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Collect'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="collects view content">
            <h3><?= h($collect->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $collect->has('user') ? $this->Html->link($collect->user->name, ['controller' => 'Users', 'action' => 'view', $collect->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Gym') ?></th>
                    <td><?= $collect->has('gym') ? $this->Html->link($collect->gym->name, ['controller' => 'Gyms', 'action' => 'view', $collect->gym->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Part') ?></th>
                    <td><?= $collect->has('part') ? $this->Html->link($collect->part->name, ['controller' => 'Parts', 'action' => 'view', $collect->part->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Purpose') ?></th>
                    <td><?= $collect->has('purpose') ? $this->Html->link($collect->purpose->id, ['controller' => 'Purposes', 'action' => 'view', $collect->purpose->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Prefecture') ?></th>
                    <td><?= $collect->has('prefecture') ? $this->Html->link($collect->prefecture->name, ['controller' => 'Prefectures', 'action' => 'view', $collect->prefecture->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($collect->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($collect->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Limit') ?></th>
                    <td><?= $this->Number->format($collect->limit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Time') ?></th>
                    <td><?= h($collect->time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($collect->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($collect->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Content') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($collect->content)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Entries') ?></h4>
                <?php if (!empty($collect->entries)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Collect Id') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Content') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($collect->entries as $entries) : ?>
                        <tr>
                            <td><?= h($entries->id) ?></td>
                            <td><?= h($entries->user_id) ?></td>
                            <td><?= h($entries->collect_id) ?></td>
                            <td><?= h($entries->status) ?></td>
                            <td><?= h($entries->content) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Entries', 'action' => 'view', $entries->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Entries', 'action' => 'edit', $entries->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Entries', 'action' => 'delete', $entries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $entries->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
