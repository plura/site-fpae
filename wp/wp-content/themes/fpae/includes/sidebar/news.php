<?php

$query = fpae_get_posts( 'news ' );;


?>
<div class="panel panel-default news">

	<div class="panel-heading">

		<h3 class="panel-title">	
	
			<a href="<?php echo get_permalink( 247 ); ?>" title="<?php echo get_the_title( 247 ); ?>">
				
				<?php echo get_the_title( 247 ); ?>

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

