<?php

//Funciones para campos personalizados

function cchl_sortexhibitors( ) {
	/**
	 * Ordena los campos personalizados en un array en el que el KEY es la letra del sector en mayúsculas A-B-C-D-E
	 */
	
	$sectores = array( 'A', 'B', 'C', 'D', 'E');
	$groupexpositores = getGroupOrder( 'expositores_sector' );

                //Array principal de expositores
	$infoexpositores = array();

	foreach( $groupexpositores as $expositor ) {

		$cursect = get( 'expositores_sector',  $expositor);

		$infoexpositores[$cursect][] = array(
			'expositor' => array(
				'logo' => get_image( 'expositores_logo', $expositor ),
				'nombre' => get( 'expositores_nombre', $expositor ),
				'stands' => get( 'expositores_stands', $expositor )
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