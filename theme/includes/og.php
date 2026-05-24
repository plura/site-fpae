<?php

include_once( dirname( __FILE__ ) . "/../pwp/php/functions/common.php");
include_once( dirname( __FILE__ ) . "/../pwp/php/functions/media.php");
include_once( dirname( __FILE__ ) . "/../pwp/php/functions/tree.php");

global $og_description, $og_image_src, $og_title, $og_url;


$og_title 		= wp_title( '|', false, 'right' );

$og_image_src	= get_bloginfo('template_directory') . "/images/logo_pb_home.png";

$og_description	= preg_replace( "/\r|\n/", "", get_post( 247 )->post_content );

$og_url			= pwp_currentURL();



if (!is_home() && ( is_single() || is_page() ) ) {


	$og_description	= get_post( get_the_ID() )->post_excerpt;


	if ( is_single() ) {

		$terms		= get_the_terms( get_the_ID(), 'category' );

		$a			= array( $post->post_title, $terms[0]->name,  get_bloginfo('name') );

		$og_title	= implode( " | ", $a);

	}


	if ( $img = pwp_get_post_image( get_the_ID() ) ) {

		$og_image_src = $img[0];

	}


} elseif( is_tax() ) {

	$og_term			= get_queried_object();

	$og_term_parents	= pwp_get_term_parents();

	$a					= array( $og_term->name );

	if ( $og_term_parents ) {

		foreach ( $og_term_parents as $parent ) {

			$a[] = get_term( $parent, $og_term->taxonomy )->name;

		}
	
	}

	//$og_title			= implode( " | ", $a ) . " | " . get_bloginfo('name');

	/*$og_image 			= multifoto_get_term_image( $og_term->term_id );

	$og_image_src		= $og_image[0];

	$og_title			= implode( " | ", $a ) . " | " . get_bloginfo('name');

	if ( !empty( $term->description) ) {

		$og_description = $term->description;

	}*/

}

?>
<meta property="og:description" content="<?php echo $og_description; ?>" />
<meta property="og:image" content="<?php echo $og_image_src; ?>" />
<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>"/>
<meta property="og:title" content="<?php echo $og_title; ?>"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="<?php echo $og_url; ?>"/>
