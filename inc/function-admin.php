<?php

// Activate Custom Settings
add_action( 'admin_init', 'tm_custom_settings' );

function tm_add_admin_page() {
  // Generate TempehMaster Admin Page
  add_menu_page( 'TempehMaster Theme Options', 'Bystrcaci', 'manage_options', 'tempehmaster', 'tm_create_page', '', 110 );

  // Generate TempehMaster Admin Sub Pages
  add_submenu_page( 'tempehmaster', 'TempehMaster Theme Options', 'General', 'manage_options', 'tempehmaster', 'tm_create_page' );

  add_submenu_page( 'tempehmaster', 'TempehMaster Contact Form', 'Contact Form', 'manage_options', 'tempehmaster_contact_form', 'tm_contact_page' );

  // Activate Custom Settings
  add_action( 'admin_init', 'tm_custom_settings' );
}
add_action( 'admin_menu', 'tm_add_admin_page');

function tm_create_page() {
  // generation of our admin page
  require_once( get_template_directory() . '/inc/templates/tempehmaster-admin.php' );
}

function tm_contact_page() {
  // generation of our admin page
  require_once( get_template_directory() . '/inc/templates/tempehmaster-contact-form.php' );
}

function tm_custom_settings() {

  // Contact Form Options
  register_setting( 'tm-contact-options', 'activate_contact' );

  add_settings_section( 'tm-contact-section', 'Contact Form', 'tm_contact_section', 'tempehmaster_contact_form' );

  add_settings_field( 'activate-form', 'Activate Contact Form', 'tm_activate_contact', 'tempehmaster_contact_form', 'tm-contact-section' );
}

function tm_contact_section() {
  echo 'Activate or Deactivate the Built-in Contact Form';
}

function tm_activate_contact() {
  $options = get_option( 'activate_contact' );
  $checked = ( @$options == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" id="custom_header" name="activate_contact" value="1" '.$checked.' /></label>';
}
