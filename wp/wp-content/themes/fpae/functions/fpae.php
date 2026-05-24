<?php


function fpae_has_sidebar() {

	global $wp_query;

	if ( is_home() ) {

		return false;

	}

	return true;

}



function fpae_get_docs ( $postID ) {

    $query = new WP_Query(array(
        'post_parent'       => $postID,
        'post_status'       => 'inherit',
        'post_type'         => 'attachment',
        'post_mime_type'    => array('application/pdf'),
        'posts_per_page'    => -1
    ));

    if (!empty($query->posts)) {

        return $query->posts;

    }

    return false;   

}



function fpae_get_posts( $type, $params = false ) {

    $query_params = array(
        'post_type'         => 'fpae_' . $type,
        'posts_per_page'    => $params && is_int( $params) ? $params : 3
    );


    if ( $params && is_array( $params ) ) {

        $query_params = array_merge( $query_params, $params );

    }

    return new WP_Query( $query_params );

}



/**
 * via http://wordpress.stackexchange.com/a/138528
 * @param mixed $menu
 * @param int   $post_id
 *
 * @return WP_Post|bool
 */
function get_menu_parent( $menu, $post_id = null ) {

    $post_id        = $post_id ? : get_the_ID();
    $menu_items     = wp_get_nav_menu_items( $menu );
    $parent_item_id = wp_filter_object_list( $menu_items, array( 'object_id' => $post_id ), 'and', 'menu_item_parent' );

    if ( ! empty( $parent_item_id ) ) {

        $parent_item_id = array_shift( $parent_item_id );
        $parent_post_id = wp_filter_object_list( $menu_items, array( 'ID' => $parent_item_id ), 'and', 'object_id' );

        if ( ! empty( $parent_post_id ) ) {
            $parent_post_id = array_shift( $parent_post_id );

            return get_post( $parent_post_id );
        }
    }

    return false;
}





//removes prefix in archive title. ie (removes "Category" from "Category: Category Name")
add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        } else if( is_tax() ) {

            $title = single_term_title( '', false );

        }

    return $title;

});







?>