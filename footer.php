			</div>

		</div>
		
		<div class="footer-ad">
		
			<div class="" style="width:728px; margin:0 auto;">

				<!-- Beginning Sync AdSlot 4 for Ad unit header ### size: [[728,90]]  -->
				<div id='div-gpt-ad-664089004995786621-4'>
					<script type='text/javascript'>
						googletag.display('div-gpt-ad-664089004995786621-4');
					</script>
				</div>
				<!-- End AdSlot 4 -->
				
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
		
		<!-- GIGYA -->
		<div id="gigya_modals">
			<div id="modal_esp_link" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="label_modal_esp_email" aria-hidden="true">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="label_modal_esp_email">Look Up Your Current Make Magazine Subscription</h3>
				</div><!-- /modal-header -->
				
				<div class="modal-body">
					<div>
						<p><span id="no-match-msg">We weren't able to verify your magazine subscription based on your email address but we can look up your account number, which is located on your magazine mailing label.</span></p>
						<p>My subscription account number is (<a href="#">?</a>):</p>
						<input id="input_esp_acctno" name="input_esp_acctno"/>
						<button id="btn_esp_search_acct" onclick="gigyaUtil.searchEspAcctno()">Lookup</button>
					</div>					
				</div><!-- /modal-body -->
				
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true" onclick="gigyaUtil.cancelEsp();">Cancel</button>
				</div><!-- /modal-footer -->
			</div><!-- /modal_esp_email -->
						
			<div id="modal_esp_confirm" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="label_modal_esp_confirm" aria-hidden="true">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="label_modal_esp_confirm">Verify Your Current Make Magazine Subscription</h3>
				</div><!-- /modal-header -->
				
				<div class="modal-body">
					<div>
						<form id="form_esp_acct">
							<p>We've verified your magazine subscription based on your <span id="esp_verify_type">email address</span> (<span id="esp_verify_info"></span>) and you now have access to view the magazine online.</p>
							<input type="hidden" id="esp_uid" name="uid" />
							<input type="hidden" id="esp_acctno" name="acctno" />
							<input type="hidden" id="esp_accttype" name="accttype"/>
							<input type="hidden" id="esp_status" name="status" />
							<input type="hidden" id="esp_expiredate" name="expiredate" />
							<input type="hidden" id="esp_email" name="email" />
						</form>
					</div>
				</div><!-- /modal-body -->
				
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true" onclick="gigyaUtil.showEspSearch();">Cancel</button>
					<button class="btn btn-primary" onclick="gigyaUtil.confirmEsp();">OK</button>
				</div><!-- /modal-footer -->
			</div><!-- /modal_esp_confirm -->
			
			<!-- EXAMPLE -->
			<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">Modal header</h3>
				</div>
				<div class="modal-body">
					<p>One fine body…</p>
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
					<button class="btn btn-primary">Save changes</button>
				</div>
			</div>
			<!-- /EXAMPLE -->
		</div><!-- /gigya_modals -->
		<!-- /GIGYA -->

	</body>
</html>
