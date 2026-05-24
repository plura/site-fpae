<?php 

include_once( dirname( __FILE__) . "/../../pwp/php/functions/media.php"); 
include_once( dirname( __FILE__) . "/../../pwp/php/functions/tree.php"); 

?>


<article class="<?php echo implode(' ', get_post_class() ); ?>">

	<h2>
		<a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a>
	</h2>

	<div class="row">

		<div class="col-xs-12">

			<div class="details">

					<!--<div class="date"><?php echo get_the_date( 'd', get_the_ID() ); ?></div>-->

			</div>

		</div>

<?php
	
	$img 	= pwp_get_post_image( get_the_ID(), 'thumbnail' );

	if ( $img ) {

?>

		<div class="col-md-2 thumb">

			<a href="<?php echo get_permalink(); ?>">

				<img src="<?php echo $img[0]; ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[1]; ?>" class="img img-rounded"/>

			</a>

		</div>

		<div class="col-md-10">

<?php

	} else {

?>

		<div class="col-md-12">
			
<?php

	}

?>
			<div><?php the_excerpt(); ?></div>

		</div>

	</div>

</article><!--/event-->