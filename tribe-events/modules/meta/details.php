<?php
/**
 * Single Event Meta (Details) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 */
?>

<div class="tribe-events-meta-group tribe-events-meta-group-details">
	<!-- <h3 class="tribe-events-single-section-title"> <?php _e( 'Datos del evento', 'tribe-events-calendar' ) ?> </h3> -->
	<dl>

		<?php
		do_action( 'tribe_events_single_meta_details_section_start' );
		$event_id = get_the_ID();
		$time_format = get_option( 'time_format', TribeDateUtils::TIMEFORMAT );
		$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

		$start_datetime = tribe_get_start_date();
		$start_date = tribe_get_start_date( null, false );
		$start_time = tribe_get_start_date( null, false, $time_format );
		$start_ts = tribe_get_start_date( null, false, TribeDateUtils::DBDATEFORMAT );

		$end_datetime = tribe_get_end_date();
		$end_date = tribe_get_end_date( null, false );
		$end_time = tribe_get_end_date( null, false, $time_format );
		$end_ts = tribe_get_end_date( null, false, TribeDateUtils::DBDATEFORMAT );

		// All day (multiday) events
		if ( tribe_event_is_all_day() && tribe_event_is_multiday() ) :
			?>

			<dt> <i class="fa fa-fw fa-calendar"></i> <?php _e( 'Inicio:', 'tribe-events-calendar' ) ?> </dt>
			<dd>
				<abbr class="tribe-events-abbr updated published dtstart" title="<?php esc_attr_e( $start_ts ) ?>"> <?php esc_html_e( $start_date ) ?> </abbr>
			</dd>

			<dt> <i class="fa fa-fw fa-calendar"></i> <?php _e( 'Fin:', 'tribe-events-calendar' ) ?> </dt>
			<dd>
				<abbr class="tribe-events-abbr dtend" title="<?php esc_attr_e( $end_ts ) ?>"> <?php esc_html_e( $end_date ) ?> </abbr>
			</dd>

		<?php
		// All day (single day) events
		elseif ( tribe_event_is_all_day() ):
			?>

			<dt> <i class="fa fa-calendar fa-fw"></i> <?php _e( 'Fecha:', 'tribe-events-calendar' ) ?> </dt>
			<dd>
				<abbr class="tribe-events-abbr updated published dtstart" title="<?php esc_attr_e( $start_ts ) ?>"> <?php esc_html_e( $start_date ) ?> </abbr>
			</dd>

		<?php
		// Multiday events
		elseif ( tribe_event_is_multiday() ) :
			?>

			<dt> <?php _e( 'Inicio:', 'tribe-events-calendar' ) ?> </dt>
			<dd>
				<abbr class="tribe-events-abbr updated published dtstart" title="<?php esc_attr_e( $start_ts ) ?>"> <?php esc_html_e( $start_datetime ) ?> hrs.</abbr> 
			</dd>

			<dt> <?php _e( 'Fin:', 'tribe-events-calendar' ) ?> </dt>
			<dd>
				<abbr class="tribe-events-abbr dtend" title="<?php esc_attr_e( $end_ts ) ?>"> <?php esc_html_e( $end_datetime ) ?> hrs.</abbr> 
			</dd>

		<?php
		// Single day events
		else :
			?>

			<dt> <i class="fa fa-calendar fa-fw"></i> <?php _e( 'Fecha:', 'tribe-events-calendar' ) ?> </dt>
			<dd>
				<abbr class="tribe-events-abbr updated published dtstart" title="<?php esc_attr_e( $start_ts ) ?>"> <?php esc_html_e( $start_date ) ?> </abbr>
			</dd>

			<dt> <i class="fa fa-clock-o fa-fw"></i> <?php _e( 'Hora:', 'tribe-events-calendar' ) ?> </dt>
			<dd><abbr class="tribe-events-abbr updated published dtstart" title="<?php esc_attr_e( $end_ts ) ?>">
					<?php if ( $start_time == $end_time ) {
						esc_html_e( $start_time );
					} else {
						esc_html_e( $start_time . $time_range_separator . $end_time );
					} ?> hrs.
				</abbr></dd>

		<?php endif ?>

		<?php
		$cost = tribe_get_formatted_cost();
		if ( ! empty( $cost ) ):
			?>
			<dt> <?php _e( 'Valor:', 'tribe-events-calendar' ) ?> </dt>
			<dd class="tribe-events-event-cost"> <?php esc_html_e( tribe_get_formatted_cost() ) ?> 
				<?php if(is_object_in_term( $event_id, 'cchl_tipoevento', '188' )):?> 
				<p>
					<a class="linkgratis" href="<?php echo CCHL_LINKGRATIS;?>">Infórmate acá como asistir</a>
				</p>
				<?php endif;?></dd>
		<?php endif ?>

		

		

		<?php
		$website = tribe_get_event_website_link();
		if ( ! empty( $website ) ):
			?>
			<dt> <?php _e( 'Sitio web:', 'tribe-events-calendar' ) ?> </dt>
			<dd class="tribe-events-event-url"> <?php echo $website ?> </dd>
		<?php endif ?>

		<?php do_action( 'tribe_events_single_meta_details_section_end' ) ?>
	</dl>

	<?php if(function_exists('filsa2017_cuposinfo') && filsa2017_cuposinfo($event_id)):?>
		<dl>
			<dt><i class="fa fa-list-ul fa-fw"></i> Cupos:</dt> 

			<dd><?php echo filsa2017_cuposinfo($event_id);?></dd>
		</dl>

		<dl>
			<dd><?php echo filsa2017_cursosev($event_id);?></dd>
		</dl>
	<?php endif;?>
</div>