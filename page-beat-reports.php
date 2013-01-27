<?php
/**
 * Template Name: Beat Reports
 */

$authors = array(
	'frauenfelder' => array(
		'name' => 'Mark Frauenfelder',
		'beat' => 'Engineering &amp; Arduino',
		'title' => 'MAKE editor-in-chief',
		'image' => 'http://cdn.makezine.com/make/makerfaire/newyork/2012/images/editors/mark.jpg',
		'username' => 'frauenfelder',
		'id' => 17959432
		),
	'makeswallace' => array(
		'name' => 'Shawn Wallace',
		'beat' => '3D Printing',
		'title' => 'MAKE contributing editor',
		'image' => 'http://cdn.makezine.com/make/makerfaire/newyork/2012/images/editors/shawn.jpg',
		'username' => 'makeswallace',
		'id' => 30651874
		),
	'garethb2' => array(
		'name' => 'Gareth Branwyn',
		'beat' => 'Robots',
		'title' => 'MAKE editorial director',
		'image' => 'http://cdn.makezine.com/make/makerfaire/newyork/2012/images/editors/garethb2.jpg',
		'username' => 'garethb2',
		'id' => 15536991
		),
	'makemattr' => array(
		'name' => 'Matt Richardson',
		'beat' => 'Electronics &amp; Embedded Platforms',
		'title' => 'MAKE contributing editor',
		'image' => 'http://cdn.makezine.com/make/makerfaire/newyork/2012/images/editors/matt.jpg',
		'username' => 'makemattr',
		'id' => 30651872
		),
	'seanmichaelragan' => array(
		'name' => 'Sean Ragan',
		'beat' => 'Science',
		'title' => 'MAKE technical editor',
		'image' => 'http://cdn.makezine.com/make/makerfaire/newyork/2012/images/editors/sean.jpg',
		'username' => 'seanmichaelragan',
		'id' => 17959513
		),
	'stettholbrook1234' => array(
		'name' => 'Stett Holbrook',
		'beat' => 'Food',
		'title' => 'MAKE senior editor',
		'image' => 'http://cdn.makezine.com/make/makerfaire/newyork/2012/images/editors/stett.jpg',
		'username' => 'stettholbrook1234',
		'id' => 39736872
		),
	'blakemaloof' => array(
		'name' => 'Blake Maloof',
		'beat' => 'Gaming',
		'title' => 'MAKE contributing writer',
		'image' => 'http://cdn.makezine.com/make/makerfaire/newyork/2012/images/editors/blake.jpg',
		'username' => 'blakemaloof',
		'id' => 9837715
		),
	'makesabrinamerlo' => array(
		'name' => 'Sabrina Merlo',
		'beat' => 'Design',
		'title' => 'Maker Faire program director',
		'image' => 'http://cdn.makezine.com/make/makerfaire/newyork/2012/images/editors/sabrina.jpg',
		'username' => 'makesabrinamerlo',
		'id' => 30651884
		),
	'thezenofmaking' => array(
		'name' => 'Haley Pierson-Cox',
		'beat' => 'Craft',
		'title' => 'CRAFT editor',
		'image' => 'http://cdn.makezine.com/make/makerfaire/newyork/2012/images/editors/haley.jpg',
		'username' => 'thezenofmaking',
		'id' => 23472991
		),
	);

foreach ($authors as $author) {

	echo '<div class="row-fluid" style="margin-bottom:20px;">';
	echo '<div class="span4">';
		 echo '<a href="http://blog.makezine.com/author/'.$author['username'].'/"><img src="'.$author['image'].'" alt="'.$author['name'].'" class="thumbnail" /></a>';
	echo '</div>';	
	echo '<div class="span8">';
		echo '<h3><a href="http://blog.makezine.com/author/'.$author['username'].'/">'.$author['name'].'</a> <small>'.$author['title'].'</small></h3>';
		echo '<h4>Beat: '.$author['beat'].'</h5>';
		$args = array(
			'author' => $author['id'],
			'posts_per_page' => 5,
			'post_type' => array( 'post', 'craft' ),
			'no_found_rows' => true,
		);
		echo '<ul>';
		$the_query = new WP_Query( $args );
		while ( $the_query->have_posts() ) : $the_query->the_post();
			echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
		endwhile;
		echo '</ul>';
		echo '<p><a href="' . esc_url( 'http://blog.makezine.com/author/'.$author['username'].'/' ) .'">Read more &rarr;</a></p>';
	echo '</div></div>';
}
