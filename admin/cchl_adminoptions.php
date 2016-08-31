<?php
add_action( 'admin_menu', 'cchl_add_admin_menu' );
add_action( 'admin_init', 'cchl_settings_init' );


function cchl_add_admin_menu(  ) { 

	add_options_page( 'Opciones del Tema', 'Opciones del Tema', 'manage_options', 'cchl', 'cchl_options_page' );

}


function cchl_settings_init(  ) { 

	register_setting( 'pluginPage', 'cchl_settings' );

	add_settings_section(
		'cchl_pluginPage_section', 
		__( 'Configuración cabecera', 'cchl' ), 
		'cchl_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'cchl_checkbox_field_0', 
		__( 'Activar Banner especial para cabecera', 'cchl' ), 
		'cchl_checkbox_field_0_render', 
		'pluginPage', 
		'cchl_pluginPage_section' 
	);

	add_settings_field( 
		'cchl_text_field_1', 
		__( 'URL para el botón de banner de Cabecera', 'cchl' ), 
		'cchl_text_field_1_render', 
		'pluginPage', 
		'cchl_pluginPage_section' 
	);


}


function cchl_checkbox_field_0_render(  ) { 

	$options = get_option( 'cchl_settings' );
	?>
	<input type='checkbox' name='cchl_settings[cchl_checkbox_field_0]' <?php checked( $options['cchl_checkbox_field_0'], 1 ); ?> value='1'>
	<?php

}


function cchl_text_field_1_render(  ) { 

	$options = get_option( 'cchl_settings' );
	?>
	<input type='text' name='cchl_settings[cchl_text_field_1]' value='<?php echo $options['cchl_text_field_1']; ?>'>
	<?php

}


function cchl_settings_section_callback(  ) { 

	echo __( 'This section description', 'cchl' );

}


function cchl_options_page(  ) { 

	?>
	<form action='options.php' method='post'>

		<h2>Opciones del Tema</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}

?>