            <!-- <div class="sharer">
                  
                  <div class="sharer__facebook">
                        <div class="fb-share-button" data-href="<?php echo get_permalink();?>" data-layout="button_count"></div>
                  </div>

                  <div class="sharer__twitter">
                        <a href="http://twitter.com/share" class="twitter-share-button" data-text="<?php the_title();?>" data-url="<?php echo get_permalink();?>" data-via="uchileradio" data-lang="es" data-show-screen-name="false" data-show-count="true" rel="nofollow" target="_blank"></a>
                  </div>

                  <div class="sharer__google">
                        <script src="https://apis.google.com/js/platform.js" data-annotation="none" data-width="120" async defer></script>
                        <g:plusone></g:plusone>
                  </div>
            </div>
 -->
            <div class="sharer" data-url="<?php echo urlencode( get_permalink($post->ID) );?>">
                  <a target="_blank" href="https://facebook.com/sharer.php?u=<?php echo urlencode( get_permalink($post->ID) );?>" class="sharer__facebook"><i class="fa fa-facebook"></i></a>

                  <a target="_blank" href="https://twitter.com/home?status=<?php echo urlencode( $post->post_title . ' - '  . wp_get_shortlink($post->ID ) );?>" class="sharer__twitter"><i class="fa fa-twitter"></i></a>

                  <a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode( get_permalink($post->ID) );?>" class="sharer__gplus"><i class="fa fa-google-plus"></i></a>

                  <!-- <a target="_blank" href="whatsapp://send?text=<?php echo $post->post_title;?> <?php echo get_permalink($post->ID);?>" title="Enviar por WhatsApp" class="whatsapp"><i class="fa fa-whatsapp"></i></a> -->
            </div>

            <div class="cf"></div>