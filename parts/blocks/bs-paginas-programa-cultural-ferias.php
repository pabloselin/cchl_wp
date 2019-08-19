<?php
/*
 * Nuevo Programa cultural Ferias
 */
?>

<?php 
$postid = cchl_current_fields_id('templates/bs-nueva-plantilla-feria.php');
$evterm = get_post_meta($postid, 'cchl_bstax', true);

$argspages = array(
	'post_type' => 'page',
	'numberposts' => -1,
	'post_parent' => $post->ID,
	'orderby' => 'menu_order',
	'order' => 'ASC'
);

$pages = get_posts($argspages);

if($evterm):
//args para el llamado a día
$args = array(
		'posts_per_page' => -1,
		'post_type' => 'tribe_events',
		'orderby' => 'meta_value',
		'meta_key' => '_EventStartDate',
		'meta_type' => 'DATETIME',
		'order' => 'ASC',
		'tax_query' => array(
			array(
				'taxonomy' => 'ferias',
				'field' => 'slug',
				'terms' => $evterm
				)
			)
		);

//$events = get_posts($args);

?>

<div class="bs-calendario">
<ul class="dias-ferias">
<?php 
$hoy = date('j');

foreach($pages as $page) {
  //un día por evento
  $splitday = explode(" ", $page->post_title)	
 // $daystring = '<i>' . $day . '</i><i class="dn">' . $dayno . '</i><i>' . $month . '</i>'; 
 // $eshoy = ($dayno == $hoy)? 'hoy' : '';
?>
  <li class="dia <?php echo $eshoy;?>" data-id="<?php echo $page->ID;?>">
  	<i><?php echo $splitday[0];?></i> <i class="dn"><?php echo $splitday[1];?></i> <i><?php echo $splitday[3];?></i>
  </li>
<?php  

}
endif;
?>
</ul>
  <div class="dias-ferias-contenido">
  <?php foreach($pages as $event){
  ?>
        <div class="dia-feria" data-id="<?php echo $event->ID;?>">
        <h4><a href="<?php echo get_permalink($event->ID);?>"><?php echo $event->post_title;?></a></h4>
        <?php echo apply_filters('the_content', $event->post_content);?>
        </div>
<?php 
}?>
</div>

</div>
