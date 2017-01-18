<?php 

function mustache_engine() {
	/**
 	* MUSTACHE COMPILER
 	*/

	return new Mustache_Engine(array(
		'loader' => new Mustache_Loader_FilesystemLoader( get_template_directory() . '/parts/mustache')
		)
	);

}

function render_mustache_event( $itemid, $template = 'evento-mini' ) {

            $eventos_template = mustache_engine();
            $evtitle     = get_the_title($itemid);
            $start_time  = tribe_get_start_date($itemid, true, 'G:i');
            $end_time    = ($start_time == tribe_get_end_date($itemid, true, 'G:i')) ? '' : tribe_get_end_date($itemid, true, 'G:i') ;
            $start_date  = tribe_get_start_date($itemid, false, 'l d M');
            $end_date  = tribe_get_end_date($itemid, false, 'l d M');
            $lugar       = tribe_get_venue($itemid);
            $link        = tribe_get_event_link($itemid);
            $tipoevs     = cchl_plainterms($itemid, 'cchl_tipoevento');
            $temaevs     = cchl_plainterms($itemid, 'cchl_temaevento');

            $evdata = array(
                'title'       => $evtitle,
                'start_date'  => $start_date,
                'end_date'    => $end_date,
                'start_time'  => $start_time,
                'venue'       => $lugar,
                'tipo_evento' => $tipoevs,
                'tema_evento' => $temaevs,
                'permalink'   => $link,
                'key'         => $key
                );

    return $eventos_template->render($template, $evdata);
}