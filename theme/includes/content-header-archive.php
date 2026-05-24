<?php 

$current_taxonomy_id	= get_queried_object()->term_id;

$parent_id 				= get_menu_parent('Main', $current_taxonomy_id);

if (has_post_thumbnail( $parent_id ) ) {

	$featured_image_id	= get_post_thumbnail_id( $parent_id );

	$featured_image		= wp_get_attachment_image_src( $featured_image_id, 'large' );

?>

<div class="jumbotron" style="background-image: url('<?php echo $featured_image[0]; ?>');">

<?php 

} 

?>

<div class="entry-title">


<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>

</div>



<?php if (has_post_thumbnail()) { ?>

</div>

<?php 

} 

?>