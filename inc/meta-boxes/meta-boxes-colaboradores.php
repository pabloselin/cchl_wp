<?php
//Meta boxes para colaboradores

function cchl_colaboradores_boxes() {
    $prefix = 'cchl_';


    $feriabox = new_cmb2_box(
        array(
            'id' => $prefix . 'colaboradores_feria',
            'title' => 'Colaboradores Feria',
            'object_types' => array('page', 'filsa-2017'),
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