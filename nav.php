<nav class="navbar navbar-expand-md" role="navigation">
  <div class="container col-xl-12">

    <div class="brand">

        <div class="brand-logo">
            <?php
                if ( function_exists( 'the_custom_logo' ) ) {
                 the_custom_logo();
                }
            ?>
        </div>

        <div class="brand-name">
            <a class="navbar-brand" href="<?php echo site_url(); ?>">
                Bystrčáci
            </a>
        </div>

    </div>

    <!-- Brand and toggle get grouped for better mobile display -->
    <button id="burgerBtn" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </button>

    <?php
    wp_nav_menu( array(
      'theme_location'  => 'header',
      'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
      'container'       => 'div',
      'container_class' => 'collapse navbar-collapse', // hamburger menu
      'container_id'    => 'bs-example-navbar-collapse-1',
      'menu_class'      => 'navbar-nav mr-auto',
      'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
      'walker'          => new WP_Bootstrap_Navwalker(),
    ) ); ?>

  </div>
</nav>
