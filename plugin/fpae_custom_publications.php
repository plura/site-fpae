<?php

//CUSTOM POST TYPE name limit is 20 charachters !!!! 

add_action( 'init', 											'custom_type_fpae_publications_register' );


//admin filter
add_action( 'restrict_manage_posts',							'my_fpae_publications_filter_list' );

add_filter('parse_query',										'my_fpae_publications_filter_query' );



//columns
add_filter( 'manage_edit-fpae_publications_columns',			'add_new_fpae_publications_columns' );

add_action( 'manage_fpae_publications_posts_custom_column',		'my_manage_fpae_publications_columns', 10, 2 );

add_filter( 'manage_edit-fpae_publications_sortable_columns',	'my_sortable_fpae_publications_column' );




//custom type creation
function custom_type_fpae_publications_register(){

	//item
	register_post_type('fpae_publications', array(
		'labels'				=> array(
		
			'name'					=> _x('Publicações', 'post type general name'),
			'singular_name' 		=> _x('Publicação', 'post type singular name'),
			'add_new'				=> _x('Adicionar Nova', 'partner item'),
			'add_new_item'			=> __('Adicionar Nova Publicação'),
			'edit'					=> __('Editar'),			
			'edit_item'				=> __('Editar Publicação'),
			'new_item'				=> __('Nova Publicação'),
			'view_item'				=> __('Ver Publicação'),
			'search_items'			=> __('Procurar Publicações'),
			'not_found'				=> __('Nada Foi Encontrado'),
			'not_found_in_trash'	=> __('Nada Foi Encontrado no Trash'),
			'parent_item_colon'		=> ''
		
		),
		'menu_position'			=> null,
		'public'				=> true,
		'publicly_queryable'	=> true,
		'query_var'				=> true,
		'show_in_nav_menus'		=> true,		
		'show_ui'				=> true,
		'menu_icon'				=> 'dashicons-book',			
		'rewrite'				=> array("slug" => "publication"),
		'hierarchical'			=> false,
		'supports'				=> array('title','editor','thumbnail')
	 ));


	//taxonomy
	register_taxonomy('fpae_publications_categories', array('fpae_publications'), array(
		'hierarchical'	=> true,
		'labels'		=> array(
		
    		'name'				=> _x( 'Categorias Publicações', 'taxonomy general name' ),
	    	'singular_name'		=> _x( 'Categoria Publicações', 'taxonomy singular name' ),
    		'search_items'		=> __( 'Procurar Categorias Publicações' ),
	    	'all_items'			=> __( 'Todas Categorias' ),
    		'parent_item'		=> __( 'Categoria Publicações Pai' ),
			'parent_item_colon' => __( 'Categoria Publicações:' ),
			'edit_item' 		=> __( 'Edit Categoria Publicações' ),
			'update_item' 		=> __( 'Actualizar Categoria Publicações' ),
			'add_new_item' 		=> __( 'Adicionar Nova Categoria Publicações' ),
			'new_item_name' 	=> __( 'Nova Categoria Publicações Nome' ),
			'menu_name' 		=> __( 'Categorias Publicações' )
		
		),
		'show_ui'				=> true,
		'show_in_nav_menus'		=> true,		
		'query_var'				=> true,
		'rewrite'				=> array( 'slug' => 'publication-categories')
	));			
	
}



/* COLUMNS*/

function add_new_fpae_publications_columns($gallery_columns) {
      
	$c = array(
   
		"cb"						=> '<input type="checkbox" />',
		//"icon"					=> '&Iacute;cone',		
		"title"						=> _x('Title', 'column-title'),
		"fpae_publications_categories"	=> __('Categories'),
		"date" 						=> __('Date')
	
	);
 
    return $c;

}



function my_manage_fpae_publications_columns( $column, $post_id ) {
	
	global $post;
	
	$custom = get_post_custom($post_id);

	switch( $column ) {

		case 'fpae_publications_categories':
		
			echo get_the_term_list($post_id, 'fpae_publications_categories', '', ', ', '');
		
			break;

		/* Just break out of the switch statement for everything else. */
		default :
			
			break;
	
	}

}



function my_sortable_fpae_publications_column( $columns ) {
	
	return array(
		'title'							=> 'title',
		'fpae_publications_categories'	=> 'fpae_publications_categories'
	);
 
    //To make a column 'un-sortable' remove it from the array
    //unset($columns['date']);
 
    return $columns;
}




/* FILTERS */
function my_fpae_publications_filter_list() {
    
	pwp_plugin_filter_list( 'fpae_publications', array( 'fpae_publications_categories' ) );

}

function my_fpae_publications_filter_query( $query ) {

	pwp_plugin_filter_query( $query, 'fpae_publications' );

}

?>