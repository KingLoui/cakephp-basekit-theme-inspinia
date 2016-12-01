<div id="header" class="sticky header-md dark clearfix">
	<header id="topNav">
	  <div class="container">
	    <!-- Mobile Menu Button -->
	    <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
	      <i class="fa fa-bars"></i>
	    </button>
	    
	    <!-- Logo -->
	    <?= $this->Html->link('BaseKit', ['plugin' => false, 'controller' => 'Pages', 'action' => 'display', 'home'], ['class' => 'logo pull-left'])?>

	    <!-- Navigation -->
	    <div class="navbar-collapse pull-right nav-main-collapse collapse submenu-dark">
	      <nav class="nav-main">
	        <ul id="topMain" class="nav nav-pills nav-main">
	          <li><!-- HOME -->
	            <?= $this->Html->link('HOME', ['plugin' => false, 'controller' => 'Pages', 'action' => 'display', 'home'])?>
	          </li>
	          <li><!-- THEME -->
	            <?= $this->Html->link('THEME', '#', ['class' => 'dropdown-toggle'])?>
	            <ul class="dropdown-menu">
	              <li><?= $this->Html->link('THEME SETTINGS', ['plugin' => false, 'controller' => 'Pages', 'action' => 'display', 'themesettings'])?></li>
	              <li><?= $this->Html->link('DEMOS', ['plugin' => false, 'controller' => 'Pages', 'action' => 'display', 'demos'])?></li>
	            </ul>
	          </li>
	        </ul>
	      </nav>
	    </div>
	  </div>
	</header>
</div>