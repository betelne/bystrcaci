<h1>Bystrcaci Contact Form</h1>
<?php settings_errors(); ?>

<p>Use this <strong>shortcode</strong> to activate the Contact Form inside a Page or a Post</p>
<p><code>[contact_form]</code></p>

<form method="post" action="options.php">
  <?php settings_fields( 'tm-contact-options' ); ?>
  <?php do_settings_sections( 'tempehmaster_contact_form' ); ?>
  <?php submit_button(); ?>
</form>
