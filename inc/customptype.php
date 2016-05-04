<?php

function wordcomat_meta_callback( $post ){
   wp_nonce_field( basename( __FILE__ ), 'wordcomat_nonce' );
   $wordcomat_sub_title = get_post_meta( $post->ID, 'wordcomat_sub_titlte', true);
   ?>
   <p class="wordcomat-form">
       <label for="sub-title"><?php _e( 'Subtitle', 'wordcomat' )?></label>
       <input type="text" name="wordcomat_sub_titlte" id="sub-title" value="<?php echo $wordcomat_sub_title; ?>" />
   </p>
   <?php
}

function wordcomat_meta_save( $post_id ){
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'wordcomat_nonce' ] ) && wp_verify_nonce( $_POST[ 'wordcomat_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'wordcomat_sub_titlte' ] ) ) {
        update_post_meta( $post_id, 'wordcomat_sub_titlte', sanitize_text_field( $_POST[ 'wordcomat_sub_titlte' ] ) );
    }
}
?>
