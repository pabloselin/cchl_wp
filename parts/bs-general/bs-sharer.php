            <div class="sharer" data-url="<?php echo urlencode( cchl_url( $post->ID ) );?>">
                  <a target="_blank" href="https://facebook.com/sharer.php?u=<?php echo urlencode( get_permalink($post->ID) );?>" class="sharer__facebook"><i class="fa fa-facebook"></i></a>

                  <a target="_blank" href="https://twitter.com/home?status=<?php echo urlencode( $post->post_title . ' - '  . wp_get_shortlink($post->ID ) );?>" class="sharer__twitter"><i class="fa fa-twitter"></i></a>

                  <a class="visible-sm visible-xs sharer__whatsapp" target="_blank" href="whatsapp://send?text=<?php echo $post->post_title;?> <?php echo get_permalink($post->ID);?>" title="Enviar por WhatsApp"><i class="fa fa-whatsapp"></i></a>
            </div>