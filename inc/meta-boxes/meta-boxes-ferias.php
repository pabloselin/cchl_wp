<?php
//Boxes para Ferias y cabeceras especiales

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