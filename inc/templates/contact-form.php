<form id="contactForm" class="needs-validation" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>" novalidate>

  <div class="form-group">
    <input type="text" class="form-control" id="name" name="name" required>
    <label class="label" for="name">Jméno</label>
    <div class="invalid-feedback">Prosím, napište zde své jméno.</div>
  </div>

  <div class="form-group">
    <input type="email" class="form-control" id="email" name="email" required>
    <label class="label" for="name">Email</label>
    <div class="invalid-feedback">Prosím, napište zde svou emailovou adresu.</div>
  </div>

  <div class="form-group">
    <textarea name="message" id="message" class="form-control" rows="7" required></textarea>
    <label class="label" for="name">Zpráva</label>
    <div class="invalid-feedback">Prosím, napište zde svou zprávu.</div>
  </div>

  <div class="text-center">
    <button type="submit" class="btn">Odeslat</button>

    <p class="data-policy">Odesláním zprávy souhlasíte se zpracováním osobních údajů.</p>
    <p class="text-info form-feedback-msg js-form-submission">Zpráva se odesílá, vyčkejte prosím...</p>
    <p class="text-success form-feedback-msg js-form-success">Zpráva odeslána, děkujeme!</p>
    <p class="text-danger form-feedback-msg js-form-error">Něco se pokazilo, zkuste to prosím znovu.</br>Vaše zpráva nebyla odeslána.</p>
  </div>

</form>
