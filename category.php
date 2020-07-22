<?php get_header(); ?>

  <div class="row">

    <div class="col-xs-12 col-md-12 col-xl-10 recent-posts">

          <header>Aktuality</header>

          <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post();?>

                <div class="post-entry fadein-content">

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

            <?php endwhile;
          endif;?>

          <?php
            the_posts_pagination(
              array(
              'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>Novější',
              'next_text' => 'Starší<i class="fa fa-angle-right" aria-hidden="true"></i>',
              )
            );
          ?>

      </div>

    <!-- <div class="col-xs-12 col-md-4 sidebar">
      <?php get_sidebar(); ?>
    </div> -->

  </div>

<?php get_footer(); ?>
