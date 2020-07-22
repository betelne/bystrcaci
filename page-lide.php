<?php get_header(); ?>

  <div class="row">

    <div class="col-xs-12 col-md-10 page-full">

      <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>

          <h1><?php the_title(); ?></h1>
          <div class="intro-picture scalein-content">
              <?php the_post_thumbnail( 'medium' ); ?>
          </div>
          <div class="text col-xl-10 offset-xl-1">
              <div class="fadein-content">
                  <?php the_content(); ?>
              </div>

          </div>

        <?php endwhile;
      endif;?>

    </div>

  </div>

<?php get_footer(); ?>
