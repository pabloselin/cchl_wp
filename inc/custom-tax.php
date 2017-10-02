<?php 
/* Taxonomías personalizadas
*/

function cchl_tipo_evento() {

	$labels = array(
		'name'                       => _x( 'Tipos de Evento', 'Taxonomy General Name', 'cchl' ),
		'singular_name'              => _x( 'Tipo de Evento', 'Taxonomy Singular Name', 'cchl' ),
		'menu_name'                  => __( 'Tipos de Evento', 'cchl' ),
		'all_items'                  => __( 'Todos los tipos de evento', 'cchl' ),
		'parent_item'                => __( 'Parent Item', 'cchl' ),
		'parent_item_colon'          => __( 'Parent Item:', 'cchl' ),
		'new_item_name'              => __( 'Nuevo Tipo de evento', 'cchl' ),
		'add_new_item'               => __( 'Añadir nuevo Tipo de evento', 'cchl' ),
		'edit_item'                  => __( 'Editar', 'cchl' ),
		'update_item'                => __( 'Actualizar', 'cchl' ),
		'separate_items_with_commas' => __( 'Separar Tipos de Evento con comas', 'cchl' ),
		'search_items'               => __( 'Buscar Tipos de evento', 'cchl' ),
		'add_or_remove_items'        => __( 'Añadir o Eliminar Tipos de Evento', 'cchl' ),
		'choose_from_most_used'      => __( 'Escoger entre los más usados', 'cchl' ),
		'not_found'                  => __( 'No encontrado', 'cchl' ),
	);
	$rewrite = array(
		'slug'                       => 'tipo-de-evento',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'cchl_tipoevento', array( 'tribe_events' ), $args );
}

// Hook into the 'init' action
add_action( 'init', 'cchl_tipo_evento', 0 );

function cchl_tema_evento() {

	$labels = array(
		'name'                       => _x( 'Temas de Evento', 'Taxonomy General Name', 'cchl' ),
		'singular_name'              => _x( 'Tema de Evento', 'Taxonomy Singular Name', 'cchl' ),
		'menu_name'                  => __( 'Temas de Evento', 'cchl' ),
		'all_items'                  => __( 'Todos los Temas de evento', 'cchl' ),
		'parent_item'                => __( 'Parent Item', 'cchl' ),
		'parent_item_colon'          => __( 'Parent Item:', 'cchl' ),
		'new_item_name'              => __( 'Nuevo Tema de evento', 'cchl' ),
		'add_new_item'               => __( 'Añadir nuevo Tema de evento', 'cchl' ),
		'edit_item'                  => __( 'Editar', 'cchl' ),
		'update_item'                => __( 'Actualizar', 'cchl' ),
		'separate_items_with_commas' => __( 'Separar Temas de Evento con comas', 'cchl' ),
		'search_items'               => __( 'Buscar Temas de evento', 'cchl' ),
		'add_or_remove_items'        => __( 'Añadir o Eliminar Temas d eEvento', 'cchl' ),
		'choose_from_most_used'      => __( 'Escoger entre los más usados', 'cchl' ),
		'not_found'                  => __( 'No encontrado', 'cchl' ),
	);
	$rewrite = array(
		'slug'                       => 'tema-de-evento',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'cchl_temaevento', array( 'tribe_events' ), $args );
}

// Hook into the 'init' action
add_action( 'init', 'cchl_tema_evento', 0 );

function cchl_publico_evento() {

	$labels = array(
		'name'                       => _x( 'Público de Interés', 'Taxonomy General Name', 'cchl' ),
		'singular_name'              => _x( 'Público de Interés', 'Taxonomy Singular Name', 'cchl' ),
		'menu_name'                  => __( 'Público de Interés', 'cchl' ),
		'all_items'                  => __( 'Todos los Públicos', 'cchl' ),
		'parent_item'                => __( 'Parent Item', 'cchl' ),
		'parent_item_colon'          => __( 'Parent Item:', 'cchl' ),
		'new_item_name'              => __( 'Nuevo Público de Interés', 'cchl' ),
		'add_new_item'               => __( 'Añadir nuevo Público de Interés', 'cchl' ),
		'edit_item'                  => __( 'Editar', 'cchl' ),
		'update_item'                => __( 'Actualizar', 'cchl' ),
		'separate_items_with_commas' => __( 'Separar Público de Interés con comas', 'cchl' ),
		'search_items'               => __( 'Buscar Público de Interés', 'cchl' ),
		'add_or_remove_items'        => __( 'Añadir o Eliminar Público de Interés', 'cchl' ),
		'choose_from_most_used'      => __( 'Escoger entre los más usados', 'cchl' ),
		'not_found'                  => __( 'No encontrado', 'cchl' ),
	);
	$rewrite = array(
		'slug'                       => 'publico',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'cchl_publicoevento', array( 'tribe_events' ), $args );
}

// Hook into the 'init' action
add_action( 'init', 'cchl_publico_evento', 0 );

// Register Custom Taxonomy
function cchl_tipo_lugar() {

	$labels = array(
		'name'                       => _x( 'Tipos de Lugar', 'Taxonomy General Name', 'cchl' ),
		'singular_name'              => _x( 'Tipo de Lugar', 'Taxonomy Singular Name', 'cchl' ),
		'menu_name'                  => __( 'Tipos de Lugar', 'cchl' ),
		'all_items'                  => __( 'Todos', 'cchl' ),
		'parent_item'                => __( 'Tipo superior', 'cchl' ),
		'parent_item_colon'          => __( 'Tipo superior:', 'cchl' ),
		'new_item_name'              => __( 'Nuevo Tipo de Lugar', 'cchl' ),
		'add_new_item'               => __( 'Añadir nuevo Tipo de Lugar', 'cchl' ),
		'edit_item'                  => __( 'Editar Item', 'cchl' ),
		'update_item'                => __( 'Actualizar Item', 'cchl' ),
		'view_item'                  => __( 'Ver Item', 'cchl' ),
		'separate_items_with_commas' => __( 'Separar items con comas', 'cchl' ),
		'add_or_remove_items'        => __( 'Añadir o eliminar items', 'cchl' ),
		'choose_from_most_used'      => __( 'Elegir entre los más usados', 'cchl' ),
		'popular_items'              => __( 'Items más usados', 'cchl' ),
		'search_items'               => __( 'Buscar Items', 'cchl' ),
		'not_found'                  => __( 'No encontrado', 'cchl' ),
		'no_terms'                   => __( 'No hay Items', 'cchl' ),
		'items_list'                 => __( 'Lista de Items', 'cchl' ),
		'items_list_navigation'      => __( 'Navegación de lista de Items', 'cchl' ),
	);
	$rewrite = array(
		'slug'                       => 'lugares',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'cchl_tipolugar', array( 'tribe_venue' ), $args );
}
add_action( 'init', 'cchl_tipo_lugar', 0 );

