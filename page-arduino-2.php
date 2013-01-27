<?php
/**
 * Template Name: Arduino 2
 */

get_header(); ?>

<script type="text/javascript">
   federated_media_section = "MZ_Adruino";
</script>

<style type="text/css">
#arduino-header { width:600px; background:#ee1c24 url('http://cdn.makezine.com/make/arduino/Make-Arduino_banner_tag_600x100.gif') no-repeat 5% 50%; color:#fff; font-weight:bold; text-align:right; height:100px; padding: 0px 10px;}
#arduino-feature-wrap { padding:10px; background-color:#dfdfdf;}
#arduino-feature-wrap h1 { text-transform:uppercase; font-size:14px;}
.arduino-feat-thumb { width:200px; float:left;padding-right:20px;}
.arduino-feat-thumb span { width:200px; overflow:hidden; display:block;}
#blog h2 a, #blog h2 a:visited  { font-size:14px; line-height:16px; color:#1797ff; text-decoration:none;}
#blog h2 a:active, #blog h2 a:hover { text-decoration:underline; color:#333;}
#blog h2.entry-title { margin-bottom: 0.5em;}
#arduino-nav-list { width:150px; float:left;}
#arduino-nav-list ul { margin:0px; padding:0px;}
#arduino-nav-list ul li { list-style-image:url('http://makezine.com/images/buttons/arr_c2.gif'); list-style-position:inside; }

#more hr { margin-bottom:.5em;}

.arduino-section-head { background-color:#ee1c24; color:#fff; padding:3px 10px; margin:20px 0px;}
.arduino-section-head h1 { text-decoration:none; text-transform:uppercase; font-size:14px; padding:0px; margin:0px;}
.arduino-section-wrap { }
.arduino-section-left { margin-right:20px; }
.arduino-section-left, .arduino-section-right { width:295px; float:left; }
.arduino-section-left h4, .arduino-section-right h4 { margin-top:0px; }
.arduino-section-thumb { width:180px; float:left;padding-right:20px;}
.arduino-section-thumb img { width:180px; }
.arduino-section-thumb span { width:180px; max-height:100px; overflow:hidden; display:block; margin-bottom:20px;}


</style>

<div id="arduino-header"></div>


<div id="arduino-section-wrap">
	<div class="arduino-section-head"><h1>Features</h1></div>
<div style="padding-bottom:15px;"><strong>Stand-out Arduino coverage, from Maker Media and around the web</strong></div>


		<?php $query = new WP_Query( 'tag=arduino&posts_per_page=2' ); ?>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>


		<div class="arduino-feat-thumb">
			<span><?php the_post_thumbnail('thumbnail'); ?></span>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php the_excerpt(); ?>
		</div>
		
		<?php endwhile; ?>
		
	<div id="arduino-nav-list">
	<h2>Exploring Arduino</h2>
	<ul>
        <li><a href="#started">Getting Started</a></li>
		<li><a href="#tutorials">Tutorials</a></li>
		<li><a href="#projects">News & Projects</a></li>
		<li><a href="#community">Community</a></li>
		<li><a href="#resources">Resources</a></li>
        <li><a href="#shed">Buyer's Guide</a></li>
	</ul>
	</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
<p>&nbsp;</p><strong>Additional Features:</strong> <a href="http://blog.makezine.com/arduino/make-arduino-bots-and-gadgets-the-interview">Make: Arduino Bots and Gadgets (the Interview)</a> | <a href="http://blog.makezine.com/archive/2011/05/onyx-ashantis-ted-performance-demo.html">Onyx Ashanti's TED Performance Demo</a> | <a href="http://blog.makezine.com/archive/2011/05/gghc-finalist-profile-build-brighton.html">GGHC Finalist Profile &mdash; Build Brighton</a> | <a href="http://blog.makezine.com/archive/2011/05/toolbox-review-video-experimenter-shield.html">Tool Review: Video Experimenter Shield</a> | <a href="http://makeprojects.com/Project/Arduino-Mail-Notifier/805/1">Arduino Snail Mail Notifier</A> | <a href="http://blog.makezine.com/archive/2011/05/why-google-choosing-arduino-matters-and-the-end-of-made-for-ipod-tm.html">Why Google Choosing Arduino Matters...</a> | <A HREF="http://blog.makezine.com/archive/2011/05/how-to-tweeting-geiger-counter.html">Build a Twitter-Enabled Geiger Counter With Netduino</A> | <a href="http://blog.makezine.com/archive/2011/04/pyrotechnical-painting.html">Pyrotechnical Painting</a>

<div id="started" class="arduino-section-head"><h1>Getting Started</h1></div>
<strong>If you're new to the world of microcontrollers and the Arduino board, here are a few resources that can help set the stage for further exploration:</strong>
<div class="arduino-section-wrap">
	<div class="arduino-section-left">
<div style="height:360px; border-bottom:1px solid #e0e0e0; padding-top:20px;">
	<a href="http://cdn.makezine.com/make/arduino/GettingStartedWithArduino_ch04.pdf"><img src="http://cdn.makezine.com/make/arduino/gswArduinoCover.jpg" height="200" /></a>
	<h4><a href="http://cdn.makezine.com/make/arduino/GettingStartedWithArduino_ch04.pdf">"Chapter 4: Getting Started with Arduino"</a></h4>
	<p>Our <a href="http://www.makershed.com/ProductDetails.asp?ProductCode=MSGSA&Click=74174" target="_blank">Getting Started with Arduino</a> book is a concise, engaging guide to Arduino. It covers the basics of the system, setting up hardware and software, and beginner programming. This PDF excerpt, "Chapter 4: Getting Started with Arduino," explains how to create your first "interactive device," hardware and software that can sense the world and respond.</p>
</div>
<div style="height:325px; border-bottom:1px solid #e0e0e0; padding-top:20px;">
	<a href="http://cdn.makezine.com/make/arduino/Make25_Getting-Started-With_MCUs.pdf" target="_blank"><img src="http://cdn.makezine.com/make/arduino/gswMCUsImage.jpg" width="200" /></a>
	<a href="http://cdn.makezine.com/make/arduino/Make25_Getting-Started-With_MCUs.pdf" target="_blank"><h4>"Getting Started with Microcontrollers"</h4></a>
	<p>This PDF excerpt from MAKE Volume 25, written by Arduino co-developer Tom Igoe, outlines a number of different popular microcontrollers, including Arduino, and compares their features and uses.</p>
</div>
	</div>
	<div class="arduino-section-right">
<div style="height:360px; border-bottom:1px solid #e0e0e0; padding-top:20px;">
	<img src="http://cdn.makezine.com/make/arduino/MakeV25_cover_300x425.jpg" height="200" />
	<a href="http://makezine.com/25/" target="_blank"><h4>MAKE Volume 25: The Arduino Revolution</h4></a>
	<p>Volume 25 of MAKE has tons of material on "making stuff smart" using Arduino, from how to get going, to major step-by-step projects driven by Arduino, to the latest news and developments in the world of Arduino.</p></div>
<div style="height:330px; border-bottom:1px solid #e0e0e0; padding-top:20px;">
	<a href="http://cdn.makezine.com/make/arduino/Arduino-callouts1.jpg" target="_blank"><img src="http://cdn.makezine.com/make/arduino/Arduino-callouts1.jpg" width="300" /></a>
	<a href="http://cdn.makezine.com/make/arduino/Arduino-callouts1.jpg" target="_blank"><h4>Anatomy of an Arduino</h4></a>
	<p>An Arduino board contains the ATmega chip, support electronics, and input output connectors/pins. Click on the image above to see the anatomy of the Uno Arduino. (Take a guided tour of an Arduino board <a href="http://blog.makezine.com/archive/2011/01/take-a-tour-of-the-arduino-just-wat.html" target="_blank">here</a>.)</p>
</div>
	</div>
	<div style="clear:both;"></div>
</div>	

<div id="tutorials" class="arduino-section-head"><h1>Tutorials</h1></div>
<div style="padding-bottom:15px;"><strong>How-tos to get beginners going and take seasoned Arduino enthusiasts farther into the fine art of making stuff smart</strong></div>
    <div class="arduino-section-wrap">
		<div class="arduino-section-thumb">
			<span><img src="http://cdn.makezine.com/make/blogs/blog.makezine.com/2011/01/pingTut.jpg" alt="" title="pingTut" width="180" height="100" class="alignnone size-full wp-image-87208" /></span>
<h2 class="entry-title"><a href="http://blog.makezine.com/archive/2009/06/how-to-tuesday-arduino-101-the-ping.html" target="_blank">Using the Ping Ultrasonic Sensor (video)</a></h2>
		</div>
		<div class="arduino-section-thumb">
			<span><img src="http://cdn.makezine.com/make/blogs//blog.makezine.com/2011/01/lilyPad_101.jpg" alt="" title="lilyPad_101" width="180" height="100" class="alignnone size-full wp-image-87216" /> </span>
<h2 class="entry-title"><a href="http://blog.makezine.com/archive/2009/03/craft-video-lilypad-arduino-101.html" target="_blank">Getting Started with LilyPad Arduino (video)</a></h2>
		</div>
		<div class="arduino-section-thumb">
			<span><img src="http://cdn.makezine.com/make/blogs/blog.makezine.com/2011/01/lolShed.jpg" alt="" title="lolShed" width="180" height="100" class="alignnone size-full wp-image-87219" /></span>
			<h2 class="entry-title"><a href="http://blog.makezine.com/archive/2010/06/john-park-in-the-maker-shed-lol-shi.html" target="blank">How to Use the LoL (Lots of LEDs) Shield (video)</a></h2>
		</div>
			<div class="clear"></div>
<p><strong>Additional video tutorials:</strong> <a href="http://www.youtube.com/watch?v=pMV2isNm8JU" target="_blank">Blink an LED</a> | <a href="http://www.youtube.com/watch?v=XUuXq4J4u14" target="_blank">Add a Button to Your Project</a> | <a href="http://www.youtube.com/watch?v=FKj9jJgj8Pc" target="_blank">Arduinos, Potentiometers, and Servos</a></p>


			<div class="clear"></div>
</div>

<!--Sponsor Box-->

<div id="arduino-feature-wrap">
	<div class="arduino-section-thumb">
		<img src="http://cdn.makezine.com/make/blogs/blog.makezine.com/2011/01/wirebot200.jpg" />
	</div> 
		
	<div style="float:left;width: 393px;">
		
		<h2 class="entry-title"><a href="http://makeprojects.com/Project/Build-a-Wirebot/744/1" target="_blank">Build a Wirebot</a></h2>
	
		<p>Check out the nifty "wirebot" Riley Porter built using little more than three steppers, some fishing line, an Arduino, and the grblShield that Riley developed himself. If you've ever seen those cameras on a wire at sporting events and wished you could build the same sort of a rig (for animating holiday decorations, making the models hanging from your kid's bedroom come to life, etc., here's your chance to do it with precious little outlay pf cash.  <a href="http://makeprojects.com/Project/Build-a-Wirebot/744/1" target="_blank">Let's get started!</a></p>
		
		<p>This project was sponsored by <a href="http://www.element14.com/community/index.jspa">element14</a>, the tech portal and online community for design engineers.</p>
	
	</div>
	
	<div style="clear:both;"></div> 
	<div class="clear"></div>
		
</div>

<!-- /Sponsor Box -->

	<div id="projects" class="arduino-section-head"><h1>Arduino News & Projects</h1></div>
<div class="arduino-section-wrap">
	<div class="arduino-section-left">
		<h4>Latest posts from makezine.com:</h4>
<h2 class="entry-title"><a href="http://blog.makezine.com/archive/2011/06/soft-circuit-gps-helps-you-find-home.html">Soft-Circuit GPS Helps You Find Home</a></h2><p>"The find home detector is a device to show me the way home by indicating the direction with a light.  Using the GPS to get a position and then calculate the direction to the location of my home."</p>
<h2 class="entry-title"><a href="http://blog.makezine.com/archive/2011/06/in-the-maker-shed-motion-sensitive-camera-trap-kit.html">In the Maker Shed: Motion-Sensitive Camera Trap Parts Kit</a></h2><p>The Motion-Sensitive Camera Trap Parts Kit from the Maker Shed allows you add new abilities to your IR remote ready digital camera.</p>
<h2 class="entry-title"><a href="http://blog.makezine.com/archive/2011/06/adventures-in-android-adk-development-hardware.html">Adventures in Android ADK Development: Hardware</a></h2><p>At this point in my Android saga, IÕve gotten the Android SDK and Eclipse all running well enough to run a Hello World in the Android emulator.</p>
<h2 class="entry-title"><a href="http://blog.makezine.com/archive/2011/06/open-source-photo-motion-control-clearinghouse.html">Open Source Photo Motion Control Clearinghouse</a></h2><p>Our own Matt Mets just pointed me at OpenMoco, a fantastic online resource for those interested in building and experimenting with moving time-lapse or other DIY photographic motion control applications.</p>
<h2 class="entry-title"><a href="http://blog.makezine.com/archive/2011/06/in-the-maker-shed-mintronics-bundle.html">In the Maker Shed: Mintronics Bundle</a></h2><p>The Mintronics Bundle from the Maker Shed is a great way to get started with Arduino and electronics.</p>

<div id="more">
	<hr />
	<a href="http://blog.makezine.com/archive/arduino/" target="_blank">more &raquo;</a>
</div>
	</div>
	<div class="arduino-section-right">
		<h4>Make: Projects</h4>
<div id="arduino-feature-wrap">
<a href="http://makeprojects.com/Project/My-Robot-Makey/51/1"><img src="http://blog.makezine.com/wp-content/uploads/2011/01/my-robot-makey.jpg" alt="" title="my-robot-makey" width="275" height="206" class="alignnone size-full wp-image-99771" /></a><h2 class="entry-title"><h2 class="entry-title"><a href="http://makeprojects.com/Project/My-Robot-Makey/51/1" target="_blank">My Robot, Makey</a></h2></div>
<h2 class="entry-title"><a href="http://makeprojects.com/Project/Build-a-Mintronics-MintDuino/608/1" target="_blank">Build a Mintronics: MintDuino</a></h2>
<h2 class="entry-title"><a href="http://makeprojects.com/Project/Laser-Harp/690/1" target="_blank">Laser Harp</a></h2>
<h2 class="entry-title"><a href="http://makeprojects.com/Project/Networked-On-Air-Light/614/1" target="_blank">Networked On Air Light</a></h2>
<h2 class="entry-title"><a href="http://makeprojects.com/Project/How-to-Drive-a-7-Segment-LED-with-an-Arduino/645/1" target="_blank">Hooking up a 7-Segment LED Display</a></h2>
<h2 class="entry-title"><a href="http://makeprojects.com/Project/Using-the-Parallax-RFID-Reader-with-an-Arduino/617/1" target="_blank">Using the Parallax RFID Reader with an Arduino</a></h2>
<h2 class="entry-title"><a href="http://makeprojects.com/Project/How-To-Build-a-MakerShield/432/1" target="_blank">How to Build the MakerShield</a></h2>
<h2 class="entry-title"><a href="http://makeprojects.com/Project/Arduino-Drum-Pad-Game/559/1">Arduino Drum Pad and Game</a></h2>
<h2 class="entry-title"><a href="http://makeprojects.com/Project/Garduino-Geek-Gardening/62/1" target="_blank" title="">Garduino Geek Gardening</a></h2><h2 class="entry-title"><a href="http://makeprojects.com/Project/Arduino-Blinking-Bike-Patch/79/1" target="_blank" title="">Arduino Blinking Bike Patch</a>
<div id="more">
	<hr />
	<a href="http://makeprojects.com/Topic/Arduino" target="_blank">more &raquo;</a>
</div>
	</div>
<div class="clear"></div>
</div>
<div class="arduino-section-head"><h1>Pull-Quote</h1></div>
<h2 style="line-height:1.3em">"This is the type of stuff kids want to make -- you can even trick them into learning some things along the way. These are the projects science fiction stories are made of, the things gadget sites blog about. What do all of these have in common? They're ideas that usually wouldn't actually happen, things we normally just dream about. But now these fantastic ideas are brought to life, and it's very likely a non-engineer made them." -- <EM>Phil Torrone</EM></h2>
<div class="arduino-section-left" style="margin-right:20px;">
<div id="community" class="arduino-section-head"><h1>Community</h1></div>
	<div class="arduino-section-wrap">
<p>How do you pronounce "Arduino?" <a href="http://www.arduino.cc/cgi-bin/yabb2/YaBB.pl?num=1191602549" target="_blank">Find out here</a></p>
<ul>
	<li><a href="http://www.arduino.cc/playground" target="_blank">Official Arduino "Playground" Wiki</a></li>
	<li><a href="http://www.arduino.cc/cgi-bin/yabb2/YaBB.pl" target="_blank">Official Arduino Forum</a></li>
		<ul>
	         <li><a href="http://www.arduino.cc/cgi-bin/yabb2/YaBB.pl?num=1282720613" target="_blank">Imagining the dream electronics lab</a></li>
	         <li><a href="http://www.arduino.cc/cgi-bin/yabb2/YaBB.pl?num=1289881147" target="_blank">Thoughts on setting up an Arduino lending library</a></li>
	         <li><a href="http://www.arduino.cc/cgi-bin/yabb2/YaBB.pl?num=1274652722" target="_blank">Protracted discussion of LeafLabs' Maple microcontroller board</a></li>
	         <li><a href="http://www.arduino.cc/cgi-bin/yabb2/YaBB.pl?num=1285500728" target="_blank">Quelling concerns about "closing" the Arduino Uno</a></li>
	         <li><a href="http://www.arduino.cc/cgi-bin/yabb2/YaBB.pl?num=1269424830/al" target="_blank">Why do you like Arduino?</a></li>
	    </ul></li>
		   <li><a href="http://forums.makezine.com/" target="_blank">MAKE Forums</a></li>
		   <li><a href="http://forum.sparkfun.com/viewforum.php?f=32" target="_blank">SparkFun Arduino forum</a></li>
		   <li><a href="http://forums.adafruit.com/viewforum.php?f=25" target="_blank">Adafruit Arduino forum</a>
		   		<ul>
		         <li><a href="http://forums.adafruit.com/viewtopic.php?f=8&t=18243" target="_blank">Some thoughts on how to develop an Arduino prototype into a finished product</a></li>
<li><a href="http://forums.adafruit.com/viewtopic.php?f=25&t=16393" target="_blank">Using Arduino in Africa</a></li>
		         <li><a href="http://forums.adafruit.com/viewtopic.php?f=25&t=13715" target="_blank">Arduino as a CNC controller</a></li></ul></li>
</ul>
	</div>
</div>
<div class="arduino-section-right">
	<div id="resources" class="arduino-section-head"><h1>Resources</h1></div>
	<ul>
		<li><a href="http://Arduino.cc" target="_blank">Official Arduino Site</a></li>
<li><a href="http://en.wikipedia.org/wiki/Arduino" target="_blank">Arduino [Wikipedia]</a></li>
<li><a href="http://www.freeduino.org/index.html" target="_blank">The World Famous Index of Arduino & Freeduino Knowledge</a></li>
<li><a href="http://www.youtube.com/makemagazine#p/c/C3A0E18A403665FE" target="_blank">MAKE Arduino Playlist on YouTube</a></li>
<li><a href="http://makeprojects.com/search/arduino" target="_blank">Make: Projects Arduino section</a></li>
<li><a href="http://blog.makezine.com/archive/arduino/" target="_blank">Make: Online Arduino Archives</a></li>
<li><a href="http://www.makershed.com/SearchResults.asp?Cat=43&Click=74174" target="_blank">Arduino page at Maker Shed</a></li>
<li><a href="http://oreilly.com/arduino/index.html" target="_blank">O'Reilly Arduino</a></li>
<li><a href="http://www.instructables.com/tag/type-id/category-technology/channel-arduino/" target="_blank">Instructables Arduino</a></li>
<li><a href="http://hacknmod.com/hack/top-40-arduino-projects-of-the-web/" target="_blank">Hack 'n Mod top list</a></li>
<li><a href="http://www.arduino.cc/playground/Main/Resources" target="_blank">Arduino Playground</a></li>
<li><a href="http://www.arduino.cc/cgi-bin/yabb2/YaBB.pl" target="_blank">Arduino forums</a></li>
<li><a href="http://www.arduino.cc/en/Tutorial/HomePage" target="_blank">Arduino tutorials</a></li>
<li><a href="http://shieldlist.org/" target="_blank">Shield List</a></li>
<li><a href="http://blog.makezine.com/archive/2011/01/free-print-and-stick-pinout-label-f.html" target="_blank">Free Print-and-Stick Pinout Label</a></li>
	</ul>
</div>	
<div class="clear"></div>
	<div id="shed" class="arduino-section-head"><h1>Buyer's Guide</h1></div>
<p>Here are a few suggested products to get you well on your way to controlling your world with Arduino. Check back here periodically for additional product recommendations.</p>

<div class="arduino-section-wrap">
	<div class="arduino-section-left">
<div style="height:450px; border-bottom:1px solid #e0e0e0;">
	<img src="http://cdn.makezine.com/make/arduino/MKSP4-2T-1.jpg" height="300" />
	<a href="http://www.makershed.com/ProductDetails.asp?ProductCode=MKSP4&Click=74174" target="_blank"><h4>Arduino Uno</h4></a>
	<p>The is a great to place to start with Arduino. Built on the Atmega328 chip, it has plenty of input/output pins (14 digital, 6 analog) for hooking up sensors and actuators. Unlike other boards, it has a USB-to-serial converter chip onboard, so a standard USB cable is all you need to hook it up to your PC.</p>
</div>
<div style="height:440px; border-bottom:1px solid #e0e0e0;">
	<img src="http://cdn.makezine.com/make/arduino/MSGSA-2.jpg" height="300" />
	<a href="http://www.makershed.com/ProductDetails.asp?ProductCode=MSGSA&Click=74174" target="_blank"><h4>Getting Started with Arduino Kit V2.0</h4></a>
	<p>This revised kit includes the recent Arduino Uno and everything you need to build the examples in <a href="http://www.makershed.com/ProductDetails.asp?ProductCode=9780596155513&Click=74174 target="_blank"">Getting Started with Arduino</a> by Massimo Bansi (which is included in the kit). This is a great way to get rolling with Arduino with a single purchase.</p>
</div>
<div style="height:450px; border-bottom:1px solid #e0e0e0;">
	<img src="http://cdn.makezine.com/make/blogs/blog.makezine.com/2011/01/lolShieldShed.jpg" alt="" title="lolShieldShed" width="300" height="300" class="alignnone size-full wp-image-87221" />
	<a href="http://www.makershed.com/ProductDetails.asp?ProductCode=MKJR3&Click=74174" target="_blank"><h4>LoL Shield for Arduino</h4></a>
	<p>The LoL (Lots of LEDs) Shield, which plugs into your Arduino board, is a 9 x 14 grid of individually addressable LEDs. You can use this LED display to scroll messages, make art, display games you've programmed, all sorts of fun stuff. The LoL Shields are available in four different LED colors: Red, Green, White, and Blue </p>
</div>
	</div>
	<div class="arduino-section-right">
<div style="height:450px; border-bottom:1px solid #e0e0e0;">
	<img src="http://cdn.makezine.com/make/arduino/MSAPK-2.jpg" height="300" />
	<a href="http://www.makershed.com/ProductDetails.asp?ProductCode=MSAPK&Click=74174" target="_blank"><h4>Projects Pack for Arduino V2.0</h4></a>
	<p>The Arduino Projects Pack contains the Arduino Uno, the MakerShield, sensors, actuators, breadboards (one mini, one half-size), and plenty of support components that you'll need in building projects &mdash; over 100 components in all.</p>
</div>
<div style="height:440px; border-bottom:1px solid #e0e0e0;">
	<img src="http://cdn.makezine.com/make/arduino/MSMS01-22.jpg" height="300" />
	<a href="http://www.makershed.com/ProductDetails.asp?ProductCode=MSMS01&Click=74174" target="_blank"><h4>MakerShield kit</h4></a>
	<p>Our open source MakerShield allows you to do prototyping and design circuits for Arduino and Netduino microcontrollers. This versatile and well-designed shield supports both 3.3v and 5v signals, and allows you to stack another shield above it.</p>
</div>
<div style="height:450px; border-bottom:1px solid #e0e0e0;">
	<img src="http://cdn.makezine.com/make/blogs/blog.makezine.com/maker%20Shed%203d%20DOTD%202.jpg" height="300" />
	<a href="http://www.makershed.com/&Click=74174" target="_blank"><h4>Maker Shed</h4></a>
	<p>Find oodles of other Arduino boards, shields, accessories, electronics components and resources, kits, educational materials, and more in the Maker Shed.
</p>
</div>
	</div>
	<div style="clear:both;"></div>
</div>

<?php get_footer(); ?>
