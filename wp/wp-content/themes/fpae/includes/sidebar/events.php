<?php

include_once( dirname( __FILE__ ) . "/../../pwp/php/functions/tree.php");

$query = fpae_get_posts('events', array(

	'meta_key'		=> 'fpae_custom_events_datetime',
	'orderby'		=> 'meta_value_num',

	'meta_query'	=> array(
		array(
			'key'		=> 'fpae_custom_events_datetime',
			'value'		=> ( new DateTime() )->getTimeStamp(),
			'compare'	=> '>',
			'type'		=> 'numeric'
		)
	)

));

?>
<div class="panel panel-default events">

	<div class="panel-heading">

		<h3 class="panel-title">		

			<a href="<?php echo get_permalink( 191 ); ?>" title="<?php echo get_the_title( 191 ); ?>">
				
				<?php echo get_the_title( 191 ); ?>

			</a>

		</h3>

	</div><!--/panel-heading-->


	<!-- sidebar group -->
	<div class="list-group small">

<?php

foreach( $query->posts as $post ) {

	$datestamp = get_post_meta($post->ID, 'fpae_custom_events_datetime', true)

?>

		<div class="sidebar-item list-group-item">

			<header>

				<a href="<?php echo get_permalink( $post->ID ); ?>" title="<?php echo $post->post_title; ?>">

					<?php echo $post->post_title; ?>

				</a>

			</header>

			<?php echo pwp_post_breadcrumbs( array('id' => $post->ID, 'tree' => false, 'classes' => 'small' ) ); ?>
				
		</div><!--/ sidebar group item -->

<?php

}

?>

		
	</div><!--/ sidebar group -->

</div><!--/panel-->

