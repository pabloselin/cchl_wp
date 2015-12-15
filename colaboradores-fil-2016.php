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

                <?php if($organiza):?>
                <h3 class="colabheading">Organiza</h3>
                    <ul class="colabs invs">

                            <?php 
                                foreach($organiza as $org): ?>
                                    
                                    <li>
                                        <?php 
                                        $otros = array("h" => 150, "w" => 150, "zc" => 1, "q" => 100);
                                        echo get_image('organiza_logo_organiza', $org, 1, 1, null, $otros);?>
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

                <?php 
                $patrocinadores = getGroupOrder('auspiciadores_logo_auspiciador');
                if($patrocinadores):
                ?>
                <h3 class="colabheading">Patrocina</h3>
                    <ul class="colabs aups">
                            <?php 
                                foreach($auspicia as $ausp): ?>
                                    
                                    <li>
                                        <?php echo get_image('auspiciadores_logo_auspiciador', $ausp);?>
                                        <h3><?php echo get('auspiciadores_nombre', $ausp);?></h3>
                                        <?php 
                                            if(get('auspiciador_url_auspiciador', $ausp)):
                                                echo '<a target="_blank" href="'.get('auspiciador_url_auspiciador', $ausp).'"><i class="fa fa-external-link"></i></a>';
                                            endif;
                                        ?>
                                    </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>

                <?php $colabs = getGroupOrder('info_socioes_logo_colaborador');
                if($colabs):?>
                <h3 class="colabheading">Colaboradores</h3>
                    
                            <?php 
                            
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

                    <?php $mediaps = getGroupOrder('mediapartners_logo_mediapartner');
                    if($mediaps):?>
                    <h3 class="colabheading">Mediapartners</h3>

                    <ul class="colabs aups media-partner-fil">
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
                    <?php endif;?>
                </div>
            
    </div>
</div>

<?php get_footer(); ?>