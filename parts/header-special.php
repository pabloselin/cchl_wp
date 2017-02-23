<body <?php body_class();?> id="special">
<?php get_template_part( 'parts/fb-sdk');?>

<?php 
	$socios = cchl_checksocios();
?>

<div class="wraptop">
	<div id="header" class="header-special <?php if($socios == true): echo 'header-socios';endif;?>">
		
		<a class="specialbannerplus" href="<?php echo get_permalink(CCHL_ABUELOS_MEDIADORES);?>" title="Ver más de FIL VIÑA 2017">
			<img src="<?php bloginfo('template_url');?>/img/banner_abuelos_mediadores_01.png" alt="<?php echo get_the_title(CCHL_ABUELOS_MEDIADORES);?>">	
		
	
		<span class="specialplus">
			Ver <i class="fa fa-plus"></i>
		</span>
	
		</a>
	</div>
</div>
<?php get_template_part('parts/utilbar-top', 'special');?>

<div class="container_16 cf topmenu-principal-special">
	<?php get_template_part( 'parts/mainmenu' );?>
</div>

