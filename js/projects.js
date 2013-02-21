jQuery(document).ready(function(){
	jQuery('#tabs div').click(function() {
		var id = jQuery(this).attr('id');
		jQuery('.tab-content div#js-' + id).slideDown();
		jQuery('.tab-content div:not(#js-' + id + ')').slideUp();
		googletag.pubads().refresh();
		_gaq.push(['_trackPageview']);
		console.log('Pushed a pageview, like a boss.');
		urlref = location.href;
		PARSELY.beacon.trackPageView({
			url: urlref,
			urlref: urlref,
			js: 1,
			action_name: "Step Clicked"
		});
		return true;
	});
	jQuery('.next a').click(function() {
		var id = jQuery(this).attr('id');
		jQuery('.tab-content div#js-' + id).slideDown();
		jQuery('.tab-content div:not(#js-' + id + ')').slideUp();
		googletag.pubads().refresh();
		_gaq.push(['_trackPageview']);
		console.log('Pushed a pageview, like a boss.');
		urlref = location.href;
		PARSELY.beacon.trackPageView({
			url: urlref,
			urlref: urlref,
			js: 1,
			action_name: "Next Project Step"
		});
		return true;
	});
	jQuery('.all').click(function() {
		jQuery('.tab-content div').slideDown();
		jQuery('.next').hide();
		googletag.pubads().refresh();
		_gaq.push(['_trackPageview']);
		console.log('Pushed a pageview, like a boss.');
		urlref = location.href;
		PARSELY.beacon.trackPageView({
			url: urlref,
			urlref: urlref,
			js: 1,
			action_name: "View all on the projects"
		});
		return true;
	});
	jQuery('.carousel').on('slid', function () {
		googletag.pubads().refresh();
		_gaq.push(['_trackPageview']);
		console.log('Pushed a pageview, and an ad refresh, like a boss.');
		urlref = location.href;
		PARSELY.beacon.trackPageView({
			url: urlref,
			urlref: urlref,
			js: 1,
			action_name: "Next Slide"
		});
		return true;
	});
});