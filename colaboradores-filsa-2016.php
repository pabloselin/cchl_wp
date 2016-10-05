<?php
/* 
Template Name: Colaboradores Filsa 2016
*/
?>

<?php 
/**
 * 1. Organiza 
 * 2. Produce -
 * 3. Apoya - 
 * 4. Participan - 
 * 5. Media partner
 * 6. Colabora
 * 7. Patrocinan
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
                
              
                </div>
            
    </div>

<?php get_footer(); ?>