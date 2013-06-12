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
				<legend>Sign up for the Maker Pro Newsletter</legend>
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
add_shortcode( 'makerpro', 'make_marketron_newsletter' );

function meetup_newsletter( $atts, $content = null ) {
	return '
		<form class="form-stacked" action="http://newsletter.makezine.com/t/r/s/jdhyjkj/" method="post" id="subForm">
			<fieldset>
				<legend>Enter your information to receive a free PDF of Make Volume 34</legend>
				<div class="clearfix">
					<label for="name">Name:</label>
					<div class="input">
						<input class="xlarge" id="name" name="cm-name" size="30" type="text">
					</div>
				</div>
				<!-- /clearfix -->
				<div class="clearfix">
					<label for="jdhyjkj-jdhyjkj">Email:</label>
					<div class="input">
						<input class="xlarge" id="jdhyjkj-jdhyjkj" name="cm-jdhyjkj-jdhyjkj" size="30" type="text">
					</div>
				</div>
				<!-- /clearfix -->
				<div class="clearfix">
					<div class="control-group">
						<div class="controls">
							<label class="checkbox" for="CRAFTNewsletter">CRAFT Newsletter<input type="checkbox" name="cm-ol-jjurhj" id="CRAFTNewsletter" /></label>
							<label class="checkbox" for="MAKENewsletter">MAKE Newsletter<input type="checkbox" name="cm-ol-jjuylk" id="MAKENewsletter" /></label>
							<label class="checkbox" for="MakerShed-MasterList">Maker Shed<input type="checkbox" name="cm-ol-tyvyh" id="MakerShed-MasterList" /></label>
							<label class="checkbox" for="MakerProNewsletter">Maker Pro Newsletter<input type="checkbox" name="cm-ol-jjhuukr" id="MakerProNewsletter" /></label>
						</div>
					</div>
				</div>
				<!-- /clearfix -->
			</fieldset>
			<div class="actions">
				<button type="submit" class="btn primary">Subscribe</button>
			</div>
		</form>';
}
add_shortcode( 'meetup', 'meetup_newsletter' );

add_shortcode( 'newsletter', 'make_newsletter' );

function maker_camp_list( $atts, $content = null ) {
	return '
		<form class="form-stacked" action="http://makermedia.createsend.com/t/r/s/jdilcj/" method="post" id="subForm">
			<fieldset>
				<legend>Join Make: Training Camp Mailing List</legend>
				<div class="clearfix">
					<label for="name">Name:</label>
					<div class="input">
						<input class="xlarge" id="name" name="cm-name" size="30" type="text">
					</div>
				</div>
				<!-- /clearfix -->
				<div class="clearfix">
					<label for="jdilcj-jdilcj">Email:</label>
					<div class="input">
						<input class="xlarge" id="jrsydu-jrsydu" name="cm-jdilcj-jdilcj" size="30" type="text">
					</div>
				</div>
				<!-- /clearfix -->
			</fieldset>
			<div class="actions">
				<button type="submit" class="btn primary">Join</button>
			</div>
		</form>';
}
add_shortcode( 'maker-camp', 'maker_camp_list' );

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

function make_platt() {

	$output = '<div class="alert alert-info">

			<img src="' . get_stylesheet_directory_uri() . '/img/platt.jpg" class="thumbnail pull-right" style="width:125px; margin-left:10px; height: auto;" />

			<p>For more on microswitches, rockers, sliders, toggles, DIPs, SIPs, paddle switches, and more, check out the Encyclopedia of Electronic Components Volume 1 by Charles Platt. It’s the informative, concise, and well-organized resource that\'s perfect for teachers, hobbyists, engineers, and students wanting a go-to electronics quick reference.<p>
			<p><a class="btn btn-primary" href="http://www.makershed.com/Encyclopedia_of_Electronic_Components_Vol_1_p/mkbk17.htm">Buy now!</a></p>

		</div>';
	return $output;
}

add_shortcode( 'platt', 'make_platt' );

function make_rpi() {

	$output = '<div class="clearfix"></div>';

	$output .='<div class="alert alert-info">
		<p>
			<a href="http://pubads.g.doubleclick.net/gampad/clk?id=29978938&iu=/11548178/Makezine">
				<img class="" style="width: 100%; height: auto;" alt="Raspberry Pi Design Contest" src="'. get_stylesheet_directory_uri() .'/img/RASPBERRYPI_AD.jpg" />
			</a>
		</p>
		<h4>Enter Your Project In Our Raspberry Pi Design Contest</h4>
		<ul>
			<li>Over $3,500 in prizes from MCM Electronics</li>
			<li>Best In Show wins a Printrbot Jr.</li>
			<li>Four Categories: Artistic, Utility, Education and Enclosures</li>
			<li>Submissions due by April 11th, 2013</li>
		</ul>
		<a class="btn btn-primary" href="http://pubads.g.doubleclick.net/gampad/clk?id=29978938&iu=/11548178/Makezine">Enter Today!</a>
	</div>';
	return $output;
}

add_shortcode( 'make_rpi', 'make_rpi' );

function make_rtm() {
	$output = '<div class="alert alert-info">
		<a href="http://pubads.g.doubleclick.net/gampad/clk?id=29978218&amp;iu=/11548178/Makezine">
			<img src="http://makezineblog.files.wordpress.com/2013/03/rtmfc_620x120.jpg" alt="RTMFC_620x120" width="620" height="120" style="margin-bottom:10px;" class="alignnone size-full wp-image-292301" />
		</a>
		<p>The <a href="http://pubads.g.doubleclick.net/gampad/clk?id=29978218&amp;iu=/11548178/Makezine">Road to Maker Faire Challenge</a> will award $2,500 to one winner to bring his or her project to Maker Faire Bay Area on May 18-19 in San Mateo, CA. Use the funding for materials, transport, or anything else you might need to get to Maker Faire. Applications are due by 11:59 PM PDT on April 8th, 2013.</p>
		<p><a href="http://pubads.g.doubleclick.net/gampad/clk?id=29978218&amp;iu=/11548178/Makezine" class="btn btn-primary">Enter Now!</a></p>
		</div>';
	return $output;
}

add_shortcode( 'make_road_to_maker_faire', 'make_rtm' );

function join_make_forum() {
	$output = '<div class="join-make-forum">
		<p>Whether you&#39;re making it with electronics, wood, a 3D printer, or just about anything else, the MAKE: Forum is probably talking about. All that&#39;s missing is you. Stop by and share your projects, ideas, or questions.</p>
		<a href="https://plus.google.com/communities/105413589856236995389" target="_blank"><img src="http://makezineblog.files.wordpress.com/2013/04/join-make-forum.jpeg" width="620px" height="174px" alt="Join Make Forums" /></a>
		</div>';
	return $output;
}

add_shortcode( 'join_forum', 'join_make_forum' );

function promo_vol_34() {

	$output = '<div class="alert alert-info">

			<img src="http://makezineblog.files.wordpress.com/2013/04/m34-cover1.jpg?w=148" class="thumbnail pull-right" style="width:125px; margin-left:10px; height: auto;" />

			<p><strong>MAKE Volume 34:</strong> Join the robot uprising! As MAKE&#39;s Volume 34 makes clear, there’s never been a better time to delve into robotics, whether you’re a tinkerer or a more serious explorer. With the powerful tools and expertise now available, the next great leap in robot evolution is just as likely to come from your garage as a research lab. The current issue of MAKE will get you started. Explore robot prototyping systems, ride along with the inventors of the OpenROV submersible, and learn how you can 3D-print your own cutting-edge humanoid robot for half the price. Plus, build a coffee-can Arduino robot, a lip balm linear actuator, a smartphone servo controller, and much more</p>

			<p>On newsstands now, by <a href="https://readerservices.makezine.com/mk/subscribe.aspx?PC=MK&PK=M3ANEWT">subscription</a>, or available in the <a href="http://www.makershed.com/MAKE_Volume_34_p/9781449327668.htm">Maker Shed</a></p>

			<p><a class="btn btn-primary" href="http://www.makershed.com/ProductDetails.asp?ProductCode=MMV34">Buy now!</a></p>

		</div>';
	return $output;
}

add_shortcode( 'promo_34', 'promo_vol_34' );


function make_github_3d_viewer($atts) {
	$output = '<iframe class="render-viewer" src="https://render.github.com/view/3d/?url=' . urlencode( esc_url( $atts['url'] ) ) . '" frameborder="0" sandbox="allow-scripts allow-same-origin" width="620" height="420">Viewer requires iframe.</iframe>';
	return $output;
}

add_shortcode('github', 'make_github_3d_viewer');

/**
 * Modal Window Builder
 */
function make_modal_builder( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'launch' 	=> 'Launch Window',
		'title' 	=> 'Modal Title',
		'btn_class'	=> '',
		'embed'	=> ''
	), $atts ) );

	$number = mt_rand();
	$args = array( 
		'a' => array(
			'href' => array(),
			'title' => array()
		),
		'br' => array(),
		'em' => array(),
		'strong' => array(),
		'iframe' => array( 
			'src' => array(),
			'height' => array(),
			'border' => array(),
			'frameborder' => array(),
			'width' => array(),
			'allowfullscreen' => array(),
			)
	);
	$output = '<a class="btn  ' . esc_attr( $btn_class ) . '" data-toggle="modal" href="#modal-' . $number . '">' . esc_html( $launch ) . '</a>';
	$output .= '<div id="modal-' . $number . '" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
	$output .= '	<div class="modal-header">';
	$output .= '		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
	$output .= '		<h3>' . esc_html( $title ) . '</h3>';
	$output .= '	</div>';
	$output .= '	<div class="modal-body">';
	$output .= ( !empty( $embed ) ) ? wpcom_vip_wp_oembed_get( esc_url( $embed ), array( 'width' => 530 ) ) : '';
	$output .= 			wp_kses( $content, $args );
	$output .= '	</div>';
	$output .= '	<div class="modal-footer">';
	$output .= '		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>';
	$output .= '	</div>';
	$output .= '</div>';

	return $output;
}
add_shortcode( 'modal', 'make_modal_builder' );

/**
 * Maker Camp Register Summer Program Google Form
 */
function make_makercamp_register_summer_program_gf() {
	$output = '<script type="text/javascript">var submitted=false;</script>';
	$output = '<iframe name="hidden_iframe" id="hidden_iframe" style="display:none;" onload="if(submitted){window.location="' . home_url() . '/maker-camp/thank-you/";}"></iframe>
     <form action="https://docs.google.com/spreadsheet/formResponse?formkey=dGJINmxpaVdpWEk2c0pBY1JuNTY5RlE6MQ" method="post" target="_blank" onsubmit="submitted=true;">
        <br>
        <div class="errorbox-good">
           <div class="ss-item ss-item-required ss-text">
              <div class="ss-form-entry">
                 <label class="ss-q-title" for="entry_9">Program Type <span class="ss-required-asterisk">*</span></label> <input type="text" name="entry.9.single" value="" class="ss-q-short" id="entry_9">
              </div>
           </div>
        </div>
        <br>
        <div class="errorbox-good">
           <div class="ss-item ss-item-required ss-text">
              <div class="ss-form-entry">
                 <label class="ss-q-title" for="entry_0">Program Name <span class="ss-required-asterisk">*</span></label> <input type="text" name="entry.0.single" value="" class="ss-q-short" id="entry_0">
              </div>
           </div>
        </div>
        <br>
        <div class="errorbox-good">
           <div class="ss-item ss-item-required ss-text">
              <div class="ss-form-entry">
                 <label class="ss-q-title" for="entry_10">Organization Name <span class="ss-required-asterisk">*</span></label> <input type="text" name="entry.10.single" value="" class="ss-q-short" id="entry_10">
              </div>
           </div>
        </div>
        <br>
        <div class="errorbox-good">
           <div class="ss-item ss-item-required ss-text">
              <div class="ss-form-entry">
                 <label class="ss-q-title" for="entry_11">Program Description (25 words or less)<span class="ss-required-asterisk">*</span></label>
                 <textarea type="text" name="entry.11.single" value="" class="ss-q-short" id="entry_11" rows="4"></textarea>
                 <div style="clear:both;"></div>
              </div>
           </div>
        </div>
        <br> 
        <div class="errorbox-good">
           <div class="ss-item ss-item-required ss-text">
              <div class="ss-form-entry">
                 <label class="ss-q-title" for="entry_1">Program Google+ Link <span class="ss-required-asterisk">*</span></label> <label class="ss-q-help" for="entry_1">Don\'t have a Google+ account for your program? <br/><a href="https://plus.google.com/up/" target="_blank">Create an account</a></label> <input type="text" name="entry.1.single" value="" class="ss-q-short" id="entry_1">
              </div>
           </div>
        </div>
        <br>
        <div class="errorbox-good">
           <div class="ss-item ss-item-required ss-text">
              <div class="ss-form-entry">
                 <label class="ss-q-title" for="entry_5">Contact Name <span class="ss-required-asterisk">*</span></label> <input type="text" name="entry.5.single" value="" class="ss-q-short" id="entry_5">
              </div>
           </div>
        </div>
        <br>
        <div class="errorbox-good">
           <div class="ss-item ss-item-required ss-text">
              <div class="ss-form-entry">
                 <label class="ss-q-title" for="entry_7">Email Address <span class="ss-required-asterisk">*</span></label> <input type="text" name="entry.7.single" value="" class="ss-q-short" id="entry_7">
              </div>
           </div>
        </div>
        <br>
        <div class="errorbox-good">
           <div class="ss-item ss-item-required ss-text">
              <div class="ss-form-entry">
                 <label class="ss-q-title" for="entry_2">City <span class="ss-required-asterisk">*</span></label> <input type="text" name="entry.2.single" value="" class="ss-q-short" id="entry_2">
              </div>
           </div>
        </div>
        <br>
        <div class="errorbox-good">
           <div class="ss-item ss-item-required ss-text">
              <div class="ss-form-entry">
                 <label class="ss-q-title" for="entry_3">State <span class="ss-required-asterisk">*</span></label> <input type="text" name="entry.3.single" value="" class="ss-q-short" id="entry_3">
              </div>
           </div>
        </div>
        <br>
        <div class="errorbox-good">
           <div class="ss-item ss-item-required ss-text">
              <div class="ss-form-entry">
                 <label class="ss-q-title" for="entry_4">Zipcode <span class="ss-required-asterisk">*</span></label> <input type="text" name="entry.4.single" value="" class="ss-q-short" id="entry_4">
              </div>
           </div>
        </div>
        <br>
        <div class="errorbox-good">
           <div class="ss-item ss-text">
              <div class="ss-form-entry">
                 <label class="ss-q-title" for="entry_6">Phone</label> <input type="text" name="entry.6.single" value="" class="ss-q-short" id="entry_6">
              </div>
           </div>
        </div>
        <br>
        <input type="hidden" name="pageNumber" value="0"> <input type="hidden" name="backupCache" value="">
        <div class="ss-item ss-navigate">
           <div class="ss-form-entry">
              <input class="button" type="submit" name="Submit" value="Register Your Program">
           </div>
        </div>
     </form>
     <script type="text/javascript">
        (function() {
        var divs = document.getElementById(\'ss-form\').getElementsByTagName(\'div\');
        var numDivs = divs.length;
        for (var j = 0; j < numDivs; j++) {
        	if (divs[j].className == \'errorbox-bad\') {
        	divs[j].lastChild.firstChild.lastChild.focus();
        	return;
        }
        }
        for (var i = 0; i < numDivs; i++) {
        var div = divs[i];
        if (div.className == \'ss-form-entry\' &&
        div.firstChild &&
        div.firstChild.className == \'ss-q-title\') {
        div.lastChild.focus();
        return;
        }
        }
        })();
     </script>';

     return $output;
}
add_shortcode('makercamp_register_summer_program_form', 'make_makercamp_register_summer_program_gf' );




