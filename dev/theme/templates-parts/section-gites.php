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
	);

	?>

	<div class="container">
	<div class="row text-center">

    	<?php $the_query = new WP_Query( $args_child ); ?>
		<?php if ($the_query->have_posts()) : ?>

            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <?php $the_slug_child = get_post_field( 'post_name', $the_slug->ID ); ?>
            <?php $cpt = 1; ?>

			<section id="<?php echo $the_slug_child; ?>" class="col-lg-6 gites-liste">

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
						<a href="javascript:;" data-src="#modal-<?php echo $the_slug_child; ?>-<?php echo $cpt; ?>" data-fancybox="<?php echo $the_slug_child; ?>" >En savoir +</a>
					</div>
			   	</div>

			<?php

			$modal = get_field('modal');
			$modalCount = count($modal);

				foreach( $modal as $index => $modalSub ) :

				$previousRow = $index == 0? null : $modal[$index - 1];
				$nextRow = $index == ($modalCount - 1)? null : $modal[$index + 1];
				// ACF Vars

				$title = $modalSub['titre'];
				$image = $modalSub['image'];
				$content = $modalSub['content'];
				$previousTitle = $previousRow['titre'];
				$nextTitle = $nextRow['titre'];

				?>

				<section style="display: none;padding:0;" id="modal-<?php echo $the_slug_child; ?>-<?php echo $cpt; ?>" <?php if ($cpt > 1) :?>  data-fancybox="<?php echo $the_slug_child; ?>"  <?php endif; ?> >
						<div class="fancybox-content">
							<div class="modal-img">


								<?php if( $image ):  ?>
									<img src="<?php echo $image['sizes']['non-retina']; ?>"
									srcset="<?php echo $image['sizes']['non-retina']; ?> 1x, <?php echo $image['sizes']['retina']; ?> 2x"
									alt="<?php echo $image['title']; ?>">
								<?php endif; ?>

								<div class="col-xl-6 fancybox-text">
									<div class="fancybox-text-border">
										<h1 class="entry-title"> <?php echo $title; ?> </h1>
										<div class="entry-content">
											<?php echo $content; ?><h1></h1>
										</div>
									</div>
									<div class="modal-btn-nav">
										<?php if($cpt == 1): ?>
										<a href="javascript:;" class="btn" data-fancybox-next><?php echo $nextTitle; ?></a>
										<?php endif; ?>
										<?php if($cpt != 1 && $cpt != $modalCount): ?>
										<a href="javascript:;" class="btn mr-1" data-fancybox-prev><?php echo $previousTitle; ?></a>
										<a href="javascript:;" class="btn ml-1" data-fancybox-next><?php echo $nextTitle; ?></a>
										<?php endif; ?>
										<?php if($cpt == $modalCount): ?>
										<a href="javascript:;" class="btn" data-fancybox-prev><?php echo $previousTitle; ?></a>
										<?php endif; ?>
									</div>
								</div>

							</div>
						</div>

				</section>

           		<?php $cpt++; ?>
            	<?php endforeach; ?>

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

        <div class="container">
            <div class="row imglist">
               <a href=""></a>
                <?php $images = get_field('galerie_gites'); ?>
				<?php if( $images ):  ?>
				<?php foreach( $images as $image ): ?>

				<a href="<?php echo $image['sizes']['non-retina']; ?>" data-fancybox="images" style="background-image:url(<?php echo $image['sizes']['non-retina']; ?>)"></a>

				<?php endforeach; ?>
			<?php endif; ?>
            </div>
        </div>
        <div class="container">
              <?php $images = get_field('galerie_gites'); ?>
               <a href="<?php echo $images['sizes']['non-retina']; ?>" data-fancybox="images" class="btn">Voir la gallerie</a>
                <div style="display:none;">

						<?php if( $images ):  ?>
						<?php foreach( $images as $image ): ?>

						<a href="<?php echo $image['sizes']['non-retina']; ?>" data-fancybox="images" ></a>

						<?php endforeach; ?>
					<?php endif; ?>
                </div>
        </div>


    </section>



        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
        <?php endif; ?>
