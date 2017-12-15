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
            'show_on' => array('key' => 'page-template', 'value' => array('templates/bs-plantilla-feria.php', 'templates/bs-nueva-plantilla-feria.php'))
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
          'name' => 'Página de Noticias',
          'desc' => 'La página donde se encuentran las noticias de esta feria (tiene que ser subpágina de esta)',
          'id'   => $prefix . 'bspagenews',
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

    $feriabox->add_field(
        array(
          'name' => 'Fecha inicio Feria',
          'desc' => 'Día de inicio de la Feria (para eventos)',
          'id' => $prefix . 'bsinicioferia',
          'type' => 'text_date'
        )
    );

    $feriabox->add_field(
        array(
           'name' => 'Fecha fin Feria',
           'desc' => 'Día finalización de la Feria (para eventos)',
           'id' => $prefix . 'bsfinferia',
           'type' => 'text_date'
          )
    );

    $feriabox->add_field(
      array(
          'name' => 'Clase CSS para la feria',
          'desc' => 'Clase que se usará para diferenciar estilos en la Feria',
          'id' => $prefix . 'bsclass',
          'type' => 'text'
      )
    );

    $feriabox->add_field( array(
          'name'           => 'Taxonomía Feria',
          'desc'           => 'Término de taxonomía para eventos, noticias, etc.',
          'id'             => $prefix . 'bstax',
          'taxonomy'       => 'ferias', //Enter Taxonomy Slug
          'type'           => 'taxonomy_select',
          'remove_default' => 'true' // Removes the default metabox provided by WP core. Pending release as of Aug-10-16
      )  
    );

}

add_action('cmb2_admin_init', 'cchl_bsferiaboxes');
