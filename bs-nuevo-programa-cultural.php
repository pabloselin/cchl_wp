<?php 
$feriapostid = cchl_current_fields_id('templates/bs-nueva-plantilla-feria.php');
$iniciooption = get_post_meta($feriapostid, 'cchl_bsferiainicio', true);
$finoption = get_post_meta($feriapostid, 'cchl_bsferiafin', true);
$hoyfr = new DateTime('today', new DateTimeZone('America/Santiago'));
$hoy = $hoyfr->format('Y-m-d');
$iniciofilsa = new DateTime( $iniciooption );
$finfilsa = new DateTime( $finoption );
$finfilsa = $finfilsa->modify('+1 day');
$interval = DateInterval::createFromDateString('1 day');
$period = new DatePeriod($iniciofilsa, $interval, $finfilsa);
$evterms = cchl_tipostransients();
?>

<div class="maineventbox" id="programa-eventos" data-to-search="eventos">
	

	<div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active">
				<a href="#dias" aria-controls="dias" role="tab" data-toggle="tab">días</a>
			</li>
			<li role="presentation">
				<a href="#tipos" aria-controls="tipos" role="tab" data-toggle="tab">tipos</a>
			</li>
		</ul>
		
		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="dias">

				<ul class="diasfilsa">
					<?php foreach($period as $day) { 
						if($hoy == $day->format('Y-m-d')):
							$cur = 'hoy';
						else:
							$cur = 'normal';
						endif;
						$dia = date_i18n('l' , $day->format('U'));
						$ndia = date_i18n('j' , $day->format('U'));
						$mes = date_i18n('F' , $day->format('U'));
						
						if(cchl_get_option('cchldiaev_' . $ndia . '-' . $mes) == true):
						?>

						<li>
							<a class="daysel <?php echo $cur;?>" data-day="<?php echo $day->format('Y-m-d');?>" href="javascript:void(0);">
								<span class="dia"><?php echo $dia;?></span>
								<span class="ndia"><?php echo $ndia;?></span>
								<span class="mes"><?php echo $mes;?></span>
							</a>
						</li>

						<?php
						endif;
						}?>
					</ul>

					<div class="evdias-load scrollable">
						<div class="aviso-load">
							<p><i class="fa fa-hand-pointer-o animated bounce infinite"></i> Escoge un día para ver los eventos disponibles.</p>
						</div>
					</div>

				</div>
				

				<div role="tabpanel" class="tab-pane" id="tipos">
					<?php 
						$tipos = get_terms(
							array(
								'taxonomy' => 'cchl_tipoevento',
								'include' => $evterms
							)
						);
						?>

						<div class="selectwrap">
							<select name="todos-eventos-tipos-ajax" id="todos-eventos-tipos-ajax" data-filter="cchl_tipoevento" data-container="contenedor_portipo" data-eventcat="<?php echo cchl_get_option('cchl_taxfilsa');?>">
								<option value="0" default> Escoge tipo de evento</option>
								<?php foreach($tipos as $tipo) {?>
								<option value="<?php echo $tipo->term_id;?>"><?php echo $tipo->name;?></option>
								<?php }?>
							</select>

							<div class="form-group">
								<div class="checkbox">
									<label>
										<input type="checkbox" id="showpast">Incluir eventos pasados
									</label>
								</div>
							</div>
							
							<div class="select__arrow"></div>
						</div>

						<div class="evtodos-load scrollable hidepast" id="contenedor_portipo">
							<div class="aviso-load">
								<p><i class="fa fa-hand-pointer-o animated bounce infinite"></i> Selecciona un filtro para ver los eventos correspondientes.</p>
							</div>
						</div>
				</div>

				<div role="tabpanel" class="tab-pane" id="temas">
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

						<div class="selectwrap">
							<select name="todos-eventos-temas-ajax" id="todos-eventos-temas-ajax" data-filter="cchl_temaevento" data-container="contenedor_portema">
								<option value="0" default> Escoge tema de evento</option>
								<?php foreach($temas as $tema) {?>
								<option value="<?php echo $tema->term_id;?>"><?php echo $tema->name;?></option>
								<?php }?>
							</select>
							<div class="select__arrow"></div>
						</div>

						<div class="evtodos-load scrollable" id="contenedor_portema">
							<div class="aviso-load">
								<p><i class="fa fa-hand-pointer-o animated bounce infinite"></i> Selecciona un filtro para ver los eventos correspondientes.</p>
							</div>
						</div>
				</div>
			</div>
		</div>

	</div>

