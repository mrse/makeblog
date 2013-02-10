jQuery(document).ready(function(){
	jQuery('#tabs div').click(function() {
		var id = jQuery(this).attr('id');
		jQuery('.tab-content div#js-' + id).slideDown();
		jQuery('.tab-content div:not(#js-' + id + ')').slideUp();
		googletag.pubads().refresh();
		_gaq.push(['_trackPageview']);
	});
});