<?php // Display blog posts on any page @ http://m0n.co/l

include_once( dirname( __FILE__) . "/../../pwp/php/functions/tree.php");

$paged		= get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

$my_query	= new WP_Query( array(
	'meta_key'			=> 'fpae_custom_events_datetime',
	'orderby'			=> 'meta_value_num',
	'post_type'			=> 'fpae_events',
	'posts_per_page'	=> 5,
	'paged'				=> $paged
));

?>

<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

<?php

$timestamp		= ( new DateTime() )->getTimeStamp();

$post_timestamp	= get_post_meta( get_the_ID(), 'fpae_custom_events_datetime', true);

$posttimeclass	= $post_timestamp > $timestamp ? "future" : "past";

if ( $my_query->current_post > 0 && $lastpost_timestamp > $timestamp && $post_timestamp < $timestamp ) {

	$future_past_divider = 1;

?>

<div id="past-events" data-title="<?php _e('Past Events', _theme_name() ); ?>" class="article-divider">

<?php

}

?>

<article class="<?php echo implode(' ', get_post_class( $posttimeclass ) ); ?>">

	<h2 class="entry-title">
		<a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a>
	</h2>

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

		<div class="col-md-10"><div><?php the_excerpt(); ?></div></div>

	</div>

</article><!--/event-->

<?php

if ( $my_query->current_post === $my_query->post_count - 1 && isset( $future_past_divider ) ) {

?>

</div><!-- past events holder -->

<?php

}

$lastpost_timestamp = $post_timestamp;

?>


<?php endwhile; ?>


<?php if ($paged > 1) { ?>

	<nav id="nav-posts">
		<div class="prev"><?php next_posts_link('&laquo; Previous Posts', $my_query->max_num_pages); ?></div>
		<div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
	</nav>

<?php } else { ?>

	<nav id="nav-posts">
		<div class="prev"><?php next_posts_link('&laquo; Previous Posts', $my_query->max_num_pages); ?></div>
	</nav>

<?php } ?>

<?php wp_reset_query(); ?>
