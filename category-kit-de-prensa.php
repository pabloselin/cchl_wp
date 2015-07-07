<?php get_header(); ?>
<div id="main-page" class="container_16 cf">
    <div id="sidebar_interior" class="grid_4">
        <?php get_sidebar(); ?>
    </div>
    <div id="content" class="grid_12">
         <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <h1>Kit de Prensa</h1>
        <?php get_template_part('parts/addthis');?>
        <div class="cf"></div>
<h4 class="category_description"><?php echo category_description(); ?></h4>
            <div id="presidentes">
                <ul class="cf">
					<?php foreach (get_categories('child_of=19') as $cat) : ?>
                    <li>
                        <img src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" />
                        <div class='info'>
                            <a href="<?php echo get_category_link($cat->term_id); ?>"><h4><?php echo $cat->cat_name; ?></h4></a>
                            <p><?php echo $cat->category_description; ?></p>
                        </div>
                    </li>
                    <?php endforeach; ?>
	             </ul>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
