<div class="full-menu">
	<nav id="menu" class="menu" role="navigation">
			<?php
				wp_nav_menu([
				'menu'            => 'menu-footer',
				'theme_location'  => 'menu-footer',
				'container'       => false,
				'container_id'    => false,
				'container_class' => false,
				'menu_id'         => false,
				'menu_class'      => false,
				'depth'           => 2,
				'fallback_cb'     => 'bs4navwalker::fallback',
				'walker'          => new bs4navwalker()
				]);
			?>
	</nav>
</div>
<div class="hamburguer">
		<div class="lines line-top"></div>
		<div class="lines line-mid"></div>
		<div class="lines line-bottom"></div>
</div>
