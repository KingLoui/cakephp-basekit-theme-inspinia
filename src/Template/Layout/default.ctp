<?php $this->extend('baselayout') ?>

<?php $this->assign('before_title', 'BaseKit: ') ?>

<?php /*
    SIDEBAR CONTENT 
    This is wrapped by a Metismenu
*/?>
<?php $this->start('sidebar') ?>
	<li class="nav-header">
	    <?php if($headerElement && $headerElement !== "") 
	        echo $this->element($headerElement);
	    ?>
	    <div class="logo-element"><?= $headerLogo ?></div>
	</li>
	<?= $this->Menu->render('menu_admin',[
	    'renderer' => '\KingLoui\BaseKitThemeInspinia\Menu\Renderer\AdminMenuRenderer',
	    'currentClass' => 'active',
	    'ancestorClass' => 'active'
	]); ?>
<?php $this->end() ?>
<?php /*
    MAIN PAGE CONTENT 
*/?>
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