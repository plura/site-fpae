<?php // Display blog posts on any page @ http://m0n.co/l

include_once( dirname( __FILE__) . "/../../pwp/php/functions/media.php"); 
include_once( dirname( __FILE__) . "/../../pwp/php/functions/tree.php"); 

$paged		= get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

$my_query	= new WP_Query( array(
	'post_type'			=> 'fpae_publications',
	'posts_per_page'	=> 5,
	'paged'				=> $paged
));

?>

<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

<article class="<?php echo implode(' ', get_post_class() ); ?>">

	<h2 class="entry-title">
		<a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a>
	</h2>

	<div class="row">

		<div class="col-xs-12">

			<div class="details">
				
				<?php echo pwp_post_breadcrumbs( array('id' => get_the_ID(), 'tree' => false, 'classes' => 'small' ) ); ?>

				<!--<div class="date">

					<div class="day"><?php echo get_the_date( 'd', get_the_ID() ); ?></div>

					<div class="month"><?php echo get_the_date( 'F', get_the_ID() ); ?></div>

					<div class="year"><?php echo get_the_date( 'Y', get_the_ID() ); ?></div>

				</div>-->

			</div>

		</div>

<?php
	
	$img 	= pwp_get_post_image( get_the_ID(), 'thumbnail' );

	if ( $img ) {

?>

		<div class="col-md-2 thumb">

			<a href="<?php echo get_permalink(); ?>">

				<img src="<?php echo $img[0]; ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[1]; ?>" class="img img-rounded"/>

			</a>

		</div>

		<div class="col-md-10 content">

<?php

	} else {

?>

		<div class="col-md-12 content">
			
<?php

	}

?>
			<div><?php the_excerpt(); ?></div>

		</div><!--/content-->


	</div>

</article><!--/event-->

<?php endwhile; ?>


<?php if ($paged > 1) { ?>

	<nav id="nav-posts">
		<div class="prev"><?php next_posts_link('&laquo; Previous Posts', $my_query->max_num_pages); ?></div>
		<div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
	</nav>

<?php } else { ?>

	<nav id="nav-posts">
		<div class="prev"><?php next_posts_link('&laquo; Previous Posts', $my_query->max_num_pages); ?></div>
	</nav>

<?php } ?>

<?php wp_reset_query(); ?>
