<div class="post-entry">

    <div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail( 'medium-large' ); ?>
        </a>
    </div>
    <div class="post-info">
        <div class="date">
            <?php echo get_the_date(); ?>
        </div>
        <a href="<?php the_permalink(); ?>">
            <h1><?php the_title(); ?></h1>

            <div class="excerpt">
                <?php the_excerpt(); ?>
            </div>
        </a>
    </div>

</div>
