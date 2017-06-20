<?php
/* Template Name: Page Feria */
?>
<?php get_header(); ?>
<div id="main-page" class="container_16 cf">
    <div id="content" class="grid_16">
        <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1 class="post-title"><?php the_title(); ?></h1>
            <?php 
            $args = array(
                    'post_parent' => $post->ID,
                    'post_type' => 'page',
                    'numberposts' => 10,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                    );
                $children = '';
                $childs = get_posts($args);
                if($childs) {
                    $children .= '<ul class="feriamenu">';
                    foreach($childs as $child) {
                        $children .= '<li><a href="' . get_permalink( $child->ID ) . '">' . $child->post_title . '</a></li>';
                    }
                    $children .= '</ul>';
                }

                echo $children;
            ?>
           <?php get_template_part('parts/addthis');?>
            
            
            <div class="cf"></div>
            <div class="feria-single">
            	<div class="the-content"><?php the_content();?></div>
            </div>
            <div id="feria-single-imagen">
            	<?php the_post_thumbnail('afiche'); ?>
     
            </div>

	
	
  				<br class="limpia" />
            <div class="cf left">
            

            </div>
            
		<?php endwhile;endif;wp_reset_query(); ?>      
    </div>
</div>

<?php get_footer(); ?>
