			</div>

		</div>

		<div class="new-footer">

			<div class="container">

				<p class="links">
					<span class="logo"><a href="http://makezine.com/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/make_footer.gif" alt="MAKE" /></a></span>
					<span class="text"><a href="http://makezine.com/help/index.html">Help</a></span>
					<span class="text"><a href="http://blog.makezine.com/contribute/">Write for MAKE</a></span>
					<span class="text"><a href="http://makezine.com/contact.html">Contact</a></span>
					<span class="text"><a href="http://www.makezine.com/go/subscribe2make">Subscribe</a></span>
					<span class="text"><a href="http://makezine.com/advertise/index.html">Advertise</a></span>
					<span class="text"><a href="http://www.oreillynet.com/pub/a/mediakit/privacy.html">Privacy</a></span>
					<span class="text"><a href="http://makezine.com/about/index.html">About Us</a></span>
					<span class="text"><a href="http://makezine.com/faq/index.html">FAQ</a></span>
					<span class="text"><a href="http://makezine.com/community/index.html">Forums</a></span>
					<span class="soci"><a href="http://twitter.com/make"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/twitter.png" alt="Make on Twitter"></a></span>
					<span class="soci"><a href="http://youtube.com/make"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/youtube.png" alt="Make on YouTube"></a></span>
					<span class="soci"><a href="http://www.flickr.com/photos/23739734@N08/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/flickr.png" alt="Make on Flickr"></a></span>
					<span class="soci"><a href="http://facebook.com/makemagazine"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/facebook.png" alt="Make on facebook"></a></span>
					<span class="soci"><a href="http://www.stumbleupon.com/to/stumble/stumblethru:makezine.com?utm_source=Makezine&amp;utm_medium=StumbleThru&amp;utm_campaign=StumbleThruButton"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/stumbleupon.png" alt="Stumble Make Magazine"></a></span>
					<span class="soci"><a href="http://blog.makezine.com/feed/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/rss.png" alt="Make Blog News Feed"></a></span>
					<span class="soci"><a href="https://google.com/+MAKE/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/google-plus.png" alt="MAKE on Google+"></a></span>
				</p>

			</div>

		</div>
	
	</div>


		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script>jQuery(".entry-content:odd").addClass('odd');</script>

		<div id="fb-root"></div>
		<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=216859768380573";
			fjs.parentNode.insertBefore(js, fjs);
			}
		(document, 'script', 'facebook-jssdk'));
		</script>

		<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery(".scroll").click(function(event){
				//prevent the default action for the click event
				event.preventDefault();
		 
				//get the full url - like mysitecom/index.htm#home
				var full_url = this.href;
		 
				//split the url by # and get the anchor target name - home in mysitecom/index.htm#home
				var parts = full_url.split("#");
				var trgt = parts[1];
		 
				//get the top offset of the target anchor
				var target_offset = jQuery("#"+trgt).offset();
				var target_top = target_offset.top;
		 
				//goto that anchor by setting the body scroll top to anchor top
				jQuery('html, body').animate({scrollTop:target_top - 30}, 1000);
			});
		});
		</script>

		<script type="text/javascript">
			setTimeout(function(){var a=document.createElement("script");
			var b=document.getElementsByTagName("script")[0];
			a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0013/2533.js?"+Math.floor(new Date().getTime()/3600000);
			a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
		</script>


		<?php wp_footer(); ?>
	</body>
</html>
