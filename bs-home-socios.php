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

<?php 
set_query_var('eventos_home', cchl_getmenus('eventos-socios'));
set_query_var('eventos_title', 'Eventos Socios');
get_template_part('parts/bs-home/bs-eventos');
?>

<div class="home-responsive container">
	<?php 
		set_query_var('catblock_title', 'Estudios e Informes del sector');
		set_query_var('catblock_id', 101);
		get_template_part('parts/bs-blocks/bs-catblock');
	?>
</div>


<?php get_template_part('parts/bs-home/bs-footer'); ?>