<?php
/* 
Template Name: Colaboradores Fil Viña 2017
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

                $organiza = getGroupOrder('organiza_logo');
                if($organiza && get('organiza_logo')):?>
                <h3 class="colabheading">Organiza</h3>
                    <ul class="colabs invs">

                            <?php 
                                foreach($organiza as $org): ?>
                                    
                                    <li>
                                        <?php 
                                        
                                        echo get_image('organiza_logo', $org, 1, 1, null, $size);?>
                                        <h3><?php echo get('organiza_nombre', $org);?></h3>
                                        <?php 
                                            if(get('organiza_url', $org)):
                                                echo '<a target="_blank" href="'.get('organiza_url', $org).'"><i class="fa fa-external-link"></i></a>';
                                            endif;
                                        ?>
                                    </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>

                 <?php 
                $patrocinadores = getGroupOrder('patrocina_logo');
                if($patrocinadores && get('patrocina_logo')):
                ?>
                <h3 class="colabheading">Patrocina</h3>
                    <ul class="colabs invs">
                            <?php 
                                foreach($patrocinadores as $patrocina): ?>
                                    
                                    <li>
                                        <?php echo get_image('patrocina_logo', $patrocina, 1, 1, null, $size);?>
                                        <h3><?php echo get('patrocina_nombre', $patrocina);?></h3>
                                        <?php 
                                            if(get('patrocina_url', $patrocina)):
                                                echo '<a target="_blank" href="'.get('patrocina_url', $patrocina).'"><i class="fa fa-external-link"></i></a>';
                                            endif;
                                        ?>
                                    </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>

                <?php 
                $colaboradores = getGroupOrder('colabora_logo');
                if($colaboradores && get('colabora_logo')):
                ?>
                <h3 class="colabheading">Colabora</h3>
                    <ul class="colabs invs">
                            <?php 
                                foreach($colaboradores as $colaborador): ?>
                                    
                                    <li>
                                        <?php echo get_image('colabora_logo', $colaborador, 1, 1, null, $size);?>
                                        <h3><?php echo get('colabora_nombre', $colaborador);?></h3>
                                        <?php 
                                            if(get('colabora_url', $colaborador)):
                                                echo '<a target="_blank" href="'.get('colabora_url', $colaborador).'"><i class="fa fa-external-link"></i></a>';
                                            endif;
                                        ?>
                                    </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>
               
                <!-- <?php 
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
                <?php endif;?> -->
            
    </div>
</div>

<?php get_footer(); ?>