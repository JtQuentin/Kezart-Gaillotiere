<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php get_template_part( 'templates-parts/head' );?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header id="accueil">
        <?php get_template_part( 'templates-parts/navbar' );?>
        <?php get_template_part( 'templates-parts/slider' );?>
    </header>

    <?php
    global $post;
    $post_slug=$post->post_name;
?>

        <main id="<?php echo $post_slug; ?>">
