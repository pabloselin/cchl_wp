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

                $invita = get_post_meta($post->ID, '_cchl_invita', true);
                
                if($invita):
                ?>
                <h3 class="colabheading">Invita</h3>
                    <ul class="colabs invs">
                            <?php 
                                foreach($invita as $inv): ?>
                                    
                                    <li>
                                    <img src="<?php echo cchl_legacy_image($post->ID, $inv['logo']);?>" alt="<?php echo $inv['nombre'];?>">
                                    <h3><?php echo $inv['nombre'];?></h3>
                                    <?php 
                                        if($inv['url']):
                                            echo '<a target="_blank" href="'. $inv['url'] .'"><i class="fa fa-external-link"></i></a>';
                                        endif;
                                    ?>
                                    </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>
                
                <?php

                $organiza = get_post_meta($post->ID, '_cchl_organiza', true);
                if($organiza):?>
                <h3 class="colabheading">Organiza</h3>
                    <ul class="colabs invs">

                            <?php 
                                foreach($organiza as $org): ?>
                                    
                                    <li>
                                    <img src="<?php echo cchl_legacy_image($post->ID, $org['logo']);?>" alt="<?php echo $org['nombre'];?>">
                                    <h3><?php echo $org['nombre'];?></h3>
                                    <?php 
                                        if($org['url']):
                                            echo '<a target="_blank" href="'. $org['url'] .'"><i class="fa fa-external-link"></i></a>';
                                        endif;
                                    ?>
                                    </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>
               
                <?php 
                $auspicia = get_post_meta($post->ID, '_cchl_auspicia', true);
                if($auspicia):
                ?>
                <h3 class="colabheading">Auspicia</h3>
                    <ul class="colabs aups">
                            <?php 
                                foreach($auspicia as $ausp): ?>
                                    
                                    <li>
                                    <img src="<?php echo cchl_legacy_image($post->ID, $ausp['logo']);?>" alt="<?php echo $ausp['nombre'];?>">
                                    <h3><?php echo $ausp['nombre'];?></h3>
                                    <?php 
                                        if($ausp['url']):
                                            echo '<a target="_blank" href="'. $ausp['url'] .'"><i class="fa fa-external-link"></i></a>';
                                        endif;
                                    ?>
                                    </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>

                <?php 
                $patrocinadores = get_post_meta($post->ID, '_cchl_patrocina', true);
                if($patrocinadores):
                ?>
                <h3 class="colabheading">Patrocina</h3>
                    <ul class="colabs invs">
                            <?php 
                                foreach($patrocinadores as $patrocina): ?>
                                    
                                    <li>
                                    <img src="<?php echo cchl_legacy_image($post->ID, $patrocina['logo']);?>" alt="<?php echo $patrocina['nombre'];?>">
                                    <h3><?php echo $patrocina['nombre'];?></h3>
                                    <?php 
                                        if($patrocina['url']):
                                            echo '<a target="_blank" href="'. $patrocina['url'] .'"><i class="fa fa-external-link"></i></a>';
                                        endif;
                                    ?>
                                    </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>

                <?php 
                $colaboradores = get_post_meta($post->ID, '_cchl_colabora', true);
                if($colaboradores):
                ?>
                <h3 class="colabheading">Colabora</h3>
                    <ul class="colabs invs">
                            <?php 
                                foreach($colaboradores as $colaborador): ?>
                                    
                                    
                                    <li>
                                    <img src="<?php echo cchl_legacy_image($post->ID, $colaborador['logo']);?>" alt="<?php echo $colaborador['nombre'];?>">
                                    <h3><?php echo $colaborador['nombre'];?></h3>
                                    <?php 
                                        if($colaborador['url']):
                                            echo '<a target="_blank" href="'. $colaborador['url'] .'"><i class="fa fa-external-link"></i></a>';
                                        endif;
                                    ?>
                                    </li>

                                <?php 
                                endforeach;
                            ?>                
                    </ul>
                <?php endif;?>

                

                    <?php $mediaps = get_post_meta($post->ID, '_cchl_media_partner', true);
                    if($mediaps):?>
                    <h3 class="colabheading">Mediapartners</h3>

                    <ul class="colabs media-partner-fil">
                            <?php 
                                
                                foreach($mediaps as $key=>$mediap): ?>
                                    
                                    
                                    <li>
                                    <img src="<?php echo cchl_legacy_image($post->ID, $mediap['logo']);?>" alt="<?php echo $mediap['nombre'];?>">
                                    <h3><?php echo $mediap['nombre'];?></h3>
                                    <?php 
                                        if($mediap['url']):
                                            echo '<a target="_blank" href="'. $mediap['url'] .'"><i class="fa fa-external-link"></i></a>';
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