<div id="eventos-ajax-2016">
	<?php 
	//Dias Filsa
		setlocale(LC_TIME, '');
		setlocale(LC_TIME, 'es_ES.utf8');
		$hoy = date('Y-m-d');
		$iniciofilsa = new DateTime( '2016-10-20');
		$finfilsa = new DateTime('2016-11-7');
		$interval = DateInterval::createFromDateString('1 day');
		$period = new DatePeriod($iniciofilsa, $interval, $finfilsa);
		$eventcat = CCHL_FILSA2016_EVENTCAT;
	?>
	
	<span class="infoevento" data-eventcat="<?php echo $eventcat;?>"></span>
	
	<div class="navprincipaleventos">
		<a href="#" class="active" data-tab="diaseventos"><i class="fa fa-calendar"></i> Día a día</a>
		<a href="#" data-tab="todoseventos"><i class="fa fa-calendar-plus-o"></i> Todos los eventos</a>
	</div>
	
	<div class="tabdias tabgen active" id="diaseventos">
		<ul class="diasfilsa">
			<?php foreach($period as $day) { 
						if($hoy == $day->format('Y-m-d')):
							$cur = 'hoy';
						else:
							$cur = 'normal';
						endif;
						$dia = strftime('%A' , $day->format('U'));
						$ndia = strftime('%e' , $day->format('U'));
						$mes = strftime('%B' , $day->format('U'));
						?>
						<li>
							<a class="daysel <?php echo $cur;?>" data-day="<?php echo $day->format('Y-m-d');?>" href="javascript:void(0);">
								<span class="dia"><?php echo $dia;?></span>
								<span class="ndia"><?php echo $ndia;?></span>
								<span class="mes"><?php echo $mes;?></span>
							</a>
						</li>
				<?php }?>
		</ul>
	
		<div class="eventos-load">
			<div class="aviso-load">
				<p><i class="fa fa-hand-pointer-o animated bounce infinite"></i> Escoge un día para ver los eventos correspondientes.</p>
			</div>
		</div>
	
	</div>
	
	<div class="tabtodos tabgen" id="todoseventos">

		<h2>Todos los eventos por tipo o tema</h2>

		<p><i class="fa fa-info-circle"></i> Aquí puedes ver todos los eventos escogiendo antes por tipo o por tema de evento en el selector.</p>
		
		<div class="filtronav selectabs">
			<a href="#" class="active" data-relfilter="portipo"><strong>Tipos</strong> <span> Inauguración, Exhibición, Charla, etc.</span> </a>
			<a href="#" data-relfilter="portema"><strong>Temas</strong> <span>Cine, Cuentos, Danza, etc.</span></a>
		</div>
	
		<div class="selectwrap filtrotab active" data-filter="portipo">
			
			<?php 
				$tipos = get_terms(
							array(
								'taxonomy' => 'cchl_tipoevento',
								'hide_empty' => true,
								'orderby' => 'name',
								'order' => 'ASC'
								)
							);
			?>
	
			<div class="select">
				<select name="todos-eventos-tipos-ajax" id="todos-eventos-tipos-ajax" data-filter="cchl_tipoevento">
					<option value="0" default> Escoge tipo de evento</option>
					<?php foreach($tipos as $tipo) {?>
						<option value="<?php echo $tipo->term_id;?>"><?php echo $tipo->name;?></option>
						<?php }?>
				</select>
				<div class="select__arrow"></div>
			</div>

		</div>
		<div class="selectwrap filtrotab" data-filter="portema">

			<?php 
				$temas = get_terms(
							array(
								'taxonomy' => 'cchl_temaevento',
								'hide_empty' => true,
								'orderby' => 'name',
								'order' => 'ASC'
								)
							);
			?>
	
	
			<div class="select">
				<select name="todos-eventos-temas-ajax" id="todos-eventos-temas-ajax" data-filter="cchl_temaevento">
					<option value="0">Escoge tema de evento</option>
					<?php foreach($temas as $tema) {?>
						<option value="<?php echo $tema->term_id;?>"><?php echo $tema->name;?></option>
						<?php }?>
				</select>
				<div class="select__arrow"></div>
			</div>
		</div>
	
		<div class="evtodos-load">
			<div class="aviso-load">
				<p><i class="fa fa-hand-pointer-o animated bounce infinite"></i> Escoge un filtro para ver los eventos correspondientes.</p>
			</div>
		</div>
	</div>
</div>