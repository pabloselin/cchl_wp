<?php 

//para los que usan plantillas de feria
	$checkferiatemplate = checkferiatemplate($post->ID);


if(checkfilij($post->ID) || get_page_template_slug( $post->ID) == 'page-filij2014'):?>
<div id="sidebar_filij" class="grid_4">
        <?php wp_nav_menu( array('menu'=> 176));?>
</div>
<?php elseif(checkferia($post->ID, 53771)):?>
<div id="sidebar_fil" class="grid_4">
		<?php wp_nav_menu( array('menu'=> 177));?>
</div>
<?php elseif(checkferia($post->ID, CCHL_FILSA2015, CCHL_CATSFILSA, 180) ):?>

<div id="sidebar_interior" class="grid_4 filsa-2015">
		<?php wp_nav_menu( array('menu'=> 178));?>
</div>

<?php elseif(checkferia($post->ID, 108)):?>

<div id="sidebar_interior" class="grid_4 filsa-2015">

	<?php wp_nav_menu( array( 'theme_location' => 'historico-filsa') );?>

</div>


<?php elseif(checkferia($post->ID, CCHL_FILVINA2016)):?>
	<div id="sidebar_interior" class="grid_4 filvina-2016">
			<?php wp_nav_menu( array('menu'=> 196));?>
	</div>

<?php 
	elseif($checkferiatemplate ):
		$menu = get('id_menu', 1, 1, 1, $checkferiatemplate);

	//Chequeador para singles multimedia
	elseif( is_single() && in_category( array( CCHL_FLPA2016, CCHL_FILIJ2016 ), $post->ID ) ):

		if(in_category(CCHL_FLPA2016)):

				$feriaid = CCHL_PAGEFLPA2016;

			elseif(in_category(CCHL_FILIJ2016)):

				$feriaid = CCHL_PAGEFILIJ2016;

		endif;

		$menu = get('id_menu', 1, 1, 1, $feriaid);

?>

<div id="sidebar_interior" class="grid_4 menu-feria-especial">

	<?php wp_nav_menu( array('menu'=> $menu ) );?>

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