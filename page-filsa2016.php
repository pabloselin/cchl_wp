<?php
/*
Template Name: FILSA 2016
*/
?>
<?php get_header(); ?>

<?php 

//Config Home FILSA:

// Número de eventos en portada
    $neventosportada = 3;
//Número de noticias en portada
    $noticiasportada = 3;
?>


<div id="main-page" class="container_16 cf post-<?php echo $post->ID;?>">
    
    <?php get_template_part('parts/clean-sidebar');?>

    
    <div id="content" class="grid_12">
        
        <?php 

            $mostrar_aviso = get('aviso_mostrar');

            if($mostrar_aviso == true) {

                $aviso_template = mustache_engine();

                $data = array(
                    'aviso_texto' => get('aviso_texto')
                    );

                echo $aviso_template->render('aviso-feria', $data);                

            }

        ?>

        <div class="accesos-rapidos filsa-2016">
        
        <?php 
            if(has_nav_menu( 'accesos-rapidos-filsa-2016') ):
                wp_nav_menu( array('theme_location'=> 'accesos-rapidos-filsa-2016') );
            endif;
        ?>
        
        </div>

        <div class="eventos-destacados">
            
            <?php 
                
                $eventos = cchl_getmenus( 'eventos-destacados-filsa-2016' );

                if($eventos) {

                    $eventos_template = mustache_engine();

                    foreach($eventos as $key=>$evento) {

                        if($key < $neventosportada) {

                            //Collect data structure for events
                            $evtitle     = $evento->title;
                            $start_time  = tribe_get_start_date($evento->object_id, false, 'G:i');
                            $end_time    = ($start_time = tribe_get_end_date($evento->object_id, false, 'G:i')) ? '' : tribe_get_end_date($evento->object_id, false, 'G:i') ;
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
        <a href="#" class="more-filsa"><i class="fa fa-calendar"></i> Ver todo el programa</a>

        <div class="noticias-destacadas">
            
            <?php $noticias = cchl_getmenus('noticias-destacadas-filsa-2016');

                    if($noticias) {

                        foreach($noticias as $key=>$noticia) {

                            if($key < $noticiasportada) {

                                $lastkey = '';

                                //Collect data
                                if($key == $noticiasportada-1) {

                                    $lastkey = 'last';

                                }
                                
                                $ndata = array(
                                            'title'     => $noticia->title,
                                            'permalink' => get_permalink($noticia->object_id),
                                            'excerpt'   => cchl_excerpt($noticia->object_id, 30),
                                            'date'      => mysql2date( 'l d M', $noticia->post_date ),
                                            'lastkey'   => $lastkey
                                        );

                                if(has_post_thumbnail( $noticia->object_id )) {

                                    $thid = get_post_thumbnail_id( $noticia->object_id );
                                    $imgsrc = wp_get_attachment_image_src( $thid, 'media-kit' );

                                    $ndata['image'] = $imgsrc[0];

                                } else {

                                    $ndata['image'] = false;
                                    
                                }

                                $noticiatemplate = mustache_engine();

                                echo $noticiatemplate->render( 'noticia-portada-feria', $ndata );

                            }
                        }
                    }
            ?>
        <a href="#" class="more-filsa"><i class="fa fa-newspaper-o"></i> Ver más noticias FILSA 2016</a>
        </div>

        <div class="redes-filsa">
            <div class="facebook">
                <div class="fb-page" data-href="https://www.facebook.com/camarachilenalibro" data-tabs="timeline" data-width="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/camarachilenalibro" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/camarachilenalibro">Cámara Chilena del Libro</a></blockquote></div>
            </div>
            <div class="twitter">
                <a class="twitter-timeline" data-height="500" data-lang="es" href="https://twitter.com/CamaradelLibro">Tweets by Camaradellibro</a>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <div class="instagram">
                <?php echo get('insercion_instagram');?>
            </div>
        </div>

        

    </div>
</div>
</div>

<?php get_footer(); ?>
