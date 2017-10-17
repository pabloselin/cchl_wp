<?php 
/*
Template Name: Listado de personas
*/
?>
<?php get_header();?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container">
        <?php get_template_part('parts/bs-blocks/bs-breadcrumb');?>
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
                                    ?>

                                    <div class="person row">
                                        <div class="col-md-2">
                                            <img width="120" height="120" src="<?php echo $persona['imagen'];?>" alt="<?php echo $persona['nombre'];?>">
                                        </div>
                                        <div class="col-md-10">
                                            <h2><?php echo $persona['nombre'];?></h2>
                                            <span class="cargo"><?php echo $persona['cargo'];?></span>

                                            <p><?php echo apply_filters('the_content', $persona['texto']);?></p>
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

<?php get_template_part('parts/bs-home/bs-footer'); ?>