<?php
add_action( 'cmb2_init', 'camfields_documentos' );
function camfields_documentos() {

    $prefix = '_cchl_';

	$documentos = new_cmb2_box( array(
		'id'           => 'box_documentos',
		'title'        => __( 'Documentos', 'cchl' ),
        'object_types' => array( 'page' ),
        'show_on' => array('key'=> 'page-template', 'value' => 'templates/bs-memorias.php'),
		'context'      => 'normal',
		'priority'     => 'high',
    ) );
    
    $documentosgroup = $documentos->add_field(
        array(
            'id' => '_cchl_listadocs',
            'type'        => 'group',
            'description' => 'Documento',
            'repeatable'  => true, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'   => 'Documento', // since version 1.1.4, {#} gets replaced by row number
                'add_button'    => 'Añadir otro documento',
                'remove_button' => 'Eliminar documento',
                'sortable'      => true, // beta
                // 'closed'     => true, // true to have the groups closed by default
            )
        )
    );

	$documentos->add_group_field( $documentosgroup, array(
		'name' => __( 'Título', 'cchl' ),
		'id' => 'doctitulo',
		'type' => 'text',
	) );

	$documentos->add_group_field( $documentosgroup, array(
		'name' => __( 'Portada', 'cchl' ),
		'id' => 'docportada',
		'type' => 'file',
	) );

	$documentos->add_group_field( $documentosgroup, array(
		'name' => __( 'Texto', 'cchl' ),
		'id' => 'doctexto',
		'type' => 'wysiwyg',
	) );

	$documentos->add_group_field( $documentosgroup, array(
		'name' => __( 'Archivo', 'cchl' ),
		'id' => 'docdownload',
		'type' => 'file',
	) );

}

