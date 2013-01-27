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
	return 	'<div style="width:125px;height:125px;float:right;margin-top:0px;padding:0 10px 5px;"><div id=\'div-gpt-ad-664089004995786621-5\'><script type=\'text/javascript\'>googletag.display(\'div-gpt-ad-664089004995786621-5\');</script></div></div>';
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

function make_marketron_newsletter( $atts, $content = null ) {
	return '
		<form class="form-stacked" action="http://makermedia.createsend.com/t/r/s/jrsydu/" method="post" id="subForm">
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
					<label for="jrsydu-jrsydu">Email:</label>
					<div class="input">
						<input class="xlarge" id="jrsydu-jrsydu" name="cm-jrsydu-jrsydu" size="30" type="text">
					</div>
				</div>
				<!-- /clearfix -->
			</fieldset>
			<div class="actions">
				<button type="submit" class="btn primary">Subscribe</button>
			</div>
		</form>';
}
add_shortcode( 'marketron', 'make_marketron_newsletter' );

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

	$output = null;

	if ( 'review' == get_post_type() ) {
		$output .= '<p>To read the full review, buy the Make: Ultimate Guide to 3D Printing.</p>';
	}

	$output .= '<div class="alert alert-info">

			<img src="'.get_stylesheet_directory_uri().'/img/SIP4_Cover_RGB1.jpg" class="thumbnail pull-right" style="width:125px; height: auto;" />

			<h4>Get a copy of the MAKE Ultimate Guide To 3D Printing today!</h4>

			<ul>
				<li>3D Printers Buyer\'s Guide &mdash; 15 Reviewed</li>
				<li>Getting Started in 3D</li>
				<li>Learn the Software Toolchain</li>
				<li>3D Design for Beginners</li>
				<li>3D Printing without a Printer</li>

			</ul>

			<p><a class="btn btn-primary" href="http://www.makershed.com/Make_Ultimate_Guide_to_3D_Printing_p/1449357377.htm">Buy now!</a></p>

		</div>';

	if ( 'review' == get_post_type() ) {
		$output .= "<p>We want to hear from you!  Share your experiences with this machine, what you like, what you don't like, where you think our test team got it wrong. We hope you’ll join in the discussion. We’d also love to see the things that you design and print out.</p>";
	}

	return $output;
}

add_shortcode( 'printing', 'make_printing_guide_blurb' );


function make_volume_blurb() {

	$output = '<div class="alert alert-info">

			<img src="' . get_stylesheet_directory_uri() . '/img/MAKE_V33_high.jpg" class="thumbnail pull-right" style="width:125px; margin-left:10px; height: auto;" />

			<p><strong>MAKE Volume 33</strong> features our special Software for Makers section covering apps for circuit board design, 3D design and printing, microcontrollers, and programming for kids. Also, meet our new Arduino-powered Rovera robot and get started with Raspberry Pi. As usual, you’ll also find fascinating makers inside, like the maniacs on our cover, the hackers behind the popular Power Racing Series events at Maker Faire.</p>

			<p>Try your hand at 22 great DIY projects, like the Optical Tremolo guitar effects box, "Panjolele" cake-pan ukelele, Wii Nunchuk Mouse, CNC joinery tricks, treat-dispensing cat scratching post, laser-cut flexing wooden books, sake brewing, growing incredibly hot “ghost chili” peppers, and much more.</p>

			<p>On newsstands now, by <a href="https://readerservices.makezine.com/mk/subscribe.aspx?PC=MK&PK=M3ANEWT">subscription</a>, or available in the <a href="http://www.makershed.com/Make_Volume_33_p/mmv33.htm">Maker Shed</a></p>

			<p><a class="btn btn-primary" href="http://www.makershed.com/Make_Volume_33_p/mmv33.htm">Buy now!</a></p>

		</div>';
	return $output;
}

add_shortcode( 'volume', 'make_volume_blurb' );

function make_blurb_add_shortcode( $content ) {
	global $post;
	if ( '246865' == $post->post_parent ) {
		$content = $content . do_shortcode( '[volume]' );
		return $content;
	} else {
		return $content;
	}
}

add_filter( 'the_content', 'make_blurb_add_shortcode' );

function make_holiday_banner() {
	return '<img src="'. get_stylesheet_directory_uri() . '/img/holiday_banner.jpg" alt="MAKE Holiday Gift Guide 2012" />';
}

add_shortcode( 'holiday', 'make_holiday_banner' );

function make_featured_products_shortcode() {

	$xml = wpcom_vip_file_get_contents( 'http://makershed.com/net/webservice.aspx?api_name=generic\featured_products' );

	if ( ! $xml )
		return;

	$simpleXmlElem = simplexml_load_string( $xml );
	if ( ! $simpleXmlElem )
		return;
	$xml_featured_products = $simpleXmlElem->asXML();
	$featured_products = simplexml_load_string($xml_featured_products);
	$products = $featured_products->Product;
	$products_count = count($products);
	if ($products_count > 8) {
		$input = range(1,$products_count);
		$arr = array_rand($input, 4);
	} else {
		$input = range(1,8);
		$arr = array_rand($input, 4);
	}

	ob_start();

	echo '<table><tr>';

	for ( $i = 0; $i <= 2; $i++ ) {
		if ( ! isset( $products[ $arr[ $i ] ] ) ) {
			continue;
		}
?>

		<td>

			<a href="<?php echo esc_url( 'http://www.makershed.com/ProductDetails.asp?&Click=107309&ProductCode=' . rawurlencode( $products[ $arr[ $i ] ]->ProductCode ) ); ?>">
				<?php
					if ( function_exists( 'wpcom_vip_get_resized_remote_image_url' ) ) {
						echo '<img src="' . wpcom_vip_get_resized_remote_image_url( $products[ $arr[ $i ] ]->PhotoURL, 175, 175 ) . '" alt="' . esc_attr( $products[ $arr[ $i ] ]->ProductName ) . '" class="thumbnail small-thumb" />';
					} else {
						echo '<img src="' . esc_url( $products[ $arr[ $i ] ]->PhotoURL ) . '" alt="' . esc_attr( $products[ $arr[ $i ] ]->ProductName ) . '" class="thumbnail small-thumb"/>';
					}
				?>
			</a>

			<div class="blurb">
				<h4><a href="<?php echo esc_url( 'http://www.makershed.com/ProductDetails.asp?&Click=107309&ProductCode=' . rawurlencode( $products[ $arr[ $i ] ]->ProductCode ) ); ?>"><?php echo esc_html( $products[ $arr[ $i ] ]->ProductName ); ?></a></h4>
			</div>

		</td>

<?php

	} // end for()

	echo '</tr></table>';

	return ob_get_clean();
}

add_shortcode( 'featured_products', 'make_featured_products_shortcode' );

function make_row_shortcode( $atts, $content = null ) {
   return '<div class="row">' . $content . '</div>';
}

add_shortcode( 'row', 'make_row_shortcode' );

function make_email_encode_function( $atts, $content ){
	if (is_email( $content )) {
		return '<a href="' . esc_attr( antispambot("mailto:".$content) ) . '">'.antispambot($content).'</a>';
	} else {
		return $content;
	}
}
add_shortcode( 'email', 'make_email_encode_function' );