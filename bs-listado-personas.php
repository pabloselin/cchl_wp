<?php 
/*
Template Name: [NUEVO] Listado de personas
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
                                $directorio = getGroupOrder('imagen');
                                $imgattrs = array("h" => 120, "w" => 120, "zc" => 1, "q" => 100);

                                foreach($directorio as $miembro):
                                    $miembroinfo = array(
                                        'imagen' => get_image('imagen', $miembro, 1, 1, $post->ID, $imgattrs),
                                        'nombre' => get('nombre', $miembro),
                                        'cargo'  => get('cargo', $miembro),
                                        'desc'   => get('texto', $miembro)
                                    );
                                    xdebug_break();
                                    ?>

                                    <div class="person row">
                                        <div class="col-md-2">
                                            <?php echo $miembroinfo['imagen'];?>
                                        </div>
                                        <div class="col-md-10">
                                            <h2><?php echo $miembroinfo['nombre'];?></h2>
                                            <span class="cargo"><?php echo $miembroinfo['cargo'];?></span>

                                            <p><?php echo $miembroinfo['desc'];?></p>
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