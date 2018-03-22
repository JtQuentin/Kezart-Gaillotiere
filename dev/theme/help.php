$ npm rm -g gulp
$ npm install -g gulp-cli
$ gulp -v
$ npm uninstall gulp --save-dev
$ npm install 'gulpjs/gulp.git#4.0' --save-dev

<!-- Wordpress -->
<?php
	$the_slug = 'slug-de-la-page';
	$args = array(
			'pagename' => $the_slug
		);
	$the_query = new WP_Query( $args );
?>


<section id="<?php echo $the_slug; ?>">

	<?php if ($the_query->have_posts()) : ?>
	<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

		<?php echo get_the_title(); ?>
		<?php echo get_the_content(); ?>
		<?php echo get_the_excerpt(); ?>

		<?php the_title(); ?>
		<?php the_content(); ?>
		<?php the_excerpt(); ?>

		<picture>
			<?php $alt_text = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>
			<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'non-retina'); ?>"
			 srcset="
				<?php echo get_the_post_thumbnail_url( get_the_ID(), 'non-retina'); ?> 1x,
				<?php echo get_the_post_thumbnail_url( get_the_ID(), 'retina'); ?> 2x
				"
			 alt="<?php echo $alt_text; ?>">
		</picture>


	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	<?php else : ?>
	<?php endif; ?>


	<?php
	$child_of_slug = get_page_by_path( $the_slug );
	$args = array(
		'post_parent' => $child_of_slug->ID,
		'post_type' => 'page',
		'orderby' => 'menu_order',
		'posts_per_page' => -1,
	);
	?>

	<?php $the_query = new WP_Query( $args ); ?>
	<?php if ($the_query->have_posts()) : ?>


				<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
				<section id="<?php echo get_post_field( 'post_name', $the_slug->ID ); ?>" class="">

					<h2 class="entry-title"><?php echo get_the_title(); ?></h2>
					<div class="entry-content"><?php echo get_the_excerpt(); ?></div>

					<a href="javascript:;" data-src="#modal_<?php echo get_the_ID(); ?>" data-fancybox="<?php echo $the_slug; ?>" >En savoir +</a>

					<section style="display: none;" id="modal_<?php echo get_the_ID(); ?>">
						<h2 class="entry-title"><?php echo get_the_title(); ?></h2>
						<div class="entry-content"><?php the_content(); ?></div>
                    </section>

				</section>
				<?php endwhile; ?>


	<?php wp_reset_postdata(); ?>
	<?php else : ?>
	<?php endif; ?>


</section>
<!-- /Wordpress -->


<!-- ACF Group -->
	<?php if( have_rows('group') ):	while( have_rows('group') ): the_row(); ?>
		<?php the_sub_field('title'); ?>
		<?php the_sub_field('content'); ?>


		<?php $image = get_sub_field('image'); ?>
		<?php if( $image ):  ?>

			<picture>
				<img src="<?php echo $image['sizes']['non-retina']; ?>"
					srcset="<?php echo $image['sizes']['non-retina']; ?> 1x, <?php echo $image['sizes']['retina']; ?> 2x"
					alt="<?php echo $image['title']; ?>">
			</picture>

		<?php endif; ?>


		<?php $images = get_sub_field('image'); ?>
		<?php if( $images ):  ?>
		<?php foreach( $images as $image ): ?>

				<picture>
					<img src="<?php echo $image['sizes']['non-retina']; ?>"
					 srcset="<?php echo $image['sizes']['non-retina']; ?> 1x, <?php echo $image['sizes']['retina']; ?> 2x"
					 alt="<?php echo $image['title']; ?>">
				</picture>

		<?php endforeach; ?>
	<?php endif; ?>
<!-- /ACF Group -->



<!-- ACF Direct -->
		<?php the_field('title'); ?>
		<?php the_field('content'); ?>

		<?php $image = get_field('image'); ?>
		<?php if( $image ):  ?>

			<picture>
				<img src="<?php echo $image['sizes']['non-retina']; ?>"
					srcset="<?php echo $image['sizes']['non-retina']; ?> 1x, <?php echo $image['sizes']['retina']; ?> 2x"
					alt="<?php echo $image['title']; ?>">
			</picture>

		<?php endif; ?>

		<?php $images = get_field('image'); ?>
		<?php if( $images ):  ?>
		<?php foreach( $images as $image ): ?>

			<picture>
				<img src="<?php echo $image['sizes']['non-retina']; ?>"
				 srcset="<?php echo $image['sizes']['non-retina']; ?> 1x, <?php echo $image['sizes']['retina']; ?> 2x"
				 alt="<?php echo $image['title']; ?>">
			</picture>

		<?php endforeach; ?>
		<?php endif; ?>
<!-- /ACF Direct -->


<!-- Actu -->
<?php
	$lastposts = get_posts( array(
		'posts_per_page' => 4,
		'cat' => -1
	) );
?>
<?php if ( $lastposts ): ?>
<?php foreach ( $lastposts as $post ) : setup_postdata( $post ); ?>

	<section class="post-content">
		<h2 class="entry-title"><?php echo get_the_title(); ?></h2>
		<time datetime="<?php the_date( 'd/m/Y' ); ?>" class="post-date">
			<span class="date-day"><?php echo get_the_date( 'd' ); ?></span>
			<span class="date-month"><?php echo get_the_date( 'M' ); ?>.</span>
			<span class="date-year"><?php echo get_the_date( 'Y' ); ?></span>
		</time>
		<div class="entry-content"><?php echo get_the_excerpt(); ?></div>
		<a href="<?php echo get_permalink(); ?>" class="more">En savoir +</a>
	</section>

<?php endforeach; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<!-- /Actu -->








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
						<div class="d-flex justify-content-center modal-btn-nav">
							<?php if($cpt == 1): ?>
							<a href="javascript:;" class="btn" data-fancybox-next><?php echo $nextTitle; ?></a>
							<?php endif; ?>
							<?php if($cpt != 1 && $cpt != $modalCount): ?>
							<a href="javascript:;" class="btn" data-fancybox-prev><?php echo $previousTitle; ?></a>
							<a href="javascript:;" class="btn" data-fancybox-next><?php echo $nextTitle; ?></a>
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




<?php

$modal = get_field('modal');
$modalCount = count($modal);

	foreach( $modal as $index => $modalSub ) :

	$previousRow = $index == 0? null : $modal[$index - 1];
	$nextRow = $index == ($modalCount - 1)? null : $modal[$index + 1];
	// ACF Vars
	$previousTitle = $previousRow['titre'];
	$nextTitle = $nextRow['titre'];
	?>
	<?php endforeach; ?>

<?php if( have_rows('modal') ):	?>
<?php while( have_rows('modal') ): the_row(); ?>
<?php $last = count(get_field('modal')); ?>
<section style="display: none;padding:0;" id="modal-<?php echo $the_slug_child; ?>-<?php echo $cpt; ?>" <?php if ($cpt > 1) :?>  data-fancybox="<?php echo $the_slug_child; ?>"  <?php endif; ?> >
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
						<?php if($cpt == 1): ?>
						<a href="javascript:;" class="btn" data-fancybox-next>next</a>
						<?php endif; ?>
						<?php if($cpt != 1 && $cpt != $last): ?>
						<a href="javascript:;" class="btn" data-fancybox-prev>prev </a>
						<a href="javascript:;" class="btn" data-fancybox-next>next</a>
						<?php endif; ?>
						<?php if($cpt == $last): ?>
						<a href="javascript:;" class="btn" data-fancybox-prev>prev</a>
						<?php endif; ?>
					</div>
				</div>

			</div>
		</div>

</section>

<?php $cpt++; ?>
<?php endwhile; ?>
<?php endif; ?>
