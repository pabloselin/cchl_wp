<body <?php body_class();?> id="special">
<?php get_template_part( 'parts/fb-sdk');?>

<?php get_template_part('parts/utilbar-top', 'special');?>

<?php 
	$socios = cchl_checksocios();
?>

<div id="header" class="header-special <?php if($socios == true): echo 'header-socios';endif;?>">
	<img src="<?php bloginfo('template_url');?>/img/filsa2016/header_global_filsa2016.png" alt="Filsa 2016">	
	<a class="specialplus" href="<?php echo get_permalink(CCHL_FILSA2016);?>" title="Ver más de FILSA 2016">
		Ver <i class="fa fa-plus"></i>
	</a>
	<?php get_template_part( 'parts/mainmenu' );?>
</div>

