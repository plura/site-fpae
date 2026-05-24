<footer class="main">

	<!-- unminified content -->

	<div class="container">

		<div class="row">

<?php

if (is_home()) {

?>

			<div class="col-md-4">
				
				<a href="mailto:fpae.pt@gmail.com" class="has-icon email"><span>fpae.pt@gmail.com</span></a>

			</div>

			<div class="col-md-5">
				
				<a href="http://plura.pt" class="author" title="Plura™">webdev by <strong>Plura&trade;</strong></a>

			</div>

<?php

} else {

?>

			<div class="col-md-5">
				
<?php
	
      wp_nav_menu( array(
          'menu'              => 'Main',
          'container_id'   	  => 'sitemap',
          'menu_class'        => 'small sitemap clearfix',
      ));

?>
			</div>

			<div class="col-md-4 small info">
				
				<a href="mailto:fpae.pt@gmail.com" class="has-icon email"><span>fpae.pt@gmail.com</span></a>

				<!--<a href="tel:+351-918-367-952" class="has-icon telephone"><span>918 367 952</span></a>-->

				<a href="http://plura.pt" class="author" title="Plura™">webdev by <strong>Plura&trade;</strong></a>

			</div>

<?php

}

?>
			<div class="col-md-3 social-icons">

				<a class="icon share" href="#" title="Share"><span>Share</span></a>
				<a class="icon" target="_blank" href="https://www.facebook.com/F%C3%B3rum-Portugu%C3%AAs-de-Administra%C3%A7%C3%A3o-Educacional-1651077678513849/" title="Facebook"><span>Facebook</span></a>
				<a class="icon" target="_blank" href="https://pt.linkedin.com/in/f%C3%B3rum-portugu%C3%AAs-de-administra%C3%A7%C3%A3o-educacional-38974910a" title="Linkedin"><span>Linkedin</span></a>

			</div>

		</div><!--/row-->

	</div> <!-- / container -->


</footer>