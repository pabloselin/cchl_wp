<?php
/* Template Name: Page Feria Portada */
?>
<?php get_header(); ?>
<div id="main-page" class="container_16 cf">
    <div id="content" class="grid_16">
        <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
            <h1><?php the_title(); ?></h1>
           	
           	<?php get_template_part('parts/addthis');?>

            <div class="cf"></div>

		<?php endwhile;
			endif;?>

        <?php 
        //Ferias del Libro
        $args = array(
        	'post_parent' => $post->ID,
        	'numberposts' => -1,
        	'post_type' => 'page',
            'orderby' => 'date',
            'order' =>'DESC'
        	);
        $ferias = get_posts($args);
        foreach($ferias as $key=>$feria) {

        	if($key == 0) {
        		$args = array(
        			'post_parent' => $feria->ID,
        			'post_type' => 'page',
        			'numberposts' => 10,
        			'orderby' => 'menu_order',
        			'order' => 'ASC'
        			);
        		$children = '';
        		$childs = get_posts($args);
        		if($childs) {
        			$children .= '<ul class="ferialinks">';
        			foreach($childs as $child) {
        				$children .= '<li><a href="' . get_permalink( $child->ID ) . '">' . $child->post_title . '</a></li>';
        			}
        			$children .= '</ul>';
        		}

        		//Feria principal, destacada
        		$imageid = get_post_thumbnail_id( $feria->ID );
        		$imagesrc = wp_get_attachment_image_src( $imageid, 'afiche');
 				$output = '<div class="feria-destacada">';
 				$output .= '<div class="txt">';
 				$output .= '<h2><a href="' . get_permalink($feria->ID) . '">' . $feria->post_title . '</a></h2>';
 				$output .= apply_filters('the_excerpt', $feria->post_excerpt);
 				$output .= $children;
 				$output .= '</div>';
 				$output .= '<img src="' . $imagesrc[0] . '" alt="' . $feria->post_title . '">';
 				$output .= '</div>';

 				echo $output;

        	} else {

        		//otras ferias
        		$imageid = get_post_thumbnail_id( $feria->ID );
        		$imagesrc = wp_get_attachment_image_src( $imageid, 'media-kit');
 				$output = '<div class="feria-normal">';
 				$output .= '<div class="txt">';
 				$output .= '<a href="' . get_permalink($feria->ID) . '">';
 				$output .= '<img src="' . $imagesrc[0] . '" alt="' . $feria->post_title . '">';
 				$output .= '<h3>' . $feria->post_title . '</h3>';
 				//$output .= apply_filters('the_excerpt', $feria->post_excerpt);
 				$output .= '</a>';
 				$output .= '</div>';
 				$output .= '</div>';

 				echo $output;

        	}
        }
        ?>
        </div>        
    </div>
</div>

<?php get_footer(); ?>
