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

					<?php
						$side_query = new WP_Query( array(
							'post_type'  => array( 'post', 'projects', 'review', 'video', 'magazine' ),
							'post_count' => 4,
							'posts_per_page' => 4, // Required or else WP will return 10.
							'category'   => 'education',
						) );

						if ( $side_query->have_posts() ) : while ( $side_query->have_posts() ) : $side_query->the_post(); ?>
							<article <?php post_class( 'side-post' ); ?>>
								<div class="media">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'archive-thumb', array( 'class' => 'media-object' ) ); ?></a>
								</div>
								<div class="media-body">
									<a href="<?php the_permalink(); ?>"><h4 class="side-title"><?php the_title(); ?></h4></a>
									<p><?php echo wp_trim_words(get_the_excerpt(), 50, '...'); ?></p>
								</div>
							</article>
						<?php endwhile; endif;
					?>
				</div>
					
			</div>

		</div>

	</div>

<?php get_footer(); ?>