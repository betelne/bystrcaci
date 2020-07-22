<?php get_header(); ?>

  <div class="row">

    <div class="col-xs-12 col-md-10 contact-page article-full">

      <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>

          <h1><?php the_title(); ?></h1>
          <div class="fadein-content">
              <?php the_content(); ?>
          </div>

        <?php endwhile;
      endif;?>

    </div>

  </div>

<?php get_footer(); ?>
