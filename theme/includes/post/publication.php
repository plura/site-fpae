<?php

include_once( dirname( __FILE__ ) . "/../../pwp/php/functions/media.php");

$pdfs 		= fpae_get_docs( get_the_ID() );

$featured	= pwp_get_post_image( get_the_ID(), 'medium' );


if ($pdfs && $featured) {

?>

<div class="wp-caption alignleft pdf">

	<a href="<?php echo $pdfs[0]->guid; ?>">

		<img class="size-medium img-rounded" src="<?php echo $featured[0]; ?>" alt="caparevista07[1]" width="<?php echo $featured[1]; ?>" height="<?php echo $featured[2]; ?>" />

	</a>

	<p class="wp-caption-text small"><?php _e('Download PDF version'); ?></p>

</div>


<?php

}


the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', _theme_name() ) );

?>