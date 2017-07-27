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