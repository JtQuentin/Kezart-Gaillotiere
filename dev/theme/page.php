<?php
/*
Page default
*/
?>

<?php get_header(); ?>

<?php
    global $post;
    $post_slug = $post->post_name;
?>

<section class="<?php echo $post_slug; ?>">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                    <div class="container hentry">
                    	<h1 class="entry-title"><?php the_title(); ?></h1>
                    	<div class="entry-content"><?php the_content(); ?></div>
                    </div>
            <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
</section>

<?php get_footer(); ?>
