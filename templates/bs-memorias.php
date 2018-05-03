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
                        
                        <?php if($post->ID == 2425):?>
                            <div class="document row">
                                <div class="col-md-2"><img src="https://camaradellibro.cl/wp-content/themes/cchl_wp/img/auxi/isbn_2017.png"></div>
                                <div class="col-md-10">
                                    <h2>Informe estadístico 2017</h2>
                                    <p>Informe estadístico 2017. Agencia Chilena ISBN.</p>
                                    <a href="https://camaradellibro.cl/wp-content/themes/cchl_wp/img/auxi/isbn_2017.pdf" class="btn btn-info"><i class="fa fa-download"></i> Descargar (pdf)</a>
                                </div>
                            </div>
                        <?php endif;?>

                            <?php
                                $memorias = get_post_meta($post->ID, '_cchl_listadocs', true);
                                foreach($memorias as $memoria):?>
            
                                    <div class="document row">
                                        <div class="col-md-2">
                                            <img src="<?php echo cchl_oldfilesmf($memoria['docportada'], $memoria['docportada_id']);?>">
                                        </div>
                                        <div class="col-md-10">
                                            <h2><?php echo $memoria['doctitulo'];?></h2>
                                            <p><?php echo $memoria['doctexto'];?></p>
                                            <a href="<?php echo cchl_oldfilesmf($memoria['docdownload'], $memoria['docdownload_id']);?>" class="btn btn-info"><i class="fa fa-download"></i> Descargar (pdf)</a>
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