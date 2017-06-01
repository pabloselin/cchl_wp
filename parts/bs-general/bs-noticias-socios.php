<?php 

  $noticias_home = cchl_getmenus($menu_noticias);
  set_query_var('menurapidos', cchl_getmenus('accesos-rapidos-socios'));
?>

 <section class="left-news col-md-12">

          <?php if(array_key_exists(0, $noticias_home) ):
              set_query_var('noticia_principal', $noticias_home[0]);
          ?>

          <div class="row">
            
            <?php get_template_part('parts/bs-blocks/article-news-wide');?>

            <div><?php get_template_part('parts/bs-home/bs-accesos-rapidos');?></div>

          </div>

          <?php endif;?>
        
          <div class="row flex-row">

            <?php 
            
        if(array_key_exists(1, $noticias_home) ):
              set_query_var('noticia', $noticias_home[1]);
              set_query_var('position', 'news-left');
              get_template_part('parts/bs-blocks/article-news-half');
        endif;
           
        if(array_key_exists(2, $noticias_home) ):
              set_query_var('noticia', $noticias_home[2]);
              set_query_var('position', 'news-right');
              get_template_part('parts/bs-blocks/article-news-half');
        endif;

        if(array_key_exists(3, $noticias_home) ):
              set_query_var('noticia', $noticias_home[3]);
              set_query_var('position', 'news-last');
              get_template_part('parts/bs-blocks/article-news-half');
        endif;
            ?>

          </div>
        
        <div class="row masnoticias-boton">
          <div class="col-md-4 col-md-offset-4">
            <a href="<?php echo get_category_link(get_category_by_slug('noticias-socios'));?>" class="btn btn-block btn-warning btn-moresection"> <i class="fa fa-plus"></i> Noticias socios</a>
          </div>
        </div>
        </section>