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

	$x = 24;
	$y = 200;

	//Titulo Evento
	$linetitle = explode('|', wordwrap($data['title'], 36, '|'));

	foreach($linetitle as $line) {

		imagettftext( $imagepng, 14, 0, $x, $y, $color, $font, $line);

		$y += 25;

	}

	//Salto diferenciador
	$y += 24;

	//Fecha
	
	imagettftext( $imagepng, 12, 0, $x, $y, $color, $font, 'Día: ' . $data['dia']);

	$y += 17;

	//Hora
	
	imagettftext( $imagepng, 12, 0, $x, $y, $color, $font, 'Hora: ' . $data['hora']);

	$y += 27;

	//Lugar label
	
	imagettftext( $imagepng, 11, 0, $x, $y, $color, $font, 'Lugar: ');

	$y += 17;

	imagettftext( $imagepng, 12, 0, $x, $y, $color, $font, $data['lugar'] );

	$y += 27;

	//Organizador
	
	imagettftext( $imagepng, 11, 0, $x, $y, $color, $font, 'Organizador: ');

	$y += 17;

	imagettftext( $imagepng, 12, 0, $x, $y, $color, $font, $data['organizador'] );

	$y += 17;





	
	$invitacion = imagettftext( $imagepng, 16, 0, $x, $y, $color, $font, $line1);
	
	
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

function cchl_frontinv( $data ) {
	
	/**
	 * Se usa en frontend para el botón, comprueba que exista el archivo para no reusar recursos
	 * devuelve una URL con el link a la imagen
	 */

	$invfilename = 'invitacion-' . $data['id']. '.png';
	
	$invfilepath = CCHL_INVPATH . $invfilename;
	$invfileurl = CCHL_INVURL . $invfilename;

	$imageplaceholder = TEMPLATEPATH . '/img/filsa2016/invitacion_filsaevento.png';

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
		$imageplaceholder = TEMPLATEPATH . '/img/filsa2016/invitacion_filsaevento.png';
		$time_format = get_option( 'time_format', TribeDateUtils::TIMEFORMAT );

		$data = array(
			'id'			=> $post_id,
			'title' 		=> get_the_title( $post_id ),
			'dia' 			=> tribe_get_start_date( $post_id, false ),
			'hora' 			=> tribe_get_start_date( $post_id , false, $time_format ) . ' - ' . tribe_get_end_date( $post_id, false, $time_format ),
			'lugar'			=> tribe_get_venue( $post_id ),
			'organizador'	=> tribe_get_organizer( $post_id )
			);

		cchl_makeinv($imageplaceholder, $data, $invfilename);

	}

}

add_action( 'save_post', 'cchl_checkeventmod' );

