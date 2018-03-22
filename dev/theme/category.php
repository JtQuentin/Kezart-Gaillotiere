<?php
/*
Page category
*/
?>

<?php get_header();?>

<?php $category = get_the_category(); ?>

<?php
    $args = array(
        'post_type' => 'post',
        'cat' => $category[0]->term_id,
        'orderby' => 'ASC',
        'posts_per_page'=>-1
    );

    $query = new WP_Query( $args );

?>


<section class="section">
    <div class="container">
        <div class="row">
            <div class='col-md-12 filter__result d-flex'>
                <div class='w-50'><?php echo $category[0]->name ?></div>
                <div class='w-50 text-right'><?php echo $category[0]->category_count ?> Résultats</div>
            </div>
        </div>

        <div class="row gutter--min grid search-area" data-postperpage="<?php echo get_option('posts_per_page') ?>" data-totalresult="<?php echo  $category[0]->category_count ?>">
            <?php if ($query->have_posts() ) : while ($query->have_posts() ) : $query->the_post(); ?>

                    <h1 class="title"><?php the_title(); ?></h1>
                    <div class="wp-content">
                    <?php the_content(); ?>
                    </div>

            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
