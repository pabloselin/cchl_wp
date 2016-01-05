
<h2 style="font-weight:normal;">Programación diaria FIL VIÑA 2016</h2>

<div class="tabdias tabgen active" id="diaseventos">
	<ul id="navfilsa" class="navfil fil2016variant">
	
	</ul>	
	<ul class="calendario-filsa fil2016variant">
	
	<?php
	//Array por dias
	$pagsfilij = array(
					array(
						'id' => 59593,
						'ndia' => 7,
						'mes' => 'Enero',
						'dia' => 'Jueves',
						'dcode' => '2016-01'
						),
					array(
						'id' => 59595,
						'ndia' => 8,
						'mes' => 'Enero',
						'dia' => 'Viernes',
						'dcode' => '2016-01'
						),
					array(
						'id' => 59597,
						'ndia' => 9,
						'mes' => 'Enero',
						'dia' => 'Sábado',
						'dcode' => '2016-01'
						),
					array(
						'id' => 59601,
						'ndia' => 10,
						'mes' => 'Enero',
						'dia' => 'Domingo',
						'dcode' => '2016-01'
						),
					array(
						'id' => 59603,
						'ndia' => 11,
						'mes' => 'Enero',
						'dia' => 'Lunes',
						'dcode' => '2016-01'
						),
					array(
						'id' => 59605,
						'ndia' => 12,
						'mes' => 'Enero',
						'dia' => 'Martes',
						'dcode' => '2016-01'
						),
					array(
						'id' => 59607,
						'ndia' => 13,
						'mes' => 'Enero',
						'dia' => 'Miércoles',
						'dcode' => '2016-01'
						),
					array(
						'id' => 59609,
						'ndia' => 14,
						'mes' => 'Enero',
						'dia' => 'Jueves',
						'dcode' => '2016-01'
						),
					array(
						'id' => 59611,
						'ndia' => 15,
						'mes' => 'Enero',
						'dia' => 'Viernes',
						'dcode' => '2016-01'
						),
					array(
						'id' => 59613,
						'ndia' => 16,
						'mes' => 'Enero',
						'dia' => 'Sábado',
						'dcode' => '2016-01'
						),
					array(
						'id' => 59615,
						'ndia' => 17,
						'mes' => 'Enero',
						'dia' => 'Domingo',
						'dcode' => '2016-01'
						),
					array(
						'id' => 59618,
						'ndia' => 18,
						'mes' => 'Enero',
						'dia' => 'Lunes',
						'dcode' => '2016-01'
						),
					array(
						'id' => 59621,
						'ndia' => 19,
						'mes' => 'Enero',
						'dia' => 'Martes',
						'dcode' => '2016-01'
						),
					array(
						'id' => 59623,
						'ndia' => 20,
						'mes' => 'Enero',
						'dia' => 'Miércoles',
						'dcode' => '2016-01'
						),
					array(
						'id' => 59625,
						'ndia' => 21,
						'mes' => 'Enero',
						'dia' => 'Jueves',
						'dcode' => '2016-01'
						),
					array(
						'id' => 59627,
						'ndia' => 22,
						'mes' => 'Enero',
						'dia' => 'Viernes',
						'dcode' => '2016-01'
						),
					array(
						'id' => 59629,
						'ndia' => 23,
						'mes' => 'Enero',
						'dia' => 'Sábado',
						'dcode' => '2016-01'
						),
					array(
						'id' => 59631,
						'ndia' => 24,
						'mes' => 'Enero',
						'dia' => 'Domingo',
						'dcode' => '2016-01'
						),
					
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