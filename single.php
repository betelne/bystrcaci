<?php get_header(); ?>

  <div class="row">

    <!-- Article full -->
    <div class="col-md-10 article-full">

      <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>


            <h1><?php the_title(); ?></h1>

            <div class="intro-picture scalein-content">
                <?php the_post_thumbnail( 'large' ); ?>
            </div>

            <div class="post-info col-md-12 col-lg-8 offset-lg-2">

                <div class="author-face">
                  <?php echo get_avatar( get_the_author_meta('ID'), '48' ); ?>
                </div>

                <div class="name-date">

                    <div class="post-author">
                      <?php the_author(); ?>
                    </div>

                    <div class="date">
                        <span><?php echo get_the_date(); ?></span>
                    </div>

                </div>

            </div>

            <div class="post-tags col-md-12 col-lg-8 offset-lg-2">
                <?php the_tags( '', '', '' ); ?>
            </div>

            <div class="text col-md-12 col-lg-8 offset-lg-2">
                <?php the_content(); ?>
                <div class="text-end text-center">
                    ~
                </div>
            </div>


            <div class="posts-links col-md-12 col-lg-8 offset-lg-2">

                <div class="next-post">
                    <?php if (strlen(get_next_post()->post_title) > 0) { ?>

                        <div class="wrapper">
                            <div class="nav-left">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                            </div>
                            <div class="post-link">
                                <?php next_post_link('%link'); ?>
                            </div>
                        </div>

                    <?php } ?>
                </div>

                <div class="prev-post">
                    <?php if (strlen(get_previous_post()->post_title) > 0) { ?>

                        <div class="wrapper">
                            <div class="post-link">
                                <?php previous_post_link('%link'); ?>
                            </div>
                            <div class="nav-right">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </div>
                        </div>

                    <?php } ?>
                </div>

            </div>

            <!-- Articles Navigation -->
            <?php
                // $nextPost = get_next_post();
                $prevPost = get_adjacent_post('', '', true);
                $nextPost = get_adjacent_post('', '', false);
                $prevThumbnail = get_the_post_thumbnail( $prevPost->ID, 'thumbnail' );
                $nextThumbnail = get_the_post_thumbnail( $nextPost->ID, 'thumbnail' );
            ?>

            <?php if (strlen(get_next_post()->post_title) > 0) { ?>

            <a href="<?php echo get_permalink( $nextPost->ID ); ?>">
                <div class="article-nav next-article">
                    <div class="wrapper">
                        <div class="post-thumbnail">
                            <?php next_post_link( $nextThumbnail ); ?>
                        </div>

                        <div class="post-link">
                            <?php echo $nextPost->post_title; ?>
                        </div>
                    </div>
                    <div class="nav-arrow">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                    </div>
                </div>
            </a>
            <?php } ?>

            <?php if (strlen(get_previous_post()->post_title) > 0) { ?>

            <a href="<?php echo get_permalink( $prevPost->ID ); ?>">
                <div class="article-nav prev-article">
                    <div class="nav-arrow">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </div>
                    <div class="wrapper">
                        <div class="post-thumbnail">
                            <?php previous_post_link( $prevThumbnail ); ?>
                        </div>

                        <div class="post-link">
                            <?php echo $prevPost->post_title; ?>
                        </div>
                    </div>
                </div>
            </a>
            <?php } ?>

        <?php endwhile;
      endif;?>

    </div>
    <!-- End of Article full -->



    <!-- <div class="col-xs-12 col-md-4 sidebar">
    <?php get_sidebar(); ?>
    </div> -->



    <!-- Related Posts -->
    <div class="col-12">
    <?php
        $orig_post = $post;
        global $post;
        $tags = wp_get_post_tags($post->ID);

        if ($tags) {
            $tag_ids = array();
            foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
            $args = array(
                'tag__in' => $tag_ids,
                'post__not_in' => array($post->ID),
                'posts_per_page' => 4, // Number of related posts to display.
                'caller_get_posts' => 1
            );

            $my_query = new wp_query( $args );

            if( $my_query->have_posts() ) { // Show only if there are related posts
    ?>

        <h3 class="col-12">Související články</h3>
        <div class="related-posts">

            <?php
                while( $my_query->have_posts() ) {
                    $my_query->the_post();

            ?>

                <div class="related-post col-sm-6 col-lg-3">
                    <a href="<?php the_permalink()?>">
                        <?php the_post_thumbnail( 'medium-large' ); ?>
                        <h4><?php the_title(); ?></h4>
                    </a>
                </div>

            <?php } ?>

        </div>
        <?php
            }
        }

        $post = $orig_post;
        wp_reset_query();
        ?>
    </div>
    <!-- End of Related Posts -->


  </div>


<?php get_footer(); ?>
