<?php

include_once( dirname( __FILE__ ) ."/../../pwp/php/functions/media.php");
include_once( dirname( __FILE__) . "/../../pwp/php/functions/tree.php");

$query = fpae_get_posts( 'publications ' );

?>
<div class="panel panel-default publications">

	<div class="panel-heading">

		<h3 class="panel-title">
	
			<a href="<?php echo get_permalink( 189 ); ?>" title="<?php echo get_the_title( 189 ); ?>">
				
				<?php echo get_the_title( 189 ); ?>

			</a>

		</h3>

	</div><!--/panel-heading-->

	<!-- sidebar group -->
	<div class="list-group small">

<?php

foreach( $query->posts as $post ) {

	$img 	= pwp_get_post_image( $post->ID, 'thumbnail' );

	$url	= get_permalink( $post->ID );

	$title	= $post->post_title;

?>

		<div class="sidebar-item list-group-item">

			<div class="media">

<?php

	if ($img) {

?>
				<div class="media-left">
					
					<a href="<?php echo $url; ?>">
				      
				      <img class="media-object img-thumbnail" src="<?php echo $img[0]; ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" alt="<?php echo $title; ?>">
					
					</a>
				  
				</div>
<?php

	}

?>		

				<div class="media-body">

  					<h5 class="media-heading"><a href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h5>

<?php

	echo pwp_post_breadcrumbs( array('id' => $post->ID, 'tree' => false, 'classes' => 'small' ) );

?>  					
				
				</div>
				
			</div><!--/media-->

		</div><!--/ sidebar group item -->

<?php

}

?>
		
	</div><!--/ sidebar group -->

</div><!--/panel-->

