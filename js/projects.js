jQuery(document).ready(function(){
	jQuery('#tabs li.steps').click(function() {
		jQuery(this).addClass('current');
		var id = jQuery(this).attr('id');
		jQuery('#steppers div#js-' + id).slideDown().removeClass('hide').addClass('active');
		jQuery('#steppers div:not(#js-' + id + ')').slideUp();
		jQuery('#tabs li:not(#' + id + ')').removeClass('current');
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
	jQuery('.nexter').click(function() {
		var id = jQuery(this).attr('id');
		jQuery('#steppers div#js-' + id).slideDown().removeClass('hide');
		jQuery('#steppers div:not(#js-' + id + ')').slideUp();
		jQuery(this).addClass('current');
		jQuery('#tabs li#' + id).addClass('current');
		jQuery('#tabs li:not(#' + id + ')').removeClass('current');
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
	jQuery('.aller').click(function() {
		jQuery('#steppers').children().slideDown();
		jQuery('#steppers .nexter').hide();
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
	jQuery('.thumbs').click(function () {
		var mydata = jQuery(this).data();
		jQuery('#' + mydata.loc + ' .main').attr('src', mydata.src );
	});
});