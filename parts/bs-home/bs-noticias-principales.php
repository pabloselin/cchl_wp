<?php 

  $noticias_home = cchl_getmenus('noticias-home');

?>

 <section class="left-news col-md-8">

          <?php if(array_key_exists(0, $noticias_home) ):
              $noticia_principal = $noticias_home[0];
          ?>

          <div class="row">
            
            <a class="article-news-wide-link" href="<?php echo get_permalink($noticia_principal->object_id);?>">
            
            <article class="article-news-wide col-md-12">
              <?php if(has_post_thumbnail( $noticia_principal->object_id )):?>
                <div class="img">
                    <?php echo get_the_post_thumbnail( $noticia_principal->object_id, 'full' );?>
                </div>
              <?php endif;?>

                <div class="content">
                  <h1><?php echo $noticia_principal->title;?></h1>
                </div>

            </article>

            </a>

          </div>

          <?php endif;?>
        
          <div class="row flex-row">

            <?php if(array_key_exists(1, $noticias_home) ):
              $noticia_dos = $noticias_home[1];
            ?>
            <article class="article-news-half news-left col-md-6">

              <?php if(has_post_thumbnail( $noticia_dos->object_id ) ):?>

                  <div class="img">
                    <a href="<?php echo get_permalink($noticia_dos->object_id);?>">

                        <?php echo get_the_post_thumbnail( $noticia_dos->object_id, 'full');?>

                    </a>
                  </div>

              <?php endif;?>

              <div class="content">
                
                <h2>
                    <a href="<?php echo get_permalink($noticia_dos->object_id);?>">
                    <?php echo $noticia_dos->title;?>
                    </a>
                    
                </h2>

              </div>

            </article>

            <?php endif;?>

            <?php if(array_key_exists(2, $noticias_home) ):
              $noticia_tres = $noticias_home[2];
            ?>
            <article class="article-news-half news-right col-md-6">
              
              <?php if(has_post_thumbnail( $noticia_tres->object_id ) ):?>

                  <div class="img">
                    <a href="<?php echo get_permalink($noticia_tres->object_id);?>">
                        <?php echo get_the_post_thumbnail( $noticia_tres->object_id, 'full');?>
                    </a>
                  </div>

              <?php endif;?>

              <div class="content">
                
                <h2>
                    <a href="<?php echo get_permalink($noticia_dos->object_id);?>">
                    <?php echo $noticia_tres->title;?>
                    </a>
                </h2>

              </div>

            </article>

            <?php endif;?>
          </div>
        
        <div class="row">
          <a href="#" class="btn btn-block btn-info"> <i class="fa fa-plus"></i> Más Noticias</a>
        </div>
        </section>