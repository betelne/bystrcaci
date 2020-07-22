<?php get_header(); ?>

<div class="row page-not-found">

  <div class="col-md-12">
    <div class="error-404">404 - Stránka nebyla nalezena</div>
    <div class="error-msg">

        <p>
            Omlouváme se, ale požadovaná stránka bohužel nebyla nalezena. Pravděpodobně nastala jedna z následujících situací:
        </p>

        <ul>
            <li>byla špatně napsána www adresa (překlep, zastaralá oblíbená položka atp.),</li>
            <li>odkaz z výsledků vyhledávače byl zastaralý,</li>
            <li>interní odkaz v rámci aktuálního webu byl neplatný,</li>
            <li>odkaz z jiného webu byl zastaralý nebo neplatný.</li>
        </ul>

    </div>

    <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
        <div class="search">
            <input class="searchbox" type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Zkuste hledat tady..." />
            <button class="searchbutton fa fa-search" type="submit" id="searchsubmit" value="Search" />
        </div>
    </form>

  </div>

  <!-- <div class="col-lg-12">
    <?php get_sidebar(); ?>
  </div> -->

</div>

<?php get_footer(); ?>
