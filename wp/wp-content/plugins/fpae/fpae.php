<?php
/*
	Plugin Name: FPAE Custom Types
	Description: Site specific code changes for fpae.pt
*/

require_once( dirname( __FILE__ ) . "/p/init.php");

require_once( dirname( __FILE__ ) . "/fpae_custom_events.php");

//require_once( dirname( __FILE__ ) . "/fpae_custom_initiatives.php");

require_once( dirname( __FILE__ ) . "/fpae_custom_members.php");

require_once( dirname( __FILE__ ) . "/fpae_custom_news.php");

require_once( dirname( __FILE__ ) . "/fpae_custom_publications.php");


//permit excerpt for pages
//don't forget to enable 'excerpt' on the top left corner admin options
add_post_type_support( 'page', 'excerpt');


?>