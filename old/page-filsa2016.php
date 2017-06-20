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
                                            'date'      => get_the_time( 'l d M', $noticia->object_id ),
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
        <a href="<?php echo get_category_link( 199 );?>" class="more-filsa"><i class="fa fa-newspaper-o"></i> + noticias FILSA 2016</a>
        </div>

        <div class="redes-filsa">
            <div class="facebook">
                
                <h3 class="titulo-facebook"><a href="https://www.facebook.com/filsachile" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></h3>

                <div class="fb-page" data-href="<?php echo CCHL_FACEBOOKFILSA;?>" data-tabs="timeline" data-width="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="<?php echo CCHL_FACEBOOKFILSA;?>" class="fb-xfbml-parse-ignore"><a href="<?php echo CCHL_FACEBOOKFILSA;?>">Cámara Chilena del Libro</a></blockquote></div>
            </div>
            <div class="twitter">

                <h3 class="titulo-twitter"><a href="https://twitter.com/<?php echo CCHL_TWITTER;?>" target="_blank"><i class="fa fa-twitter"></i> Twitter</a></h3>

                <a class="twitter-timeline" data-height="500" data-lang="es" href="https://twitter.com/<?php echo CCHL_TWITTER;?>"> Tweets by <?php echo CCHL_TWITTER;?></a>
                <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <div class="instagram">

                <h3 class="titulo-instagram"><a href="https://instagram.com/filsachile"><i class="fa fa-instagram"></i> Instagram</a></h3>

                <?php echo get('insercion_instagram');?>
            </div>
        </div>

        <div class="redes-filsa-movil">
            
            <a href="<?php echo CCHL_FACEBOOKFILSA;?>" target="_blank" class="movilred mr-facebook"><i class="fa fa-facebook"></i> Facebook</a>

            <a href="https://twitter.com/<?php echo CCHL_TWITTER;?>" class="movilred mr-twitter"><i class="fa fa-twitter"></i> Twitter</a>

            <a href="https://instagram.com/filsachile" class="movilred mr-instagram"><i class="fa fa-instagram"></i> Instagram</a>

            <a href="https://www.flickr.com/photos/148374223@N02" target="_blank" class="movilred mr-flickr"><i class="fa fa-flickr"></i> Flickr</a>

        </div>    

    </div>

</div>
</div>

<?php get_footer(); ?>