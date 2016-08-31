<body <?php body_class();?> id="special">
<?php get_template_part( 'parts/fb-sdk');?>

<?php get_template_part('parts/utilbar-top', 'special');?>

<?php 
	$socios = cchl_checksocios();
?>

<div id="header" class="header-special <?php if($socios == true): echo 'header-socios';endif;?>">
	<img src="<?php bloginfo('template_url');?>/img/filsa2016/header_global_filsa2016.png" alt="Filsa 2016">	
	<?php get_template_part( 'parts/mainmenu' );?>
</div>

