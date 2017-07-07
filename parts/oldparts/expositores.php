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

         <div class="expositores">
            <?php foreach($infoexpositores as $sector => $expositores) {

                echo '<div class="sector">';
                echo '<h2>Sector ' . $sector . ' </h2>';
                echo '<img style="margin-bottom:24px;" src="' . get_bloginfo('template_url') . '/img/filsa2016/mapa/sector_' . strtolower($sector).'.png" alt="Sector ' . $sector . '">';
                echo '<p></p>';
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
                