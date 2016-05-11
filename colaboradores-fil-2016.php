<?php
/* 
Template Name: Colaboradores Fil 2015
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
            <h1 class="post-title"><?php the_title(); ?></h1>
            <?php get_template_part('parts/addthis');?>
            <div class="cf"></div>
            <div class="the-content"><?php the_content();?></div>
            
            
            <?php endwhile; endif; ?>
    
                <?php 

                $size = array("h" => 150, "w" => 150, "q" => 100);
                $organiza = getGroupOrder('organiza_logo_organiza');
                if($organiza && get('organiza_logo_organiza')):?>
                <h3 class="colabheading">Organiza</h3>
                    <ul class="colabs invs">

                            <?php 
                                foreach($organiza as $org): ?>
                                    
                                    <li>
                                        <?php 
                                        
                                        echo get_image('organiza_logo_organiza', $org, 1, 1, null, $size);?>
                                        <h3><?php echo get('organiza_nombre_organiza', $org);?></h3>
                                        <?php 
                                            if(get('organiza_url_organiza', $org)):
                                                echo '<a target="_blank" href="'.get('invita_url_invita', $org).'"><i class="fa fa-external-link"></i></a>';
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
                if($auspicia && get('auspicia_logo_auspicia')):
                ?>
                <h3 class="colabheading">Auspicia</h3>
                    <ul class="colabs aups">
                            <?php 
                                foreach($auspicia as $ausp): ?>
                                    
                                    <li>
                                        <?php echo get_image('auspicia_logo_auspicia', $ausp, 1, 1, null, $size);?>
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

                <?php 
                $patrocinadores = getGroupOrder('auspiciadores_logo_auspiciador');
                if($patrocinadores && get('auspiciadores_logo_auspiciador')):
                ?>
                <h3 class="colabheading">Patrocina</h3>
                    <ul class="colabs invs">
                            <?php 
                                foreach($patrocinadores as $patrocina): ?>
                                    
                                    <li>
                                        <?php echo get_image('auspiciadores_logo_auspiciador', $patrocina, 1, 1, null, $size);?>
                                        <h3><?php echo get('auspiciadores_nombre', $patrocina);?></h3>
                                        <?php 
                                            if(get('auspiciadores_url_auspiciador', $patrocina)):
                                                echo '<a target="_blank" href="'.get('auspiciadores_url_auspiciador', $patrocina).'"><i class="fa fa-external-link"></i></a>';
                                            endif;
                                        ?>
                                    </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>

                <?php 
                $colaboradores = getGroupOrder('info_socioes_logo_colaborador');
                if($colaboradores && get('info_socioes_logo_colaborador')):
                ?>
                <h3 class="colabheading">Colabora</h3>
                    <ul class="colabs invs">
                            <?php 
                                foreach($colaboradores as $colaborador): ?>
                                    
                                    <li>
                                        <?php echo get_image('info_socioes_logo_colaborador', $colaborador, 1, 1, null, $size);?>
                                        <h3><?php echo get('info_socioes_nombre', $colaborador);?></h3>
                                        <?php 
                                            if(get('info_socioes_url_colaborador', $colaborador)):
                                                echo '<a target="_blank" href="'.get('info_socioes_url_colaborador', $colaborador).'"><i class="fa fa-external-link"></i></a>';
                                            endif;
                                        ?>
                                    </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>

                

                    <?php $mediaps = getGroupOrder('mediapartners_logo_mediapartner');
                    if($mediaps && get('mediapartners_logo_mediapartner')):?>
                    <h3 class="colabheading">Mediapartners</h3>

                    <ul class="colabs media-partner-fil">
                            <?php 
                                
                                foreach($mediaps as $key=>$mediap): ?>
                                    
                                    <li class="colab-<?php echo $key;?>">
                                        <?php echo get_image('mediapartners_logo_mediapartner', $mediap, 1, 1, null, $size);?>
                                        <h3><?php echo get('mediapartners_nombre_mediapartner', $mediap);?></h3>
                                        <?php 
                                            if(get('mediapartners_url_mediapartner', $mediap)):
                                                echo '<a target="_blank" href="'.get('mediapartners_url_mediapartner', $mediap).'"><i class="fa fa-external-link"></i></a>';
                                            endif;
                                        ?>
                                    </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                    <?php endif;?>
                </div>
            
    </div>
</div>

<?php get_footer(); ?>