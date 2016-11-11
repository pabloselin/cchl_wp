<body <?php body_class();?> id="special">
<?php get_template_part( 'parts/fb-sdk');?>

<?php 
	$socios = cchl_checksocios();
?>

<?php get_template_part('parts/utilbar-top', 'special');?>

<div class="container_16 cf topmenu-principal-special">
	<?php get_template_part( 'parts/mainmenu' );?>
</div>

