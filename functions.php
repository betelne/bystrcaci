<?php

require get_template_directory() . '/inc/function-admin.php'; // custom admin functions
require get_template_directory() . '/inc/custom-post-type.php';
require get_template_directory() . '/inc/shortcodes.php';
require get_template_directory() . '/inc/ajax.php';

function Bystrcaci_enqueue() {
    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    if($_SERVER['SERVER_NAME'] != 'localhost'){
      wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    }
    wp_enqueue_style( 'Open Sans', "https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,700&display=swap&subset=latin-ext");
    // wp_enqueue_style( 'Merriweather', "https://fonts.googleapis.com/css?family=Merriweather:400,700&display=swap");
    wp_enqueue_style( 'Merriweather', "https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,700;1,300&display=swap");
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.2.0/css/all.css');
    wp_enqueue_script( 'bootstrapcdn', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '', true );
}
add_action('wp_enqueue_scripts', 'Bystrcaci_enqueue');

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

register_nav_menus( array(
    'header' => 'Primary Menu',
  ) );


/*
  ==============================================
  Remove empty paragraphs created by wpautop()
  @author Ryan Hamilton
  @link https://gist.github.com/Fantikerz/5557617
  ==============================================
*/

function remove_empty_p( $content ) {
	$content = force_balance_tags( $content );
	$content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
	$content = preg_replace( '~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content );
	return $content;
}
add_filter('the_content', 'remove_empty_p', 20, 1);


/*
    ==============================================
    Register Sidebar and Footer
    ==============================================
*/

function TempehMaster_widgets_init() {
  register_sidebar( array(
    'name'          => 'Sidebar',
    'id'            => 'sidebar-1',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="ttl">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => 'Footer',
    'id'            => 'footer-1',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="ttl">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'TempehMaster_widgets_init' );

/*
    ==============================================
    NavWalker
    ==============================================
*/

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/*
   ==============================================
   Searchbox in Main Menu for Mobile
   ==============================================
*/

function add_search_to_menu($items) {
    $search  = '<li class="mobile-search">';
    $search .= '<form role="search" method="get" id="searchform" action="/">';
    $search .= '<div class="search">';
    $search .= '<input class="searchbox" type="text" value="" name="s" id="s" placeholder="Hledat..." />';
    $search .= '<button class="searchbutton fa fa-search" type="submit" id="searchsubmit" value="Search" />';
    $search .= '</div>';
    $search .= '</form>';
    $search .= '</li>';

    return $items . $search;
}

add_filter('wp_nav_menu_items','add_search_to_menu');

/*
    ==============================================
    Changing Default Excerpt Length
    ==============================================
*/

add_filter( 'excerpt_length', function($length) {
    return 32; // length in number of words
} );

/*
    ==============================================
    Custom Excerpt Length
    ==============================================
*/

function wpex_get_excerpt( $args = array() ) {

	// Defaults
	$defaults = array(
		'post'            => '',
		'length'          => 70,
		'readmore'        => false,
		'readmore_text'   => esc_html__( 'read more', 'text-domain' ),
		'readmore_after'  => '',
		'custom_excerpts' => true,
		'disable_more'    => false,
	);

	// Apply filters
	$defaults = apply_filters( 'wpex_get_excerpt_defaults', $defaults );

	// Parse args
	$args = wp_parse_args( $args, $defaults );

	// Apply filters to args
	$args = apply_filters( 'wpex_get_excerpt_args', $defaults );

	// Extract
	extract( $args );

	// Get global post data
	if ( ! $post ) {
		global $post;
	}

	// Get post ID
	$post_id = $post->ID;

	// Check for custom excerpt
	if ( $custom_excerpts && has_excerpt( $post_id ) ) {
		$output = $post->post_excerpt;
	}

	// No custom excerpt...so lets generate one
	else {

		// Readmore link
		$readmore_link = '<a href="' . get_permalink( $post_id ) . '" class="readmore">' . $readmore_text . $readmore_after . '</a>';

		// Check for more tag and return content if it exists
		if ( ! $disable_more && strpos( $post->post_content, '<!--more-->' ) ) {
			$output = apply_filters( 'the_content', get_the_content( $readmore_text . $readmore_after ) );
		}

		// No more tag defined so generate excerpt using wp_trim_words
		else {

			// Generate excerpt
			$output = wp_trim_words( strip_shortcodes( $post->post_content ), $length );

			// Add readmore to excerpt if enabled
			if ( $readmore ) {

				$output .= apply_filters( 'wpex_readmore_link', $readmore_link );

			}

		}

	}

	// Apply filters and echo
	return apply_filters( 'wpex_get_excerpt', $output );

}

// End of excerpt text (...)

function alx_excerpt_more( $more ) {
    return '&#46;&#46;&#46;';
}
add_filter( 'excerpt_more', 'alx_excerpt_more' );


/*
    ==============================================
    Custom Logo Support
    ==============================================
*/

// add_theme_support( 'custom-logo' );

function custom_logo_setup() {
    $defaults = array(
    'height'      => 50,
    'width'       => 60,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'custom_logo_setup' );


/*
    ==============================================
    Custom Image Size Support
    ==============================================
*/

add_image_size( 'medium-large', 510, 510 );

/*
    ==============================================
    Fix Pagination 404 Error on Archive Pages
    ==============================================
*/

function my_pagination_rewrite() {
    add_rewrite_rule('aktuality/page/?([0-9]{1,})/?$', 'index.php?category_name=aktuality&paged=$matches[1]', 'top');
}
add_action('init', 'my_pagination_rewrite');


?>
