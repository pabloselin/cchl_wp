<?php

function cchl_showselectmenus() {
    $menus = get_terms( 
                array(
                    'taxonomy' => 'nav_menu'
            ) 
    );

    $menuoptions = array();

    if($menus) {
        foreach($menus as $menu) {
            $menuoptions[$menu->term_id] = $menu->name;
        }

        return $menuoptions;
    }

    
}

function cchl_eventspage($postid) {
    $eventpages = get_children(
        array(
            'post_parent' => $_GET['post'],
            'numberposts' => 10,
            'post_type' => 'page',
            'post_status' => 'publish'
        )
    );

    $eventoptions = array();

    if($eventpages) {
        foreach($eventpages as $eventpage) {
            $eventoptions[$eventpage->ID] = $eventpage->post_title;
        }

        return $eventoptions;
    }
}

function cchl_bsferiaboxes() {
    global $post;
    $prefix = 'cchl_';
    $menuoptions = cchl_showselectmenus();
    $eventoptions = cchl_eventspage($post->ID);

    $feriabox = new_cmb2_box(
        array(
            'id' => $prefix . 'infoferia',
            'title' => 'Información de la Feria',
            'object_types' => array('page'),
            'show_on' => array('key' => 'page-template', 'value' => 'bs-plantilla-feria.php')
        )
    );

    $feriabox->add_field(
        array(
            'name' => 'Imagen Cabecera Escritorio',
            'desc' => '.jpg o .png de 1170x313px',
            'id' => $prefix . 'bsferiaheader_lg',
            'type' => 'file'
        )
    );

    $feriabox->add_field(
        array(
            'name' => 'Imagen Cabecera Móvil',
            'desc' => '.jpg o .png de 720x222px',
            'id' => $prefix . 'bsferiaheader_sm',
            'type' => 'file'
        )
    );

    $feriabox->add_field(
        array(
            'name' => 'Menu de la Feria',
            'desc' => 'El menú que se muestra para esta feria',
            'id' => $prefix . 'bsmenuferia',
            'type' => 'select',
            'show_option_none' => 'Escoja un menú',
            'options' => $menuoptions
        )
    );

    $feriabox->add_field(
        array(
            'name' => 'Página de Eventos',
            'desc' => 'La página superior donde se encuentran los eventos de esta feria (tiene que ser a su vez subpágina de esta)',
            'id' => $prefix . 'bspageevents',
            'type' => 'select',
            'show_option_none' => 'Escoja una página',
            'options' => $eventoptions
        )
    );

    $feriabox->add_field(
        array(
            'name' => 'Página de colaboradores',
            'desc' => 'La página donde se encuentran los colaboradores',
            'id' => $prefix . 'bspagecolabs',
            'type' => 'select',
            'show_option_none' => 'Escoja una página',
            'options' => $eventoptions
        )
    );

}

add_action('cmb2_admin_init', 'cchl_bsferiaboxes');

function cchl_colaboradores_boxes() {
    $prefix = 'cchl_';


    $feriabox = new_cmb2_box(
        array(
            'id' => $prefix . 'colaboradores_feria',
            'title' => 'Colaboradores Feria',
            'object_types' => array('page'),
            'show_on_cb' => 'be_metabox_show_on_slug',
            'show_on' => array(
                'key' => 'slug',
                'value' => array('colaboradores')
            ),
        )
    );

    $feriabox_id = $feriabox->add_field(
        array(
            'id' => 'colaboradores_group',
            'type'        => 'group',
            'description' => 'Info Colaboradores',
            'repeatable'  => true, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'   => 'Colaborador', // since version 1.1.4, {#} gets replaced by row number
                'add_button'    => 'Añadir otro colaborador',
                'remove_button' => 'Eliminar Colaborador',
                'sortable'      => true, // beta
                // 'closed'     => true, // true to have the groups closed by default
            )
        )
    );

    $feriabox->add_group_field( $feriabox_id, 
        array(
            'name' => 'Nombre Colaborador',
            'id' => $prefix . 'nombrecol',
            'type' => 'text'
        )
    );

    $feriabox->add_group_field( $feriabox_id, 
        array(
            'name' => 'URL Colaborador',
            'id' => $prefix . 'urlcol',
            'type' => 'text_url'
        )
    );

    $feriabox->add_group_field( $feriabox_id, 
        array(
            'name' => 'Logo Colaborador',
            'id' => $prefix . 'imgcol',
            'type' => 'file',
            'options' => array(
                'url' => false
            )
        )
    );

    $feriabox->add_group_field( $feriabox_id, 
        array(
            'name' => 'Tipo Colaborador',
            'id' => $prefix . 'tipocol',
            'type' => 'select',
            'options' => array(
                'colabora' => 'Colabora',
                'auspicia' => 'Auspicia',
                'patrocina' => 'Patrocina',
                'organiza' => 'Organiza',
                'mediapartners' => 'Media Partners'                
            )
        )
    ); 
}

add_action('cmb2_admin_init', 'cchl_colaboradores_boxes');

/**
 * Metabox for Page Slug
 * @author Tom Morton
 * @link https://github.com/WebDevStudios/CMB2/wiki/Adding-your-own-show_on-filters
 *
 * @param bool $display
 * @param array $meta_box
 * @return bool display metabox
 */
function be_metabox_show_on_slug( $display, $meta_box ) {
	if ( ! isset( $meta_box['show_on']['key'], $meta_box['show_on']['value'] ) ) {
		return $display;
	}

	if ( 'slug' !== $meta_box['show_on']['key'] ) {
		return $display;
	}

	$post_id = 0;

	// If we're showing it based on ID, get the current ID
	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	} elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}

	if ( ! $post_id ) {
		return $display;
	}

	$slug = get_post( $post_id )->post_name;
	// See if there's a match
	return in_array( $slug, (array) $meta_box['show_on']['value']);
}
add_filter( 'cmb2_show_on', 'be_metabox_show_on_slug', 10, 2 );