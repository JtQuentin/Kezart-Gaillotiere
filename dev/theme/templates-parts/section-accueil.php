<?php
	$the_slug = 'accueil';
	$args = array(
			'pagename' => $the_slug
		);
	$the_query = new WP_Query( $args );
?>


    <section class="intro hentry" id="<?php echo $the_slug; ?>">

        <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>



        <div class="container text-center intro-head">
            <h1 class="entry-title">
                <?php the_field('entreprise_description', 'option'); ?>
            </h1>
            <h2 class="entry-content">
                <?php the_field('entreprise_adresse', 'option') ?>
            </h2>
            <h3 class="entry-content">
                <?php the_field('entreprise_telephone', 'option') ?>
            </h3>
            <h4 class="entry-content">
                <?php the_field('entreprise_info_complementaire', 'option') ?>
            </h4>
        </div>
        <div class="intro-content container">
            <section class="row no-gutters align-items-stretch">
                <div class="col-lg col-tl">
                    <?php $image = get_field('image_haut'); ?>
                    <?php if( $image ):  ?>

                    <img src="<?php echo $image['sizes']['non-retina']; ?>" srcset="<?php echo $image['sizes']['non-retina']; ?> 1x, <?php echo $image['sizes']['retina']; ?> 2x" alt="<?php echo $image['title']; ?>">

                    <?php endif; ?>
                </div>
                <div class="col-lg text-center col-tr d-flex align-items-center" style="background-image: url(../../images/element-blockquote@2x.png)">
                    <div class="col col-tr-content">
                        <h3 class="entry-title">
                            <?php the_field('titre_haut'); ?>
                        </h3>
                        <div class="entry-content">
                            <?php the_field('texte_haut'); ?>
                        </div>
                    </div>
                </div>
            </section>
            <section class="row no-gutters">
                <div class="col-lg col-bl d-flex align-items-center" style="background-image: url(../../images/element-blockquote@2x.png)">
                    <div class="col col-bl-content">
                        <h3 class="entry-title">
                            <?php the_field('titre_bas'); ?>
                        </h3>
                        <div class="entry-content">
                            <?php the_field('texte_bas'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-br">

                    <?php $image = get_field('image_bas'); ?>
                    <?php if( $image ):  ?>

                    <img src="<?php echo $image['sizes']['non-retina']; ?>" srcset="<?php echo $image['sizes']['non-retina']; ?> 1x, <?php echo $image['sizes']['retina']; ?> 2x" alt="<?php echo $image['title']; ?>">

                    <?php endif; ?>


                </div>
            </section>
        </div>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
        <?php endif; ?>
    </section>
