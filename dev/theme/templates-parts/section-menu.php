<?php
	$the_slug = 'nos-plats-menus';
	$args = array(
			'pagename' => $the_slug
		);
	$the_query = new WP_Query( $args );
?>


    <section id="<?php echo $the_slug; ?>">

        <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

        <section class="banniere">
            <div class="d-flex align-items-center">
                <div class="container banner">
                    <div class="row justify-content-md-center">
                        <div class="col-lg-8">
                            <div class="d-flex justify-content-start banner-head">
                               <p><?php the_field('surtitre') ?></p>
                            </div>
                            <div class="banner-content justify-content-center">
                                <h1>
                                    <?php the_title(); ?>
                                </h1>
                                <div class="row justify-content-center">
                                    <div class="col-9 col-sm-6">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $image = get_field('image_banniere'); ?>
                <?php if( $image ):  ?>

                <img src="<?php echo $image['sizes']['non-retina']; ?>" srcset="<?php echo $image['sizes']['non-retina']; ?> 1x, <?php echo $image['sizes']['retina']; ?> 2x" alt="<?php echo $image['title']; ?>">

                <?php endif; ?>
            </div>
        </section>

        <?php endwhile; ?>
		<?php else : ?>
		<?php endif; ?>

    <?php
	$child_of_slug = get_page_by_path( $the_slug );
	$args_child = array(
		'post_parent' => $child_of_slug->ID,
		'post_type' => 'page',
		'orderby' => 'menu_order',
		'posts_per_page' => -1,
	);

	?>

		<ul class="nav justify-content-center" role="tablist">
        <?php $cpt = 0; ?>
		<?php $the_query = new WP_Query( $args_child ); ?>
		<?php if ($the_query->have_posts()) : ?>

            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <?php $the_slug_child = get_post_field( 'post_name', $the_slug->ID ); ?>


           	<li class="nav-item nav-menu">
                <h1>
                    <a   class="nav-link <?php if($cpt == 0): ?> active <?php endif; ?>" data-toggle="tab" href="#<?php echo $the_slug_child ?>" role="tab"><?php the_title(); ?></a>
                </h1>
            </li>
		 	<?php $cpt++; ?>



			<?php endwhile; ?>
       </ul>
      		<?php $cpt = 0; ?>
      		<div class="tab-content">

       		<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
			<?php $the_slug_child = get_post_field( 'post_name', $the_slug->ID ); ?>

       				<div class="container tab-pane <?php if($cpt == 0): ?> active <?php endif; ?>" id="<?php echo $the_slug_child ?>" role="tabpanel">

       						<?php if( have_rows('premiere_ligne') ): ?>
       							<?php while( have_rows('premiere_ligne') ): the_row(); ?>
       							<div class="row">
       								<div class="col-xl-9">
       									<div class="row text-center">
       										<?php if( have_rows('menu_repeteur') ): ?>
       											<?php while( have_rows('menu_repeteur') ): the_row(); ?>
       												<div class="col-sm-6 col-md-4 col-menu">
														<div class="bordure">
															<div class="d-flex justify-content-center menu-titre">
																<h1><?php the_sub_field('titre'); ?></h1>
															</div>
															<div class="col menu-content">
																<h2><?php the_sub_field('menu_titre'); ?></h2>
																<h1><?php the_sub_field('menu_prix'); ?>€</h1>
																<p><?php the_sub_field('menu_contenu'); ?></p>
															</div>
       													</div>
													</div>
												<?php endwhile; ?>
											<?php endif; ?>

										</div>
       								</div>
      								<div class="col-xl-3 col-menu col-menu-img">
										<div class="col">
											<?php $image = get_sub_field('image_ligne_menu'); ?>
											<?php if( $image ):  ?>
												<img class="rounded-circle" src="<?php echo $image['sizes']['non-retina']; ?>"
												srcset="<?php echo $image['sizes']['non-retina']; ?> 1x, <?php echo $image['sizes']['retina']; ?> 2x"
												alt="<?php echo $image['title']; ?>">
											<?php endif; ?>
										</div>
									</div>
      							</div>
       							<?php endwhile; ?>
       						<?php endif; ?>

       						<div class="container">
       							<div class="row text-center">
								<?php if( have_rows('carte_des_plats') ): ?>
									<?php while( have_rows('carte_des_plats') ): the_row(); ?>
										<div class="col-lg-6 pl-0 pr-0">
										<?php if( have_rows('plat_repeteur') ): ?>
												<?php while( have_rows('plat_repeteur') ): the_row(); ?>

													<div class="carte-head">
														<div class="d-flex justify-content-center carte-titre">
															<h1><?php the_sub_field('type_de_plat'); ?></h1>
														</div>
														<div class="carte-content">
															<p><?php the_sub_field('les_plats'); ?></p>
														</div>
                            						</div>

												<?php endwhile; ?>
											<?php endif; ?>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>

								<?php if( have_rows('les_autres_menus') ): ?>
									<?php while( have_rows('les_autres_menus') ): the_row(); ?>
										<div class="col-lg-6 col-droite">
                            				<div class="row">

												<div class="col-sm-6 col-menu col-menu-salade-marche">
													<?php if( have_rows('menu_colonne_gauche') ): ?>
														<?php while( have_rows('menu_colonne_gauche') ): the_row(); ?>

															<div class="bordure menu-droite">
																<div class="d-flex justify-content-center menu-titre">
																	<h1><?php the_sub_field('titre'); ?></h1>
																</div>
																<div class="col menu-content">
																	<h2><?php the_sub_field('menu_titre'); ?></h2>
																	<h1><?php the_sub_field('menu_prix'); ?>€</h1>
																	<p><?php the_sub_field('menu_contenu'); ?></p>
																</div>
															</div>

														<?php endwhile; ?>
													<?php endif; ?>
												</div>

												<div class="col-sm-6 col-menu">
													<?php if( have_rows('menu_colonne_droite') ): ?>
														<?php while( have_rows('menu_colonne_droite') ): the_row(); ?>

															<div class="bordure menu-droite">
																<div class="d-flex justify-content-center menu-titre">
																	<h1><?php the_sub_field('titre'); ?></h1>
																</div>
																<div class="col menu-content">
																	<h2><?php the_sub_field('menu_titre'); ?></h2>
																	<h1><?php the_sub_field('menu_prix'); ?>€</h1>
																	<p><?php the_sub_field('menu_contenu'); ?></p>
																</div>
															</div>

														<?php endwhile; ?>
													<?php endif; ?>
													<div class="col menu-droite menu-content">
														<p><?php the_sub_field('asterisque') ?></p>
													</div>
												</div>


												<div class="col">
													<div class="menu-droite menu-droite-img">

														<?php $image = get_sub_field('image_menus_droite'); ?>
														<?php if( $image ):  ?>
															<img src="<?php echo $image['sizes']['non-retina']; ?>"
															srcset="<?php echo $image['sizes']['non-retina']; ?> 1x, <?php echo $image['sizes']['retina']; ?> 2x"
															alt="<?php echo $image['title']; ?>">
														<?php endif; ?>

													</div>
												</div>

											</div>
									 	</div>
									<?php endwhile; ?>
								<?php endif; ?>

								</div>
							</div>
      			</div>

       			<?php $cpt++; ?>
       		<?php endwhile; ?>
       		</div>

        <?php else : ?>
        <?php endif; ?>


    </section>
