<?php
add_action( 'admin_menu', 'cchl_add_admin_menu' );
add_action( 'admin_init', 'cchl_settings_init' );


function cchl_add_admin_menu(  ) { 

	add_options_page( 'Opciones del Tema', 'Opciones del Tema', 'manage_options', 'cchl', 'cchl_options_page' );

}


function cchl_settings_init(  ) { 

	register_setting( 'cchl_fieldspage', 'cchl_settings' );

	add_settings_section(
		'cchl_cchl_fieldspage_section', 
		__( 'Configuración cabecera', 'cchl' ), 
		'cchl_settings_section_callback', 
		'cchl_fieldspage'
	);

	add_settings_field( 
		'cchl_checkbox_special', 
		__( 'Activar Banner especial para cabecera', 'cchl' ), 
		'cchl_checkbox_special_render', 
		'cchl_fieldspage', 
		'cchl_cchl_fieldspage_section' 
	);

	add_settings_field( 
		'cchl_urlspecial', 
		__( 'URL para el botón de banner de Cabecera', 'cchl' ), 
		'cchl_urlspecial_render', 
		'cchl_fieldspage', 
		'cchl_cchl_fieldspage_section' 
	);

	add_settings_section( 'cchl_info', 'Configuración Footer', 'cchl_info_section_callback', 'cchl_fieldspage' );


}


function cchl_checkbox_special_render(  ) { 

	$options = get_option( 'cchl_settings' );
	?>
	<input type='checkbox' name='cchl_settings[cchl_checkbox_special]' <?php checked( $options['cchl_checkbox_special'], 1 ); ?> value='1'>
	<?php

}


function cchl_urlspecial_render(  ) { 

	$options = get_option( 'cchl_settings' );
	?>
	<input type='text' name='cchl_settings[cchl_urlspecial]' value='<?php echo $options['cchl_urlspecial']; ?>'>
	<?php

}


function cchl_settings_section_callback(  ) { 

	echo __( 'Ajustes para cabecera Cámara', 'cchl' );

}

function cchl_info_section_callback( ) {
	
	echo '<p>Información de contacto sitio</p>';

}


function cchl_options_page(  ) { 

	?>
	<form action='options.php' method='post'>

		<h2>Opciones del Tema</h2>

		<?php
		settings_fields( 'cchl_fieldspage' );
		do_settings_sections( 'cchl_fieldspage' );
		submit_button();
		?>

	</form>
	<?php

}

?>