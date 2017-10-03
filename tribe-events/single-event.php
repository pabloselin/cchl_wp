<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single vevent hentry">

	

	<!-- Notices -->
	<?php tribe_events_the_notices() ?>
	
	<span class="tipoevento"><?php echo cchl_plainterms($post->ID, 'cchl_tipoevento', ' - ');?></span>

	<?php the_title( '<h2 class="tribe-events-single-event-title summary entry-title">', '</h2>' ); ?>
	
	<?php while ( have_posts() ) :  the_post(); ?>

		<?php get_template_part('parts/addthis');?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Event featured image, but exclude link -->
			<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
			
			<!-- Event meta -->
			<?php //do_action( 'tribe_events_single_event_before_the_meta' ) ?>
			<?php
			/**
			 * The tribe_events_single_event_meta() function has been deprecated and has been
			 * left in place only to help customers with existing meta factory customizations
			 * to transition: if you are one of those users, please review the new meta templates
			 * and make the switch!
			 */
			if ( ! apply_filters( 'tribe_events_single_event_meta_legacy_mode', false ) ) {
				tribe_get_template_part( 'modules/meta' );
			} else {
				echo tribe_events_single_event_meta();
			}
			?>

			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="tribe-events-single-event-description tribe-events-content entry-content description">
				<?php the_content(); ?>
			</div>
			<!-- .tribe-events-single-event-description -->
			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

			
			<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
		</div> <!-- #post-x -->
		<?php if ( get_post_type() == TribeEvents::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>

	<!-- Event footer -->
	<div id="tribe-events-footer">
	

	<?php if(is_object_in_term( $event_id, 'tribe_events_cat', 208) && function_exists('cchl_frontinv')):

		$organizer_ids = tribe_get_organizer_ids( get_the_id() );

		//Si los organizadores corresponden
		
		if( in_array( 61814, $organizer_ids) || in_array( 9521, $organizer_ids) || in_array(3054, $organizer_ids) ) {

		/**
		 * Data Sample
		 */
	
		$time_format = get_option( 'time_format', TribeDateUtils::TIMEFORMAT );
		$day_format = 'l j \d\e F';
		$descripcion = strip_tags( get_the_content( get_the_id() ) );

		
		
		if($organizer_ids) {

			foreach ($organizer_ids as $organizer) {

				$organizers_names[] = get_the_title($organizer);

			}

			$organizers_string = implode(' - ', $organizers_names);


		}



	
		$data = array(
			'id'			=> get_the_id(),
			'title' 		=> get_the_title(),
			'dia' 			=> tribe_get_start_date(null, false, $day_format),
			'hora' 			=> tribe_get_start_date( null, false, $time_format ) . ' - ' . tribe_get_end_date( null, false, $time_format ),
			'lugar'			=> tribe_get_venue(),
			'organizador'	=> $organizers_string,
			'descripcion'	=> limitar_palabras( $descripcion, 50)
			);


		
		$imglink = cchl_frontinv($data);

		 echo '<a class="btn-invitacion" href="' . $imglink . '"><i class="fa fa-download"></i> Descargar Invitación</a>';

		 }

		?> 

	<?php endif;?>

	<?php if(function_exists('filsa2017_cuposboton')):

			if( is_object_in_term( $event_id, 'cchl_tipoevento', filsa2017_get_option('filsa2017_taxfilsavisitas') )):
					echo '<p>' . filsa2017_cuposboton($event_id) . '</p>';
			endif;

	endif;?>
		
	</div>
	<!-- #tribe-events-footer -->

</div><!-- #tribe-events-content -->
