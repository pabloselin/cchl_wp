<?php 
/*
Template Name: [NUEVO] Memorias y Páginas con Documentos
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
                                $fieldtouse = (getGroupOrder('memorias_imagen'))? 'memorias' : 'estadisticas'; 
                                $items = getGroupOrder($fieldtouse . '_imagen');
                                //$imgattrs = array("h" => 120, "w" => 120, "zc" => 1, "q" => 100);

                                foreach($items as $item):
                                    $iteminfo = array(
                                        'imagen' => get_image( $fieldtouse . '_imagen', $item),
                                        'titulo' => get( $fieldtouse . '_titulo', $item),
                                        'link'  => get( $fieldtouse . '_descargar', $item),
                                        'desc'   => get( $fieldtouse . '_texto', $item)
                                    );?>

                                    <div class="document row">
                                        <div class="col-md-2">
                                            <?php echo $iteminfo['imagen'];?>
                                        </div>
                                        <div class="col-md-10">
                                            <h2><?php echo $iteminfo['titulo'];?></h2>
                                            <p><?php echo $iteminfo['desc'];?></p>
                                            <a href="<?php echo $iteminfo['link'];?>" class="btn btn-info"><i class="fa fa-download"></i> Descargar (pdf)</a>
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