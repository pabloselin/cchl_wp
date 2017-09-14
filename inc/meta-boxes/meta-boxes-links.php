<?php
//Meta box links

function cchl_link_boxes() {
    $linkbox = new_cmb2_box(
        array(
            'id' => '_cchl_linkbox',
            'title' => 'Sección link',
            'object_types' => array('post'),
            'show_on' => array('key'=>'taxonomy', 'category'=>'sala-de-prensa')
        )
    );

   $linkbox_id =$linkbox->add_field(
        array(
            'id' => '_cchl_link',
            'type'        => 'group',
            'description' => 'Enlace',
            'repeatable'  => true, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'   => 'Enlace', // since version 1.1.4, {#} gets replaced by row number
                'add_button'    => 'Añadir otro contenido link',
                'remove_button' => 'Eliminar contenido link',
                'sortable'      => true, // beta
                // 'closed'     => true, // true to have the groups closed by default
            )
        )
    );

   $linkbox->add_group_field($linkbox_id, 
        array(
            'name' => 'Título',
            'id' => 'titulo',
            'type' => 'text'
        )
    );

   $linkbox->add_group_field($linkbox_id, 
        array(
            'name' => 'URL',
            'id' => 'contenido',
            'type' => 'text_url'
        )
    );

}

add_action('cmb2_admin_init', 'cchl_link_boxes');