<?php
/**
 * Funciones ajax para llamado de eventos
 */

function cchl_eventdayquery() {
/**
 * Devuelve eventos por día
 */
$eventday = new DateTime( $_POST['cchl_eventday'] );
$feriacatid = $_POST['cchl_feriacatid'];

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
$html = '';

foreach($events as $event) {
	$html .= cchl_event_template($event->id);
}


return $html;

}

function cchl_eventcatquery() {
/**
 * Devuelve eventos por categoría de evento
 */
$eventcat = $_POST['cchl_eventcat'];

}

function cchl_eventtypequery() {
/**
 * Devuelve eventos por tipo de evento
 */
$eventtype = $_POST['cchl_eventtype'];

}

function cchl_event_template($postid) {
	$event = get_post($postid);

	$startdate = tribe_get_start_date($event->ID, false, 'G:i');
	$enddate = tribe_get_end_date($event->ID, false, 'G:i');
	$tipoevs = get_the_terms($event->ID, 'cchl_tipoevento');
	$temaevs = get_the_terms($event->ID, 'cchl_temaevento');
	$ntevs = array();
	$ttevs = array();
	
	if($tipoevs):
		foreach($tipoevs as $tipoev) {
				$ntevs[] = $tipoev->name;
			}
		$nomtipoevs = implode(', ', $ntevs);
	endif;
	
	if($temaevs):
		foreach($temaevs as $temaev) {
				$ttevs[] = $temaev->name;
			}
		$nomtemaevs = implode(', ', $ttevs);
	endif;

	$html = '<div class="evento">';
	$html .= '<h3>' . $event->post_title . '</h3>';
	$html .= '<span class="dia"><i class="fa fa-calendar-o fa-fw"></i> </span>';
	$html .= '<span class="hora"><i class="fa fa-map-marker fa-fw"></i> </span>';
	$html .= '<span class="lugar">Lugar: ' . tribe_get_venue($event->ID) .'</span>';
	$html .= '<span class="tipo">' . $nomtipoevs . '</span>';
	$html .= '<span class="tema">' . $nomtemaevs . '</span>';
	$html .= '<p class="evplus"><a href="' . tribe_event_link($event->ID) . '" class="masinfo"><i class="fa fa-plus"></i></a> </p>';
	$html .= '</div>';

	return $html;
}

function cchl_free_events() {

}