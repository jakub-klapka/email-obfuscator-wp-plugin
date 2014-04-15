/* global jQuery */
(function($){

	$(document).ready(function(){

		$('.lumi_email_decode').each(function() {
			var t = $(this);
			t.rot13();
			t.attr('href', $.rot13(t.attr('href')));
		});

	});

})(jQuery);