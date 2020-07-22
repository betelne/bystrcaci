<?php get_header(); ?>

  <div class="row">

    <div class="col-xs-12 col-md-12 col-xl-10 recent-posts">

      <?php if ( have_posts() ) :?>

        <header>
          <?php printf( __( 'Výsledky vyhledávání pro: %s', 'search' ), '<span>' . get_search_query() . '</span>' ); ?>
        </header>

          <?php
              while ( have_posts() ) : the_post();

                  ?>
                  <div class="fadein-content">

                      <?php get_template_part('content', 'search'); ?>

                  </div>
                  <?php


              endwhile;
          ?>

          <?php
            the_posts_pagination(
              array(
              'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i> Novější',
              'next_text' => 'Starší <i class="fa fa-angle-right" aria-hidden="true"></i>',
              )
            );
          ?>

        <?php else:?>
          <header><?php printf( __( 'Je nám líto, ale nenašli jsme žádné články týkající se tématu: %s', 'search' ), '<span>' . get_search_query() . '</span>' ); ?></header>
            <p class="search-nothing"> Uniklo nám něco ohledně tématu <?php printf( __('%s'), get_search_query() );?>? Dejte nám vědět! :-)</p>
        <?php endif;?>

    </div>

    <!-- <div class="col-xs-12 col-sm-12 col-md-10 col-xl-4 sidebar">
      <?php get_sidebar(); ?>
    </div> -->

  </div>

<?php get_footer(); ?>
