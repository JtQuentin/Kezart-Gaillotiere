<?php
/*
Template Name: Page Archive
*/
?>

<?php get_header(); ?>

<section class="section">
    <div class="container">

        <h1 class="title"><?php the_title(); ?></h1>
        <div class="wp-content">
            <?php the_content(); ?>
        </div>

        <?php if($post_query->max_num_pages > 1) : ?>
            <div class="pagination d-flex justify-content-center">
                <div class="pagination__controller">
                    <?php
                        echo paginate_links( array(
                            'total' => $post_query->max_num_pages,
                            'current' => max(1, $paged),
                            'prev_text'          => __('<i class="fa fa-angle-left" aria-hidden="true"></i>'),
                            'next_text'          => __('<i class="fa fa-angle-right" aria-hidden="true"></i>')
                        ));
                    ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
