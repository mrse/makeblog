jQuery(document).ready(function(){
	jQuery('#tabs div').click(function() {
		var id = jQuery(this).attr('id');
		jQuery('.tab-content div#js-' + id).slideDown();
		jQuery('.tab-content div:not(#js-' + id + ')').slideUp();
		googletag.pubads().refresh();
		_gaq.push(['_trackPageview']);
		console.log('Pushed a pageview, like a boss.');
	});
	jQuery('.next a').click(function() {
		var id = jQuery(this).attr('id');
		jQuery('.tab-content div#js-' + id).slideDown();
		jQuery('.tab-content div:not(#js-' + id + ')').slideUp();
		googletag.pubads().refresh();
		_gaq.push(['_trackPageview']);
		console.log('Pushed a pageview, like a boss.');
	});
	jQuery('.all').click(function() {
		jQuery('.tab-content div').slideDown();
		jQuery('.next').hide();
		googletag.pubads().refresh();
		_gaq.push(['_trackPageview']);
		console.log('Pushed a pageview, like a boss.');
	});

	jQuery('.carousel').on('slide', function () {
		googletag.pubads().refresh();
		_gaq.push(['_trackPageview']);
		console.log('Pushed a pageview, and an ad refresh, like a boss.');
		jQuery('.carousel').carousel('pause');
	});
});