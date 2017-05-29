<article class="article-news-half <?php echo $position;?> col-md-4">

              <?php if(has_post_thumbnail( $noticia->object_id ) ):?>

                  <div class="img">
                    <a href="<?php echo get_permalink($noticia->object_id);?>">

                        <?php echo get_the_post_thumbnail( $noticia->object_id, 'noticia-secundaria');?>

                    </a>
                    <span class="date"><?php echo get_the_time('j \d\e F', $noticia->object_id);?></span>
                  </div>

              <?php endif;?>

              <div class="content">
                
                <h2>
                    <a href="<?php echo get_permalink($noticia->object_id);?>">
                    <?php echo $noticia->title;?>
                    </a>
                    
                </h2>

              </div>

            </article>