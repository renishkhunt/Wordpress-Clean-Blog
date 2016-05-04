<?php

/**
* Adds a meta box to the post|page editing screen
*/
function wordcomat_custom_meta() {
    add_meta_box( 'wordcomat_meta', __( 'Wordcomat', 'wordcomat' ), 'wordcomat_meta_callback', array('post','page') );
}

function portfolio_admin_style() {
    global $post_type;
    if( 'page' == $post_type || 'post' == $post_type )
        wp_enqueue_style( 'portfolio-admin-style', get_stylesheet_directory_uri() . '/css/metabox-admin.css' );
}

?>
