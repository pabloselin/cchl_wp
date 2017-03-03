<?php 

  $noticias_home = cchl_getmenus('noticias-home');

?>

 <section class="left-news col-md-12">

          <?php if(array_key_exists(0, $noticias_home) ):
              $noticia_principal = $noticias_home[0];
          ?>

          <div class="row">
            
            <a class="article-news-wide-link" href="<?php echo get_permalink($noticia_principal->object_id);?>">
            
            <article class="article-news-wide col-md-8">
              <?php if(has_post_thumbnail( $noticia_principal->object_id )):?>
                <div class="img">
                    <?php echo get_the_post_thumbnail( $noticia_principal->object_id, 'full' );?>
                </div>
              <?php endif;?>

                <div class="content">
                  <span class="date"><?php echo get_the_time('j \d\e F', $noticia_principal->object_id);?></span>
                  <h1><?php echo $noticia_principal->title;?></h1>
                </div>

            </article>

            </a>

            <div><?php get_template_part('parts/bs-home/bs-accesos-rapidos');?></div>

          </div>

          <?php endif;?>
        
          <div class="row flex-row">

            <?php if(array_key_exists(1, $noticias_home) ):
              $noticia_dos = $noticias_home[1];
            ?>
            <article class="article-news-half news-left col-md-4">

              <?php if(has_post_thumbnail( $noticia_dos->object_id ) ):?>

                  <div class="img">
                    <a href="<?php echo get_permalink($noticia_dos->object_id);?>">

                        <?php echo get_the_post_thumbnail( $noticia_dos->object_id, 'full');?>

                    </a>
                    <span class="date"><?php echo get_the_time('j \d\e F', $noticia_dos->object_id);?></span>
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
            <article class="article-news-half news-right col-md-4">
              
              <?php if(has_post_thumbnail( $noticia_tres->object_id ) ):?>

                  <div class="img">
                    <a href="<?php echo get_permalink($noticia_tres->object_id);?>">
                        <?php echo get_the_post_thumbnail( $noticia_tres->object_id, 'full');?>
                    </a>
                    <span class="date"><?php echo get_the_time('j \d\e F', $noticia_tres->object_id);?></span>
                  </div>

              <?php endif;?>

              <div class="content">
                
                <h2>
                    <a href="<?php echo get_permalink($noticia_tres->object_id);?>">
                    <?php echo $noticia_tres->title;?>
                    </a>
                </h2>

              </div>

            </article>

            <?php endif;?>

            <?php 

  $noticias_home = cchl_getmenus('noticias-home');
?>

<?php if(array_key_exists(3, $noticias_home) ):
              $noticia_cuatro = $noticias_home[3];
          ?>

          <article class="article-news-half news-last col-md-4">

              <?php if(has_post_thumbnail( $noticia_cuatro->object_id ) ):?>

                  <div class="img">
                    <a href="<?php echo get_permalink($noticia_cuatro->object_id);?>">

                        <?php echo get_the_post_thumbnail( $noticia_cuatro->object_id, 'full');?>

                    </a>
                    <span class="date"><?php echo get_the_time('j \d\e F', $noticia_cuatro->object_id);?></span>
                  </div>

              <?php endif;?>

              <div class="content">
                
                <h2>
                    <a href="<?php echo get_permalink($noticia_cuatro->object_id);?>">
                    <?php echo $noticia_cuatro->title;?>
                    </a>
                    
                </h2>

              </div>

            </article>

          <?php endif;?>

          </div>
        
        <div class="row masnoticias-boton">
          <div class="col-md-4 col-md-offset-4">
            <a href="<?php bloginfo('url');?>/sala-de-prensa/" class="btn btn-block btn-warning btn-moresection"> <i class="fa fa-plus"></i> Noticias</a>
          </div>
        </div>
        </section>