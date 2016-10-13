<?php
/**
 * Funciones ajax para llamado de eventos
 */

function cchl_eventdayquery() {
/**
 * Devuelve eventos por día
 */
$eventday = new DateTime( $_POST['day'] );
$feriacatid = $_POST['eventcat'];

//args para el llamado a día
$args = array(
		'posts_per_page' => -1,
		'post_type' => 'tribe_events',
		'orderby' => 'meta_value',
		'meta_key' => '_EventStartDate',
		'meta_type' => 'DATETIME',
		'order' => 'ASC',
		'meta_query' => array(
			array(
				'key' => '_EventStartDate',
				'type' => 'DATE',
				'value' => $eventday->format('Y-m-d')
				)
			),

		'tax_query' => array(
			array(
				'taxonomy' => 'tribe_events_cat',
				'field' => 'id',
				'terms' => $feriacatid
				)
			)
		);

$events = get_posts($args);
setlocale(LC_TIME, '');
setlocale(LC_TIME, 'es_ES.utf8');
$dia = strftime('%A' , $eventday->format('U'));
$ndia = strftime('%e' , $eventday->format('U'));
$mes = strftime('%B' , $eventday->format('U'));

$html = '<h2 class="animated fadeInDown"><i class="fa fa-caret-right"></i> ' . $dia . ' ' . $ndia . ' de ' . $mes . '</h2>';
$html .= cchl_event_filter( $eventday->format('U') );


if($events) {
	
	foreach($events as $event) {
		$html .= cchl_event_template( $event->ID, $eventday->format('U') );
	}	

} else {

	$html .= '<p class="nohayeventos animated fadeIn"><i class="fa fa-frown-o"></i> No se encontraron eventos para el día</p>';

}


echo $html;
wp_die();
}

add_action('wp_ajax_cchl_eventdayquery', 'cchl_eventdayquery');
add_action('wp_ajax_nopriv_cchl_eventdayquery', 'cchl_eventdayquery');

function cchl_event_filter($day) {
	$html =	'<div class="filtrowrap animated fadeIn">';
	$html .= '<div class="filtronav">';
	$html .= '<p><i class="fa fa-info-circle"></i> Se muestran todos los eventos para el día. Puedes también filtrar según tu interés por tipo o tema de evento.</p>';
	$html .= '<a href="#" class="active" data-relfilter="portipo"><strong>Tipos</strong> <span> Inauguración, Exhibición, Charla, etc.</span> </a>';
	$html .= '<a href="#" data-relfilter="portema"><strong>Temas</strong> <span>Cine, Cuentos, Danza, etc.</span></a>';
	$html .= '</div>';
	$html .= '<div class="filtrotab active" data-filter="portipo">';
	$html .= '<div class="filtro" data-id="' . $day . '">';
	$html .= '</div>';
	$html .= '</div>';
	$html .= '<div class="filtrotab" data-filter="portema">';
	$html .= '<div class="filtrotema" data-id="' . $day . '">';
	$html .= '</div>';
	$html .= '</div>';
	$html .= '</div>';

	return $html;
}



function cchl_eventfilterquery() {
/**
 * Devuelve eventos por categoría de evento
 */
$eventtax = $_POST['eventtax'];
$eventterm = $_POST['eventterm'];
$feriacatid = $_POST['eventcat'];

//args para el llamado a tax
$args = array(
		'posts_per_page' => -1,
		'post_type' => 'tribe_events',
		'orderby' => 'meta_value',
		'meta_key' => '_EventStartDate',
		'meta_type' => 'DATETIME',
		'order' => 'ASC',
		'tax_query' => array(
			array(
				'taxonomy' => 'tribe_events_cat',
				'field' => 'id',
				'terms' => $feriacatid
				),
			array(
				'taxonomy' => $eventtax,
				'field' => 'id',
				'terms' => $eventterm
				)
			)
		);
$eventos = get_posts($args);
$tax = get_term($eventterm, $eventtax);

if($eventos) {
	
	$html = '<h2>' . $tax->name . '</h2>';

	foreach($eventos as $evento) {
		$html .= cchl_event_template($evento->ID);
	}	

} else {

	$html = '<p class="animated fadeIn nohayeventos"><i class="fa fa-frown-o"></i> No se encontraron eventos para ' . $tax->name . '</p>';

}



echo $html;
wp_die();
}

add_action('wp_ajax_cchl_eventfilterquery', 'cchl_eventfilterquery');
add_action('wp_ajax_nopriv_cchl_eventfilterquery', 'cchl_eventfilterquery');

function cchl_debugeventsearch() {
	$query = sanitize_text_field($_POST['query']);

	echo $query;
	wp_die();
}

add_action('wp_ajax_cchl_debugeventsearch', 'cchl_debugeventsearch');
add_action('wp_ajax_nopriv_cchl_debugeventsearch', 'cchl_debugeventsearch');

function cchl_customeventsearch() {
	/**
 	* Devuelve resultados de un query de búsqueda vía AJAX
 	*/	
 	$query = sanitize_text_field($_POST['query']);

 	$args = array(
 		'post_type' => 'tribe_events',
 		's' => $query,
 		'posts_per_page' => -1,
 		'tax_query'=> array(
 			array(
 				'taxonomy' => 'tribe_events_cat',
 				'terms' => 208
 				)
 			)
 		);

 	$search = new WP_Query($args);
 	$count = $search->post_count;

 	if($count > 1) {

 		$fraseres = 'Se encontraron ' . $count . ' eventos ';
 	
 	} else {

 		$fraseres = 'Se encontró ' . $count . ' evento ';
 	}

 	$content = '';
 	

 	if( $search->have_posts() ):

 		$content .= '<h2 class="searchtitle">' . $fraseres . ' con la palabra <span>' . $query . '</span></h2>';

 		 while( $search->have_posts() ): $search->the_post();

 			$content .= cchl_event_template($post->ID);

 		endwhile;

 	else:

 		$content .= '<div class="aviso-load no-results"><p><i class="fa fa-frown-o"></i> No se encontraron eventos con la palabra <span>' . $query . '</span></p></div>';

 	endif;

 	echo $content;

 	wp_die();
}

add_action('wp_ajax_cchl_customeventsearch', 'cchl_customeventsearch');
add_action('wp_ajax_nopriv_cchl_customeventsearch', 'cchl_customeventsearch');

function cchl_event_template($postid, $dayid = 'any') {
	$event = get_post($postid);

	$startday = tribe_get_start_date( $event->ID, false, 'l j F');
	$startdate = tribe_get_start_date($event->ID, false, 'G:i');
	$enddate = tribe_get_end_date($event->ID, false, 'G:i');
	if(tribe_event_is_all_day( $event->ID) ):
		$startdate = 'Todo el día';
	endif;
	$tipoevs = get_the_terms($event->ID, 'cchl_tipoevento');
	$temaevs = get_the_terms($event->ID, 'cchl_temaevento');
	$ntevs = array();
	$ttevs = array();
	$organizers = cchl_organizer_names( $event->ID );
	
	if($tipoevs):
		foreach($tipoevs as $tipoev) {
				if($tipoev->term_id != 211) {

					$ntevs[] = $tipoev->name;
					$stevs[] = $tipoev->slug;	
					
				}
				
			}
		$nomtipoevs = implode('</span> &bull; <span class="taxitem">', $ntevs);
		$datatipoevs = implode(' ', $stevs);
	endif;
	
	if($temaevs):
		foreach($temaevs as $temaev) {
				$ttevs[] = $temaev->name;
				$sttevs[] = $temaev->slug;
			}
		$nomtemaevs = implode('</span> &bull; <span class="taxitem">', $ttevs);
		$datatemaevs = implode(' ', $sttevs);
	endif;

	$html = '<div class="evento animated fadeIn" data-top="' . $dayid . '" data-cchl_tipoevento="' . $datatipoevs . '" data-cchl_temaevento="' . $datatemaevs . '">';
	$html .= '<h3><a href="' . get_permalink($event->ID) . '">' . $event->post_title . '</a></h3>';
	
	if($dayid == 'any') {

		$html .= '<p><span class="dia"><i class="fa fa-calendar-o fa-fw"></i> ' . $startday . '</span></p>';
	}

	$html .= '<p><span class="hora"><i class="fa fa-clock-o fa-fw"></i>' . $startdate . '</span>';
	
	if($startdate != $enddate && !tribe_event_is_all_day($event->ID) ):
		$html .= ' - ' . $enddate;
	endif;
	
	if(!tribe_event_is_all_day($event->ID) ):
		$html .= ' hrs. </p>';
	endif;
	$html .= '<p><span class="lugar"><i class="fa fa-map-marker fa-fw"></i> Lugar: ' . tribe_get_venue($event->ID) .'</span></p>';

	if( isset( $organizers ) ):

		$html .= '<p><span class="organizers"><i class="fa fa-fw fa-flag"></i> Organiza: ' . $organizers . '</span> </p>';

	endif;
	
	if( isset( $nomtemaevs ) ) :
		$html .= '<br><p class="tax"><span class="labeltax">Tema:</span> <span class="taxitem">' . $nomtemaevs . '</p>';
	endif;

	if( isset( $nomtipoevs) ):
		$html .= '<p class="tax"><span class="labeltax">Tipo:</span> <span class="taxitem">' . $nomtipoevs . '</p>';
	endif;
	if(is_object_in_term( $event->ID, 'cchl_tipoevento', 188 )):
		$html .= '<p class="actgratis"><a href="'. CCHL_LINKGRATIS.'"><i class="fa fa-thumbs-o-up"></i> Actividad gratuita: infórmate como asistir acá</a></p>';
	endif;

	//Si los organizadores corresponden puedo llamar al generador de invitaciones
	$organizer_ids = tribe_get_organizer_ids( $event->ID );

	if( in_array( 61814, $organizer_ids) || in_array( 9521, $organizer_ids) || in_array(3054, $organizer_ids) ) {

		if(function_exists('cchl_ajaxinvitation')) {

			$html .= cchl_ajaxinvitation( $event->ID );

		}
		
	}

	$html .= '<p class="evplus"><a href="' . get_permalink($event->ID) . '" class="masinfo"><i class="fa fa-plus"></i> info</a> </p>';
	$html .= '</div>';

	return $html;
}

function cchl_free_events() {

}

function cchl_organizer_names( $event_id ) {
	/**
	 * Devuelve un listado de nombres de organizadores separados por un guión.
	 */

	$organizer_ids = tribe_get_organizer_ids( $event_id );

	if($organizer_ids) {

			foreach ($organizer_ids as $organizer) {

				$organizers_names[] = get_the_title($organizer);

			}

			$organizers_string = implode(' - ', $organizers_names);


	}

	return $organizers_string;

}
