<?php
/* Template Name: Inicio Socios Bootstrap*/
?>
<?php
//Main options
$cchl_options = get_option( 'cchl_settings' );
set_query_var('menu_noticias', 'noticias-socios');
?>

<?php get_header(); ?>
<div class="home-responsive container">
	<div class="main-home row">
		<?php get_template_part('parts/bs-general/bs-noticias-socios');?>
	</div>
</div>


<?php get_template_part('parts/bs-home/bs-eventos');?>
<section class="redes hidden-xs">
  <div class="container">
  </div>
</section>

<?php get_template_part('parts/bs-home/bs-footer'); ?>