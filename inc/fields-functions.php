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
	$fileids = get_post_meta($postid, '_cchl_fileassoc', true);
	$img = sanitize_file_name( $image );
	$haskey = false;
	if($fileids):
		foreach($fileids as $key=>$fileid) {
			if($img == $fileid['filename']):
				$imgkey = $key;
				$haskey = true;
			endif;
		}
		//$imgid = array_search($img, array_column($fileids, 'filename'));
		if($haskey) {
			$imgsrc = wp_get_attachment_image_src( $fileids[$imgkey]['fileid'], $size );
			return $imgsrc[0];
		};
	else:
		$oldurl = content_url() . '/files_mf/' .$image;
		if(file_exists( $oldurl )) {
			return $oldurl;
		} else {
			return 'https://camaradellibro.cl/wp-content/themes/cchl_wp/img/cchl_logo.svg';	
		}
		return $oldurl;
	endif;
}

function cchl_oldfilesmf($file, $id) {
	if(strlen($id) > 0) {
		return $file;
	} else {
		$oldurl = content_url() . '/files_mf/' . cchl_striphttp($file);
		
		return $oldurl;
	}
}

function cchl_striphttp( $string ) {
	return str_replace('http://', '', $string);
}