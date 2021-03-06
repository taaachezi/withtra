<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['bootstrap.min','normalize.min', 'milligram.min', 'cake']) ?>
    <?= $this->Html->script('bootstrap.min'); ?>
    <?= $this->Html->script('top'); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav position-fixed bg-white" style="z-index: 1; width: 100%;" id="header">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>With</span>Tra</a>
            <span>　ユーザ名：<?= $is_login ? $current_user->name : "ゲスト" ?></span>
        </div>

        <div class="top-nav-links">
            <?php if ($is_login): ?>
                <?= $this->Html->link(__('募集する'), ['controller'=> 'Collects', 'action' => 'add'], ['class' => 'text-white button float-right']) ?>
                <a href="<?= $this->Url->build('/users/logout') ?>"><span>ログアウト</span></a>
            <?php else: ?>
                <a href="<?= $this->Url->build('/users/login') ?>"><span>ログイン</span></a>    
            <?php endif; ?>
        </div>
    </nav>
        <div class="container" id="content">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
