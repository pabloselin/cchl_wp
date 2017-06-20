<?php
/* 
Template Name: Colaboradores Fil
 */
?>
<?php get_header(); ?>

<div id="main-page" class="container_16 cf">
    <div id="sidebar_fil" class="grid_4">
        <?php wp_nav_menu( array('menu'=> 177));?>
    </div>
    <div id="content" class=" grid_12">
         <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php get_template_part('parts/addthis');?>
			<div class="cf"></div>
            <div class="the-content"><?php the_content();?></div>
            
			
            <?php endwhile; endif; ?>
            

                <div id="colabs-filsa">
                <h3>Auspicia</h3>
                    <ul class="colabs auspicia-fil">
                            <?php 
                                $invita = getGroupOrder('invita_logo_invita');
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
                 <h3>Mediapartners</h3>
                    <ul class="colabs media-partner-fil">
                            <?php 
                                $mediaps = getGroupOrder('mediapartners_logo_mediapartner');
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
                <h3>Patrocinadores</h3>
                    <ul class="colabs patrocina-fil">
                            <?php 
                                $ausps = getGroupOrder('auspiciadores_logo_auspiciador');
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
                </div>
            
    </div>
</div>

<?php get_footer(); ?>