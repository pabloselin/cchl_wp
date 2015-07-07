<?php
/* Template Name: Page Feria Portada */
?>
<?php get_header(); ?>
<!-- jCarousel -->
<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/carousel/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/carousel/jquery.jcarousel.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_directory' ); ?>/js/carousel/skin.css" />
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel();
});
</script>

<div id="main-page" class="container_16 cf">
    <div id="sidebar_interior" class="grid_4">
        <?php get_sidebar(); ?>
    </div>
    <div id="content" class="grid_12">
        <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
           <?php get_template_part('parts/addthis');?>
            <div class="cf"></div>
		<?php endwhile;endif;wp_reset_query(); ?>
        <?php
		$parent = $post->ID;
		$i==0;
		query_posts(array('post__not_in'=>array(119),'post_type'=>page,'order'=>ASC,'posts_per_page'=>-1,post_parent=>$parent,'showposts'=>5, 'orderby'=> 'menu_order'));
		if ( have_posts() ) : while ( have_posts() ) : the_post();
		if($i==0){
			/* $miembros = getGroupOrder('feria_activa');
			if(!$miembros[0]==""){
				foreach($miembros as $miembro){
				  if(get('feria_activa',$miembro)=="Activada"){ */
				    $titulo = get_the_title();
					echo '<div class="feria-destacado-c"><div class="feria-destacado"><a href="'.get_permalink().'"><h2>'.$titulo.'</h2></a>';
					echo excerpt2(200).'</div>';
					echo '<a href="'.get_permalink().'">'.the_post_thumbnail(array(320,230)).'</a></div>';
				  /* }
				}
			 } */
		}else{
			/* $miembros = getGroupOrder('feria_activa');
			if(!$miembros[0]==""){
				foreach($miembros as $miembro){
				  if(get('feria_activa',$miembro)=="Activada"){*/
				    $titulo = get_the_title();
					echo '<div class="feria-destacado2"><a href="'.get_permalink().'"><h5>'.$titulo.'</h5></a>';
					the_excerpt(); echo '</div>'; 
				  /*}
				}
			}*/
		}
		$i++;
		endwhile;endif;wp_reset_query();
		?>  
        <div class="cf"></div>
	<h4> Galería de afiches </h4>
        <ul id="mycarousel" class="jcarousel-skin-tango">
        <?php query_posts(array('post__not_in'=>array(119),'post_type'=>page,'order'=>ASC,'posts_per_page'=>-1,post_parent=>$parent,'showposts'=>5)); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(170,220)); ?></a></li>
        <?php endwhile;endif;wp_reset_query(); ?>
        </ul>
        <br />
        <?php /* get_search_form(); */ ?>
        <br />
        </div>        
    </div>
</div>

<?php get_footer(); ?>
