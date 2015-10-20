<?php 
//Dias Filsa
	setlocale(LC_TIME, '');
	setlocale(LC_TIME, 'es_ES.utf8');
	$hoy = date('Y-m-d');
	$iniciofilsa = new DateTime( '2015-10-22');
	$finfilsa = new DateTime('2015-11-9');
	$interval = DateInterval::createFromDateString('1 day');
	$period = new DatePeriod($iniciofilsa, $interval, $finfilsa);
?>

<div class="navprincipaleventos">
	<a href="#" class="active" data-tab="diaseventos">Ver los eventos por día</a>
	<a href="#" data-tab="todoseventos">Ver todos los eventos</a>
	<a href="#" data-tab="gratis">Ver eventos <strong>gratuitos</strong></a>
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


	<div class="eventos-load">
		<p>Escoge un día</p>	
	</div>

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

<div class="tabgen tabgratis" id="gratis">
	<h3>Eventos gratuitos</h3>
	<?php echo cchl_free_events();?>
</div>