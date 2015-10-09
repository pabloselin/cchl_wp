<?php 
if(checkfilij($post->ID)):?>
<div id="sidebar_filij" class="grid_4">
        <?php wp_nav_menu( array('menu'=> 176));?>
</div>
<?php elseif(checkferia($post->ID, 53771)):?>
<div id="sidebar_fil" class="grid_4">
		<?php wp_nav_menu( array('menu'=> 177));?>
</div>
<?php elseif(checkferia($post->ID, CCHL_FILSA2015, CCHL_CATSFILSA) || $post->ID == 108):?>
<div id="sidebar_interior" class="grid_4 filsa-2015">
		<?php wp_nav_menu( array('menu'=> 178));?>
</div>
<?php else:?>
<div id="sidebar_interior" class="grid_4">
        <?php get_sidebar('ugly');?>
</div>
<?php endif;?>