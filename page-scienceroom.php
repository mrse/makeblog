<?php
/**
/* Template Name: Science Room */

get_header(); ?>

<a href="/science_room/"><img src="<?php bloginfo('template_url'); ?>/images/make_science_room_header.gif" alt="Make: science room" border="0" /></a>
<br clear="all" />

<p>&nbsp;</p>
<strong><h2>Welcome to the Make: Science Room</h2></strong></p>
Greetings citizen scientists, budding biohackers, and backyard explorers! We think you'll find the Make: Science Room a fun and useful resource. We hope you'll use it as your DIY science classroom, virtual laboratory, and a place to share your projects, hacks, and laboratory tips with other amateur scientists. Your Make: Science Room host is Robert Bruce Thompson, author of <em><a href="http://www.makershed.com/ProductDetails.asp?ProductCode=9780596514921&amp;Click=39206">Illustrated Guide to Home Chemistry Experiments: All Lab, No Lecture</a>.</em> (Make: Books, 2008) and <em>Illustrated Guide to Forensics Investigations: Uncover Evidence in Your Home, Lab, or Basement</em> (not yet published). We'll be drawing material from these titles first, but will soon branch out into biology, astrononmy, Earth sciences, and other disciplines. We'll be adding lots of material on a regular basis, so check back often. For more info on the site, see <a href="http://blog.makezine.com/science_room/general/welcome_to_the_make_science_room/index.html">Introducing the Make: Science Room</a>. 

<h4>What's New</h4>
<ul>
<?php wp_list_pages( $args ); ?> 

<?php get_footer(); ?>