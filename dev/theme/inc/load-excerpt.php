<?php

/* En savoir plus */
function zekario_excerpt_more( $link ) {
    if ( is_admin() ) {
        return $link;
    }

    $link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
        esc_url( get_permalink( get_the_ID() ) ),
        sprintf( __( 'En savoir plus<span class="screen-reader-text"> "%s"</span>', 'zekario' ), get_the_title( get_the_ID() ) )
    );
    return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'zekario_excerpt_more' );



/* Ajout excerpt dans les pages */
function add_excerpt_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'add_excerpt_to_pages' );


/* Excerpt */
add_filter( 'get_the_excerpt', 'wpautop' );
