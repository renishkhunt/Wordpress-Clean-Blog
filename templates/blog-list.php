<?php
    $Subtitle = get_post_meta( get_the_ID(), 'wordcomat_sub_titlte', true);
?>
<div class="post-preview">
    <a href="<?php echo get_permalink( get_the_ID() ); ?>">
        <h2 class="post-title">
            <?php the_title(); ?>
        </h2>
        <?php if( !empty($Subtitle) ){ ?>
        <h3 class="post-subtitle">
            <?php echo $Subtitle; ?>
        </h3>
        <?php } ?>
    </a>
    <p class="post-meta">Posted by <?php the_author(); ?> on <?php the_date(" F d, Y "); ?></p>
</div>
<hr>
