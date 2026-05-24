<?php


switch ( get_the_ID() ) {

case 9:

	include( dirname( __FILE__ ) . "/page/social-bodies.php" );

	break;


case 13:

	include( dirname( __FILE__ ) . "/page/contacts.php" );

	break;


case 189:

	include( dirname( __FILE__ ) . "/page/publications.php" );

	break;

case 191:

	include( dirname( __FILE__ ) . "/page/events.php" );

	break;	

case 247:

	include( dirname( __FILE__ ) . "/page/news.php" );

	break;	

default:

	include_once(dirname(__FILE__) . "/../pwp/php/functions/tree.php");

	//$parents = pwp2_get_post_parents( 195 );
	//$parents = pwp_get_post_parents( 195 );

	/*echo pwp_post_breadcrumbs( array('id' => 187, 'tree' => false) );

	if (!$parents) {

		echo "what";
	
	}else {

		print_r($parents);

	}*/

	the_content();

}

?>