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



<div id="diaseventos" data-filter="gratis">
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
			<p>Escoge un día para ver los eventos correspondientes.</p>
		</div>
	</div>

</div>


