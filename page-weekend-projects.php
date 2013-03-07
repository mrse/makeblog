<?php
/**
 * Template Name: Weekend Projects
 *
 * @package    makeblog
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 * 
 */
make_get_header() ?>
		
	<div class="single">
	
		<div class="container">

			<div class="row">

				<div class="span12">
					
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
					<div class="projects-masthead">
						
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						
					</div>
		
				</div>
			
			</div>
									
			<div class="row">
			
				<div class="span8">
				
					<article <?php post_class(); ?>>

						<div id="content">
						
							<div class="new_red">

								<h1>Mini Rover Redux</h1>

								<div class="video">
							
								<iframe width="560" height="315" src="http://www.youtube.com/embed/YFGKa1pf2Pk" frameborder="0" allowfullscreen></iframe>
							
							</div>
							
							<p>Learn the basics of modding a remote-controlled (R/C) vehicle for the purpose of making your own terrestrial rover. Mount one wireless camera onto your vehicle's chassis, and see how far you can drive it and see what it sees. Then, add a second camera for ultra-wide-angle vision, front and rear viewing, or sterescopic 3D video of the world!
						</p>

							<p><a href="http://makeprojects.com/Project/Mini-Rover-Redux/2479/1" target="_blank" class="btn">See it here &rarr;</a></p>

						</div>

						<div class="clearer"></div>

						<div class="banner">

							<img src="http://cdn.makezine.com/make/facebook/weekend_project/MakeProjectsRSLanding1.png" alt="Weekend Projects" />

						</div>

						<div class="new_red signup">

							<h3>Subscribe to the Weekend Projects Newsletter</h3>
							
							<form action="http://makermedia.createsend.com/t/r/s/qhiiyu/" method="post" id="subForm">
								
								<input type="text" placeholder="name" name="cm-name" id="name" />
								<input type="text" name="cm-qhiiyu-qhiiyu" placeholder="email" id="qhiiyu-qhiiyu" />
								<span class="button orm"><input type="submit" class="button orm" value="Subscribe" /></span>

							</form>
							
							<div class="clearer"></div>

						</div>


						<h2 id="Section_Check_out_the_past_weekend_projects">Latest Projects</h2>

						<div class="guideList">

							<div class="column">

								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/10-Rail-Model-Rocket-Mega-Launcher/243/1">
											<img src="http://guide-images.makeprojects.org/igi/eylPZPA32KXeFikR.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/10-Rail-Model-Rocket-Mega-Launcher/243/1">10-Rail Model Rocket Mega-Launcher</a></p>
									<p class="blurbBlurb">Make the cub scout rocket derby a blast.</p>
								</div><!--10 Rail Rocket Launcher-->

								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Bottle-Radio/2077/1">
											<img src="http://guide-images.makeprojects.org/igi/IH43iswYQZNRMPWU.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Bottle-Radio/2077/1">Bottle Radio</a></p>
									<p class="blurbBlurb">Explore the airwaves with this batteryless AM radio receiver.</p>
								</div><!--Bottle Radio-->
						        
								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Game-Show-Buttons/1916/1">
											<img src="http://guide-images.makeprojects.org/igi/vE5XNVvmEBnUAE2f.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Game-Show-Buttons/1916/1">Game Show Buttons</a></p>
									<p class="blurbBlurb">Get some trusty 555 timer ICs, and you can create a pair of game show buttons.</p>

								</div><!--Game Show Buttons-->
						        <div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Hot-Cold-LED/2445/1">
											<img src="http://guide-images.makeprojects.org/igi/MCjiWaqjfHqqWF4X.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Hot-Cold-LED/2445/1">Hot/Cold LEDs</a></p>
									<p class="blurbBlurb">Explore three "hot/cold" projects with one circuit.</p>

								</div><!--Hot/Cold LEDs-->

								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Little-Big-Lamp/2310/1">
											<img src="http://guide-images.makeprojects.org/igi/uxdUGulRXXjcIBGv.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Little-Big-Lamp/2310/1">Little Big Lamp</a></p>
									<p class="blurbBlurb">Build a bright, energy-efficient lamp with LEDs and PVC.</p>
										
								</div><!--Little Big Lamp-->

							
						    		<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Optical-Tremolo-Box/2276/1">
											<img src="http://guide-images.makeprojects.org/igi/gPPW1HVe1FZNRPSG.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Optical-Tremolo-Box/2276/1">Optical Tremolo Box</a></p>
									<p class="blurbBlurb">Build a light-programmable effects box for your guitar.</p>

								</div><!--Optical Tremolo Box-->
								
								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Projects-in-Motion-Control-Three-Types-of-Motors-with-555-Timers/2036/1">
											<img src="http://guide-images.makeprojects.org/igi/Nqqth6tOYwgTRApT.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Projects-in-Motion-Control-Three-Types-of-Motors-with-555-Timers/2036/1">Projects in Motion</a></p>
									<p class="blurbBlurb">Using the humble 555 timer chip you can control three different types of motors.</p>
										
								</div><!--Project In Motion-->

							
								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Repeat+After+Me%3A+A+Mintronics+Memory+Game/1933/1#.UImbR2l4Z40">
											<img src="http://guide-images.makeprojects.org/igi/KeXBEDVlV3lGPffR.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Repeat+After+Me%3A+A+Mintronics+Memory+Game/1933/1#.UImbR2l4Z40">Repeat After Me</a></p>
									<p class="blurbBlurb">Turn a MAKE MintDuino and Mintronics Survival Pack into a fun memory game.</p>

								</div><!--Repeat After Me: A Mintronics Memory Game-->

						    	<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Solar-Joule-Bracelet/22/1">
											<img src="http://guide-images.makeprojects.org/igi/hWWZjP5uA1TPxrDm.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Solar-Joule-Bracelet/22/1">Solar Joule Bracelet</a></p>
									<p class="blurbBlurb">Wearable fashion technology that glows!</p>

								</div><!--Solar Joule Bracelet-->
						    
							<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Talking-Booby-Trap/1944/1">
											<img src="http://guide-images.makeprojects.org/igi/3jHpiQwdwXP4Y14p.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Talking-Booby-Trap/1944/1">Talking Booby Trap</a></p>
									<p class="blurbBlurb">Stop snoops with this sneaky gizmo!</p>
								</div><!--Talking Booby Trap-->

							</div>
							
							<div class="columnLast">

								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/BEAM-Solar-Chariots/1939/1">
											<img src="http://guide-images.makeprojects.org/igi/JiK6cRUqbpqkqMIE.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/BEAM-Solar-Chariots/1939/1">BEAM Solar Chariots</a></p>
									<p class="blurbBlurb">Build a fun solar-powered roller or symet BEAM bot.</p>
									
								</div><!--BEAM Solar Chariots-->
						        
						        <div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Covert+Listening+Book/2150/1">
											<img src="http://guide-images.makeprojects.org/igi/cqW2OWQFeUGhZagW.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Covert+Listening+Book/2150/1">Covert Listening Book</a></p>
									<p class="blurbBlurb">Make a wireless "bug" and hide it inside a hollowed-out book.</p>

								</div><!--Covert Listening Book-->
						            
						        	<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Extreme-LED-Throwies/2154/1">
											<img src="http://guide-images.makeprojects.org/igi/Ea1cO1HAUFmYHghF.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Extreme-LED-Throwies/2154/1#.T9oC6CtYvbI">Extreme LED Throwies</a></p>
									<p class="blurbBlurb">Learn about and build simple glowing circuits!</p>
								</div><!--Extreme LED Throwies-->

								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Infrared-String-Bass/2049/1">
											<img src="http://guide-images.makeprojects.org/igi/itWIyE2KhZfvBdkC.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Infrared-String-Bass/2049/1">Infrared String Bass</a></p>
									<p class="blurbBlurb">Build an optical guitar using the LM386 amp.</p>
								</div><!--Infrared String Bass-->
						        
						        
						        		<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Mini-Rover-Redux/2479/1">
											<img src="http://guide-images.makeprojects.org/igi/GqKmam4KtLRqfT5r.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Mini-Rover-Redux/2479/1">Mini Rover Redux</a></p>
									<p class="blurbBlurb">Mod a remote-controlled toy and see what it sees.</p>
								</div><!--Mini Rover Redux-->
						        

								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Monkey-Couch-Guardian/2232/1">
											<img src="http://guide-images.makeprojects.org/igi/11CM4gQFKRymK3ah.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Monkey-Couch-Guardian/2232/1">Monkey Couch Guardian</a></p>
									<p class="blurbBlurb">Make an obnoxious device to discourage animals from jumping on beds and couches.</p>
								</div><!--Monkey Couch Guardian-->
						        
						        		<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/MonoBox+Powered+Speaker/2396/1">
											<img src="http://guide-images.makeprojects.org/igi/fVQxlqNTOvTVKtu3.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/MonoBox+Powered+Speaker/2396/1">MonoBox Powered Speaker</a></p>
									<p class="blurbBlurb">Build a powered speaker and amplify your portable music player.</p>

								</div><!--Mono Box Powered Speaker-->
						        
						        	<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/PIR+Sensor+Arduino+Alarm/72/1#.UJGRAGl4ZNs">
											<img src="http://guide-images.makeprojects.org/igi/iSOGQVmBVaSCIygQ.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/PIR+Sensor+Arduino+Alarm/72/1#.UJGRAGl4ZNs">PIR Sensor Arduino Alarm</a></p>
									<p class="blurbBlurb">Build a basic alarm buzzer using a PIR sensor and an Arduino.</p>

								</div><!--PIR Sensor Arduino Alarm-->
								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Sun-Logger/2275/1">
											<img src="http://guide-images.makeprojects.org/igi/YIRAt1ETqxxARgNS.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Sun-Logger/2275/1">Sun Logger</a></p>
									<p class="blurbBlurb">Build a data logger to gather information about sunlight.</p>
								</div><!--Sun Logger-->  
						        
						        
								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/A-Touchless-3D-Tracking-Interface/2233/1">
											<img src="http://guide-images.makeprojects.org/igi/LNr1tjTZTTvni2pj.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/A-Touchless-3D-Tracking-Interface/2233/1">A Touchless 3D Tracking Interface</a></p>
									<p class="blurbBlurb">Create a touchless 3D tracking interface with Arduino.</p>

								</div><!--A Touchless 3D Tracking Interface-->

							</div>
							
							<div class="clearer"></div>

						</div>


						<h2 id="Section_Check_out_the_past_weekend_projects">Check out all of the weekend projects</h2>

						<div class="guideList">

							<div class="column">
							
								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="/Project/Add-Volume-Jack/926/1">
											<img src="http://guide-images.makeprojects.org/igi/sWI1o1IkMWmLejfp.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="/Project/Add-Volume-Jack/926/1">Add Volume, Jack</a></p>
									<p class="blurbBlurb">Plug in and turn up any sound-making battery toy.</p>
									
								</div><!--Add Volume, Jack-->
								
								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Alarm-Bag/1057/1">
											<img src="http://guide-images.makeprojects.org/igi/mbTsspJNM2AKFH3B.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Alarm-Bag/1057/1">Alarm Bag</a></p>
									<p class="blurbBlurb">Add an anti-theft alarm to your messenger bag!</p>
									
								</div><!--Alarm Bag-->
								
								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="/Project/Aircraft-Band-Receiver/985/1">
											<img src="http://guide-images.makeprojects.org/igi/kHAfSuvIMxxjMond.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="/Project/Aircraft-Band-Receiver/985/1">Aircraft Band Receiver</a></p>
									<p class="blurbBlurb">Modify an ordinary AM/FM radio to eavesdrop on air traffic control.</p>
										
									</div><!--Aircraft Band Receiver-->
									
								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="/Project/Floating-Glow-Display/968/1">
											<img src="http://guide-images.makeprojects.org/igi/YUsQEdDM3pRQoUui.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a style="word-spacing:-2px;" href="/Project/Floating-Glow-Display/968/1">Floating Glow Display</a></p>
									<p class="blurbBlurb">Glowing sign uses an LED and internal reflection for a fascinating visual effect.</p>
										
								</div><!--Floating Glow Display-->
								
								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="/Project/Light-Theremin/989/1">
											<img src="http://guide-images.makeprojects.org/igi/ufIy5xsGjFveYJiL.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="/Project/Light-Theremin/989/1">Light Theremin</a></p>
									<p class="blurbBlurb">Use the ever-popular 555 timer chip to create an instrument of the retro-future!</p>
									
								</div><!--Light Theremin-->
								
								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/The-Luna-Mod-Looper/974/1">
											<img src="http://guide-images.makeprojects.org/igi/EFqhQZP5Y1OwGRTw.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/The-Luna-Mod-Looper/974/1">The Luna Mod Looper</a></p>
									<p class="blurbBlurb">A simple handheld synth and looper box that generates intriguing sonic rhythms.</p>
									
								</div><!--Luna Mod Looper-->
								
								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Mystery-Electronic-Switches/988/1">
											<img src="http://guide-images.makeprojects.org/igi/ViPhGR2Ewrc1RTcJ.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Mystery-Electronic-Switches/988/1">Mystery Electronic Switches</a></p>
									<p class="blurbBlurb">This prank gadget frustrates people, but only you know...</p>
									
								</div><!--Mystery Electronic Switches -->
								
								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Simple-Laser-Communicator/972/1">
											<img src="http://guide-images.makeprojects.org/igi/ewn1TNGXX6WFQeUy.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Simple-Laser-Communicator/972/1">Simple Laser Communicator</a></p>
									<p class="blurbBlurb">Talk in secret over your own private laser beam link.</p>
									
								</div><!--Simple Laser Communicator -->
								
							</div>
							
							<div class="columnLast">

								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="/Project/Solar-TV-Remote/969/1">
											<img src="http://guide-images.makeprojects.org/igi/aNxnuvWNVFOnSGke.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="/Project/Solar-TV-Remote/969/1">Solar TV Remote</a></p>
									<p class="blurbBlurb">Juice your flipper with sunlight.</p>
									
								</div><!--Solar TV Remote-->
								
								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Solar-USB-Charger/1115/1">
											<img src="http://guide-images.makeprojects.org/igi/hqAmaWobYLXmrSrk.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Solar-USB-Charger/1115/1">Solar USB Charger</a></p>
									<p class="blurbBlurb">A simple-to-make charger that safely recharges many USB devices using solar power.</p>
									
								</div><!--Solar USB Charger-->
								
								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Treasure-Finder/1113/1">
											<img src="http://guide-images.makeprojects.org/igi/A5eJBRZ6aFhcLlWu.thumbnail" alt="treasure Finder" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Treasure-Finder/1113/1">Treasure Finder</a></p>
									<p class="blurbBlurb">Build a metal detector for a fraction of the cost.</p>
									
								</div><!--Treasure Finder-->
								
								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="/Project/USB-Webcam-Microscope/963/1">
											<img src="http://guide-images.makeprojects.org/igi/rv3pBY21Hb3AJVOF.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="/Project/USB-Webcam-Microscope/963/1">USB Webcam Microscope</a></p>
									<p class="blurbBlurb">Convert a webcam into a fun USB microscope.</p>
									
								</div><!--USB Webcam Microscope-->
								
								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/Wearable-Light-Organ/1114/1">
											<img src="http://guide-images.makeprojects.org/igi/hIEpEOliFpbfJaIy.thumbnail" alt="Wearable Light Organ" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/Wearable-Light-Organ/1114/1">Wearable Light Organ</a></p>
									<p class="blurbBlurb">Turn a few common components into a wearable dance floor light show!</p>
									
								</div><!--Wearable Light Organ-->
								
								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="/Project/Whack-a-Mole-Game/977/1">
											<img src="http://guide-images.makeprojects.org/igi/OlU3itB2CKUqMUDa.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="/Project/Whack-a-Mole-Game/977/1">Whack-a-Mole Game</a></p>
									<p class="blurbBlurb">555 timer chips create a mini version of the "Whack-a-Mole" arcade game.</p>
									
								</div><!--Whack-a-Mole Game-->
								
								<div class="blurbMini">
									<div class="blurbImage">
										<a class="" href="http://makeprojects.com/Project/555-Timer-Ball-Whacker/1061/1">
											<img src="http://guide-images.makeprojects.org/igi/1FH6EIMFyik3ZgTM.thumbnail" alt="Blurb image" />
										</a>
									</div>
									<p class="blurbTitle"><a class="" href="http://makeprojects.com/Project/555-Timer-Ball-Whacker/1061/1">555 Timer Ball Whacker</a></p>
									<p class="blurbBlurb">A wooden arm swats at objects when they draw near.</p>
								</div><!--555 Timer Ball Whacker-->
								
							</div>
							
							<div class="clearer"></div>

						<div class="clearer"></div>
							
						</div>

						
					
					</article>
					
					<?php endwhile; ?>

					<?php if (function_exists('make_featured_products')) { make_featured_products(); } ?>

					<div class="comments">
						<?php comments_template(); ?>
					</div>
					
					<?php else: ?>
					
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					
					<?php endif; ?>
				</div>
				
				
				<?php get_sidebar(); ?>
					
			</div>

		</div>

	</div>

<?php get_footer(); ?>