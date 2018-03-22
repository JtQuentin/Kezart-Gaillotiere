<?php
	$lastposts = get_posts( array(
		'posts_per_page' => 4,
		'cat' => -1
	) );
?>

<div class="swiper-container">

    <div class="swiper-wrapper">
	<?php if ( $lastposts ): ?>
	<?php foreach ( $lastposts as $post ) : setup_postdata( $post ); ?>

        <div class="swiper-slide">

                <div class="container banner">
                    <div class="row justify-content-md-center">
                        <div class="col-lg-8">
                            <div class="d-flex justify-content-start banner-head">
                                <p><?php $category = get_the_category( $id ); echo $category[0]->cat_name;?></p>
                            </div>
                            <div class="banner-content">
                                <h1 class="entry-title"><?php echo get_the_title(); ?></h1>
                            </div>
                            <div class="d-flex justify-content-end banner-end">
                                <a href="<?php echo get_permalink(); ?>" class="more">En savoir +</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $alt_text = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>
                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'non-retina'); ?>"
                srcset="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'non-retina'); ?> 1x,
                <?php echo get_the_post_thumbnail_url( get_the_ID(), 'retina'); ?> 2x"
                alt="<?php echo $alt_text; ?>">
        </div>

	<?php endforeach; ?>
   	<?php wp_reset_postdata(); ?>
	<?php endif; ?>
    </div>

	<!-- Add Pagination -->
	<div class="swiper-pagination swiper-pagination-white"></div>
	<!-- Add Arrows -->
	<div class="swiper-button-next swiper-button-white"></div>
	<div class="swiper-button-prev swiper-button-white"></div>

</div>
