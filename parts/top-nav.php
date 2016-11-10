
<?php get_template_part('parts/utilbar-top');?>

<?php 
  $socios = cchl_checksocios();
?>

<div id="header" class="container_16 cf <?php if($socios == true): echo 'header-socios';endif;?>">
        
        <?php get_template_part('parts/buscador');?>

        <h1 id="mainlogo">
          <a href="<?php bloginfo( 'url' ); ?>">Cámara Chilena del Libro 60 años trabajando por el libro y la lectura</a>
      </h1>
      <!-- <a class="header__logofil2016" href="<?php echo get_permalink(CCHL_FILSA2016);?>"><img src="<?php echo get_bloginfo('template_url');?>/img/filsa2016/banner_filsa_2016_animado.gif" alt="<?php echo get_the_title(CCHL_FILSA2016);?>"></a> -->

      <?php get_template_part('parts/mainmenu');?>

  </div>
