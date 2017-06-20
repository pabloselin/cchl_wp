<?php
/* Template Name: Page Feria Subpágina*/
?>
<?php get_header(); ?>
<div id="main-page" class="container_16 cf">
    <div id="content" class="grid_16">
        <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
            <?php 
                $parent = $post->post_parent; 
            ?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1 class="post-title"><?php echo get_the_title($parent); ?></h1>
            <?php
            
            $args = array(
                    'post_parent' => $parent,
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
                        if($child->ID == $post->ID):
                            $children .= '<li class="current">';
                        else:
                            $children .= '<li>';
                        endif;
                        $children .= '<a href="' . get_permalink( $child->ID ) . '">' . $child->post_title . '</a></li>';
                    }
                    $children .= '</ul>';
                }

                echo $children;
            ?>
           <?php get_template_part('parts/addthis');?>
            
            <div class="feria-single">
            	<div class="the-content"><?php the_content();?></div>
            </div>
            <div id="feria-single-imagen">
            	<?php the_post_thumbnail('afiche'); ?>
            </div>

            <?php 
            $auspiciadores = getGroupOrder('imagen');
            if($auspiciadores):
            ?>
            
            <div id="auspiciadores">
            <ul class="cf">
                <?php
                
                foreach($auspiciadores as $auspiciador){
                    echo "<li>";
                    $image = get_image('imagen',$auspiciador,1,1,NULL);
                    if($image):
                        echo $image;
                    endif;
                    echo "<div class='info'>
                    <h3>".get('nombre',$auspiciador)."</h3>
                
                    <p>".get('texto',$auspiciador)."</p>
                    </div>
                    </li>";
                }
                ?>
            </ul>
            </div>

            <?php endif;?>
	
            
            
		<?php endwhile;endif;wp_reset_query(); ?>      
    </div>
</div>

<?php get_footer(); ?>
