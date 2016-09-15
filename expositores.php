<?php
/* Template Name: Expositores */
?>
<?php get_header(); ?>

<div id="main-page" class="container_16 cf">
    <div id="content" class=" grid_16">
         <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php get_template_part('parts/addthis');?>
			<div class="cf"></div>
            <div class="the-content"><?php the_content();?></div>
            
             <?php 
                $sectores = array( 'A', 'B', 'C', 'D');
                $groupexpositores = getGroupOrder( 'expositor_sector' );
                
                $infoexpositores = array();

                foreach( $groupexpositores as $expositor ) {

                    $infoexpositores[ get( 'expositor_sector',  $expositor ) ][ $expositor ] = array(
                                                                        'logo' => get_image( 'expositor_logo', $expositor ),
                                                                        'nombre' => get( 'expositor_nombre', $expositor ),
                                                                        'stands' => get( 'expositor_stands', $expositor )
                                                                        );
                    
                }
                
            ?>

            <?php endwhile; endif; wp_reset_query(); ?>
            
            
            <div class="expositores">
                <?php 

                    $sector_a = $infoexpositores['A'];
                    $sector_b = 

                ?>
            </div>
            

    </div>
</div>

<?php get_footer(); ?>