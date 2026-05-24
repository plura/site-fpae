<?php

$news 			= fpae_get_posts( 'news', 4);

$events 		= fpae_get_posts( 'events', array(

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

$publications 	= fpae_get_posts( 'publications');

?>

<div class="row">

	<div class="col-xs-12 col-md-9 module news">

		<div class="holder">

			<h3 class="module-title">
				<a href="<?php echo get_permalink( 247 ); ?>"><?php echo get_the_title( 247 ); ?></a>
			</h3>

			<div class="list-group">
<?php

	foreach( $news->posts as $post ) {

		//https://www.skyverge.com/blog/how-to-generate-a-post-excerpt-outside-the-loop/
		if ( empty( $post->post_excerpt ) ) {
		    
		    $excerpt = wp_kses_post( wp_trim_words( $post->post_content ) );
		
		} else {
		    
		    $excerpt = wp_kses_post( $post->post_excerpt ); 
		
		}		

?>
				<a class="list-group-item" href="<?php echo get_permalink( $post->ID ); ?>">
					
					<h4 class="list-group-item-heading"><?php echo $post->post_title; ?></h4>
    				
    				<div class="list-group-item-text small">

    					<p class="date"><strong><?php echo get_the_date( 'l, d \d\e F \d\e Y', $post->ID ); ?></strong></p>

    					<p class="excerpt"><?php echo $excerpt; ?></p>

    				</div>

				</a><!--/list-group-item-->
<?php

}

?>
			</div><!--/list-group-->

		</div><!--/holder-->

	</div><!--/col | news -->

	<div class="col-md-3 group">

		<div class="row">

			<!-- EVENTS -->
			<div class="col-xs-12 col-md-12 module events">

				<div class="holder">

					<h3 class="module-title">				
						<a href="<?php echo get_permalink( 191 ); ?>"><?php echo get_the_title( 191 ); ?></a>
					</h3>

					<div class="list-group">
	<?php

	foreach( $events->posts as $post ) {

?>
						<a class="list-group-item" href="<?php echo get_permalink( $post->ID ); ?>">
							
							<h4 class="list-group-item-heading"><?php echo $post->post_title; ?></h4>
		    				
						</a><!--/list-group-item-->
<?php

}

?>
					</div><!--/list-group-->

				</div><!--/holder-->

			</div><!--/col | events -->



			<!-- PUBLICATIONS -->
			<div class="col-xs-12 col-md-12 module publications">

				<div class="holder">

					<h3 class="module-title">
						<a href="<?php echo get_permalink( 189 ); ?>"><?php echo get_the_title( 189 ); ?></a>
					</h3>

					<div class="list-group">
<?php

	foreach( $publications->posts as $post ) {

?>
						<a class="list-group-item" href="<?php echo get_permalink( $post->ID ); ?>">
							
							<h4 class="list-group-item-heading"><?php echo $post->post_title; ?></h4>
		    				
						</a><!--/list-group-item-->
<?php

}

?>
					</div><!--/list-group-->

				</div><!--/holder-->

			</div><!--/col | publications -->

		</div><!--/row-->

	</div>

</div>
