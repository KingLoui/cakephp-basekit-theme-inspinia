<?php 
	$this->extend('baselayout'); 
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?= $this->fetch('title') ?></h2>
        <ol class="breadcrumb">
            <li>
                <?= $this->Html->link('Home', '/admin'); ?>
            </li>
            <?= $this->Menu->render('menu_admin',[
                'renderer' => '\KingLoui\BaseKitThemeInspinia\Menu\Renderer\BreadcrumbsRenderer',
                'currentClass' => 'active'
            ]); ?>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
</div>