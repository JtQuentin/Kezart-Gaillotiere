<?php
	$the_slug = 'nos-gites';
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
                                <p>
                                    <?php the_field('surtitre') ?>
                                </p>
                            </div>
                            <div class="banner-content">
                                <h1>
                                    <?php the_title(); ?>
                                </h1>
                                <div class="justify-content-center">
                                    <?php the_excerpt(); ?>
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
	); ?>

	<div class="container">
	<div class="row text-center">

    	<?php $the_query = new WP_Query( $args_child ); ?>
		<?php if ($the_query->have_posts()) : ?>

            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
			<section id="<?php echo get_post_field( 'post_name', $the_slug->ID ); ?>" class="col-lg-6 gites-liste">

            	<?php $alt_text = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>
                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'non-retina'); ?>"
                srcset="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'non-retina'); ?> 1x,
                <?php echo get_the_post_thumbnail_url( get_the_ID(), 'retina'); ?> 2x"
                alt="<?php echo $alt_text; ?>">

                <div class="description">
					<div class="d-flex justify-content-center gites-titre">
						<h1 class="entry-title"><?php echo get_the_title(); ?></h1>
					</div>
					<div class="entry-content gites-description">
						<?php the_content(); ?>
						<a href="javascript:;" data-src="#modal_<?php echo get_the_ID(); ?>" data-fancybox="<?php echo get_post_field( 'post_name', $the_slug->ID ); ?>" >En savoir +</a>
					</div>
			   	</div>

				<?php if( have_rows('modal') ):	while( have_rows('modal') ): the_row(); ?>
				<section style="display: none;padding:0;" id="modal_<?php echo get_the_ID(); ?>">

						<div class="fancybox-content">
							<div class="modal-img">

								<?php $image = get_sub_field('image'); ?>
								<?php if( $image ):  ?>
									<img src="<?php echo $image['sizes']['non-retina']; ?>"
									srcset="<?php echo $image['sizes']['non-retina']; ?> 1x, <?php echo $image['sizes']['retina']; ?> 2x"
									alt="<?php echo $image['title']; ?>">
								<?php endif; ?>

								<div class="col-xl-6 fancybox-text">
									<div class="fancybox-text-border">
										<h1 class="entry-title"> <?php the_sub_field('titre'); ?> </h1>
										<div class="entry-content">
											<?php the_sub_field('content'); ?>
										</div>
									</div>
									<div class="d-flex justify-content-center modal-btn-nav">
										<a href="javascript:;" class="btn" data-fancybox-next>Tarifs</a>
									</div>
								</div>

							</div>
						</div>

				</section>
            <?php endwhile; ?>
            <?php endif; ?>

            <?php if( have_rows('tarifs') ): while( have_rows('tarifs') ): the_row(); ?>
            <section style="display: none;padding:0;" data-fancybox="<?php echo get_post_field( 'post_name', $the_slug->ID ); ?>">

            	<div class="fancybox-content">
            			<div class="modal-img">

                   			<?php $image = get_sub_field('image_tarifs'); ?>
							<?php if( $image ):  ?>
								<img src="<?php echo $image['sizes']['non-retina']; ?>"
								srcset="<?php echo $image['sizes']['non-retina']; ?> 1x, <?php echo $image['sizes']['retina']; ?> 2x"
								alt="<?php echo $image['title']; ?>">
							<?php endif; ?>

                    		<div class="col-xl-6 fancybox-text">
                                <div class="fancybox-text-border">
                                    <h1 class="entry-title"> <?php the_sub_field('titre_tarifs'); ?> </h1>
                                    <div class="entry-content">
                                        <?php the_sub_field('tarifs_content'); ?>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center modal-btn-nav">
                                    <a href="javascript:;" class="btn" data-fancybox-prev>Description</a>
                                </div>
                            </div>

            			</div>
            		</div>

            </section>
            <?php endwhile; ?>
            <?php endif; ?>

            </section>


        <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
			 </div>
		</div>

<?php $the_query = new WP_Query( $args ); ?>
<?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <section class="container gites-content">
            <div class="row">
                <div class="col-sm-9 order-sm-2">
                    <?php the_content(); ?>
                </div>
                <div class="col-sm-3 text-center order-sm-1 d-flex align-items-center">
                    <div class="logos d-flex flex-sm-column">
                        <div class="logo-gites-de-france">
                            <img src="/images/logo-gitesdefrance@2x.png" alt="">
                        </div>
                        <div class="logo-wifi">
                            <img src="/images/logo-wifigratuit@2x.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--<div class="container">
            <div class="row imglist">
                <a href="/images/44g108241_gr1_debailly_001.jpg" data-fancybox="images" style="background-image:url(../../images/44g108241_gr1_debailly_001.jpg)"></a>
                <a href="/images/44g108241_gr1_debailly_002.jpg" data-fancybox="images" style="background-image:url(../../images/44g108241_gr1_debailly_002.jpg)"></a>
                <a href="/images/44g108241_gr1_debailly_003.jpg" data-fancybox="images" style="background-image:url(../../images/44g108241_gr1_debailly_003.jpg)"> </a>
                <a href="/images/44g108241_gr1_debailly_004.jpg" data-fancybox="images" style="background-image:url(../../images/44g108241_gr1_debailly_004.jpg)"></a>
                <a href="/images/44g108241_gr1_debailly_005.jpg" data-fancybox="images" style="background-image:url(../../images/44g108241_gr1_debailly_005.jpg)"></a>
                <a href="/images/44g108241_gr1_debailly_006.jpg" data-fancybox="images" style="background-image:url(../../images/44g108241_gr1_debailly_006.jpg"></a>
            </div>
        </div>-->


    </section>



        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
        <?php endif; ?>
