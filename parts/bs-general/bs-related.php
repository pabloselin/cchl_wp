<div class="col-md-4 bs-related">
    <?php $noticias_home = cchl_getmenus('noticias-home');
        global $post;
        if($noticias_home):
        foreach($noticias_home as $noticia_home):
            if($noticia_home->object_id != $post->ID):
              $imgthid = get_post_thumbnail_id( $noticia_home->object_id );
              $imgsrc = wp_get_attachment_image_src( $imgthid, 'noticia-principal' );
              ?>
              <div class="item-mini-noticia">
                <a href="<?php echo get_permalink($noticia_home->object_id);?>">
                  <img src="<?php echo $imgsrc[0];?>" alt="<?php echo $noticia_home->title;?>">
                  <div class="txt">
                    <h2><?php echo $noticia_home->title;?></h2>
                    <?php echo get_the_date( '', $noticia_home->object_id );?>
                  </div>
                </a>
              </div>
              <?php
        endif;//duplicated post id
        endforeach;
        endif;//if noticias home
          ?>

          
</div>