<!DOCTYPE html>
<html>

	<head>

	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">

	  <link rel="icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon">

		<title><?php wp_title( '|', true, 'right' ); ?></title>

		<?php wp_head(); ?>

		<!-- PLURA PWP -->
		<?php include_once('pwp/init.php'); ?>

		<?php include( 'includes/og.php' ); ?>		
			
		<!-- BOOTSTRAP [after init b/c it should come after jquery initialitzation] -->
		<link href="<?php bloginfo('template_url'); ?>/bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="<?php bloginfo('template_url'); ?>/bootstrap/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

		<link href="<?php bloginfo('template_url'); ?>/bootstrap/carousel.css" rel="stylesheet">		

		<!-- FONTAWESOME -->
	  <link href="<?php bloginfo('template_url'); ?>/fonts/font-awesome-4.4.0/font-awesome.min.css" rel="stylesheet">		

	  <!-- included after bootstrap.css to avoid override -->
	  <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-74769713-1', 'auto');
	  ga('send', 'pageview');

	</script>	  

	</head>


	<body <?php body_class(); ?>>


		<?php 

			include('functions/fpae.php');
			include('includes/nav.php'); 

		?>

<?php 

if (is_home()) {

	include( dirname( __FILE__ ) . "/includes/home/banner.php");

}

?>

		<div class="container" id="root">

			<div class="row">

 <?php 

if ( !is_home() && _fn('has_sidebar') ) { 

 ?>
				<div class="col-md-9" id="main">
<?php 

} else { 

?>

         		<div class="col-md-12" id="main">

<?php

	if (is_home()) {

		include( dirname( __FILE__ ) . "/includes/home.php");

	}

} 

?>