<?php

/**
* Adds a meta box to the post|page editing screen
*/
add_action( 'add_meta_boxes', 'wordcomat_custom_meta' );
add_action( 'save_post', 'wordcomat_meta_save' );

add_action( 'admin_print_styles-post-new.php', 'portfolio_admin_style', 11 );
add_action( 'admin_print_styles-post.php', 'portfolio_admin_style', 11 );

?>
