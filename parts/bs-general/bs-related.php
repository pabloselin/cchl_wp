<div class="col-md-4 bs-related">
    <?php $noticias_home = cchl_getmenus('noticias-home');
        global $post;
        $previds = [];
        if($noticias_home):
        
        echo '<h2>En portada</h2>';

        foreach($noticias_home as $noticia_home):
            if($noticia_home->object_id != $post->ID):
              $previds[] = $post->ID;
              $imgthid = get_post_thumbnail_id( $noticia_home->object_id );
              $imgsrc = wp_get_attachment_image_src( $imgthid, 'noticia-secundaria' );
              ?>
              <div class="item-related-noticia">
                <a href="<?php echo get_permalink($noticia_home->object_id);?>">
                  <img src="<?php echo $imgsrc[0];?>" alt="<?php echo $noticia_home->title;?>">
                  <div class="txt">
                    <h3><?php echo $noticia_home->title;?></h3>
                    <?php echo get_the_date( '', $noticia_home->object_id );?>
                  </div>
                </a>
              </div>
              <?php
        endif;//duplicated post id
        endforeach;
        endif;//if noticias home
          ?>

    <?php 
      if(in_category( 'socios', $post->ID ) || in_category( 'noticias-socios', $post->ID )) {
        $noticias_socios = cchl_getmenus('noticias-socios');
        if($noticias_socios):
        
        echo '<h2>Noticias Socios</h2>';

        foreach($noticias_socios as $noticia_socio):
          if($noticia_socio->object_id != $post->ID && !in_array($post->ID, $previds)):
                $imgthid = get_post_thumbnail_id( $noticia_socio->object_id );
                $imgsrc = wp_get_attachment_image_src( $imgthid, 'noticia-secundaria' );
                ?>
                <div class="item-related-noticia">
                  <a href="<?php echo get_permalink($noticia_socio->object_id);?>">
                    <img src="<?php echo $imgsrc[0];?>" alt="<?php echo $noticia_socio->title;?>">
                    <div class="txt">
                      <h3><?php echo $noticia_socio->title;?></h3>
                      <?php echo get_the_date( '', $noticia_socio->object_id );?>
                    </div>
                  </a>
                </div>
                <?php
          endif;//duplicated post id
        endforeach;

        endif;//if noticias socios
      }
    ?>
          
</div>