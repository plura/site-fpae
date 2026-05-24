<?php

$query = fpae_get_posts( 'initiatives ' );


?>
<div class="panel panel-default initiatives">

	<div class="panel-heading">

		<h3 class="panel-title">	
	
			<a href="<?php get_post_type_archive_link( 'fpae_initiatives' ); ?>">

				<?php _e( 'Initiatives', _theme_name() ); ?>

			</a>

		</h3>

	</div><!--/panel-heading-->


	<!-- sidebar group -->
	<div class="list-group small">

<?php

foreach( $query->posts as $post ) {

?>

		<div class="sidebar-item list-group-item">

			<header>

				<a href="<?php echo get_permalink( $post->ID ); ?>">

					<?php echo $post->post_title; ?>

				</a>

			</header>
				
		</div><!--/ sidebar group item -->

<?php

}

?>

		
	</div><!--/ sidebar group -->

</div><!--/panel-->

