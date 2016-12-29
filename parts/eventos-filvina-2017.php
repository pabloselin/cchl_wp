
<h2 class="programa-header">Programación diaria FIL VIÑA 2017</h2>

<div>
	
	<?php 

		$args = array(
				'post_parent' => 65839,
				'post_type' => 'page',
				'numberposts' => -1,
				'post_status' => 'any'
			);
		$dias = get_children($args);

		foreach($dias as $dia) {
			//echo $dia->ID . '<br>';

			$info = explode(' ', $dia->post_title);

			$pagsfil[$info[1]] = array(
				'id' => $dia->ID,
				'ndia' => $info[1],
				'mes' => $info[3],
				'dia' => $info[0],
				'dcode' => '2017-01'
				);
		}

		$pagsfil = array_reverse($pagsfil);

	?>
</div>

<div class="tabdias tabgen active" id="diaseventos">
	<ul id="navfilsa" class="navfil">
	
	</ul>	
	<ul class="calendario-filsa">
	
	<?php
	foreach($pagsfil as $day) {
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
		<div class="fil-day-content">
			<h3><?php echo $page->post_title;?></h3>
			<?php echo apply_filters( 'the_content', $page->post_content );?>
		</div>
	</li>
	<?php };?>
	</ul>
</div>