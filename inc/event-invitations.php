<?php 
/**
 * Generador de invitaciones para eventos
 *
 * 1. Crea directorio para almacenarlas
 * 2. Crea la invitación a pedido 1 vez si es que no existe
 * 		2.5 La invitación es vertical para que se adapte a las proporciones de un celular.
 * 3. Si el evento se guarda o cambia (o es un evento nuevo) se re-genera la invitación
 * 4. Parte de una imagen previa
 */

define( 'CCHL_INVPATH', WP_CONTENT_DIR . '/cchl_inv/' );
define( 'CCHL_INVURL', WP_CONTENT_URL . '/cchl_inv/' );

function cchl_invmkdir() {
	/**
	 * Crea directorio si no existe
	 */

	if( !is_dir(CCHL_INVPATH) ) {

		mkdir( WP_CONTENT_DIR . '/cchl_inv/', 0755 );

	}

}

add_action( 'init', 'cchl_invmkdir' );

function cchl_makeinv( $refimage, $data, $invfilename ) {
	/**
	 * 	Crea la invitación con un array de datos sobre un PNG predefinido
	 * 	1. Nombre evento
	 * 	2. Día - Mes evento
	 * 	3. Hora Evento
	 */
	
	
	$imagepng = imagecreatefrompng( $refimage );
	$color = imagecolorallocate( $imagepng, 0, 0, 0);
	$font = TEMPLATEPATH . '/fonts/raleway.ttf';
	$boldfont = TEMPLATEPATH . '/fonts/raleway_600.ttf';

	$x = 48;
	$y = 600;

	$bigfontsize = 36;
	$mediumfontsize = 24;
	$smallfontsize = 18;
	$title_line_jump = $bigfontsize + $bigfontsize / 2;
	$small_line_jump = $smallfontsize * 1.4;
	$medium_line_jump = $mediumfontsize * 1.4;
	$paragraphjump = $bigfontsize * 2;
	$smallpjump = $mediumfontsize * 1.3;

	//Organizador
	
	imagettftext( $imagepng, $smallfontsize, 0, $x, $y, $color, $font, 'Organiza: ');

	$y += $medium_line_jump;

	imagettftext( $imagepng, $mediumfontsize, 0, $x, $y, $color, $font, $data['organizador'] );

	$y += $title_line_jump;

	//Titulo Evento
	$linetitle = explode('|', wordwrap($data['title'], 36, '|'));

	foreach($linetitle as $line) {

		imagettftext( $imagepng, $bigfontsize, 0, $x, $y, $color, $boldfont, $line);

		$y += $title_line_jump;

	}

	//Salto diferenciador
	$y += $smallpjump;

	//Fecha
	
	imagettftext( $imagepng, $mediumfontsize, 0, $x, $y, $color, $font, $data['dia']);

	$y += $medium_line_jump;

	//Hora
	
	imagettftext( $imagepng, $mediumfontsize, 0, $x, $y, $color, $font, $data['hora']);

	$y += $paragraphjump;

	//Lugar label
	
	imagettftext( $imagepng, $smallfontsize, 0, $x, $y, $color, $font, 'Lugar: ');

	$y += $medium_line_jump;

	imagettftext( $imagepng, $mediumfontsize, 0, $x, $y, $color, $font, $data['lugar'] );

	$y += $smallpjump;

	imagettftext( $imagepng, $mediumfontsize, 0, $x, $y, $color, $font, 'Centro Cultural Estación Mapocho' );

	$y += $title_line_jump;


	//Descripción

	//Titulo Evento
	$linedesc = explode('|', wordwrap($data['descripcion'], 70, '|'));

	foreach($linedesc as $linet) {

		imagettftext( $imagepng, $smallfontsize, 0, $x, $y, $color, $font, $linet);

		$y += $small_line_jump;

	}


	
	
	
	
	//Guardo la imagen
	
	$image = imagepng( $imagepng, CCHL_INVPATH . $invfilename );

	if($image == true) {

		$imagelink = CCHL_INVURL . $invfilename;

		return $imagelink;

	} else {

		return false;

	}

	

}

function cchl_invnotexists( $path ) {

	if( file_exists( $path) ) {

		return false;

	} else {

		return true;
	}
}

function cchl_invtemplate( $event_id ) {
	/**
	 * Devuelve el tipo de imagen a usar según el organizador asociado a un evento
	 */
	
	$organizer_ids = tribe_get_organizer_ids( $event_id );

	if( in_array(61814, $organizer_ids) ) {

		//México
		$invtemplate = TEMPLATEPATH . '/img/filsa2016/invitacion_filsaevento_mexico_large.png';

	} elseif( in_array( 9521, $organizer_ids) || in_array(3054, $organizer_ids) ) {

		//Cámara
		$invtemplate = TEMPLATEPATH . '/img/filsa2016/invitacion_filsaevento_camara_large.png';

	}

	if($invtemplate) {

		return $invtemplate;

	} else {

		return false;

	}

}

function cchl_frontinv( $data ) {
	
	/**
	 * Se usa en frontend para el botón, comprueba que exista el archivo para no reusar recursos
	 * devuelve una URL con el link a la imagen
	 */

	$invfilename = 'invitacion-' . $data['id']. '.png';
	
	$invfilepath = CCHL_INVPATH . $invfilename;
	$invfileurl = CCHL_INVURL . $invfilename;

	$imageplaceholder = cchl_invtemplate( $data['id'] );
	

	if( !file_exists( $invfilepath )) {

		$imglink = cchl_makeinv( $imageplaceholder, $data, $invfilename );
		
		return $imglink;

	} else {

		return $invfileurl;

	}


}

function cchl_checkeventmod( $post_id ) {
	/**
	 * Revisa si está en un evento de la categoría de FILSA 2016 y genera invitación nuevamente
	 */
	
	if( (get_post_type( $post_id ) == 'tribe_events') && is_object_in_term( $post_id, 'tribe_events_cat', 208)) {

		$invfilename = 'invitacion-' . $post_id. '.png';
		$imageplaceholder = cchl_invtemplate( $post_id );
		$time_format = get_option( 'time_format', TribeDateUtils::TIMEFORMAT );

		$data = array(
			'id'			=> $post_id,
			'title' 		=> get_the_title( $post_id ),
			'dia' 			=> tribe_get_start_date( $post_id, false ),
			'hora' 			=> tribe_get_start_date( $post_id , false, $time_format ) . ' - ' . tribe_get_end_date( $post_id, false, $time_format ),
			'lugar'			=> tribe_get_venue( $post_id ),
			'organizador'	=> tribe_get_organizer( $post_id ),
			'descripcion'   => get_the_content( $post_id )
			);

		cchl_makeinv($imageplaceholder, $data, $invfilename);

	}

}

add_action( 'save_post', 'cchl_checkeventmod' );

