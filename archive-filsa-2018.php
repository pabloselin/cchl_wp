<?php get_header();?>

<div class="container">

<?php get_template_part('parts/bs-blocks/bs-breadcrumb');?>

<header class="category-header row">
        <div class="col-md-4">
            <h1><?php post_type_archive_title( );?></h1>
        </div>
</header>

<div class="row">

<div class="category-items">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <?php 
    $enlosmedios = get_post_meta($post->ID, '_cchl_link', true);
    if($enlosmedios):
        foreach($enlosmedios as $link){ ?> 

            <article class="col-md-4 item-mini-noticia in-category-item solo-link-item">
                <a href="<?php echo $link['url'];?>" target="_blank">
                <div class="txt">
                <h2>
                        <?php the_title();?>
                </h2>
                <p><strong class="fuente">Fuente:</strong> <?php echo $link['descripcion'];?></p>
                </div>
                </a>
            </article>

    <?php } ?>   


        

    <?php else:?>
        <article class="col-md-4 item-mini-noticia in-category-item">
            <a href="<?php the_permalink();?>">
            <?php if(has_post_thumbnail( )):
                    the_post_thumbnail( 'media-kit' );
                endif;?>
            <div class="txt">
            <h2>
                    <?php the_title();?>
            </h2>
            <?php if(!in_category('guia-librerias')):?>
                <time><?php the_time('j \d\e F \d\e Y');?></time>
            <?php endif;?>
            </div>
            </a>
        </article>
    <?php endif;?>
    <?php endwhile;?>
    </div>
</div>

<div class="row pagenavigation">
<?php 
    if ( function_exists('wp_bootstrap_pagination') ) 
    wp_bootstrap_pagination();
?>
</div>

  

<?php endif;//End loop?>


</div>

<?php get_template_part('parts/bs-home/bs-footer'); ?>