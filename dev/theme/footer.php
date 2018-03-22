</main>

<footer>
    <!--<section class="navbar-footer">
		<nav class="navbar navbar-toggleable container" role="navigation">
				<?php
					wp_nav_menu([
					'menu'            => 'menu-footer',
					'theme_location'  => 'menu-footer',
					'container'       => 'div',
					'container_id'    => false,
					'container_class' => 'navbar-collapse justify-content-center',
					'menu_id'         => false,
					'menu_class'      => 'navbar-nav',
					'depth'           => 2,
					'fallback_cb'     => 'bs4navwalker::fallback',
					'walker'          => new bs4navwalker()
					]);
				?>
		</nav>
	</section>

	<section class="informations">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3">
					<h4>Texte</h4>
					<div class="mt-auto mb-auto">
					Texte
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<h4>Texte</h4>
					<div class="mt-auto mb-auto">
					Texte 1
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<h4>Texte</h4>
					<div class="mt-auto mb-auto">
					Texte 1
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<h4>Suivez-nous</h4>
					<div class="mt-auto mb-auto">
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
				</div>
			</div>
		</div>
	</section>

	<section class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-8 text-center text-md-left">
					© <time datetime="<?php the_time('Y') ?>" pubdate><?php the_time('Y') ?></time>
					<?php the_field('entreprise_nom', 'option'); ?> | Tous droits réservés
				</div>
				<div class="col-md-4 text-center text-md-right">
					Site réalisé par <a href="http://kezart.com" target="_blank">Kézart</a>
				</div>
			</div>
		</div>
	</section>
-->

    <div class="text-center footer-logo">
        <img src="/images/logo-auberge-la-gaillotiere@2x.png" alt="">
    </div>
    <nav class="navbar">
        <ul class="navbar-nav navbar-footer">
            <li class="nav-item">
                <span class="navbar-text">Copyright © 2018</span>
            </li>
            <li class="nav-item">
                <span class="navbar-text"><a href="#">Mentions légales</a></span>
            </li>
            <li class="nav-item">
                <span class="navbar-text"><a href="#">Site map</a></span>
            </li>
            <li class="nav-item">
                <span class="navbar-text">Site réalisé par <a href="http://kezart.com">Kézart</a></span>
            </li>
        </ul>
    </nav>
</footer>

<footer class="wp-footer">
    <?php wp_footer(); ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
</footer>

</body>

</html>
