<?php

//Funciones para campos personalizados

function cchl_sortexhibitors( ) {
	global $post;
	/**
	 * Ordena los campos personalizados en un array en el que el KEY es la letra del sector en mayúsculas A-B-C-D-E
	 */
	
	$sectores = array( 'A', 'B', 'C', 'D', 'E');
	$groupexpositores = get_post_meta($post->ID, '_cchl_expositores', true);

	//Array principal de expositores
	$infoexpositores = array();

	foreach( $groupexpositores as $expositor ) {

		$cursect = $expositor['expositores_sector'];

		$infoexpositores[$cursect][] = array(
			'expositor' => array(
				'logo' => cchl_legacy_image($post->ID, $expositor['expositores_logo']),
				'nombre' => $expositor['expositores_nombre'],
				'stands' => $expositor['expositores_stands']
				)
			);
}

ksort($infoexpositores);

return $infoexpositores;

}

function cchl_legacy_image($postid, $image, $size = 'medium') {
	$fileids = get_post_meta($postid, '_cchl_fileids', true);
	$img = sanitize_file_name( $image );
	if($fileids):
		$imgid = array_search($img, array_column($fileids, 'srckey'));
		if($imgid) {
			$imgsrc = wp_get_attachment_image_src( $fileids[$imgid]['srcid'], $size );
			return $imgsrc[0];
		};
	else:
		return 'https://camaradellibro.cl/wp-content/themes/cchl/img/cchl_logo.svg';
	endif;
}

function camfields_storefileid($postid, $image, $update = true, $size) {
	$newid = camfields_handlefile($postid, $image);
	if($newid) {
		$filedata = array(
			'srckey' => sanitize_file_name($image),
			'srcid'  => $newid
		);
		if($update == true) {
			$fileids = get_post_meta($postid, '_cchl_fileids', true);
			$fileids[] = $filedata;
			update_post_meta($postid, '_cchl_fileids', $fileids, false);
		} else {
			add_post_meta($postid, '_cchl_fileids', $filedata, false);
		}
		$imgsrc = wp_get_attachment_image_src( $newid, $size );
		return $imgsrc[0];
	}
}

function camfields_returnfilesrc($postid, $image) {

}

function cchl_legacy_file($postid, $file) {
	return cchl_legacy_image($postid, $file);
}

function camfields_handlefile($post_id, $image) {
    // Need to require these files
	if ( !function_exists('media_handle_upload') ) {
		require_once(ABSPATH . "wp-admin" . '/includes/image.php');
		require_once(ABSPATH . "wp-admin" . '/includes/file.php');
		require_once(ABSPATH . "wp-admin" . '/includes/media.php');
	}

	$url = get_bloginfo('url') . '/wp-content/files_mf/' . $image ;
	$tmp = download_url( $url );
	if( is_wp_error( $tmp ) ){
		return false;
    }
    
	$desc = get_the_title( $post_id );
	$file_array = array();

	// Set variables for storage
	// fix file filename for query strings
	preg_match('/[^\?]+\.(jpg|jpe|jpeg|gif|png|pdf)/i', $url, $matches);
	$file_array['name'] = basename($matches[0]);
	$file_array['tmp_name'] = $tmp;

	// If error storing temporarily, unlink
	if ( is_wp_error( $tmp ) ) {
		@unlink($file_array['tmp_name']);
		$file_array['tmp_name'] = '';
	}

	// do the validation and storage stuff
	$id = media_handle_sideload( $file_array, $post_id, $desc );

	// If error storing permanently, unlink
	if ( is_wp_error($id) ) {
		@unlink($file_array['tmp_name']);
		return $id;
	}

	return $id;
}