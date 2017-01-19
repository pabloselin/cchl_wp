<?php
add_action( 'admin_menu', 'cchl_add_admin_menu' );
add_action( 'admin_init', 'cchl_settings_init' );


function cchl_add_admin_menu(  ) { 

	add_options_page( 'Opciones del sitio', 'Opciones del sitio', 'manage_options', 'cchl_options', 'cchl_options_page' );

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

	$argslinea = array(
		'field_id' => 'cchl_linea'
		);

	add_settings_field( 'cchl_linea', 'Segunda Línea bajo el logo', 'cchl_textfieldrender', 'cchl_fieldspage', 'cchl_info', $argslinea );

	$argsdireccion = array(
		'field_id' => 'cchl_direccion'
		);

	add_settings_field( 'cchl_direccion', 'Dirección', 'cchl_textfieldrender', 'cchl_fieldspage', 'cchl_info', $argsdireccion );

	$argsfono = array(
		'field_id' => 'cchl_fono'
		);

	add_settings_field( 'cchl_fono', 'Teléfono', 'cchl_textfieldrender', 'cchl_fieldspage', 'cchl_info', $argsfono );

	$argsemail = array(
		'field_id' => 'cchl_email'
		);

	add_settings_field( 'cchl_email', 'Email', 'cchl_textfieldrender', 'cchl_fieldspage', 'cchl_info', $argsemail );

	//Sección eventos
	
	add_settings_section( 'cchl_events_conf', 'Eventos Home', 'cchl_events_section_callback', 'cchl_fieldspage' );

	$args_title_event = array(
		'field_id' => 'cchl_tituloseccioneventos'
	);

	add_settings_field( $args_title_event['field_id'], 'Título sección eventos Home', 'cchl_textfieldrender', 'cchl_fieldspage', 'cchl_events_conf', $args_title_event );

	$args_url_event = array(
		'field_id' => 'cchl_urlseccioneventos'
	);

	add_settings_field( $args_url_event['field_id'], 'Link sección eventos Home', 'cchl_textfieldrender', 'cchl_fieldspage', 'cchl_events_conf', $args_url_event );


	//Sección redes
	add_settings_section( 'cchl_redes_conf', 'Redes Sociales', 'cchl_redes_section_callback', 'cchl_fieldspage' );

	$args_flickrwidget = array(
		'field_id' => 'cchl_flickrwidget'
	);

	add_settings_field( $args_flickrwidget['field_id'], 'Código embed para Flickr', 'cchl_textareafieldrender', 'cchl_fieldspage', 'cchl_redes_conf', $args_flickrwidget );

	$args_youtubechannel = array(
		'field_id' => 'cchl_youtubechannel'
	);

	add_settings_field( $args_youtubechannel['field_id'], 'Nombre Canal de Youtube', 'cchl_textfieldrender', 'cchl_fieldspage', 'cchl_redes_conf', $args_youtubechannel );

	$args_instagramwidget = array(
		'field_id' => 'cchl_instagramwidget'
	);


	add_settings_field( $args_instagramwidget['field_id'], 'Código embed para Instagram', 'cchl_textareafieldrender', 'cchl_fieldspage', 'cchl_redes_conf', $args_instagramwidget );

	$args_fbcamara = array(
		'field_id' => 'cchl_fbcamara'
	);

	add_settings_field( $args_fbcamara['field_id'], 'URL página de Facebook Cámara', 'cchl_textfieldrender', 'cchl_fieldspage', 'cchl_redes_conf', $args_fbcamara );

	$args_fbfilsa = array(
		'field_id' => 'cchl_fbfilsa'
	);

	add_settings_field( $args_fbfilsa['field_id'], 'URL página de Facebook FILSA', 'cchl_textfieldrender', 'cchl_fieldspage', 'cchl_redes_conf', $args_fbfilsa );

	$args_twitter = array(
		'field_id' => 'cchl_twitter'
	);

	add_settings_field( $args_twitter['field_id'], 'URL página de Twitter Cámara', 'cchl_textfieldrender', 'cchl_fieldspage', 'cchl_redes_conf', $args_twitter );



}

function cchl_textfieldrender( $fieldargs ) {
	
	$options = get_option( 'cchl_settings' );
	
	$field_id = $fieldargs['field_id'];

	$value = (isset( $options[ $field_id ] ) ? $options[ $field_id ] : '' );
	
	?>

	<input type='text' class='regular-text' name='cchl_settings[<?php echo $field_id;?>]' value='<?php echo $value;?>'>

	<?php

}

function cchl_textareafieldrender( $fieldargs ) {
	
	$options = get_option( 'cchl_settings' );
	
	$field_id = $fieldargs['field_id'];

	$value = (isset( $options[ $field_id ] ) ? $options[ $field_id ] : '' );
	
	?>

	<textarea cols="40" rows="5" class='regular-text' name='cchl_settings[<?php echo $field_id;?>]'>
		<?php echo $value;?>
	</textarea>

	<?php

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

function cchl_events_section_callback() {

	echo '<p>Configuración zona de Eventos Portada</p>';
}

function cchl_redes_section_callback() {

	echo '<p>Configuración para redes sociales</p>';
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