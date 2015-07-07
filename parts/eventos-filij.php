
<h2>Programación diaria FILIJ 2014</h2>

<div class="tabdias tabgen active" id="diaseventos">
	<ul id="navfilsa" class="navfilij">
	
	</ul>	
	
	<ul class="calendario-filsa">
	
	<?php
	//Array por dias
	$pagsfilij = array(
					array(
						'id' => 53235,
						'ndia' => 28,
						'mes' => 'Noviembre',
						'dia' => 'Viernes',
						'dcode' => '2014-11'
						),
					array(
						'id' => 53238,
						'ndia' => 29,
						'mes' => 'Noviembre',
						'dia' => 'Sábado',
						'dcode' => '2014-11'
						),
					array(
						'id' => 53247,
						'ndia' => 30,
						'mes' => 'Noviembre',
						'dia' => 'Domingo',
						'dcode' => '2014-11'
						),
					array(
						'id' => 53251,
						'ndia' => 1,
						'mes' => 'Diciembre',
						'dia' => 'Lunes',
						'dcode' => '2014-12'
						),
					array(
						'id' => 53255,
						'ndia' => 2,
						'mes' => 'Diciembre',
						'dia' => 'Martes',
						'dcode' => '2014-12'
						),
					array(
						'id' => 53259,
						'ndia' => 3,
						'mes' => 'Diciembre',
						'dia' => 'Miércoles',
						'dcode' => '2014-12'
						),
					array(
						'id' => 53262,
						'ndia' => 4,
						'mes' => 'Diciembre',
						'dia' => 'Jueves',
						'dcode' => '2014-12'
						),
					array(
						'id' => 53264,
						'ndia' => 5,
						'mes' => 'Diciembre',
						'dia' => 'Viernes',
						'dcode' => '2014-12'
						),
					array(
						'id' => 53267,
						'ndia' => 6,
						'mes' => 'Diciembre',
						'dia' => 'Sábado',
						'dcode' => '2014-12'
						),
					array(
						'id' => 53270,
						'ndia' => 7,
						'mes' => 'Diciembre',
						'dia' => 'Domingo',
						'dcode' => '2014-12'
						),
					array(
						'id' => 53272,
						'ndia' => 8,
						'mes' => 'Diciembre',
						'dia' => 'Lunes',
						'dcode' => '2014-12'
						)
					 );
	foreach($pagsfilij as $day) {
		$page = get_post($day['id']);
		$hoy = date('Y-m-j');
		if($hoy == $day['dcode'] . '-' . $day['ndia']) {
			$cur = 'hoy';
		} else {
			$cur = 'normal';	
		}
		$dia = $day['dia'];
		$ndia = $day['ndia'];
		$mes = $day['mes'];
		
	?>
	<li class="dia coneventos <?php echo $cur;?>" data-dia="<?php echo $dia;?>" data-ndia="<?php echo $ndia;?>" data-mes="<?php echo $mes;?>">
		<div class="filij-day-content">
			<?php echo apply_filters( 'the_content', $page->post_content );?>
		</div>
	</li>
	<?php };?>
	</ul>
</div>