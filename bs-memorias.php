<?php 
/*
Template Name: [NUEVO] Memorias
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
                                $memorias = getGroupOrder('memorias_imagen');
                                //$imgattrs = array("h" => 120, "w" => 120, "zc" => 1, "q" => 100);

                                foreach($memorias as $memoria):
                                    $memoriainfo = array(
                                        'imagen' => get_image('memorias_imagen', $memoria),
                                        'titulo' => get('memorias_titulo', $memoria),
                                        'link'  => get('memorias_descargar', $memoria),
                                        'desc'   => get('memorias_texto', $memoria)
                                    );?>

                                    <div class="document row">
                                        <div class="col-md-2">
                                            <?php echo $memoriainfo['imagen'];?>
                                        </div>
                                        <div class="col-md-10">
                                            <h2><?php echo $memoriainfo['titulo'];?></h2>
                                            <p><?php echo $memoriainfo['desc'];?></p>
                                            <a href="<?php echo $memoriainfo['link'];?>" class="btn btn-info"><i class="fa fa-download"></i> Descargar (pdf)</a>
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