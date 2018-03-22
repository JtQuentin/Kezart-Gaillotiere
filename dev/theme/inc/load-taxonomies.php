<?php
// Register Taxonomy enseigne
function enseigne() {
    $labels = array(
        'name'                       => _x( 'Enseignes', 'Taxonomy General Name', 'hierarchical_tags' ),
        'singular_name'              => _x( 'Enseignes', 'Taxonomy Singular Name', 'hierarchical_tags' ),
        'menu_name'                  => __( 'Enseignes', 'hierarchical_tags' ),
        'all_items'                  => __( 'Toutes les enseignes', 'hierarchical_tags' ),
        'add_new_item'               => __( 'Ajouter une enseigne', 'hierarchical_tags' ),
        'edit_item'                  => __( 'Editer une enseigne', 'hierarchical_tags' ),
        'update_item'                => __( 'Mettre à jour l\'enseigne', 'hierarchical_tags' ),
        'view_item'                  => __( 'Voir item', 'hierarchical_tags' ),
        'add_or_remove_items'        => __( 'Ajouter ou supprimer une enseigne', 'hierarchical_tags' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'enseigne', array( 'post' ), $args );
}
add_action( 'init', 'enseigne', 0 );
