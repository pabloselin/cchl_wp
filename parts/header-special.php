<body <?php body_class();?> id="special">
<?php get_template_part( 'parts/fb-sdk');?>

<?php 
	$socios = cchl_checksocios();
?>

<div class="wraptop">
	<div id="header" class="header-special <?php if($socios == true): echo 'header-socios';endif;?>">
		
		<a class="specialbannerplus" href="<?php echo get_permalink(CCHL_FILSA2016);?>" title="Ver más de FILSA 2016">
			<img src="<?php bloginfo('template_url');?>/img/filsa2016/header_global_filsa2016.png" alt="Filsa 2016">	
		
	
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

