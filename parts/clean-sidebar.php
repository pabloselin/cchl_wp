<?php 
if(checkfilij($post->ID)):?>
<div id="sidebar_filij" class="grid_4">
        <?php wp_nav_menu( array('menu'=> 176));?>
</div>
<?php elseif(checkferia($post->ID, 53771)):?>
<div id="sidebar_fil" class="grid_4">
		<?php wp_nav_menu( array('menu'=> 177));?>
</div>
<?php elseif(checkferia($post->ID, CCHL_FILSA2015, CCHL_CATSFILSA, 180) || $post->ID == 108):?>
<div id="sidebar_interior" class="grid_4 filsa-2015">
		<?php wp_nav_menu( array('menu'=> 178));?>
</div>
<?php elseif(checkferia($post->ID, CCHL_FILVINA2016)):?>
	<div id="sidebar_interior" class="grid_4 filvina-2016">
			<?php wp_nav_menu( array('menu'=> 196));?>
	</div>
<?php 
//Para otros tipos de ferias menos específicos
elseif(checkferia($post->ID, CCHL_FERIASCOMUNALES) || checkferia($post->ID, CCHL_FERIASREGIONALES) || checkferia($post->ID, CCHL_FERIASEXTRANJERO)):?>
	<div id="sidebar_interior" class="grid_4">
			<?php get_template_part('parts/automenu-ferias');?>
	</div>
<?php else:?>
<div id="sidebar_interior" class="grid_4">
        <?php get_sidebar('ugly');?>
</div>
<?php endif;?>