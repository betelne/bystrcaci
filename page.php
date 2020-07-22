<?php get_header(); ?>

  <div class="row">

    <div class="col-xs-12 col-md-10 page-full">

      <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>

          <h1><?php the_title(); ?></h1>
          <div class="intro-picture scalein-content">
              <?php the_post_thumbnail( 'large' ); ?>
          </div>
          <div class="text col-md-12 col-lg-8 offset-lg-2 fadein-content">
              <?php the_content(); ?>
          </div>

        <?php endwhile;
      endif;?>

    </div>

    <!-- <div class="col-xs-12 col-md-4 sidebar">
    <?php get_sidebar(); ?>
    </div> -->

  </div>

<?php get_footer(); ?>
