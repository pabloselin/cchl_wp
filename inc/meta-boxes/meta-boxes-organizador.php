<?php

add_action( 'cmb2_init', 'cchl_organizer_add_metabox' );
function cchl_organizer_add_metabox() {

	$prefix = '_cchl_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . '_organizer_icon',
		'title'        => __( 'Ícono organizador', 'cchl' ),
		'object_types' => array( 'tribe_organizer' ),
		'context'      => 'side',
		'priority'     => 'default',
	) );

	$cmb->add_field( array(
		'name' => __( 'Imagen organizador', 'cchl' ),
		'id' => $prefix . 'imagen_organizador',
		'type' => 'file',
	) );

}