<?php
/* Template Name: Página Feria antigua */
?>

<?php get_header(); ?>

<div id="main-page" class="container_16 cf">
    
    <?php get_template_part('parts/clean-sidebar');?>

    <div id="content" class="grid_12">
         <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

        <h1 class="post-title"><?php the_title(); ?></h1>
           <?php get_template_part('parts/addthis');?>
            <?php the_post_thumbnail('imagen_single'); ?>
            <div class="the-content">
                <?php the_content();?>

                <?php if($post->ID == 60136):?>
                    <?php get_template_part('parts/eventos-flpa-2016');?>
                <?php endif;?>
            </div>

            <?php if($post->ID == 65839):
                    get_template_part( 'parts/eventos-filvina-2017' );
            endif;?>

             <?php if(is_page_template('page-observatorio-integrantes.php') || is_page_template('old/page-observatorio-integrantes.php')): ?>
                 <div class="listado">
                    <ul class="cf">
                        <?php
                        $miembros = getGroupOrder('imagen');
                        foreach($miembros as $miembro){
                            echo "<li>";
                            $otros = array("h" => 95, "w" => 95, "zc" => 1, "q" => 100);
                            echo get_image('imagen',$miembro,1,1,NULL,$otros);
                            echo "<div class='info'>
                            <h3>".get('nombre',$miembro)."</h3>
                            <span>".get('cargo',$miembro)."</span>";
                            echo '<div class="textoint">'. apply_filters('the_content', get('texto',$miembro)). '</div>
                            </div>
                            </li>';
                        }
                        ?>
                        </ul>
                </div>
                <?php endif;?>

                <?php if(is_page_template('page-invitados-filsa.php') || is_page_template('old/page-invitados-filsa.php')): ?>
                    <div class="invitados-filsa">
                    <ul class="cf listado">
                        <?php
                        $miembros = getGroupOrder('imagen');
                        foreach($miembros as $miembro){
                            echo "<li>";
                            $otros = array("h" => 285, "w" => 250, "zc" => 1, "q" => 100);
                            echo get_image('imagen',$miembro,1,1,NULL,$otros);
                            echo "<div class='info'>
                            <h3>".get('nombre',$miembro)."</h3>
                            <span>".get('cargo',$miembro)."</span>";
                            echo '<div class="textoint">'. apply_filters('the_content', get('texto',$miembro)). '</div>
                            </div>
                            </li>';
                        }
                        ?>
                        </ul>
                    </div>
                <?php endif;?>
                <?php if(is_page_template('expositores.php') || is_page_template('old/expositores.php')):?>
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
                <?php endif;?>
		<?php endwhile;
          endif; ?>

        <?php if(is_page_template('colaboradores-filsa-2016.php') || is_page_template('old/colaboradores-filsa-2016.php')):?>

            <?php 

                    $grupocolaboradores = array(
                                        'organiza'              => 'Organiza',
                                        'produce'               => 'Produce',
                                        'apoya'                 => 'Apoya',
                                        'participa'             => 'Participa',
                                        'media_partner'         => 'Media Partner',
                                        'colabora'              => 'Colabora',     
                                        'patrocina'             => 'Patrocina',
                                        'participan_programa'   => 'Participan en programa cultural'
                                     );

                    foreach($grupocolaboradores as $keyname => $grupocolaborador) {
                        $idx = 0;
                        $itemsgrupo = getGroupOrder( $keyname . '_logo' );
                        
                        echo '<h3 class="colabheading">' . $grupocolaborador . '</h3>';
                        
                        echo '<ul class="colab">';

                        foreach($itemsgrupo as $item) {
                            
                            ?>

                            
                                <li class="colab-<?php echo $idx++;?>">

                                    <?php echo get_image( $keyname . '_logo', $item );?>

                                    <h3><?php echo get( $keyname . '_nombre', $item );?></h3>

                                    <?php if(get( $keyname . '_url', $item )):?>

                                        <a target="_blank" href="<?php echo get( $keyname . '_url', $item );?>"><i class="fa fa-external-link"></i></a>

                                    <?php endif;?>

                                </li>
                            

                            <?php
                            
                        }

                        echo '</ul>';

                    }
                
                ?>

        <?php endif;?>

        <?php if(is_page_template('colaboradores-filsa-2015.php') || is_page_template('old/colaboradores-filsa-2015.php')):?>
            <?php 
                $invita = getGroupOrder('invita_logo_invita');
                if($invita):
                ?>
                <h3 class="colabheading">Invita</h3>
                    <ul class="colabs invs">
                            <?php 
                                foreach($invita as $inv): ?>
                                    
                                    <li>
                                        <?php 
                                        $otros = array("h" => 150, "w" => 150, "zc" => 1, "q" => 100);
                                        echo get_image('invita_logo_invita', $inv, 1, 1, null, $otros);?>
                                        <h3><?php echo get('invita_nombre', $inv);?></h3>
                                        <?php 
                                            if(get('invita_url_invita', $inv)):
                                                echo '<a target="_blank" href="'.get('invita_url_invita', $inv).'"><i class="fa fa-external-link"></i></a>';
                                            endif;
                                        ?>
                                    </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>
                <?php 
                $auspicia = getGroupOrder('auspicia_logo_auspicia');
                if($auspicia):
                ?>
                <h3 class="colabheading">Auspicia</h3>
                    <ul class="colabs aups">
                            <?php 
                                foreach($auspicia as $ausp): ?>
                                    
                                    <li>
                                        <?php echo get_image('auspicia_logo_auspicia', $ausp);?>
                                        <h3><?php echo get('auspicia_nombre_auspicia', $ausp);?></h3>
                                        <?php 
                                            if(get('auspicia_url_auspicia', $ausp)):
                                                echo '<a target="_blank" href="'.get('auspicia_url_auspicia', $ausp).'"><i class="fa fa-external-link"></i></a>';
                                            endif;
                                        ?>
                                    </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>
                <h3 class="colabheading">Colaboradores</h3>
                    
                            <?php 
                                $colabs = getGroupOrder('info_socioes_logo_colaborador');
                                foreach($colabs as $key=>$colab): 
                                    if($key == 0):?>
                                        <ul class="colabs aups">
                                            <li class="colab-<?php echo $key;?>">
                                                <?php echo get_image('info_socioes_logo_colaborador', $colab);?>
                                                <h3 style="text-transform:uppercase;"><?php echo get('info_socioes_nombre', $colab);?></h3>
                                                <?php 
                                                    if(get('info_socioes_url_colaborador', $colab)):
                                                        echo '<a target="_blank" href="'.get('info_socioes_url_colaborador', $colab).'"><i class="fa fa-external-link"></i> </a>';
                                                    endif;
                                                ?>
                                            </li> 
                                        </ul>
                                        <ul class="colabs">
                                    <?php
                                        else: 
                                        ?>
                                                    
                                    <li class="colab-<?php echo $key;?>">
                                        <?php echo get_image('info_socioes_logo_colaborador', $colab);?>
                                        <h3><?php echo get('info_socioes_nombre', $colab);?></h3>
                                        <?php 
                                            if(get('info_socioes_url_colaborador', $colab)):
                                                echo '<a target="_blank" href="'.get('info_socioes_url_colaborador', $colab).'"><i class="fa fa-external-link"></i> </a>';
                                            endif;
                                        ?>
                                    </li>

                                <?php 
                                    endif;
                                endforeach;
                            ?>                
                    </ul>
        <?php endif;?>

        <?php if(is_page_template('colaboradores-filsa.php') || is_page_template('old/colaboradores-filsa.php')):?>

         <div id="colabs-filsa">
                <?php 
                $invita = getGroupOrder('invita_logo_invita');
                if($invita):
                ?>
                <h3>Invita</h3>
                    <ul class="colabs">
                            <?php 
                                foreach($invita as $inv): ?>
                                    
                                    <li>
                                        <?php echo get_image('invita_logo_invita', $inv);?>
                                        <h3><?php echo get('invita_nombre', $inv);?></h3>
                                        <?php 
                                            if(get('invita_url_invita', $inv)):
                                                echo '<a target="_blank" href="'.get('invita_url_invita', $inv).'">Web</a>';
                                            endif;
                                        ?>
                                    </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;
                    $mediaps = getGroupOrder('mediapartners_logo_mediapartner');
                    if($mediaps):
                ?>
                 <h3>Mediapartners</h3>
                    <ul class="colabs">
                            <?php 
                               
                                foreach($mediaps as $mediap): ?>
                                    
                                    <li>
                                        <?php echo get_image('mediapartners_logo_mediapartner', $mediap);?>
                                        <h3><?php echo get('mediapartners_nombre_mediapartner', $mediap);?></h3>
                                        <?php 
                                            if(get('mediapartners_url_mediapartner', $mediap)):
                                                echo '<a target="_blank" href="'.get('mediapartners_url_mediapartner', $mediap).'">Web</a>';
                                            endif;
                                        ?>
                                    </li>

                                <?php 
                                endforeach;
                                
                            ?>                
                    </ul>
                    <?php endif;
                    $ausps = getGroupOrder('auspiciadores_logo_auspiciador');
                                if($ausps):
                    ?>
                <h3>Patrocinadores</h3>
                    <ul class="colabs">
                            <?php 
                                foreach($ausps as $ausp): ?>
                                    
                                    <li>
                                        <?php echo get_image('auspiciadores_logo_auspiciador', $ausp);?>
                                        <h3><?php echo get('auspiciadores_nombre', $ausp);?></h3>
                                        <?php 
                                            if(get('auspiciadores_url_auspiciador', $ausp)):
                                                echo '<a target="_blank" href="'.get('auspiciadores_url_auspiciador', $ausp).'">Web</a>';
                                            endif;
                                        ?>
                                    </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;
                    $colabs = getGroupOrder('info_socioes_logo_colaborador');
                    if($colabs):
                ?>

                <h3>Colaboradores</h3>
                    <ul class="colabs">
                            <?php 
                                
                                foreach($colabs as $colab): ?>
                                    
                                    <li>
                                        <?php echo get_image('info_socioes_logo_colaborador', $colab);?>
                                        <h3><?php echo get('info_socioes_nombre', $colab);?></h3>
                                        <?php 
                                            if(get('info_socioes_url_colaborador', $colab)):
                                                echo '<a target="_blank" href="'.get('info_socioes_url_colaborador', $colab).'">Web</a>';
                                            endif;
                                        ?>
                                    </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>
                 
                </div>

        <?php endif;?>

    </div>
</div>

<?php get_footer(); ?>
