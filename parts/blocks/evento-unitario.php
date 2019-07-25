<?php 

	$tipoevs = get_the_terms($event->ID, 'cchl_tipoevento');
	$temaevs = get_the_terms($event->ID, 'cchl_temaevento');
	$cursevs = get_the_terms($event->ID, 'cursos');
	$cupos = get_post_meta($event->ID, '_cmb_cupos', true);
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
			<?php echo $event->post_title;?>
	</h3>
	<span class="dia"><i class="fa fa-calendar-o fa-fw"></i> <?php echo date_i18n('l j \d\e F' , $day->format('U'));?></span><br>
	<span class="hora"><i class="fa fa-clock-o fa-fw"></i>
		<?php 
		$startdate = tribe_get_start_date($event->ID, false, 'G:i');
		$enddate = tribe_get_end_date($event->ID, false, 'G:i');
		?>
		<?php echo $startdate;?> <?php if($startdate != $enddate): echo ' - ' . $enddate; endif; ?> hrs. </span><br>

		<span class="lugar event-label-info"><i class="fa fa-map-marker fa-fw"></i> <strong>Lugar:</strong> <?php echo tribe_get_venue($event->ID);?></span><br>
		<span class="organiza event-label-info"><i class="fa fa-flag fa-fw"></i> <strong>Organiza:</strong> <?php echo tribe_get_organizer($event->ID);?></span><br><br>

		<?php if($funcion == 'visitas-de-colegios'):?>
		
			<p class="cursos event-label-info"><i class="fa fa-fw fa-user"></i> <strong>Cursos:</strong> <?php echo $nomcursevs;?></p>
			<p class="cupos event-label-info"><i class="fa fa-fw fa-ticket"></i> <strong>Cupos:</strong> <?php echo $cupos;?></p>

		<?php endif;?>

		<p class="evplus">

			<?php if($funcion == 'visitas-de-colegios' && $cupos != 0):?>
			
				<a href="<?php echo $enlace_inscripciones;?>" class="btn btn-xs btn-info"><i class="fa fa-file-o"></i> Inscripciones</a>
			
			<?php elseif($cupos == 0):?>
				
				<button class="btn btn-xs btn-disabled btn-danger"><i class="fa fa-file-o"></i> Inscripciones cerradas</button>

			<?php endif;?>
				
				<a data-toggle="collapse" href="#info-evento-<?php echo $event->ID;?>" class="btn btn-xs btn-info"><i class="fa fa-plus"></i> Más información</a>

		</p>

		<div class="collapse" id="info-evento-<?php echo $event->ID;?>">
			<div class="card card-body">
				<?php echo apply_filters('the_content', $event->post_content);?>
			</div>
		</div>
	</div>