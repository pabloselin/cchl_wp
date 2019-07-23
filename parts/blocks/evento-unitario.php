<?php 

	$tipoevs = get_the_terms($event->ID, 'cchl_tipoevento');
	$temaevs = get_the_terms($event->ID, 'cchl_temaevento');
	$cursevs = get_the_terms($event->ID, 'cursos');
	$ntevs = array();
	$ttevs = array();
	$ctevs = array();

	if($tipoevs):
		foreach($tipoevs as $tipoev) {
			$ntevs[] = $tipoev->name;
		}
		$nomtipoevs = implode(', ', $ntevs);
	endif;
	if($temaevs):
		foreach($temaevs as $temaev) {
			$ttevs[] = $temaev->name;
		}
		$nomtemaevs = implode(', ', $ttevs);
	endif;
	if($cursevs):
		foreach($cursevs as $curs) {
			$ctevs[] = $curs->name;
		}
		$nomcursevs = implode(', ', $ctevs);
	endif;

?>

<div class="evento-unitario" data-top="<?php echo $day->format('U');?>" <?php dataterms_for_event($event->ID, 'cchl_tipoevento');?> <?php dataterms_for_event($event->ID, 'cchl_temaevento');?> <?php dataterms_for_event($event->ID, 'cursos');?> >
	<span class="labeltipo">
		<?php echo $nomtipoevs;?>
	</span>
	<h3>
		<a href="<?php echo tribe_event_link($event->ID);?>">
			<?php echo $event->post_title;?>
		</a>
	</h3>
	<span class="dia"><i class="fa fa-calendar-o fa-fw"></i> <?php echo strftime('%A %e de %B' , $day->format('U'));?></span><br>
	<span class="hora"><i class="fa fa-clock-o fa-fw"></i>
		<?php 
		$startdate = tribe_get_start_date($event->ID, false, 'G:i');
		$enddate = tribe_get_end_date($event->ID, false, 'G:i');
		?>
		<?php echo $startdate;?> <?php if($startdate != $enddate): echo ' - ' . $enddate; endif; ?> hrs. </span><br>

		<span class="lugar"><i class="fa fa-map-marker fa-fw"></i> Lugar: <?php echo tribe_get_venue($event->ID);?></span><br><br>

		<?php if($funcion == 'visitas-de-colegios'):?>
		
			<p class="cursos"><i class="fa fa-user"></i> Cursos: <?php echo $nomcursevs;?></p>

		<?php endif;?>

		<p class="tema"><?php if($nomtemaevs):?> <?php echo 'TEMA: ' . $nomtemaevs;?> <?php endif;?></p>

		<p class="evplus">

			<?php if($funcion == 'visitas-de-colegios'):?>
			
				<a href="<?php echo $enlace_inscripciones;?>" class="btn btn-xs btn-info"><i class="fa fa-file-o"></i> Inscripciones</a>

			<?php endif;?>
				
				<a href="<?php echo tribe_event_link($event->ID);?>" class="btn btn-xs btn-info"><i class="fa fa-plus"></i> Más información</a>

		</p>
	</div>