<?php 
  $user = $this->request->session()->read('Auth.User');
?>

<div id="topBar">
  <div class="container">
    <!-- right -->
    <ul class="top-links list-inline pull-right">
      <?php if($user): ?>
      <li class="text-welcome">Welcome to BaseKit, <strong><?= $user['username'] ?></strong></li>
      <li>
        <a class="dropdown-toggle no-text-underline" data-toggle="dropdown" href="#"><i class="fa fa-user hidden-xs"></i> MY ACCOUNT</a>
        <ul class="dropdown-menu">
          <li><?= $this->Html->link('<i class="fa fa-user"></i>' . __('My Account'), '/profile', ['escape' => false])?></li>
          <li class="divider"></li>
          <li><?= $this->Html->link('<i class="glyphicon glyphicon-off"></i>' . __('LOGOUT'), '/logout', ['escape' => false])?></li>
        </ul>
      </li>
      <li><?= $this->Html->link('<i class="fa fa-cog"></i>', '/admin', ['escape' => false])?></li>
      <?php else: ?>
      <li><?= $this->Html->link(__('Login') . ' <i class="fa fa-sign-in"></i>', '/login', ['escape' => false])?></li>
      <li><?= $this->Html->link(__('Create Account'), ['controller' => 'Users', 'action' => 'register']) ?></li>
      <?php endif; ?>
    </ul>

    <!-- left -->
    <ul class="top-links list-inline">
      <li><a href="page-faq-1.html">THEME DOCUMENTATION</a></li>
      <li>
        <a class="dropdown-toggle no-text-underline" data-toggle="dropdown" href="#"><img class="flag-lang" src="<?= $this->Url->image('/img/theme-basekit-default/flags/us.png') ?>" width="16" height="11" alt="lang" /> ENGLISH</a>
        <ul class="dropdown-langs dropdown-menu">
          <li><a tabindex="-1" href="#"><img class="flag-lang" src="<?= $this->Url->image('/img/theme-basekit-default/flags/us.png') ?>" width="16" height="11" alt="lang" /> ENGLISH</a></li>
          <li class="divider"></li>
          <li><a tabindex="-1" href="#"><img class="flag-lang" src="<?= $this->Url->image('/img/theme-basekit-default/flags/de.png') ?>" width="16" height="11" alt="lang" /> GERMAN</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>