<?php
    get_header();
?>
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <hr class="small">
                    <span class="subheading">A Clean Blog Theme by Start Bootstrap</span>
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
    			get_template_part( 'templates/blog', 'list' );

                // End of the loop.
    		endwhile;
    		?>
            <!-- Pager -->
            <ul class="pager">
                <li class="pull-right">
                    <?php echo get_next_posts_link( 'Next Page' ); // display older posts link ?>
                </li>
                <li class="pull-left">
                    <?php echo get_previous_posts_link( 'Previous Page' ); // display newer posts link ?>
                </li>
            </ul>

        </div>
    </div>
</div>
<?php
    get_footer();
?>
