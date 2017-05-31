<?php get_header();?>

<div class="container">

<?php get_template_part('parts/bs-blocks/bs-breadcrumb');?>

<header class="category-header row">
        <div class="col-md-4">
            <h1><?php single_cat_title();?></h1>
        </div>
        <div class="col-md-8">
            <div class="catdesc">
            <?php echo category_description( );?>
            </div>
        </div>
</header>

<div class="row">

<div class="category-items">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article class="col-md-4 item-mini-noticia in-category-item">
            <a href="<?php the_permalink();?>">
            <?php if(has_post_thumbnail( )):
                    the_post_thumbnail( 'media-kit' );
                endif;?>
            <div class="txt">
            <h2>
                    <?php the_title();?>
            </h2>
            <time><?php the_date();?></time>
            </div>
            </a>
        </article>
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