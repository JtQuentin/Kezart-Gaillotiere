<!--
<div class="navbar-head">

	<nav class="navbar navbar-toggleable-md container" id="access" role="navigation">

		<button class="navbar-icon-wrap" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
			<div class="navbar-icon">
				<span class="line line-1"></span>
				<span class="line line-2"></span>
				<span class="line line-3"></span>
			</div>
		</button>

		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand" role="banner">
		</a>

		<div class="text-lg-right w-100">
			<div class="hidden-md-down d-lg-flex justify-content-lg-end">

				<ul class="social list-inline">

					<?php if( get_field('reseaux_sociaux', 'option') ): ?>
						<?php while( has_sub_field('reseaux_sociaux', 'option') ): ?>

							<?php
							$field = get_sub_field_object('reseaux_sociaux_liste');
							$value = get_sub_field('reseaux_sociaux_liste');
							$label = $field['choices'][ $value ];
							?>

							<li class="list-inline-item">
								<a href="<?php the_sub_field('reseau_social_lien'); ?>" target="_blank" title="<?php echo $label; ?>"> <i class="fa fa-<?php echo $value; ?>"></i></a>
							</li>

						<?php endwhile; ?>
					<?php endif; ?>

				</ul>

			</div>

			<div id="bs4navbar" class="collapse navbar-collapse justify-content-md-end">
				<?php
					wp_nav_menu([
					'menu'            => 'menu-head',
					'theme_location'  => 'menu-head',
					'container'       => false,
					'container_class' => '',
					'menu_id'         => false,
					'menu_class'      => 'navbar-nav',
					'depth'           => 2,
					'fallback_cb'     => 'bs4navwalker::fallback',
					'walker'          => new bs4navwalker()
					]);
				?>
			</div>
		</div>

	</nav>
</div>
-->

<nav class="navbar navbar-expand-lg fixed-top custom-navbar">
    <div class="container">
        <div class="logo">
            <a href="#accueil"><img src="/images/logo-auberge-la-gaillotiere@2x.png" alt=""></a>
        </div>
        <div class="navbar-header">
            <button class="navbar-icon-wrap" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <div class="navbar-icon">
				<span class="line line-1"></span>
				<span class="line line-2"></span>
				<span class="line line-3"></span>
			</div>
                  </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-gauche">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="nav-link" href="#accueil">Accueil</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#nos-plats-menus">Nos plats & menus</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#nos-gites">Nos gîtes</a>
                    </li>
                </ul>
            </div>

            <div class="navbar-droite">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="nav-link" href="#contactez-nous">contact & réservations</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a class="nav-link" href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
