<?php

switch ( $wp_query->get_queried_object()->taxonomy ) {

case 'fpae_events_categories':

	include( dirname( __FILE__ ) . "/archive/events.php");

	break;

case 'fpae_publications_categories':

	include( dirname( __FILE__ ) . "/archive/publications.php");

	break;	

default:


	break;

}

?>

