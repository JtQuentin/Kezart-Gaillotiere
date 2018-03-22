<?php
function kz_pagination() {
	if ( is_singular() ) {
		return;
	}

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**    Add current page to the array */
	if ( $paged >= 1 ) {
		$links[] = $paged;
	}

	/**    Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}



//	 Link to first page, plus ellipses if necessary
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active page-item"' : ' class="page-item"';

		printf( // WPCS: XSS OK.
			'<li %s><a class="page-link" href="%s"><i class="fal fa-step-backward" aria-hidden="true"></i></a></li>' . "\n",
		$class,
		esc_url( get_pagenum_link( 1 ) ), '1' );

	}



// Previous Post Link.
	if ( ! in_array( 1, $links ) ) {

		if ( get_previous_posts_link() ) {
			printf( // WPCS: XSS OK.
				'<li class="page-item">%1$s</li> ' . "\n",
			get_previous_posts_link(  // WPCS: XSS OK.
			 '<span class="d-none d-sm-inline">Précédent</span> <i class="fal fa-angle-left" aria-hidden="true"></i>' ) );
		}

		if ( ! in_array( 2, $links ) ) {
			echo '<li class="page-item"></li>';
		}
	}

// Link to current page, plus 2 pages in either direction if necessary.
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active page-item"' : ' class="page-item"';
		printf( // WPCS: XSS OK.
			'<li %s><a href="%s" class="page-link">%s</a></li>' . "\n",
			$class,
			esc_url( get_pagenum_link( $link ) ), $link );
	}

// Next Post Link.
	if ( get_next_posts_link() ) {
		printf( // WPCS: XSS OK.
			'<li class="page-item">%s</li>' . "\n",
			get_next_posts_link( '<span class="d-none d-sm-inline">Suivant</span> <i class="fal fa-angle-right" aria-hidden="true"></i>' ) );
	}



//	Link to last page, plus ellipses if necessary.
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) ) {
			echo '<li class="page-item"></li>' . "\n";
		}

		$class = $paged == $max ? ' class="active "' : ' class="page-item"';
		printf( // WPCS: XSS OK.
			'<li %s><a class="page-link" href="%s" aria-label="Next"><span aria-hidden="true"><i class="fal fa-step-forward" aria-hidden="true"></i></span><span class="sr-only">%s</span></a></li>' . "\n",
		$class . ' page-item 9', esc_url( get_pagenum_link( esc_html( $max ) ) ), esc_html( $max ) );
	}

}

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="page-link"';
}
