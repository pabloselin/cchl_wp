<?php 
/*
Template Name: Listado de invitados
Template Post Type: filsa-2017
*/
?>
<?php get_header('filsa-custom');?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container filsa-2017-invitados">
        <div class="row">        
                <div class="col-md-8 col-md-offset-2">

                 <article <?php post_class();?>>
                    <header>
                        <h1><?php the_title();?></h1>
                    </header>

                    <?php if(has_post_thumbnail()):?>
                            <div class="ft-img-wrapper"> <?php the_post_thumbnail('large');?> </div>
                          <?php endif;?>

                    <?php get_template_part('parts/bs-general/bs-sharer');?>

                    <div class="article-content text-content">
                        
                        <?php do_action('cchl_beforecontent');?>

                        <?php the_content();?>

                        <?php do_action('cchl_aftercontent');?>
                        
                            <?php
                                $personas = get_post_meta($post->ID, '_cchl_listadopersonas', true);
                                
                                   
                                //$imgattrs = array("h" => 120, "w" => 120, "zc" => 1, "q" => 100);

                                foreach($personas as $persona):
                                    $imgsrc = wp_get_attachment_image_src($persona['imagen_new_id'], 'filsa-portrait');
                                    ?>

                                    <div class="person row">
                                        <div class="col-md-4">
                                            <img src="<?php echo $imgsrc[0];?>" alt="<?php echo $persona['nombre'];?>">
                                        </div>
                                        <div class="col-md-6">
                                            <h2><?php echo $persona['nombre'];?></h2>
                                            <?php if($persona['cargo']):?>
                                                <span class="cargo"><?php echo $persona['cargo'];?></span>
                                            <?php endif;?>

                                            <div class="person-content"><?php echo apply_filters('the_content', $persona['texto']);?></div>
                                        </div>
                                    </div>

                                    <?php
                                    endforeach;
                                    ?>
                        

                    </div>
                </article>

                <?php endwhile;
                      endif;?>

                </div>

    </div>
</div>

<?php get_footer('filsa-custom'); ?>