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
				'logo' => cchl_legacy_image($expositor['expositores_logo']),
				'nombre' => $expositor['expositores_nombre'],
				'stands' => $expositor['expositores_stands']
				)
			);
}

ksort($infoexpositores);

return $infoexpositores;

}

function cchl_legacy_image($image) {
	return content_url() . '/files_mf/' . $image;
}

function cchl_legacy_file($file) {
	return cchl_legacy_image($file);
}