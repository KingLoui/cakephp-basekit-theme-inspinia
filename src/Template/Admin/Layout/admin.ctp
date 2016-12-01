<?php 
    use Cake\Core\Configure;


    $pageTitle = 'BaseKit'; 
    $bodyClasses = [];
    $topNavClasses = [];

    // set the classes according to config
     
    // Sidebar
    if(Configure::read('BaseKitThemeTwentySixteen.Admin.Sidebar.Collapse')) {
        // collapsed menu
        array_push($bodyClasses, 'mini-navbar');
    }
    if(Configure::read('BaseKitThemeTwentySixteen.Admin.Sidebar.Fixed')) {
        // fixed sidebar
        array_push($bodyClasses, 'fixed-sidebar');
    }
    if(Configure::check('BaseKitThemeTwentySixteen.Admin.Sidebar.ShowHideEffect')) {
        // show/hide effects
        if(Configure::read('BaseKitThemeTwentySixteen.Admin.Sidebar.ShowHideEffect') == 'push')
            array_push($bodyClasses, 'sidebar-push');
        else if(Configure::read('BaseKitThemeTwentySixteen.Admin.Sidebar.ShowHideEffect') == 'reveal')
            array_push($bodyClasses, 'sidebar-reveal');  
    }

    // NavTop
    if(Configure::read('BaseKitThemeTwentySixteen.Admin.NavTop.Fixed') 
        && !Configure::read('BaseKitThemeTwentySixteen.Admin.Boxed')) {
        // fixed topnav , only apply if layout is not boxed
        array_push($bodyClasses, 'fixed-nav');  
        array_push($topNavClasses, 'navbar-fixed-top');  
        // style 2
        if(!Configure::read('BaseKitThemeTwentySixteen.Admin.NavTop.FixedFullWidth'))
            array_push($bodyClasses, 'fixed-nav-basic');  
    } else {
        array_push($topNavClasses, 'navbar-static-top');  
    }

    // boxed-layout
    if(Configure::read('BaseKitThemeTwentySixteen.Admin.Boxed')) {
        array_push($bodyClasses, 'boxed-layout'); 
    }

    // skins
    if(Configure::check('BaseKitThemeTwentySixteen.Admin.Skin')) {
        if(Configure::read('BaseKitThemeTwentySixteen.Admin.Skin'))
            array_push($bodyClasses, 'skin-' . Configure::read('BaseKitThemeTwentySixteen.Admin.Skin'));       
    }


    // prepare html for sidebar element classes
    $bodyClassesHTML = '';
    if(!empty($bodyClasses))
    {
        $first = true;
        foreach($bodyClasses as $class) {
            if(!$first)
                $bodyClassesHTML .= ' ';
            else 
                $first = false;
            $bodyClassesHTML .= $class;
        }
    }
    if(!empty($bodyClassesHTML))
        $bodyClassesHTML = ' class="'.$bodyClassesHTML.'"';

    // prepare html for topNav element classes
    $topNavClassesHTML = '';
    if(!empty($topNavClasses))
    {
        $first = true;
        foreach($topNavClasses as $class) {
            $topNavClassesHTML .= ' ';
            $topNavClassesHTML .= $class;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
        <?= $pageTitle ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('KingLoui/BaseKitThemeTwentySixteen.basekit-admin.css') ?>

    <?= $this->Html->css('KingLoui/BaseKitThemeTwentySixteen./plugins/animate/animate.css') ?>
    <?= $this->Html->css('KingLoui/BaseKitThemeTwentySixteen./plugins/font-awesome/4.6.3/css/font-awesome.min.css') ?>
 
    <?php
        $this->prepend('scriptfiles_body', $this->Html->script([
            'KingLoui/BaseKitThemeTwentySixteen./plugins/jquery/jquery-3.1.0.min.js', 
            'KingLoui/BaseKitThemeTwentySixteen./plugins/bootstrap/3.3.7_sass/javascripts/bootstrap.min.js',
            'KingLoui/BaseKitThemeTwentySixteen./plugins/slimscroll/jquery.slimscroll.min.js',
            'KingLoui/BaseKitThemeTwentySixteen./plugins/metismenu/jquery.metisMenu.js',
            'KingLoui/BaseKitThemeTwentySixteen./plugins/pace/pace.min.js',

            'KingLoui/BaseKitThemeTwentySixteen.theme-basekit-admin/theme-basekit-admin.js'
        ]));
    ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script_head') ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body<?= $bodyClassesHTML ?>>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <?php if($headerElement && $headerElement !== "") 
                            echo $this->element($headerElement);
                        ?>
                        <div class="logo-element"><?= $headerLogo ?></div>
                    </li>
                    <?php $this->start('sidebar') ?>
                    <?= $this->Menu->render('menu_admin',[
                        'renderer' => '\KingLoui\BaseKitThemeTwentySixteen\Menu\Renderer\AdminMenuRenderer',
                        'currentClass' => 'active',
                        'ancestorClass' => 'active'
                    ]); ?>
                    <?php $this->end() ?>

                    <?= $this->fetch('sidebar') ?>            
                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="overlay">
            </div>
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top<?= $topNavClassesHTML ?>" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-style-2 btn btn-primary" href="#"><i class="fa fa-bars"></i> </a>
                        <?= $this->Html->link('Frontpage', '/', ['class' => ['navbar-minimalize', 'minimalize-style-2', 'btn', 'btn-default']]) ?>
                    </div>
                    <?php if($topLinksElement !== "") 
                        echo $this->element($topLinksElement);
                    ?>                    
                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?= $this->fetch('title') ?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <?= $this->Html->link('Home', '/admin'); ?>
                        </li>
                        <?= $this->Menu->render('menu_admin',[
                            'renderer' => '\KingLoui\BaseKitThemeTwentySixteen\Menu\Renderer\BreadcrumbsRenderer',
                            'currentClass' => 'active'
                        ]); ?>
                    </ol>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>
    <?= $this->fetch('scriptfiles_body') ?>
    <?= $this->fetch('script_body') ?>
  </body>
</html>