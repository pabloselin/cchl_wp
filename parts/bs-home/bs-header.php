<?php 
$cchl_options = get_option( 'cchl_settings' );
$special = $cchl_options['cchl_checkbox_special'];
?>

<body <?php body_class();?> >

<?php get_template_part( 'parts/fb-sdk');?>

<header class="site-header">

<?php if($special) {
	?>
	
	<section class="special">
		<div class="container">
			<div class="row">
				<div class="col-md-12 fmw">
					<a class="specialbannerplus" href="<?php echo $cchl_options['cchl_urlspecial'];?>" title="Ver más">
					<img class="hidden-xs" src="<?php echo $cchl_options['cchl_special_header'];?>" alt="<?php echo $cchl_options['cchl_special_title'];?>">	
                    <img src="<?php echo $cchl_options['cchl_special_header_mobile'];?>" alt="<?php echo $cchl_options['cchl_special_title'];?>" class="visible-xs">
					</a>
				</div>
			</div>
		</div>
	</section>

	<?php
}?>

<?php get_template_part( 'parts/bs-general/bs-utils');?>

</header>

<?php get_template_part( 'parts/bs-home/bs-mainmenu' );?>

