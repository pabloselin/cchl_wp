<div class="eventos-unitarios-feria">

	<?php 
	if($funcion == 'visitas-de-colegios'):
		$label_event = ' visitas de colegios';
		$label_all = ' todas las visitas de colegios';
	else:
		$label_event = ' eventos';
		$label_all = ' todos los eventos';
	endif;
	?>

	<nav class="navprincipaleventos nav nav-tabs">
		<li class="nav-item">
			<a href="#" class="nav-link active" data-tab="diaseventos">Días</a>
		</li>
		<li class="nav-item">
			<a href="#" class="nav-link" data-tab="cursoseventos">Cursos</a>
		</li>
		<li class="nav-item">
			<a href="#" class="nav-link" data-tab="tiposeventos">Tipos</a>
		</li>
	</nav>

	<div class="tabtodos tabgen" id="cursoseventos">

		<h3>Ver <?php echo $label_event;?> por curso</h3>

		<select name="todos-eventos-cursos" id="todos-eventos-cursos" data-filter="cursos">
			<option value="0" default>Escoge curso</option>
		</select>
		
		

		<div class="wraptodos">
			<h2>Escoge un curso</h2>
			<ul class="calendario-feria">
				<li></li>
			</ul>
		</div>

	</div>

	<div class="tabtodos tabgen" id="tiposeventos">

		
		<h3><?php echo $label_all;?> por tipo</h3>
		<select name="todos-eventos-tipos" id="todos-eventos-tipos" data-filter="cchl_tipoevento">
			<option value="0" default>Escoge tipo de <?php echo $label_event;?></option>
		</select>
		
		

		<div class="wraptodos">
			<h2>Escoge un filtro</h2>
			<ul class="calendario-feria">
				<li></li>
			</ul>
		</div>
	</div>


	<div class="tabdias tabgen active" id="diaseventos">
		<?php 
	//Dias feria
		setlocale(LC_TIME, '');
		setlocale(LC_TIME, 'es_ES.utf8');
		$hoy = date('Y-m-d');
		$inicio= new DateTime( $inicioferia );
		$fin = new DateTime( $finferia );
		$interval = DateInterval::createFromDateString('1 day');
		$finferia = $fin->modify('+1 day');
		$period = new DatePeriod($inicio, $interval, $finferia);
		?>
		<ul id="navferia">

		</ul>

		<ul class="calendario-feria">

			<?php

			foreach($period as $day) {
		//Eventos feria
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
							'taxonomy' => 'cchl_tipoevento',
							'field' => 'slug',
							'terms' => $visitas_tax
						)
					)
				);
				$newevents = tribe_get_events($args);
				if($hoy == $day->format('Y-m-d')):
					$cur = 'hoy';
				else:
					$cur = 'normal';
				endif;
				
				$dia = date_i18n('l' , $day->format('U'));
				$ndia = date_i18n('j' , $day->format('U'));
				$mes = date_i18n('F' , $day->format('U'));
				
				if($newevents):
					?>
					<li class="dia coneventos <?php echo $cur;?>" data-dia="<?php echo $dia;?>" data-ndia="<?php echo $ndia;?>" data-mes="<?php echo $mes;?>">
						<h2><?php echo date_i18n('l j \d\e F' , $day->format('U'));?></h2>

						<?php 
						foreach($newevents as $event):

							include(locate_template( 'parts/blocks/evento-unitario.php'));

						endforeach;	
						?>
					</li>

					<?php 
					else:?>
						<li class="dia sineventos" data-dia="<?php echo $dia;?>" data-ndia="<?php echo $ndia;?>" data-mes="<?php echo $mes;?>">
							<h2><?php echo date_i18n('l j \d\e F' , $day->format('U'));?></h2>
							<p>No hay eventos para este día</p>
						</li>
					<?php endif;
				};?>
			</ul>
		</div>

	</div>