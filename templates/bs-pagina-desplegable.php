<?php 
/*
Template Name: [NUEVO] Página con funcionalidad desplegable
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

                        <div class="row faq">
                            <div class="col-md-12">
                            <div class="panel-group" id="faq" role="tablist" aria-multiselectable="true">
                                <?php
                                    $faqs = get_post_meta($post->ID, '_cchl_desplegable', true);
                                    
                                    
                                    foreach($faqs as $key=>$faq):?>

                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="panelheading-<?php echo $key;?>">
                                            <h4 class="panel-title"><a href="#panelcontent-<?php echo $key;?>" role="button" data-toggle="collapse" data-parent="#faq" aria-expanded="false" aria-controls="#panelcontent-<?php echo $key;?>">
                                            <?php echo $faq['titulo'];?>
                                            </a></h4>
                                        </div>
                                        <div id="panelcontent-<?php echo $key;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="panelheading-<?php echo $key;?>">
                                            <div class="panel-body">
                                                <?php echo $faq['contenido'];?>
                                            </div>
                                        </div>
                                    </div>


                                    <?php endforeach;
                                ?>
                            </div>
                            </div>
                        </div>

                        

                        <?php do_action('cchl_aftercontent');?>
                        
                    </div>
                </article>

                <?php endwhile;
                      endif;?>

                </div>

    </div>
</div>

<?php get_template_part('parts/bs-home/bs-footer'); ?>