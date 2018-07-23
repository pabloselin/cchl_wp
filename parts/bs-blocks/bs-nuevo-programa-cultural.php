<?php
/*
 * Nuevo Programa cultural Ferias
 */
?>

<div class="bs-eventos">
    <h2 class="programa-header">Programación</h2>
</div>
<?php 
$postid = cchl_current_fields_id('templates/bs-nueva-plantilla-feria.php');
$evterm = get_post_meta($postid, 'cchl_bstax', true);

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

$events = get_posts($args);

?>

<ul class="dias-ferias">
<?php 
foreach($events as $event){
  //un día por evento
	$startday = tribe_get_start_date( $event->ID, false, 'l');
  $daystring = $startday;
  var_dump($daystring);
  ?>
    <li class="dia" data-id="<?php echo $event->ID;?>"><?php echo $daystring;?></li>
  <?php  
 
}
endif;
?>
</ul>
<div class="dias-ferias-contenido">
  <?php foreach($events as $event){
      ?>
      <div class="dia-feria" data-id="<?php echo $event->ID;?>">
            <?php echo apply_filters('the_content', $event->post_content);?>
      </div>
      <?php 
  }?>
</div>
