<?php
/**
 * Single Event Meta (Organizer) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/organizer.php
 *
 * @package TribeEventsCalendar
 * @version 4.4
 */

$organizer_ids = tribe_get_organizer_ids();
$multiple = count( $organizer_ids ) > 1;

$phone = tribe_get_organizer_phone();
$email = tribe_get_organizer_email();
$website = tribe_get_organizer_website_link();
$event_id = get_the_ID();
?>

<div class="tribe-events-meta-group tribe-events-meta-group-organizer <?php if($multiple): echo 'multiple'; endif;?> ">
	<dl>
		<dt><i class="fa fa-dot-circle-o fa-fw"></i> <?php echo tribe_get_organizer_label( ! $multiple ); ?>: </dt>
		<?php
		do_action( 'tribe_events_single_meta_organizer_section_start' );

		foreach ( $organizer_ids as $key=>$organizer ) {
			if ( ! $organizer ) {
				continue;
			}

			?>
			<dt style="display:none;"><?php // This element is just to make sure we have a valid HTML ?></dt>
			<dd class="tribe-organizer">
				<?php echo tribe_get_organizer( $organizer ) ?>
				<?php if(count($organizer_ids) != $key+1) {
				echo ' - ';
			}?>
			</dd>	
			<?php
		};

		if ( ! $multiple ) { // only show organizer details if there is one
			if ( ! empty( $phone ) ) {
				?>
				<dt>
					<?php esc_html_e( 'Phone:', 'the-events-calendar' ) ?>
				</dt>
				<dd class="tribe-organizer-tel">
					<?php echo esc_html( $phone ); ?>
				</dd>
				<?php
			}//end if

			if ( ! empty( $email ) ) {
				?>
				<dt>
					<?php esc_html_e( 'Email:', 'the-events-calendar' ) ?>
				</dt>
				<dd class="tribe-organizer-email">
					<?php echo esc_html( $email ); ?>
				</dd>
				<?php
			}//end if

			if ( ! empty( $website ) ) {
				?>
				<dt>
					<?php esc_html_e( 'Website:', 'the-events-calendar' ) ?>
				</dt>
				<dd class="tribe-organizer-url">
					<?php echo $website; ?>
				</dd>
				<?php
			}//end if
		}//end if

		do_action( 'tribe_events_single_meta_organizer_section_end' );
		?>
		<?php if(is_object_in_term( $event_id, 'cchl_tipoevento', filsa2017_get_option('filsa2017_taxfirmas') )){
					echo filsa2017_prevsortlocation($organizer, $event_id);
				};?>
	</dl>

</div>
