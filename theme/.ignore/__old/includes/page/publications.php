<?php

include_once( dirname( __FILE__) . "/../../pwp/php/functions/tree.php");

$query = new WP_Query( array(
    'post_type'			=> 'fpae_publications',
	'posts_per_page'	=> -1
) );

?>

<div class="grid publications row">

<?php

foreach( $query->posts as $post ) {

?>

	<div class="grid-item publication col-xs-6 col-sm-4 col-md-4">

		<div class="holder">

			<div class="panel panel-default">

				<div class="panel-heading">

					<h3 class="panel-title">				

						<a href="<?php echo get_permalink( $post->ID ); ?>">
							
							<?php echo $post->post_title; ?>

						</a>

					</h3>

				</div>

				<div class="panel-body">

				<?php echo $post->post_excerpt; ?>

				</div>

				<div class="panel-footer small">

					<?php 

						echo pwp_post_breadcrumbs( array('id' => $post->ID, 'tree' => false ) );

					?>

				</div>

			</div>

		</div><!--/grid-item holder-->

	</div><!--/grid-item-->


<?php

}

?>


</div><!--/grid-->