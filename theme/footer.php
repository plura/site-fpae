      <!--<hr>-->


        </div> <!--/main-col [bootstrap]-->

<?php 

if ( !_has_fn('has_sidebar') || _fn('has_sidebar') ) { 

  include('includes/sidebar.php');

}

?>

      </div> <!--/row [4 bootsrap purposes > main | sidebar ] -->

    </div> <!-- /container -->

    <!--<footer>-->

    <?php include_once('includes/footer.php'); ?>

    <!--</footer>-->


<?php

    if ( !is_front_page() ) {

      include( 'includes/modal.php' );

    } 

    include( 'includes/addons/share.php' );

?>

    <?php wp_footer(); ?>

  </body>

</html>