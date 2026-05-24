<?php

print_r($wp_query->get_queried_object());

exit;

$excerpt 	= get_the_excerpt( );

$date		= get_the_date( 'd\.m\.Y' );

?>

<div class="grid-item col-xs-12 col-md-4">

	<div class="panel panel-default small">

		<div class="panel-heading">

	<?php		
			the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
		
	?>

		</div>

<?php

if ( !empty($excerpt) ) {

?>

		<div class="panel-body">
<?php

the_excerpt();

?>


		</div>

<?php

}

?>

		<div class="panel-footer">

			<div class="category"></div>

			<div class="date"><?php echo $date; ?></div>

		</div>

	</div>

</div>