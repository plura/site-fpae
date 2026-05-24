<?php

include_once( dirname( __FILE__) . "/../pwp/php/functions/tree.php"); 

if ( get_post_type() === 'fpae_events' ) {

?>

	<div class="row">

		<div class="col-md-2">

			<div class="panel panel-default details">
				
				<div class="panel-body">

					<?php echo pwp_post_breadcrumbs( array('id' => get_the_ID(), 'tree' => false, 'classes' => 'small' ) ); ?>

					<div class="date">
						
						<?php $datetime	= get_post_meta( get_the_ID(), 'fpae_custom_events_datetime', true); ?>

						<div class="day"><?php echo date_i18n( 'd', $datetime ); ?></div>

						<div class="month"><?php echo date_i18n( 'F', $datetime ); ?></div>

						<div class="year"><?php echo date_i18n( 'Y', $datetime ); ?></div>

					</div>

				</div>

			</div>

		</div>

		<div class="col-md-10"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></div>

	</div>

<?php

	} else {

		the_title( '<h1 class="entry-title">', '</h1>' );

	}	

?>


