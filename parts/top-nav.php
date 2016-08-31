
<?php get_template_part('utilbar-top');?>


<?php if(!is_home() && (in_category(33)||in_category(32)||in_category(101)||in_category(21)||in_category(68)||is_page(45)||is_page(88)||is_page(144)||is_page(90)) ) :?>
    <div id="header" class="container_16 cf header-socios">
    <?php else:?>
        <div id="header" class="container_16 cf">
        <?php endif;?>

        
        <?php get_template_part('parts/buscador');?>

        <h1 id="mainlogo">
          <a href="<?php bloginfo( 'url' ); ?>">Cámara Chilena del Libro 60 años trabajando por el libro y la lectura</a>
      </h1>
      <a class="header__logofil2016" href="<?php echo get_permalink(CCHL_FILSA2016);?>"><img src="<?php echo get_bloginfo('template_url');?>/img/filsa2016/topnav_filsa_2016.png" alt="<?php echo get_the_title(CCHL_FILSA2016);?>"></a>

      <?php get_template_part('parts/mainmenu');?>

  </div>
