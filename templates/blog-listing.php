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
    $image[0] = get_template_directory_uri()."img/home-bg.jpg";
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
              // set up or arguments for our custom query
              $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
              $numLimit = get_option('posts_per_page', 15);
              $query_args = array(
                'post_type' => 'post',
                'posts_per_page' => $numLimit,
                'paged' => $paged
              );
              // create a new instance of WP_Query
              $the_query = new WP_Query( $query_args );
            ?>

            <?php if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                        get_template_part( 'templates/blog', 'list' );
                    endwhile; ?>

            <?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
              <!-- Pager -->
              <ul class="pager">
                  <li class="pull-right">
                      <?php echo get_next_posts_link( 'Next Page', $the_query->max_num_pages ); // display older posts link ?>
                  </li>
                  <li class="pull-left">
                      <?php echo get_previous_posts_link( 'Previous Page' ); // display newer posts link ?>
                  </li>
              </ul>
            <?php } ?>

            <?php else: ?>
              <div class="post-preview">
                <h2>Sorry...</h2>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
              </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php
get_footer();
?>
