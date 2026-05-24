<?php include_once( dirname( __FILE__) . "/../../pwp/php/functions/tree.php"); ?>

<article class="<?php echo implode(' ', get_post_class() ); ?>">

	<h2>
		<a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a>
	</h2>

	<div class="row">

		<div class="col-md-2">

			<div class="panel panel-default details">
				
				<div class="panel-body">

					<div class="date">

						<?php $datetime	= get_post_meta( get_the_ID(), 'fpae_custom_events_datetime', true); ?>

						<div class="day"><?php echo date_i18n( 'd', $datetime ); ?></div>

						<div class="month"><?php echo date_i18n( 'F', $datetime ); ?></div>

						<div class="year"><?php echo date_i18n( 'Y', $datetime ); ?></div>

					</div>

				</div>

			</div>

		</div>

		<div class="col-md-10"><div><?php the_excerpt(); ?></div></div>

	</div>

</article><!--/event-->