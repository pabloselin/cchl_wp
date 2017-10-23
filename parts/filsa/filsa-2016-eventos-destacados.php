<div class="eventos-destacados">
            
            <?php 
                
                $eventos = cchl_getmenus( filsa2017_get_option('filsa2017_menueventos') );

                if($eventos) {

                    $eventos_template = mustache_engine();

                    foreach($eventos as $key=>$evento) {

                        if($key < $neventosportada) {

                            //Collect data structure for events
                            $evtitle     = $evento->title;
                            $start_time  = tribe_get_start_date($evento->object_id, true, 'G:i');
                            $end_time    = ($start_time == tribe_get_end_date($evento->object_id, true, 'G:i')) ? '' : tribe_get_end_date($evento->object_id, true, 'G:i') ;
                            $start_date  = tribe_get_start_date($evento->object_id, false, 'l d M');
                            $end_date  = tribe_get_end_date($evento->object_id, false, 'l d M');
                            $lugar       = tribe_get_venue($evento->object_id);
                            $link        = tribe_get_event_link($evento->object_id);
                            $tipoevs     = cchl_plainterms($evento->object_id, 'cchl_tipoevento');
                            $temaevs     = cchl_plainterms($evento->object_id, 'cchl_temaevento');

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

                            echo $eventos_template->render('evento-mini', $evdata);

                        }

                    }

                }

            ?>
        
        </div>
        <a href="<?php echo get_permalink(61251);?>" class="more-filsa more-eventos"><i class="fa fa-calendar"></i> Ver todo el programa</a>
        <p>&nbsp;</p>