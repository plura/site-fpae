<?php

//CUSTOM POST TYPE name limit is 20 charachters !!!! 

add_action( 'init', 											'custom_type_fpae_initiatives_register' );


//custom type creation
function custom_type_fpae_initiatives_register(){

	//item
	register_post_type('fpae_initiatives', array(
		
		'labels'				=> array(
		
			'name'					=> _x('Iniciativas', 'post type general name'),
			'singular_name' 		=> _x('Iniciativa', 'post type singular name'),
			'add_new'				=> _x('Adicionar Nova', 'partner item'),
			'add_new_item'			=> __('Adicionar Nova Iniciativa'),
			'edit'					=> __('Editar'),			
			'edit_item'				=> __('Editar Iniciativa'),
			'new_item'				=> __('Nova Iniciativa'),
			'view_item'				=> __('Ver Iniciativa'),
			'search_items'			=> __('Procurar Iniciativas'),
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
		'menu_icon'				=> 'dashicons-welcome-learn-more',			
		'rewrite'				=> array("slug" => "initiative"),
		'hierarchical'			=> false,
		'supports'				=> array('title','editor','thumbnail')
	 
	 ));
	
}

?>