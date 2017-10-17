<?php
//Meta boxes directorio o listado de personas

function cchl_directorio_boxes() {
    $directoriobox = new_cmb2_box(
        array(
            'id' => '_cchl_listadopersonasbox',
            'title' => 'Personas',
            'object_types' => array('page', 'filsa-2017'),
            'show_on' => array('key' => 'page-template', 'value' => array('templates/bs-listado-personas.php', 'templates/template-filsa-2017-invitados.php'))
        )
    );

   $directoriobox_id =$directoriobox->add_field(
        array(
            'id' => '_cchl_listadopersonas',
            'type'        => 'group',
            'description' => 'Información Persona',
            'repeatable'  => true, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'   => 'Persona', // since version 1.1.4, {#} gets replaced by row number
                'add_button'    => 'Añadir otra persona',
                'remove_button' => 'Borrar persona',
                'sortable'      => true, // beta
                // 'closed'     => true, // true to have the groups closed by default
            )
        )
    );

   $directoriobox->add_group_field($directoriobox_id, 
        array(
            'name' => 'Nombre Persona',
            'id' => 'nombre',
            'type' => 'text'
        )
    );

   $directoriobox->add_group_field($directoriobox_id, 
        array(
            'name' => 'Cargo Persona',
            'id' => 'cargo',
            'type' => 'text'
        )
    );

   $directoriobox->add_group_field($directoriobox_id, 
        array(
            'name' => 'Descripción',
            'id' => 'texto',
            'type' => 'wysiwyg'
        )
    );

   if(get_post_meta($post->ID, 'imagen', true)):
    //Legacy support
       $directoriobox->add_group_field($directoriobox_id, 
            array(
                'name' => 'Fotografía persona',
                'id' => 'imagen',
                'type' => 'text',
                'options' => array(
                    'url' => false
                )
            )
        );

    endif;

    $directoriobox->add_group_field($directoriobox_id, 
    array(
        'name' => 'Fotografía persona',
        'id' => 'imagen_new',
        'type' => 'file',
        'options' => array(
            'url' => false
        )
    )
);

}

add_action('cmb2_admin_init', 'cchl_directorio_boxes');