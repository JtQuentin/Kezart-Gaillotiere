<?php
/*
Page single
*/
?>

<?php get_header(); ?>
<?php
    global $post;
    $post_slug=$post->post_name;
?>
<section id="<?php echo $post_slug; ?>">
	<div class="container">
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

		<article class="hentry">
			<header>
				<h1 class="entry-title">
					<?php the_title(); ?>
				</h1>
				<div class="entry-meta">
					<span class="meta-prep meta-prep-author">Publié le</span>
					<time pubdate datetime="<?php the_time(DATE_W3C); ?>"><?php the_time('l j F Y') ?></time>
					<span class="author vcard"><?php the_author(); ?></span>
				</div>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer class="entry-footer">
				catégories, tags, commentaires ...
			</footer>
		</article>

		<?php endwhile; ?>
		<?php else : ?>
		<?php endif; ?>
	</div>
</section>
<?php get_footer(); ?>
