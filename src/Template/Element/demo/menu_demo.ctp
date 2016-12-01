 <div class="navbar-collapse pull-right nav-main-collapse collapse submenu-dark">
  <nav class="nav-main">
    <ul id="topMain" class="nav nav-pills nav-main">
      <li><!-- HOME -->
        <?= $this->Html->link('HOME', ['controller' => 'Pages', 'action' => 'display', 'demos'])?>
      </li>
      <li class="dropdown"><!-- PAGES -->
        <a class="dropdown-toggle" href="#">
          LAYOUTS
        </a>
        <ul class="dropdown-menu">
          <li><?= $this->Html->link('DARK', ['controller' => 'Pages', 'action' => 'display', 'demos', 'layout-dark'])?></li>

        </ul>
      </li>
      <li class="dropdown"><!-- PAGES -->
        <a class="dropdown-toggle" href="#">
          PAGES
        </a>
        <ul class="dropdown-menu">
          <li><?= $this->Html->link('STYLEGUIDE', ['controller' => 'Pages', 'action' => 'display', 'demos', 'styleguide'])?></li>

        </ul>
      </li>
    </ul>
  </nav>
</div>