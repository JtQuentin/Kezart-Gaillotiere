<?php
	$the_slug = 'contactez-nous';
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
                            <div class="banner-content">
                                <h1>
                                    <?php the_title(); ?>
                             </h1>
                                <div class="justify-content-center">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="map"></div>
                <script>
                    function initMap() {
                        var isDraggable = $(document).width() > 480 ? true : false;
                        var map = new google.maps.StreetViewPanorama(document.getElementById('map'), {
                            position: {
                                lat: 47.1304888,
                                lng: -1.4329773
                            },
                            pov: {
                                heading: 175,
                                pitch: 0
                            },
                            zoom: 1,
                            draggable: isDraggable,
                            scrollwheel: false
                        });
                    }

                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFqA0klyWuqKmSvUHlpBpFh4lpO0VW1qw&callback=initMap" async defer></script>
            </div>
        </section>


        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 formulaire">
                    <p>Pour réserver une table, merci de remplir le fomulaire ci-dessous</p>
                    <p>nous vous contacterons en retour pour confirmer votre réservation</p>
                </div>

                <div class="col-md-6 col-lg-5 p-0">
					<div class="infos-img">
						<?php $image = get_field('image_infos'); ?>
						<?php if( $image ):  ?>
							<img src="<?php echo $image['sizes']['non-retina']; ?>"
							srcset="<?php echo $image['sizes']['non-retina']; ?> 1x, <?php echo $image['sizes']['retina']; ?> 2x"
							alt="<?php echo $image['title']; ?>">
						<?php endif; ?>
					</div>
					<div class="infos">
						<ul class="list-unstyled text-white">
							<li class="media mt-4 ml-4">
								<div class="media-left">
									<i class="fas fa-map-marker-alt"></i>
								</div>
								<p><?php the_field('entreprise_adresse', 'option'); ?></p>
							</li>
							<li class="media ml-4">
								<div class="media-left">
									<i class="fas fa-phone" data-fa-transform="flip-h"></i>
								</div>
								<p><?php the_field('entreprise_telephone', 'option'); ?></p>
							</li>
							<li class="media ml-4">
								<div class="media-left">
									<i class="fas fa-envelope"></i>
								</div>
								<p><?php the_field('entreprise_email', 'option'); ?></p>
							</li>
							<li class="media ml-4">
								<div class="media-left">
									<i class="far fa-clock"></i>
								</div>
								<p><?php the_field('entreprise_info_complementaire', 'option'); ?></p>
							</li>
						</ul>
					</div>
                </div>
            </div>
        </div>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
        <?php endif; ?>
    </section>
