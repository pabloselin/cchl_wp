
<h2 style="font-weight:normal;">Programación diaria FIL VIÑA 2015</h2>

<div class="tabdias tabgen active" id="diaseventos">
	<ul id="navfilsa" class="navfil">
	
	</ul>	
	<ul class="calendario-filsa">
	
	<?php
	//Array por dias
	$pagsfilij = array(
					array(
						'id' => 54238,
						'ndia' => 8,
						'mes' => 'Enero',
						'dia' => 'Jueves',
						'dcode' => '2015-01'
						),
					array(
						'id' => 54240,
						'ndia' => 9,
						'mes' => 'Enero',
						'dia' => 'Viernes',
						'dcode' => '2015-01'
						),
					array(
						'id' => 54242,
						'ndia' => 10,
						'mes' => 'Enero',
						'dia' => 'Sábado',
						'dcode' => '2015-01'
						),
					array(
						'id' => 54244,
						'ndia' => 11,
						'mes' => 'Enero',
						'dia' => 'Domingo',
						'dcode' => '2015-01'
						),
					array(
						'id' => 54248,
						'ndia' => 12,
						'mes' => 'Enero',
						'dia' => 'Lunes',
						'dcode' => '2015-01'
						),
					array(
						'id' => 54251,
						'ndia' => 13,
						'mes' => 'Enero',
						'dia' => 'Martes',
						'dcode' => '2015-01'
						),
					array(
						'id' => 54253,
						'ndia' => 14,
						'mes' => 'Enero',
						'dia' => 'Miércoles',
						'dcode' => '2015-01'
						),
					array(
						'id' => 54255,
						'ndia' => 15,
						'mes' => 'Enero',
						'dia' => 'Jueves',
						'dcode' => '2015-01'
						),
					array(
						'id' => 54257,
						'ndia' => 16,
						'mes' => 'Enero',
						'dia' => 'Viernes',
						'dcode' => '2015-01'
						),
					array(
						'id' => 54259,
						'ndia' => 17,
						'mes' => 'Enero',
						'dia' => 'Sábado',
						'dcode' => '2015-01'
						),
					array(
						'id' => 54261,
						'ndia' => 18,
						'mes' => 'Enero',
						'dia' => 'Domingo',
						'dcode' => '2015-01'
						),
					array(
						'id' => 54263,
						'ndia' => 19,
						'mes' => 'Enero',
						'dia' => 'Lunes',
						'dcode' => '2015-01'
						),
					array(
						'id' => 54268,
						'ndia' => 20,
						'mes' => 'Enero',
						'dia' => 'Martes',
						'dcode' => '2015-01'
						),
					array(
						'id' => 54270,
						'ndia' => 21,
						'mes' => 'Enero',
						'dia' => 'Miércoles',
						'dcode' => '2015-01'
						),
					array(
						'id' => 54272,
						'ndia' => 22,
						'mes' => 'Enero',
						'dia' => 'Jueves',
						'dcode' => '2015-01'
						),
					array(
						'id' => 54274,
						'ndia' => 23,
						'mes' => 'Enero',
						'dia' => 'Viernes',
						'dcode' => '2015-01'
						),
					array(
						'id' => 54276,
						'ndia' => 24,
						'mes' => 'Enero',
						'dia' => 'Sábado',
						'dcode' => '2015-01'
						),
					array(
						'id' => 54278,
						'ndia' => 25,
						'mes' => 'Enero',
						'dia' => 'Domingo',
						'dcode' => '2015-01'
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