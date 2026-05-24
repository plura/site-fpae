<!--<div class="jumbotron" style="background-image:url('<?php bloginfo('template_directory'); ?>/images/home/lecture.jpg'); ?>');">

	


</div>-->

<div class="row modules-holder-20160225">


	<!-- NEWS -->
	<div class="col-xs-9 module news">

		<div class="panel panel-default">

			<div class="row">

				<div class="col-xs-12 col-sm-4 btn-holder">

					<h2 class="title btn btn-block btn-default"><?php _e('News', _theme_name() ); ?></h2>
				
				</div>

				<ul class="list-group col-xs-12 col-sm-8">

<?php

$news_query = fpae_get_posts( 'news ');

foreach( $news_query->posts as $post ) {

?>
			<li class="list-group-item">
				<a href="<?php echo get_permalink( $post->ID ); ?>" title="<?php echo $post->post_title; ?>">
					<?php echo $post->post_title; ?>
				</a>
			</li>
	<?php

}

?>
				</ul><!--panel list group-->

			</div>

		</div><!--panel-->

	</div><!-- module-->

	<!-- EVENTS + PUBLICATION -->

	<div class="col-xs-3 module events-publications">

		<div class="panel panel-default">

			<ul class="list-group">

				<li class="list-group-item events"><a class="title"><?php _e('Events', _theme_name() ); ?></a></li>

				<li class="list-group-item publications"><a class="title"><?php _e('Publications', _theme_name() ); ?></a></li>

			</ul>

		</div>



	</div>


</div><!--/ row-->