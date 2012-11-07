<?php 

function make_youtube_embed($width,$height) {
	global $post;

	$big_video = get_post_meta( $post->ID, 'Link', true );
	if ( empty( $big_video ) )
		return;

	$url = 'http://www.youtube.com/embed/' . urlencode( $big_video ) . '?showinfo=0&hd=1&mode=transparent';
	
}
