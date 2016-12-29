<?php 

function cchl_tablaprogramaferia($pags, $titulo) {
	/**
	 * Genera calendario de feria basado en IDS de páginas con relación día
	 */
	$output = '<div class="eventos-feria-shortcode">';
	$output .= '<h2 style="font-weight:normal;">' . $titulo . '</h2>';
	$output .= '<div class="tabdias tabgen active" id="diaseventos">';
	$output .= '<ul id="navfilsa" class="navfil fil2016variant"></ul>';
	$output .= '<ul class="calendario-filsa fil2016variant">';

	foreach($pags as $day) {
		
		$page = get_post($day['id']);
		$hoy = date('Y-m-j');
		if($hoy == $day['dcode'] . '-' . $day['ndia']) {
			$cur = 'hoy';
		} else {
			$cur = 'normal';	
		}
		$dia = $day['dia'];
		$ndia = $day['ndia'];
		$mes = $day['mes'];

		$output .= '<li class="dia coneventos ' . $cur . '" data-dia="' . $dia . '" data-ndia="' . $ndia . '" data-mes="'. $mes . '">';
		$output .= '<div class="filij-day-content">';
		$output .= '<h3>' . $page->post_title . '</h3>';
		$output .= apply_filters( 'the_content', $page->post_content );
		$output .= '</div></li>';
	}

	$output .= '</ul></div></div>';

	return $output;
}

function filij2016_programashortcode($atts) {
	$info = shortcode_atts(
		array(
			'titulo' => 'Programa Cultural'
			), $atts
	);

	$pagsfilij2016 = array(
					array(
						'id' => 60531,
						'ndia' => 26,
						'mes' => 'Mayo',
						'dia' => 'Jueves',
						'dcode' => '2016-05'
						),
					array(
						'id' => 60535,
						'ndia' => 27,
						'mes' => 'Mayo',
						'dia' => 'Viernes',
						'dcode' => '2016-05'
						),
					array(
						'id' => 60537,
						'ndia' => 28,
						'mes' => 'Mayo',
						'dia' => 'Sábado',
						'dcode' => '2016-05'
						),
					array(
						'id' => 60539,
						'ndia' => 29,
						'mes' => 'Mayo',
						'dia' => 'Domingo',
						'dcode' => '2016-05'
						),
					array(
						'id' => 60541,
						'ndia' => 30,
						'mes' => 'Mayo',
						'dia' => 'Lunes',
						'dcode' => '2016-05'
						),
					array(
						'id' => 60563,
						'ndia' => 31,
						'mes' => 'Mayo',
						'dia' => 'Martes',
						'dcode' => '2016-05'
						),
					array(
						'id' => 60543,
						'ndia' => 1,
						'mes' => 'Junio',
						'dia' => 'Miércoles',
						'dcode' => '2016-06'
						),
					array(
						'id' => 60545,
						'ndia' => 2,
						'mes' => 'Junio',
						'dia' => 'Jueves',
						'dcode' => '2016-06'
						),
					array(
						'id' => 60547,
						'ndia' => 3,
						'mes' => 'Junio',
						'dia' => 'Viernes',
						'dcode' => '2016-06'
						),
					array(
						'id' => 60549,
						'ndia' => 4,
						'mes' => 'Junio',
						'dia' => 'Sábado',
						'dcode' => '2016-06'
						),
					array(
						'id' => 60551,
						'ndia' => 5,
						'mes' => 'Junio',
						'dia' => 'Domingo',
						'dcode' => '2016-06'
						)					
					 );

	return cchl_tablaprogramaferia($pagsfilij2016, $info['titulo']);
}

add_shortcode( 'programa_filij_2016', 'filij2016_programashortcode' );

function cchl_colaboradores_fields( $section_title, $colab_logo, $colab_name, $colab_url ) {

	global $post;

	$fieldgroup = getGroupOrder($colab_logo);

	$fieldcount = count(get_post_meta($post->ID, $colab_logo, false));

	$output = '';
               
    if($fieldgroup && get($colab_logo)):

    	$output .= '<h3 class="colabheading">' . $section_title . '</h3>';

    	if($fieldcount > 1) {

    			$output .= '<ul class="colabs">';

    	} else {

    			$output .= '<ul class="colabs invs">';

    	}

    	foreach($fieldgroup as $fielditem) {

    		$output .= '<li>';
    		$output .= get_image($colab_logo, $fielditem, 1, 1, null, $size);
    		$output .= '<h3>' . get($colab_name, $fielditem) . '</h3>';

    		if(get($colab_url, $fielditem)):

    			$output .= '<a target="_blank" href="'.get( $colab_url, $fielditem).'"><i class="fa fa-external-link"></i></a>';

    		endif;

    		$output .= '</li>';

    	}

    	$output .= '</ul>';

    endif;

    return $output;

}