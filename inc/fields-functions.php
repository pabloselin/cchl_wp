<?php

//Funciones para campos personalizados

function cchl_sortexhibitors( ) {
	/**
	 * Ordena los campos personalizados en un array en el que el KEY es la letra del sector en mayúsculas A-B-C-D-E
	 */
	
	$sectores = array( 'A', 'B', 'C', 'D', 'E');
	$groupexpositores = getGroupOrder( 'expositor_sector' );

                //Array principal de expositores
	$infoexpositores = array();

	foreach( $groupexpositores as $expositor ) {

		$cursect = get( 'expositor_sector',  $expositor);

		$infoexpositores[$cursect][] = array(
			'expositor' => array(
				'logo' => get_image( 'expositor_logo', $expositor ),
				'nombre' => get( 'expositor_nombre', $expositor ),
				'stands' => get( 'expositor_stands', $expositor )
				)
			);
}

ksort($infoexpositores);

return $infoexpositores;

}