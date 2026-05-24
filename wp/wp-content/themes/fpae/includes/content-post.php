<?php


switch ( get_post_type() ) {
	
	case 'fpae_publications':
		
		include( dirname( __FILE__ ) . '/post/publication.php');

		break;
	
	default:

		the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', _theme_name() ) );

}

?>