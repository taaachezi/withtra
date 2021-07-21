<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $user
 */
?>
<div class="row d-flex justify-content-center">
    <div class="column-responsive column-80 mt-3">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend class="text-center fs-1"><?= __('新規登録') ?></legend>
                <?php
                    echo $this->Form->control('gym_id',['label' => '通っているジム', 'empty' => 'ジムを選択']);
                    echo $this->Form->control('name',['label' => 'ユーザ名']);
                    echo $this->Form->control('password',['label' => 'パスワード']);
                    echo $this->Form->control('mail',['label' => 'メールアドレス', 'type' => 'email']);
                    echo $this->Form->control('years',['label' => '筋トレ歴']);
                    echo $this->Form->control('prefecture_id',['label' => '利用店舗　都道府県']);
                ?>
            </fieldset>
            <div class="d-flex justify-content-center">
                <input type="submit" value="新規登録" class="w-50">
            </div>
            <?= $this->Form->end() ?>
            <div class="row">
                <a href="<?php echo $this->Url->build(['action' => 'login' ]) ?>" class="text-center">すでに登録済みの方はこちら</a>
            </div>
        </div>
    </div>
</div>
