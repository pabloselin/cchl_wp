
<h2 style="font-weight:normal;">Eventos FLPA 2016</h2>

<div class="tabdias tabgen active" id="diaseventos">
	<ul id="navfilsa" class="navfil fil2016variant">
	
	</ul>	
	<ul class="calendario-filsa fil2016variant">
	
	<?php
	//Array por dias
	$pagsfilij = array(
					array(
						'id' => 60160,
						'ndia' => 21,
						'mes' => 'Abril',
						'dia' => 'Jueves',
						'dcode' => '2016-04'
						),
					array(
						'id' => 60164,
						'ndia' => 22,
						'mes' => 'Abril',
						'dia' => 'Viernes',
						'dcode' => '2016-04'
						),
					array(
						'id' => 55091,
						'ndia' => 23,
						'mes' => 'Abril',
						'dia' => 'Sábado',
						'dcode' => '2016-04'
						),
					array(
						'id' => 60168,
						'ndia' => 24,
						'mes' => 'Abril',
						'dia' => 'Domingo',
						'dcode' => '2016-04'
						),
					array(
						'id' => 60170,
						'ndia' => 25,
						'mes' => 'Abril',
						'dia' => 'Lunes',
						'dcode' => '2016-04'
						),
					array(
						'id' => 60172,
						'ndia' => 26,
						'mes' => 'Abril',
						'dia' => 'Martes',
						'dcode' => '2016-04'
						),
					array(
						'id' => 60174,
						'ndia' => 27,
						'mes' => 'Abril',
						'dia' => 'Miércoles',
						'dcode' => '2016-04'
						),
					array(
						'id' => 60176,
						'ndia' => 28,
						'mes' => 'Abril',
						'dia' => 'Jueves',
						'dcode' => '2016-04'
						),
					array(
						'id' => 60178,
						'ndia' => 29,
						'mes' => 'Abril',
						'dia' => 'Viernes',
						'dcode' => '2016-04'
						),
					array(
						'id' => 60136,
						'ndia' => 30,
						'mes' => 'Abril',
						'dia' => 'Sábado',
						'dcode' => '2016-04'
						),
					array(
						'id' => 60182,
						'ndia' => 1,
						'mes' => 'Mayo',
						'dia' => 'Domingo',
						'dcode' => '2016-05'
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
			<h3><?php echo $page->post_title;?></h3>
			<?php echo apply_filters( 'the_content', $page->post_content );?>
		</div>
	</li>
	<?php };?>
	</ul>
</div>