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
    $eventoptions = cchl_eventspage();

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

}

add_action('cmb2_admin_init', 'cchl_bsferiaboxes');