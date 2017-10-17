<?php
//Meta boxes desplegable estilo FAQ

function cchl_faq_boxes() {
    $faqbox = new_cmb2_box(
        array(
            'id' => '_cchl_desplegablebox',
            'title' => 'Sección desplegable',
            'object_types' => array('page'),
            'show_on' => array('key'=>'page-template', 'value'=>'templates/bs-pagina-desplegable.php')
        )
    );

   $faqbox_id =$faqbox->add_field(
        array(
            'id' => '_cchl_desplegable',
            'type'        => 'group',
            'description' => 'Contenido desplegable',
            'repeatable'  => true, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'   => 'Contenido', // since version 1.1.4, {#} gets replaced by row number
                'add_button'    => 'Añadir otro contenido desplegable',
                'remove_button' => 'Eliminar contenido desplegable',
                'sortable'      => true, // beta
                // 'closed'     => true, // true to have the groups closed by default
            )
        )
    );

   $faqbox->add_group_field($faqbox_id, 
        array(
            'name' => 'Título',
            'id' => 'titulo',
            'type' => 'text'
        )
    );

   $faqbox->add_group_field($faqbox_id, 
        array(
            'name' => 'Contenido',
            'id' => 'contenido',
            'type' => 'wysiwyg'
        )
    );

}

add_action('cmb2_admin_init', 'cchl_faq_boxes');