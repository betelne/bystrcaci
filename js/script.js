jQuery(document).ready(function($){

	/* init functions */
	revealPosts();

	/* Mobile Menu - Navbar */
	$('.navbar-toggler').click(function(){
		$(this).toggleClass('open');
		$('body').toggleClass('no-scroll');
		// $('.navbar-overlay').fadeToggle(300);
	});

	var burgerBtn = document.getElementById('burgerBtn');
	var bodyContent = document.getElementById('bodyContent');

	burgerBtn.addEventListener('click', function() {
	  bodyContent.classList.toggle('navigation');
	}, false);

	/* Toggle Person Info */
	var aboutBtn = $('div.person-about-btn');

	aboutBtn.click(function(){
		var about = $(this).parent('div').find('div.person-about');
		$(this).toggleClass('open');
	    $(about).toggleClass('closed');
	});

	/* Helper functions */
	function revealPosts(){

		var main = $('.scalein-content:not(.reveal)');
		var j = 0;

		setInterval(function(){

			if( j >= main.length ) return false;

			var el = main[i];
			$(el).addClass('reveal');

			j++

		}, 120);

		var posts = $('.fadein-content:not(.reveal)');
		var i = 0;

		setInterval(function(){

			if( i >= posts.length ) return false;

			var el = posts[i];
			$(el).addClass('reveal');

			i++

		}, 120);

	}

	function isVisible(element){

		var scroll_pos = $(window).scrollTop();
		var window_height = $(window).height();
		var el_top = $(element).offset().top;
		var el_height = $(element).height();
		var el_bottom = el_top + el_height;
		return ( (el_bottom - el_height*0.25 > scroll_pos ) && (el_top < (scroll_pos+0.5*window_height)) );

	}

	/* Contact Form */
	$( '.form-control' ).keyup(function() {
	  if( $(this).val() ) {
	     $(this).addClass('not-empty');
	  } else {
	     $(this).removeClass('not-empty');
	  }
	});

	/* Contact Form Submission */
	$('#contactForm').on('submit', function(e){

		e.preventDefault();

		$('.is-invalid').removeClass('is-invalid');
		$('.js-show-feedback').removeClass('js-show-feedback');

		var form = $(this),
				name = form.find('#name').val(),
				email = form.find('#email').val(),
				message = form.find('#message').val(),
				ajaxurl = form.data('url');

		if ( name === '' ){
			$('#name').addClass('is-invalid');
			return;
		}

		if ( email === '' ){
			$('#email').addClass('is-invalid');
			return;
		}

		if ( message === '' ){
			$('#message').addClass('is-invalid');
			return;
		}

		$('.data-policy').addClass('data-policy-hidden');
		$('.js-form-submission').addClass('js-show-feedback');

		var ajaxurl = $(this).data('url');

		$.ajax({
			url: ajaxurl,
			type: 'post',
			data: {
				name: name,
				email: email,
				message: message,
				action: 'tm_save_user_contact_form'
			},
			error: function(response){
				$('.js-form-submission').removeClass('js-show-feedback');
				$('.js-form-error').addClass('js-show-feedback');
				form.find('input, button, textarea').removeAttr('disabled');
			},
			success: function(response){
				if(response == 0){

					setTimeout(function(){
						$('.js-form-submission').removeClass('js-show-feedback');
						$('.js-form-error').addClass('js-show-feedback');
						form.find('input, button, textarea').removeAttr('disabled');
					}, 1500);

				} else {

					setTimeout(function(){
						$('.js-form-submission').removeClass('js-show-feedback');
						$('.js-form-success').addClass('js-show-feedback');
						form.find('input, button, textarea').removeAttr('disabled').val('');
					}, 1500);

				}
			}

		});

	});


});
