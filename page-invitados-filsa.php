<?php
/* Template Name: Invitados Filsa */
?>
<?php get_header(); ?>

<div id="main-page" class="container_16 cf">
    <?php locate_template( 'parts/clean-sidebar.php', true);?>
    <div id="content" class="grid_12">
          <div id="bread">
            Estás en: <?php if(function_exists("bcn_display")) { bcn_display(); } ?>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php get_template_part('parts/addthis');?>
            <div class="cf"></div>
            <div class="the-content"><?php the_content();?></div> 
        
        
        
        <div class="invitados-filsa">
        <ul class="cf">
            <?php
            $miembros = getGroupOrder('imagen');
            foreach($miembros as $miembro){
				echo "<li>";
				$otros = array("h" => 185, "w" => 150, "zc" => 1, "q" => 100);
   				echo get_image('imagen',$miembro,1,1,NULL,$otros);
				echo "<div class='info'>
				<h3>".get('nombre',$miembro)."</h3>
				<span>".get('cargo',$miembro)."</span>";
                echo '<div class="textoint">'. apply_filters('the_content', get('texto',$miembro)). '</div>
				</div>
				</li>';
			}
            ?>
            </ul>
            </div>
		<?php endwhile; endif; wp_reset_query(); ?>
    </div>
</div>

<?php get_footer(); ?>

