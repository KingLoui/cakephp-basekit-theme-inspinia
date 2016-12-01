<?php
$pageTitle = 'BaseKit Theme Inspinia';
?>
<!DOCTYPE html>
<!--[if IE 8]>      <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>      <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
  <head>
    <meta charset="utf-8" />
    <title>
      <?= $pageTitle ?>:
          <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <!-- mobile settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <?= $this->Html->css('KingLoui/BaseKitThemeInspinia.basekit-default.css') ?>

    <?= $this->Html->css('KingLoui/BaseKitThemeInspinia./plugins/slider.swiper/dist/css/swiper.min.css') ?>
    <?= $this->Html->css('KingLoui/BaseKitThemeInspinia./plugins/font-awesome/4.6.3/css/font-awesome.min.css') ?>

    <?=
      $this->Html->script(
      [
          //'KingLoui/BaseKitThemeInspinia./plugins/jquery/jquery-3.1.0.min.js', 
          'KingLoui/BaseKitThemeInspinia./plugins/jquery/jquery-2.1.4.min.js',
          'KingLoui/BaseKitThemeInspinia./plugins/bootstrap/3.3.7_sass/javascripts/bootstrap.min.js',
          'KingLoui/BaseKitThemeInspinia./plugins/slider.swiper/dist/js/swiper.min.js',
          'KingLoui/BaseKitThemeInspinia.theme-basekit-default/theme-basekit-default.js',
          'KingLoui/BaseKitThemeInspinia.theme-basekit-default/view/demo.swiper_slider.js',
      ], 
      ['block' => 'scriptfiles_body'])
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
  <body class="smoothscroll enable-animation">

    <!-- wrapper -->
    <div id="wrapper">
      <!-- top bar -->
      <?= $this->Element('topbar') ?>
      <!-- /top bar -->

      <!-- header -->
      <?= $this->Element('header') ?>
      <!-- /header -->

      <!-- content -->
      <?= $this->fetch('content') ?>
      <!-- /content -->
    </div>
    <!-- /wrapper -->

    <!-- scroll to top -->
    <a href="#" id="toTop"></a>

    <!-- preloader -->
    <div id="preloader">
      <div class="inner">
        <span class="loader"></span>
      </div>
    </div>

    <!-- scripts -->
    <script type="text/javascript">var plugin_path = '/king_loui/base_kit_theme_inspinia/plugins/';</script>
    <?= $this->fetch('scriptfiles_body') ?>
    <?= $this->fetch('script_body') ?>
  </body>
</html>