<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div class="search">
        <input class="searchbox" type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Hledat..." aria-label="vyhledávací pole"/>
        <button class="searchbutton fa fa-search" type="submit" id="searchsubmit" value="Search" aria-label="vyhledat" />
    </div>
</form>
