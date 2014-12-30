jQuery(document).ready(function($){
	$('.navigation #findmebest li.search a').toggle(
		function() {
			$('.search-form').fadeIn(100);
		},
		function() {
			$('.search-form').fadeOut(200);
		}
	);
	$(window).load(function() {
	});
});

