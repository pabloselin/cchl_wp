<?php get_header();?>

<div class="container">

<?php get_template_part('parts/bs-blocks/bs-breadcrumb');?>

<header class="category-header row">
        <div class="col-md-4">
            <h1><?php post_type_archive_title();?></h1>
        </div>
        <div class="col-md-8">
            <div class="catdesc">
            <?php the_archive_description();?>
            </div>
        </div>
</header>

<div class="row">
    <div class="col-md-12">
        <h2>Ofertas laborales</h2>
        <?php 
            $permanentargs = array(
                'post_type' => 'trabajos',
                'meta_key' => '_cchl_permanente',
                'meta_value' => 'on'
            );
            $permanents = get_posts($permanentargs);
            $skipids = [];
        ?>
    </div>
</div>

<div class="row">

<div class="category-items">
    
    <?php if($permanents):
                foreach($permanents as $permanent) { 
                $skipids[] = $permanent->ID;
                ?>
                    
                    <article class="col-md-4 item-mini-noticia item-permanente">
                        <a href="<?php echo get_permalink($permanent->ID);?>">
                            <div class="txt">
                                <h2><?php echo $permanent->post_title;?></h2>
                                <div class="inner-content">
                                    <?php echo apply_filters( 'the_excerpt', $permanent->post_content );?>
                                </div>
                            </div>
                        </a>
                    </article>

                <?php }
            endif;?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
        <?php if(!in_array($post->ID, $skipids)):?>
           <article class="col-md-4 item-mini-noticia in-category-item">
            <a href="<?php echo get_permalink($post->ID);?>">
            <div class="txt">
                <h2>
                        <?php the_title();?>
                </h2>
                <time><?php the_time('j \d\e F \d\e Y');?></time>
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