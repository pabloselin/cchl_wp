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
		'meta_type' => 'DATE',
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

$html = '<h2>Eventos para el día ' . $dia . ' ' . $ndia . ' de ' . $mes . '</h2>';
$html .= cchl_event_filter( $eventday->format('U') );



foreach($events as $event) {
	$html .= cchl_event_template( $event->ID, $eventday->format('U') );
}


echo $html;
wp_die();
}

add_action('wp_ajax_cchl_eventdayquery', 'cchl_eventdayquery');
add_action('wp_ajax_nopriv_cchl_eventdayquery', 'cchl_eventdayquery');

function cchl_event_filter($day) {
	$html =	'<div class="filtrowrap">';
	$html .= '<div class="filtronav">';
	$html .= '<a href="#" class="active" data-relfilter="portipo">Filtrar eventos <strong>por tipo</strong></a>';
	$html .= '<a href="#" data-relfilter="portema">Filtrar eventos <strong>por tema</strong></a>';
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
		'meta_type' => 'DATE',
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
$html = '<h2>' . $tax->name . '</h2>';

foreach($eventos as $evento) {
	$html .= cchl_event_template($evento->ID);
}

echo $html;
wp_die();

}

add_action('wp_ajax_cchl_eventfilterquery', 'cchl_eventfilterquery');
add_action('wp_ajax_nopriv_cchl_eventfilterquery', 'cchl_eventfilterquery');

function cchl_event_template($postid, $dayid = 'any') {
	$event = get_post($postid);

	$startday = tribe_get_start_date( $event->ID, false, 'l j F');
	$startdate = tribe_get_start_date($event->ID, false, 'G:i');
	$enddate = tribe_get_end_date($event->ID, false, 'G:i');
	$tipoevs = get_the_terms($event->ID, 'cchl_tipoevento');
	$temaevs = get_the_terms($event->ID, 'cchl_temaevento');
	$ntevs = array();
	$ttevs = array();
	
	if($tipoevs):
		foreach($tipoevs as $tipoev) {
				$ntevs[] = $tipoev->name;
				$stevs[] = $tipoev->slug;
			}
		$nomtipoevs = implode(', ', $ntevs);
		$datatipoevs = implode(' ', $stevs);
	endif;
	
	if($temaevs):
		foreach($temaevs as $temaev) {
				$ttevs[] = $temaev->name;
				$sttevs[] = $temaev->slug;
			}
		$nomtemaevs = implode(', ', $ttevs);
		$datatemaevs = implode(' ', $sttevs);
	endif;

	$html = '<div class="evento" data-top="' . $dayid . '" data-cchl_tipoevento="' . $datatipoevs . '" data-cchl_temaevento="' . $datatemaevs . '">';
	$html .= '<h3>' . $event->post_title . '</h3>';
	
	if($dayid == 'any') {

		$html .= '<p><span class="dia"><i class="fa fa-calendar-o fa-fw"></i> ' . $startday . '</span></p>';
	}

	$html .= '<p><span class="hora"><i class="fa fa-clock-o fa-fw"></i>' . $startdate . '</span>';
	
	if($startdate != $enddate):
		$html .= '- ' . $enddate;
	endif;
	
	$html .= ' hrs. </p>';
	$html .= '<p><span class="lugar"><i class="fa fa-map-marker fa-fw"></i> Lugar: ' . tribe_get_venue($event->ID) .'</span></p>';
	$html .= '<p><span class="tipo">TIPO: ' . $nomtipoevs . '</span></p>';
	$html .= '<p><span class="tema">TEMA: ' . $nomtemaevs . '</span></p>';
	$html .= '<p class="evplus"><a href="' . get_permalink($event->ID) . '" class="masinfo"><i class="fa fa-plus"></i> Más información</a> </p>';
	$html .= '</div>';

	return $html;
}

function cchl_free_events() {

}
