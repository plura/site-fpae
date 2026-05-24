<?php


$query = fpae_get_posts( 'members',  -1);

?>

<div class="grid row social-bodies-all">


<?php

foreach( $query->posts as $k => $post ) {

	$bclss = $k ? "col-xs-6 col-sm-3" : "col-xs-12";

?>

	<div class="grid-item social-bodies <?php echo $bclss; ?>">

<?php

if (!$k) {

?>
		
		<div class="panel panel-default">
			
			<div class="panel-body">

				<h1 class="title"><a href="<?php echo get_permalink( $post->ID ); ?>" title="<?php echo $post->post_title; ?>"><?php echo $post->post_title; ?></a></h1>			

				<div class="content">

					<?php echo apply_filters('the_content', $post->post_content); ?>

				</div>

			</div>

		</div>

<?php

} else {

?>

		<a href="<?php echo get_permalink( $post->ID ); ?>" title="<?php echo $post->post_title; ?>" class="btn btn-default btn-block">

			<?php echo $post->post_title; ?>

		</a>

<?php

}

?>

	</div>

<?php

}

?>


</div>