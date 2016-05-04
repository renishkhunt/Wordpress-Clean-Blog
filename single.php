<?php
/**
 * Template Name: Blog page
 *
 * @package Wordcomat
 * @subpackage wordcoamt_clearnblog
 * @since Wordcomat 1.0
 */
get_header();
$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
if( !isset($image[0]) && empty($image) ){
    $image[0] = get_template_directory_uri()."/img/home-bg.jpg";
}
$Subtitle = get_post_meta( get_the_ID(), 'wordcomat_sub_titlte', true);
?>
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('<?php echo $image[0]; ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1><?php echo get_the_title( get_the_ID() ); ?></h1>
                    <?php if( !empty($Subtitle) ){ ?>
                    <hr class="small">
                    <span class="subheading"><?php echo $Subtitle; ?></span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <?php
    		// Start the loop.
    		while ( have_posts() ) : the_post();

    			// Include the page content template.
    			get_template_part( 'templates/content', 'page' );

    			// If comments are open or we have at least one comment, load up the comment template.
    			if ( comments_open() || get_comments_number() ) {
    				comments_template();
    			}

    			// End of the loop.
    		endwhile;
    		?>
        </div>
    </div>
</div>

<?php
get_footer();
?>
