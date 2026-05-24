<?php

$queries = array(

	'events' => array(

		'label' => __( 'Events', _theme_name() ),

		'query'	=> fpae_get_posts( 'events ')

	),

	/*'initiatives' => array(

		'label' => __( 'Initiatives', _theme_name() ),

		'query'	=> fpae_get_posts( 'initiatives ')

	),*/

	'news' => array(

		'label' => __( 'News', _theme_name() ),

		'query'	=> fpae_get_posts( 'news ')

	),

	'publications' => array(

		'label' => __( 'Publications', _theme_name() ),

		'query'	=> fpae_get_posts( 'publications ')

	)

);

?>

<div class="grid modules row">

<?php

foreach( $queries as $k => $data ) {

	$module_item_class	= preg_replace('/s$/', '', $k);

?>

	<div class="grid-item module col-xs-6 col-sm-4 col-md-4 <?php echo $k; ?>">

		<div class="holder">

			<h1 class="title text-center"><?php echo $data['label']; ?></h1>

			<div class="panel panel-default">

				<ul class="list-group">

<?php

	foreach( $data['query']->posts as $post) {

?>
					<li class="list-group-item">
						<a href="<?php echo get_permalink( $post->ID ); ?>" title="<?php echo $post->post_title; ?>">
							<?php echo $post->post_title; ?>
						</a>
					</li>
<?php

	}

?>

				</ul><!--list group-->

			</div><!--panel-->

		</div><!--holder-->

	</div><!-- grid-item -->

<?php

}

?>

</div>