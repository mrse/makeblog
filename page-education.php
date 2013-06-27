<?php
/**
 * Template Name: Education
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
				
					<article <?php post_class( 'row' ); ?>>

						<div class="span8">
						<?php the_content(); ?>
					</div>

						<div class="span4 education-box">
							<h2>Collaborative Online Courses</h2>

							<img src="http://localhost/wp-content/uploads/2013/06/maker-training-camps.png" alt="maker-training-camps" width="370" height="35" class="alignnone size-full wp-image-317194" />

							<ul>
								<li>Google+ makes it easy to work with other students and teachers.  Post questions in the online community or attend weekly office hours in a Hangout. Join Google+</li>
								<li>Our teachers are writers for Make, professors, and business professionals using what they teach. Become a Teacher</li>
								<li>Camps are one and five weeks in length with a lecture, office hours, and a project each week. Tuition costs range from free to $150. </li>
							</ul>

							<a href="#" class="btn btn-primary blue">Learn More</a>
						</div>
						<div class="span4 education-box">
							<h2>Collaborative Online Courses</h2>

							<img src="http://localhost/wp-content/uploads/2013/06/maker-training-camps.png" alt="maker-training-camps" width="370" height="35" class="alignnone size-full wp-image-317194" />

							<ul>
								<li>Google+ makes it easy to work with other students and teachers.  Post questions in the online community or attend weekly office hours in a Hangout. Join Google+</li>
								<li>Our teachers are writers for Make, professors, and business professionals using what they teach. Become a Teacher</li>
								<li>Camps are one and five weeks in length with a lecture, office hours, and a project each week. Tuition costs range from free to $150. </li>
							</ul>

							<a href="#" class="btn btn-primary blue">Learn More</a>
						</div>
						<div class="span4 education-box">
							<h2>Collaborative Online Courses</h2>

							<img src="http://localhost/wp-content/uploads/2013/06/maker-training-camps.png" alt="maker-training-camps" width="370" height="35" class="alignnone size-full wp-image-317194" />

							<ul>
								<li>Google+ makes it easy to work with other students and teachers.  Post questions in the online community or attend weekly office hours in a Hangout. Join Google+</li>
								<li>Our teachers are writers for Make, professors, and business professionals using what they teach. Become a Teacher</li>
								<li>Camps are one and five weeks in length with a lecture, office hours, and a project each week. Tuition costs range from free to $150. </li>
							</ul>

							<a href="#" class="btn btn-primary blue">Learn More</a>
						</div>
						<div class="span4 education-box">
							<h2>Collaborative Online Courses</h2>

							<img src="http://localhost/wp-content/uploads/2013/06/maker-training-camps.png" alt="maker-training-camps" width="370" height="35" class="alignnone size-full wp-image-317194" />

							<ul>
								<li>Google+ makes it easy to work with other students and teachers.  Post questions in the online community or attend weekly office hours in a Hangout. Join Google+</li>
								<li>Our teachers are writers for Make, professors, and business professionals using what they teach. Become a Teacher</li>
								<li>Camps are one and five weeks in length with a lecture, office hours, and a project each week. Tuition costs range from free to $150. </li>
							</ul>

							<a href="#" class="btn btn-primary blue">Learn More</a>
						</div>

						
					</article>
					
					<?php endwhile; ?>
					
					<?php else: ?>
					
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					
					<?php endif; ?>
				</div>
				
				
				<div class="span4 sidebar">



				</div>
					
			</div>

		</div>

	</div>

<?php get_footer(); ?>