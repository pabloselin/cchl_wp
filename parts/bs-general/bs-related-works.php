<div class="col-md-4 bs-related">
     <?php 
        $args = array(
            'post_type' => 'trabajos',
            'numberposts' => 3
        );
        $trabajos = get_posts($args);
        
        if($trabajos):

        echo '<h2>Más trabajos</h2>';

        foreach($trabajos as $trabajo):
          if($trabajo->ID != $post->ID):
                $imgthid = get_post_thumbnail_id( $trabajo->ID );
                $imgsrc = wp_get_attachment_image_src( $imgthid, 'noticia-secundaria' );
                ?>
                <div class="item-related-noticia">
                  <a href="<?php echo get_permalink($trabajo->ID);?>">
                    <!--<img src="<?php echo $imgsrc[0];?>" alt="<?php echo $trabajo->post_title;?>">-->
                    <div class="txt">
                      <h3><?php echo $trabajo->post_title;?></h3>
                      <?php echo get_the_date( '', $trabajo->ID );?>
                    </div>
                  </a>
                </div>
                <?php
          endif;//duplicated post id
        endforeach;
        endif;
        ?>          
</div>