<?php
//No se que hacen estas metaboxes

add_action( 'cmb2_init', 'cchl_custompage_options' );

function cchl_custompage_options() {

	$prefix = '_cchl_';
    $menuoptions = cchl_showmenulocations();

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'custom_page',
		'title'        => __( 'Página personalizada', 'cchl' ),
		'object_types' => array( 'page' ),
        'show_on' => array('key' => 'page-template', 'value' => 'bs-archivo-ferias.php'),
		'context'      => 'side',
		'priority'     => 'core',
	) );

	$cmb->add_field( array(
		'name' => __( 'Menu', 'cchl' ),
		'id' => $prefix . 'custompage_menu',
		'type' => 'select',
		'default' => '0',
        'show_option_none' => 'Escoja una posicion de menú',
		'options' => $menuoptions
	) );

}