<?php
/* Template Name: Escritores Chilenos */
?>
<?php get_header(); ?>

<div id="main-page" class="container_16 cf">
    <div id="content" class="grid_12">
        <div id="bread">
       		Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
            <h1><?php the_title(); ?></h1>
            <?php get_template_part('parts/addthis');?>
            <div class="cf"></div>
            <?php the_content(); ?><br />
        <?php endwhile; endif;?>
		<?php $parent = $post->ID; ?>
        <?php query_posts('post_type=page&post_parent='.$parent.'&order=DESC&orderby=menu_order');?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
        	<div class="capacitacion grid_5" style="padding-top:30px; border-top-color:#B3B3B3;  border-top-style:dotted;  border-top-width:1px; border-top-left-radius:1px; border-top-right-radius:1px;">
				<?php the_post_thumbnail(array(90,90)); ?>
                <div class="caja-texto">
                    <h3><?php echo get_the_title(); ?></h3>
                    <small>Publicado el <?php the_time('l j, F  Y'); ?> </small>
                    <?php excerpt2(25); ?>
                    <a href="<?php the_permalink() ?>" class="leyendo">Sigue Leyendo »</a>
                </div>
            </div>
		<?php endwhile; endif;?>
    </div>
</div>

<?php get_footer(); ?>
