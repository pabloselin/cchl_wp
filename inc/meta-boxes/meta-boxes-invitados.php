<?php
//Meta boxes para invitados

add_action( 'cmb2_init', 'camfields_invitados' );
function camfields_invitados() {

    $prefix = '_cchl_';

	$invitados = new_cmb2_box( array(
		'id'           => 'box_invitados',
		'title'        => __( 'Invitados', 'cchl' ),
        'object_types' => array( 'page' ),
        'show_on' => array('key'=> 'page-template', 'value' => 'templates/bs-invitados.php'),
		'context'      => 'normal',
		'priority'     => 'high',
    ) );
    
    $invitadosgroup = $invitados->add_field(
        array(
            'id' => '_cchl_invitados',
            'type'        => 'group',
            'description' => 'Información invitado/a',
            'repeatable'  => true, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'   => 'Invitado/a', // since version 1.1.4, {#} gets replaced by row number
                'add_button'    => 'Añadir otro invitado/a',
                'remove_button' => 'Eliminar invitado/a',
                'sortable'      => true, // beta
                // 'closed'     => true, // true to have the groups closed by default
            )
        )
    );

	$invitados->add_group_field( $invitadosgroup, array(
		'name' => __( 'Imagen (versión anterior)', 'cchl' ),
		'id' => 'bsimagen',
		'type' => 'text',
	) );

	$invitados->add_group_field( $invitadosgroup, array(
		'name' => __( 'Nombre', 'cchl' ),
		'id' => 'bsnombre',
		'type' => 'text',
	) );

	$invitados->add_group_field( $invitadosgroup, array(
		'name' => __( 'Cargo', 'cchl' ),
		'id' => 'bscargo',
		'type' => 'text',
	) );

	$invitados->add_group_field( $invitadosgroup, array(
		'name' => __( 'Texto', 'cchl' ),
		'id' => 'bstexto',
		'type' => 'wysiwyg',
	) );

	$invitados->add_group_field( $invitadosgroup, array(
		'name' => __( 'Imagen (nueva versión)', 'cchl' ),
		'id' => 'imagen_nueva',
		'type' => 'file',
	) );

}