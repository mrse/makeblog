<?php

function the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;
	if(strlen($excerpt)>$charlength) {
		$subex = substr($excerpt,0,$charlength-5);
		$exwords = explode(" ",$subex);
		$excut = -(strlen($exwords[count($exwords)-1]));
		if($excut<0) {
			return substr($subex,0,$excut);
		} else {
			return $subex;
		}
		return "...";
		} else {
		return $excerpt;
	}
}


function make_recent_arduino($atts){

	extract(shortcode_atts(array('limit' => 5), $atts));
	$q = new WP_Query('cat=62&posts_per_page=' . $limit);
	$list = '<h4>Latest posts from makezine.com:</h4>';
	while($q->have_posts()) : $q->the_post();
		$list .= '<h2 class="entry-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a>' . '</h2><p>' .the_excerpt_max_charlength(200) . '...</p>';
	endwhile;
	wp_reset_query();
	return $list;
}

add_shortcode('recent_arduino', 'make_recent_arduino');

function make_ad_block_shortcode( $atts, $content = null ) {
	return 	'<div style="width:125px;height:125px;float:right;margin-top:0px;padding:0 10px 5px;"><div id=\'div-gpt-ad-664089004995786621-3\'><script type=\'text/javascript\'>googletag.display(\'div-gpt-ad-664089004995786621-3\');</script></div></div>';
}

add_shortcode( 'ad_block', 'make_ad_block_shortcode' );


function make_projects_newsletter( $atts, $content = null ) {
	return '<form class="form-stacked" action="http://makermedia.createsend.com/t/r/s/qhiiyu/" method="post" id="subForm"><fieldset>		<legend>Sign Up for the "Weekend Projects" Newsletter</legend><div class="clearfix"><label for="name">Name:</label><div class="input">				<input class="xlarge" id="name" name="cm-name" size="30" type="text"></div></div><!-- /clearfix --><div class="clearfix"><label for="qhiiyu-qhiiyu">Email:</label><div class="input"><input class="xlarge" id="qhiiyu-qhiiyu" name="cm-qhiiyu-qhiiyu" size="30" type="text"></div></div><!-- /clearfix --></fieldset><div class="actions"><button type="submit" class="btn primary">Subscribe</button>	</div></form>';
}
add_shortcode( 'weekend_projects', 'make_projects_newsletter' );

function make_newsletter( $atts, $content = null ) {
	return '
		<form class="form-stacked" action="http://makermedia.createsend.com/t/r/s/jjuylk/" method="post" id="subForm">
			<fieldset>
				<legend>Sign up for the Make: Newsletter</legend>
				<div class="clearfix">
					<label for="name">Name:</label>
					<div class="input">
						<input class="xlarge" id="name" name="cm-name" size="30" type="text">
					</div>
				</div>
				<!-- /clearfix -->
				<div class="clearfix">
					<label for="jjuylk-jjuylk">Email:</label>
					<div class="input">
						<input class="xlarge" id="jjuylk-jjuylk" name="cm-jjuylk-jjuylk" size="30" type="text">
					</div>
				</div>
				<!-- /clearfix -->
			</fieldset>
			<div class="actions">
				<button type="submit" class="btn primary">Subscribe</button>
			</div>
		</form>';
}
add_shortcode( 'newsletter', 'make_newsletter' );

function youtube_playlist( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'width' => '370',
		'height' => '208',
	), $atts ) );

	return '<iframe width="' . esc_html($width) . '" height="' . esc_html( $height ) . '" src="'. esc_url( 'http://www.youtube.com/embed/videoseries?list=' . $content . '&amp;hl=en_US' ) .'" frameborder="0" allowfullscreen></iframe>';
}
add_shortcode( 'youtube_playlist', 'youtube_playlist' );

function make_subscribe_iframe( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'page' => 'subscribe',
		'height' => '1000',
	), $atts ) );

	return '<iframe width="100%" height="' . esc_attr( (int)$height ) . '" src="'. esc_url( 'http://espdev.espcomp.net/mk/' . $content . '.aspx?PC=MK' ) .'" frameborder="0"></iframe>';
}
add_shortcode( 'subscribe', 'make_subscribe_iframe' );

function make_printing_guide_blurb() {

	return '<div class="alert alert-info">

			<img src="'.get_stylesheet_directory_uri().'/img/SIP4_Cover_RGB1.jpg" class="thumbnail pull-right" style="width:125px; height: auto;" />

			<h4 style="text-align:center;">MAKE Ultimate Guide To 3D Printing</h4>
			
			<ul>
				<li>3D Printers Buyer\'s Guide</li>
				<li>Get started in 3D</li>
				<li>10 things you need to know</li>
				<li>Best software to use</li>
				<li>How to scan objects</li>
			</ul>
			
			<p><a class="btn btn-primary" href="http://www.makershed.com/Make_Ultimate_Guide_to_3D_Printing_p/1449357377.htm">Buy now!</a></p>

		</div>';
}

add_shortcode( 'printing', 'make_printing_guide_blurb' );