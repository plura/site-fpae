<?php

//CUSTOM POST TYPE name limit is 20 charachters !!!! 

add_action( 'init', 									'custom_type_fpae_members_register' );

//custom type creation
function custom_type_fpae_members_register(){

	//item
	register_post_type('fpae_members', array(
		'labels'				=> array(
		
			'name'					=> _x('Corpos Sociais', 'post type general name'),
			'singular_name' 		=> _x('Corpo Social', 'post type singular name'),
			'add_new'				=> _x('Adicionar Novo', 'partner item'),
			'add_new_item'			=> __('Adicionar Novo Corpo Social'),
			'edit'					=> __('Editar'),			
			'edit_item'				=> __('Editar Corpo Social'),
			'new_item'				=> __('Novo Corpo Social'),
			'view_item'				=> __('Ver Corpo Social'),
			'search_items'			=> __('Procurar Corpos Sociais'),
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
		'menu_icon'				=> 'dashicons-networking',			
		'rewrite'				=> array("slug" => "social-bodies"),
		'hierarchical'			=> false,
		'supports'				=> array('title','editor','thumbnail')
	 ));

}

?>