jQuery(function() {
(function ($) {

	// humble! Humizile Akisment "activate your account" extra-color message; http://bit.ly/wordpress-akismet
	message = $('form[name=akismet_activate]').parent ('.updated');
	message.removeClass ('updated').addClass ('error');
	message.css ({ padding: '', margin: '', border: '', background: '' })

})(jQuery);
});