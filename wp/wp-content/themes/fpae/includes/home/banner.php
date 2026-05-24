<div class="banner" style="background-image:url('<?php bloginfo('template_directory'); ?>/images/home/file0001523253133.jpg'); ?>');">

	<!--<div class="screen">-->

		<div class="container">
		
			<div class="row">

				<div class="logo col-xs-12 col-sm-6 col-md-7" style="background-image:url('<?php bloginfo('template_directory'); ?>/images/logo_pb_home_black.png'); ?>');"></div>
				
				<div class="col-xs-12 col-sm-6 col-md-5">

					<div class="description">

<?php 

	$post = get_post( 2 );

	echo apply_filters('the_content', $post->post_excerpt);

?>

					</div>

				</div>

			</div><!--row-->

		</div><!--container-->

	<!--</div>-->

</div>