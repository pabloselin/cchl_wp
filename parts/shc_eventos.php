
<div class="navprincipaleventos">
	<a href="#" class="active" data-tab="diaseventos">Ver los eventos por día</a>
	<a href="#" data-tab="todoseventos">Ver todos los eventos</a>
</div>

<div class="tabtodos tabgen" id="todoseventos">
	
	<div class="filtronav selectabs">
		<a href="#" class="active" data-relfilter="portipo">Filtrar eventos <strong>por tipo</strong></a>
		<a href="#" data-relfilter="portema">Filtrar eventos <strong>por tema</strong></a>
	</div>

	<div class="selectwrap filtrotab active" data-filter="portipo">
		<h3>Todos los eventos por tipo</h3>
		<select name="todos-eventos-tipos" id="todos-eventos-tipos" data-filter="cchl_tipoevento">
			<option value="0" default>Escoge tipo de evento</option>
		</select>
	</div>
	<div class="selectwrap filtrotab" data-filter="portema">
		<h3>Todos los eventos por tema</h3>
		<select name="todos-eventos-temas" id="todos-eventos-temas" data-filter="cchl_temaevento">
			<option value="0">Escoge tema de evento</option>
		</select>
	</div>

	<div class="wraptodos">
		<h2>Escoge un filtro</h2>
		<ul class="calendario-filsa">
			<li></li>
		</ul>
	</div>
</div>


<div class="tabdias tabgen active" id="diaseventos">
	<?php 
	//Dias Filsa
	setlocale(LC_TIME, '');
	setlocale(LC_TIME, 'es_ES.utf8');
	$hoy = date('Y-m-d');
	$iniciofilsa = new DateTime( $ev_stdate );
	$finfilsa = new DateTime( $ev_enddate );
	$interval = DateInterval::createFromDateString('1 day');
	$period = new DatePeriod($iniciofilsa, $interval, $finfilsa);
	?>
	<ul id="navfilsa">
	
	</ul>
	
	<ul class="calendario-filsa">
	
	<?php
	
	foreach($period as $day) {
		//Eventos filsa
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'tribe_events',
		'orderby' => 'meta_value',
		'meta_key' => '_EventStartDate',
		'meta_type' => 'DATE',
		'order' => 'ASC',
		'meta_query' => array(
			array(
				'key' => '_EventStartDate',
				'type' => 'DATE',
				'value' => $day->format('Y-m-d')
				)
			),
		'tax_query' => array(
			array(
				'taxonomy' => 'tribe_events_cat',
				'field' => 'id',
				'terms' => $eventcat
				)
			)
		);
	//$events = get_posts($args);
	$newevents = tribe_get_events($args);
	if($hoy == $day->format('Y-m-d')):
			$cur = 'hoy';
		else:
			$cur = 'normal';
		endif;
		$dia = strftime('%A' , $day->format('U'));
		$ndia = strftime('%e' , $day->format('U'));
		$mes = strftime('%B' , $day->format('U'));
	if($newevents):
	?>
	<li class="dia coneventos <?php echo $cur;?>" data-dia="<?php echo $dia;?>" data-ndia="<?php echo $ndia;?>" data-mes="<?php echo $mes;?>">
		<h2><?php echo strftime('%A %e de %B' , $day->format('U'));?></h2>
		<div class="filtrowrap">
			<div class="filtronav">
				<a href="#" class="active" data-relfilter="portipo">Filtrar eventos <strong>por tipo</strong></a>
				<a href="#" data-relfilter="portema">Filtrar eventos <strong>por tema</strong></a>
			</div>
			<div class="filtrotab active" data-filter="portipo">
				
	
				<div class="filtro" data-id="<?php echo $day->format('U');?>">
					
				</div>
			</div>
			<div class="filtrotab" data-filter="portema">
				
				<div class="filtrotema" data-id="<?php echo $day->format('U');?>">
					
				</div>
			</div>
		</div>
		<?php 
			foreach($newevents as $event):
				?>
			<div class="evento" data-top="<?php echo $day->format('U');?>" <?php dataterms_for_event($event->ID, 'cchl_tipoevento');?> <?php dataterms_for_event($event->ID, 'cchl_temaevento');?> >
				 <h3><?php echo $event->post_title;?></h3>
				 <?php 
				 	$tipoevs = get_the_terms($event->ID, 'cchl_tipoevento');
				 	$temaevs = get_the_terms($event->ID, 'cchl_temaevento');
				 	$ntevs = array();
				 	$ttevs = array();
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
				 ?>
				 <span class="dia"><i class="fa fa-calendar-o fa-fw"></i> <?php echo strftime('%A %e de %B' , $day->format('U'));?></span><br>
				 <span class="hora"><i class="fa fa-clock-o fa-fw"></i>
					<?php 
						$startdate = tribe_get_start_date($event->ID, false, 'G:i');
						$enddate = tribe_get_end_date($event->ID, false, 'G:i');
					?>
				 <?php echo $startdate;?> <?php if($startdate != $enddate): echo ' - ' . $enddate; endif; ?> hrs. </span><br>
				 
				 <span class="lugar"><i class="fa fa-map-marker fa-fw"></i> Lugar: <?php echo tribe_get_venue($event->ID);?></span><br><br>
				
				 <span class="tipo"><?php if($nomtipoevs):?> <?php echo 'TIPO: ' . $nomtipoevs;?> <?php endif;?></span>
				 <span class="tema"><?php if($nomtemaevs):?> <?php echo 'TEMA: ' . $nomtemaevs;?> <?php endif;?></span><br>
				 
				 <p class="evplus">
				 	<a href="<?php echo tribe_event_link($event->ID);?>" class="masinfo"><i class="fa fa-plus"></i> Más información</a>
				 </p>
			</div>
			<?php endforeach;	
		?>
	</li>
	
	<?php 
	else:?>
		<li class="dia sineventos" data-dia="<?php echo $dia;?>" data-ndia="<?php echo $ndia;?>" data-mes="<?php echo $mes;?>">
			<h2><?php echo strftime('%A %e de %B' , $day->format('U'));?></h2>
			<p>No hay eventos para este día</p>
		</li>
	<?php endif;
	};?>
	</ul>
</div>
