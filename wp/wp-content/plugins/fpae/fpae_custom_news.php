<?php

//CUSTOM POST TYPE name limit is 20 charachters !!!! 

add_action( 'init', 									'custom_type_fpae_news_register' );

//custom type creation
function custom_type_fpae_news_register(){

	//item
	register_post_type('fpae_news', array(
		'labels'				=> array(
		
			'name'					=> _x('Notícias', 'post type general name'),
			'singular_name' 		=> _x('Notícia', 'post type singular name'),
			'add_new'				=> _x('Adicionar Nova', 'partner item'),
			'add_new_item'			=> __('Adicionar Nova Notícia'),
			'edit'					=> __('Editar'),			
			'edit_item'				=> __('Editar Notícia'),
			'new_item'				=> __('Nova Notícia'),
			'view_item'				=> __('Ver Notícia'),
			'search_items'			=> __('Procurar Notícias'),
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
		'menu_icon'				=> 'dashicons-megaphone',			
		'rewrite'				=> array("slug" => "news"),
		'hierarchical'			=> false,
		'supports'				=> array('title','editor','thumbnail')
	 ));

}

?>