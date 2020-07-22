<?php get_header(); ?>

  <div class="row">

    <div class="col-xs-12 col-md-12 col-xl-10">

      <div class="featured-post scalein-content">

        <?php
        $i=1;
        if (have_posts()) :
            while (have_posts()) : the_post();
                if ($i == 1){
                ?>

                <a href="<?php the_permalink(); ?>">

                    <div class="post-entry">

                            <div class="bg-picture">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail( 'large' );
                                } else {
                                    ?>
                                    <div class="picture-blank">
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>

                            <div class="post-info">

                                <div class="date">
                                    <span><?php echo get_the_date( 'l, j. F' ); ?></span>
                                </div>

                                <!-- <a href="<?php the_permalink(); ?>"> -->

                                    <h1>
                                        <?php the_title(); ?>
                                    </h1>
                                    <div class="excerpt">
                                        <?php echo wpex_get_excerpt() ?>
                                    </div>

                                <!-- </a> -->

                            </div>
                    </div>

                </a>

        <?php } else { ?>

      </div>

      <div class="recent-posts fadein-content">


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
                                    <?php echo wpex_get_excerpt() ?>
                                </div>

                            </a>

                        </div>

                    </div>


              <?php } $i++; ?>
              <?php endwhile; ?>

          <?php endif; ?>

      </div>

      <div class="col-xs-6 text-center mt-5">
          <a href="<?php get_site_url() ?> /aktuality">
              <div class="btn">
                  Všechny příspěvky
              </div>
          </a>
      </div>

    </div>

    <!-- <div class="col-xs-12 col-sm-12 col-md-10 col-xl-3 order-xl-2 sidebar">
      <?php get_sidebar(); ?>
    </div> -->

  </div>

<?php get_footer(); ?>
