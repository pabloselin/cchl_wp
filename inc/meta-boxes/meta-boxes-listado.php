<?php
//Meta boxes directorio o listado de personas

function cchl_directorio_boxes() {
    $directoriobox = new_cmb2_box(
        array(
            'id' => '_cchl_listadopersonasbox',
            'title' => 'Miembros/as',
            'object_types' => array('page'),
            'show_on_cb' => 'be_metabox_show_on_slug',
            'show_on' => array(
                'key' => 'slug',
                'value' => array('directorio', 'prolibro-s-a')
            ),
        )
    );

   $directoriobox_id =$directoriobox->add_field(
        array(
            'id' => '_cchl_listadopersonas',
            'type'        => 'group',
            'description' => 'Información Miembro/a',
            'repeatable'  => true, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'   => 'Miembro/a', // since version 1.1.4, {#} gets replaced by row number
                'add_button'    => 'Añadir otro miembro/a',
                'remove_button' => 'Eliminar miembro/a',
                'sortable'      => true, // beta
                // 'closed'     => true, // true to have the groups closed by default
            )
        )
    );

   $directoriobox->add_group_field($directoriobox_id, 
        array(
            'name' => 'Nombre Miembro/a',
            'id' => 'nombre',
            'type' => 'text'
        )
    );

   $directoriobox->add_group_field($directoriobox_id, 
        array(
            'name' => 'Cargo Miembro/a',
            'id' => 'cargo',
            'type' => 'text'
        )
    );

   $directoriobox->add_group_field($directoriobox_id, 
        array(
            'name' => 'Descripción',
            'id' => 'texto',
            'type' => 'textarea'
        )
    );

   $directoriobox->add_group_field($directoriobox_id, 
        array(
            'name' => 'Fotografía miembro/a (anterior)',
            'id' => 'imagen',
            'type' => 'text',
            'options' => array(
                'url' => false
            )
        )
    );

    $directoriobox->add_group_field($directoriobox_id, 
    array(
        'name' => 'Fotografía miembro/a',
        'id' => 'imagen_new',
        'type' => 'file',
        'options' => array(
            'url' => false
        )
    )
);

}

add_action('cmb2_admin_init', 'cchl_directorio_boxes');