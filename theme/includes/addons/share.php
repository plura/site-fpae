<?php

include_once( dirname( __FILE__ ) . "/../../pwp/php/functions/media.php");
include_once( dirname( __FILE__ ) . "/../../pwp/php/functions/social.php");

//SOCIAL MEDIA SHARING
$image	= pwp_get_post_image( get_the_ID() );

//$soc_title	= array( get_the_title( get_the_ID() ), $term->name, get_bloginfo('name') );

/*if ( empty( $soc_title[0] ) ) {

	$soc_title[0] = '#' . $post->ID;

}*/
/*
$soc_media	= $image[0];

echo $og_title;*/

pwp_social( array(
	'comments'		=> true,
	'classes'		=> 'pop',
	'filter'		=> array('facebook', 'linkedin', 'twitter', 'mail'),
	'media'			=> $image ? $image[0] : false,
	'source'		=> 'http://blog.babka.pt',				
	'title' 		=> get_the_title(),
	'url'			=> get_permalink( get_the_ID() ),
	'wrapper-icon'	=> true
) );


?>