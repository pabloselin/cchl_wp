<?php
/* Template Name: Inicio */
?>

<?php 

  $noticias_home = cchl_getmenus('noticias-home');

?>

<?php get_header(); ?>

<div class="home-responsive container">
  <div class="row">
    
    

        <section class="left-news col-md-8">

          <?php if(array_key_exists(0, $noticias_home) ):
              $noticia_principal = $noticias_home[0];
          ?>

          <div class="row">
            <article class="article-news-wide col-md-12">

                <div class="img">

                </div>

                <div class="content">
                  <h1><?php echo $noticia_principal->title;?></h1>
                </div>

            </article>
          </div>

          <?php endif;?>
        
          <div class="row">
            <article class="article-news-half col-md-6"></article>
            <article class="article-news-half col-md-6"></article>
          </div>
        
        </section>

    
    
    <div class="accesos col-md-4"></div>
  </div>

  <div class="eventos row">
  
  </div>

  <div class="fotos row">
  </div>
  
  <div class="videos row">
  </div>

  <div class="redes row">

  </div>
</div>



<?php get_footer(); ?>