<?php 
    $imgthid = get_post_thumbnail_id( $noticia_principal->object_id );
    $imgsrc = wp_get_attachment_image_src( $imgthid, 'noticia-principal' );
?>

<a class="article-news-wide-link" href="<?php echo get_permalink($noticia_principal->object_id);?>">
            <article class="article-news-wide col-md-8">
              <span class="visible-xs newsbgmobile" style="background-image:url(<?php echo $imgsrc[0];?>);"></span>
              <?php if(has_post_thumbnail( $noticia_principal->object_id )):?>
                <div class="img hidden-xs hidden-sm">
                    <?php echo get_the_post_thumbnail( $noticia_principal->object_id, 'noticia-principal' );?>
                </div>
              <?php endif;?>

                <div class="content">
                  <span class="date"><?php echo get_the_time('j \d\e F', $noticia_principal->object_id);?></span>
                  <h1><?php echo $noticia_principal->title;?></h1>
                </div>

            </article>

            </a>