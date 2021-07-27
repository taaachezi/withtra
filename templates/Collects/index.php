<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Collect[]|\Cake\Collection\CollectionInterface $collects
 */
echo $this->Html->script('collect/index');
?>
<h3 class="fw-bold mb-0">全ての募集一覧</h3>
<p class="mb-5 fw-bold"><?= count($collects) ?>件の募集があります</p>
<div class="collects index content row">
    <div class="col-4 left-contents border-end" style="height: 100%;">
        <dl class="search_category">
            <dt>絞り込み</dt>
            <?= $this->Form->create(null, ['type' => 'get', 'url' =>['action' => 'index','controller' => 'Collects']]) ?>
            <?= $this->Form->hidden("filter",["value"=>"filter"]); ?>
            <dt class="border-start border-primary border-5 ps-3">日程選択</dt>
            <input type="date" name="date" id="today">
            <dt class="border-start border-primary border-5 ps-3">ジム選択</dt>
            <?= $this->Form->control('gym_id',["label" => false,"empty"=>"ジムを選択"]);?>
            <dt class="border-start border-primary border-5 ps-3">目的選択</dt>
            <?= $this->Form->control("purpose_id",["label" => false,"empty"=>"目的を選択"]); ?>
            <dt class="border-start border-primary border-5 ps-3">住所選択</dt>
            <?= $this->Form->control("prefecture_id",["label" => false,"empty"=>"住所を選択"]); ?>
            <input type="text" name="city" placeholder="店名または施設名">
            <dt class="border-start border-primary border-5 ps-3">トレーニング部位選択</dt>
            <?= $this->Form->control("part_id",["label" => false,"empty"=>"部位を選択"]); ?>
            <?= $this->Form->submit(__("絞り込み")); ?>
            <?= $this->Form->end();?>
        </dl>
    </div>
    <div class="col-8">
        <?php if(count($collects) < 1): ?>
            <p class="text-center">募集はありません</p>
        <?php else: ?>
            <?php foreach ($collects as $collect): ?>
            <div class="collect_content position-relative border-bottom border-2 my-3">
                <div class="content_prefecture position-absolute"><span class="badge bg-info"><?= $collect->prefecture->name ?></span></div>
                <div class="offset-1 col-7">
                    <h4 class="fw-bold pt-5"><?= $this->Html->link($collect->title,['action'=> 'view',$collect->id]); ?> </h4>
                    <span class="badge bg-secondary fs-4 m-2">ジム</span><span class="fw-bold"><?= $collect->has('gym') ? $collect->gym->name : '' ?></span>
                    <p><span class="badge bg-secondary fs-4 m-2">時間</span><span class="fw-bold"><?= h(Date('n月j日　g：i',strtotime($collect->time))) ?></span></p>
                    <p>
                        <span class="badge bg-primary">部位：<?= $collect->part->name ?></span>
                        <span class="badge bg-warning">目的：<?= $collect->purpose->content ?></span>
                        <span class="badge bg-success">人数：<?= $collect->limit ?></span>
                    </p>
                    <div><?= $collect->content ?></div>
                </div>
                <div class="offset-11"><?= $this->Html->link($collect->user->name,['controller' => 'Users', 'action' => 'view']) ?></div>
            </div>
            <?php endforeach ?>
        <?php endif ?>
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
