<?php

// Contact Form Shortcode
function tm_contact_form( $atts, $content = null ) {

  // [contact_form]

  // Get the Attributes
  $atts = shortcode_atts(
    array(),
    $atts,
    'contact_form'
  );

  // Return HTML
  ob_start();
  include 'templates/contact-form.php';
  return ob_get_clean();
}

add_shortcode( 'contact_form', 'tm_contact_form' );
