<?php
/* 
Template Name: Expositores 
*/
?>
<?php get_header(); ?>

<div id="main-page" class="container_16 cf">

<?php get_template_part('parts/clean-sidebar');?>

    <div id="content" class=" grid_12">
       <div id="bread">
        Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
    </div>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <?php get_template_part('parts/addthis');?>
        <div class="cf"></div>
        <div class="the-content"><?php the_content();?></div>
  
        <p style="margin-bottom:12px;">
          <a href="<?php bloginfo('template_url');?>/img/filsa2016/mapa/mapa_full_02.png"><img class="mapa-preview" src="<?php bloginfo('template_url');?>/img/filsa2016/mapa/mapa_preview_03.png" alt="Mapa FILSA 2016"></a>
          <a class="linkimgmapa" target="_blank" href="<?php bloginfo('template_url');?>/img/filsa2016/mapa/mapa_full_01.png"><i class="fa fa-hand-pointer-o animated bounce infinite"></i> Clic en la imagen para ver el mapa en alta resolución.</a>
        </p>

        <?php 

             /**
              * Array organizado de esta forma:
              *     SECTOR
              *         EXPOSITOR
              *             -logo (URL Completa a imagen logo)
              *             -nombre
              *             -stands
              */
             $infoexpositores = cchl_sortexhibitors();


             ?>

         <?php endwhile; endif; wp_reset_query(); ?>


         <div class="expositores">
            <?php foreach($infoexpositores as $sector => $expositores) {

                echo '<div class="sector">';
                echo '<h2>Sector ' . $sector . ' </h2>';
                echo '<img src="' . get_bloginfo('template_url') . '/img/filsa2016/mapa/sector_' . strtolower($sector).'.png" alt="Sector ' . $sector . '">';
                echo '<p>&nsbp;</p>';
                echo '<ul>';

                foreach($expositores as $expositor) {

                    $sectortemplate = mustache_engine(); 
                    $data = $expositor;

                    echo $sectortemplate->render('expositor', $data);

                }

                echo '</ul>';
                echo '</div>';

            }



            ?>


        </div>


    </div>
</div>

<?php get_footer(); ?>