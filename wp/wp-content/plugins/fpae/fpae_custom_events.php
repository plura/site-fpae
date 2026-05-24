<?php

//CUSTOM POST TYPE name limit is 20 charachters !!!! 

add_action( 'init', 										'custom_type_fpae_events_register' );

add_action( 'admin_init',									'custom_type_fpae_events_admin' );

add_action( 'save_post',									'custom_save_fpae_events_details' );

//admin filter
add_action( 'restrict_manage_posts',						'my_fpae_events_filter_list' );

add_filter('parse_query',									'my_fpae_events_filter_query' );



//columns
add_filter( 'manage_edit-fpae_events_columns',				'add_new_fpae_events_columns' );

add_action( 'manage_fpae_events_posts_custom_column',		'my_manage_fpae_events_columns', 10, 2 );

add_filter( 'manage_edit-fpae_events_sortable_columns',		'my_sortable_fpae_events_column' );




//custom type creation
function custom_type_fpae_events_register(){

	//item
	register_post_type('fpae_events', array(
		'labels'				=> array(
		
			'name'					=> _x('Eventos', 'post type general name'),
			'singular_name' 		=> _x('Evento', 'post type singular name'),
			'add_new'				=> _x('Adicionar Nova', 'partner item'),
			'add_new_item'			=> __('Adicionar Nova Evento'),
			'edit'					=> __('Editar'),			
			'edit_item'				=> __('Editar Evento'),
			'new_item'				=> __('Nova Evento'),
			'view_item'				=> __('Ver Evento'),
			'search_items'			=> __('Procurar Eventos'),
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
		'menu_icon'				=> 'dashicons-calendar-alt',			
		'rewrite'				=> array("slug" => "event"),
		'hierarchical'			=> false,
		'supports'				=> array('title','editor','thumbnail')
	 ));


	//taxonomy
	register_taxonomy('fpae_events_categories', array('fpae_events'), array(
		'hierarchical'	=> true,
		'labels'		=> array(
		
    		'name'				=> _x( 'Categorias Eventos', 'taxonomy general name' ),
	    	'singular_name'		=> _x( 'Categoria Eventos', 'taxonomy singular name' ),
    		'search_items'		=> __( 'Procurar Categorias Eventos' ),
	    	'all_items'			=> __( 'Todas Categorias' ),
    		'parent_item'		=> __( 'Categoria Eventos Pai' ),
			'parent_item_colon' => __( 'Categoria Eventos:' ),
			'edit_item' 		=> __( 'Edit Categoria Eventos' ),
			'update_item' 		=> __( 'Actualizar Categoria Eventos' ),
			'add_new_item' 		=> __( 'Adicionar Nova Categoria Eventos' ),
			'new_item_name' 	=> __( 'Nova Categoria Eventos Nome' ),
			'menu_name' 		=> __( 'Categorias Eventos' )
		
		),
		'show_ui'				=> true,
		'show_in_nav_menus'		=> true,		
		'query_var'				=> true,
		'rewrite'				=> array( 'slug' => 'event-categories')
	));			
	
}



/* ADMIN EDIT / SAVE */

//custom type custom input ui
function custom_type_fpae_events_admin(){

	wp_enqueue_style('my_meta_css',  '/wp-content/plugins/fpae/styles.css');	
	
	add_meta_box("custom_ui_fpae_events_date", "Datas e Horas", "custom_ui_fpae_events_date", "fpae_events", "normal", "low");

}


function custom_ui_fpae_events_date() {

	global $post;

	$event_datetime	= get_post_meta( $post->ID, 'fpae_custom_events_datetime', TRUE );

	$datetime 		= new DateTime();

	if (!empty( $event_datetime )) {

		$datetime->setTimestamp( $event_datetime );
	}

	wp_nonce_field( plugin_basename( __FILE__ ), 'fpae_events_info_content_nonce' );	

?>
    <fieldset>
      
		<label for="fpae_custom_events_datetime_date"><?php _e('Data'); ?></label><input type="date" name="fpae_custom_events_datetime_date" value="<?php echo $datetime->format('Y-m-d'); ?>"/>

		<label for="fpae_custom_events_datetime_hour"><?php _e('Hora'); ?></label><input type="number" name="fpae_custom_events_datetime_hour" maxlength="2" value="<?php echo $datetime->format('H'); ?>"/>

		<label for="fpae_custom_events_datetime_minutes"><?php _e('Minutos'); ?></label><input type="number" name="fpae_custom_events_datetime_minutes" maxlength="2" value="<?php echo $datetime->format('i'); ?>"/>
    
    </fieldset>    

<?php		

}


//custom save
function custom_save_fpae_events_details($post_id){

	// authentication checks
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		
		return;
 
    // make sure data came from our meta box
	if ( !wp_verify_nonce( $_POST['fpae_events_info_content_nonce'], plugin_basename( __FILE__ ) ) )
	
		return $post_id;
		
 	// check user permissions
    if ($_POST['post_type'] == 'page')	{

       	if (!current_user_can('edit_page', $post_id))
		
			return $post_id;
    
	} else {
        
		if (!current_user_can('edit_post', $post_id))
		
			return $post_id;
    
	}

	update_post_meta($post_id, "fpae_custom_events_datetime", date_create( $_POST["fpae_custom_events_datetime_date"] . " " . $_POST["fpae_custom_events_datetime_hour"] . ":" . $_POST["fpae_custom_events_datetime_minutes"] )->getTimeStamp() );

}



/* COLUMNS*/

function add_new_fpae_events_columns($gallery_columns) {
      
	$c = array(
   
		"cb"						=> '<input type="checkbox" />',
		//"icon"					=> '&Iacute;cone',		
		"title"						=> _x('Title', 'column-title'),
		"fpae_events_dates"			=> __( 'Event Date' ),
		"fpae_events_categories"	=> __('Categories'),
		"date" 						=> __('Date')
	
	);
 
    return $c;

}



function my_manage_fpae_events_columns( $column, $post_id ) {
	
	global $post;
	
	$custom = get_post_custom($post_id);

	switch( $column ) {

		case 'fpae_events_categories':
		
			echo get_the_term_list($post_id, 'fpae_events_categories', '', ', ', '');
		
			break;

		case 'fpae_events_dates':

			$d = ( new DateTime() )->setTimestamp( $custom['fpae_custom_events_datetime'][0] );

			echo $d->format('d/m/Y \à\s H:i');

			break;			

		/* Just break out of the switch statement for everything else. */
		default :
			
			break;
	
	}

}



function my_sortable_fpae_events_column( $columns ) {
	
	return array(
		'title'						=> 'title',
		'fpae_events_categories'	=> 'fpae_events_categories'
	);
 
    //To make a column 'un-sortable' remove it from the array
    //unset($columns['date']);
 
    return $columns;
}




/* FILTERS */
function my_fpae_events_filter_list() {
    
	pwp_plugin_filter_list( 'fpae_events', array( 'fpae_events_categories' ) );

}

function my_fpae_events_filter_query( $query ) {

	pwp_plugin_filter_query( $query, 'fpae_events' );

}

?>