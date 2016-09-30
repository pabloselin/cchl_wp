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

	<?php the_title( '<h2 class="tribe-events-single-event-title summary entry-title">', '</h2>' ); ?>
	
	<?php while ( have_posts() ) :  the_post(); ?>

		<?php get_template_part('parts/addthis');?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Event featured image, but exclude link -->
			<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
			
			<!-- Event meta -->
			<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
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
	<?php 
		if(is_object_in_term( $event_id, 'tribe_events_cat', 180 )):?>
			<a class="centerprog" href="<?php echo get_permalink(57212);?>"><i class="fa fa-calendar-o"></i> Ir a Programa FILSA 2015</a>
		<?php 
		endif;
	?>

	<?php if(is_object_in_term( $event_id, 'tribe_events_cat', 208)):?>

		<?php 
		//Debug invitacion
		
		/**
	 * Data Sample
	 */
	
		$time_format = get_option( 'time_format', TribeDateUtils::TIMEFORMAT );
	
		$data = array(
			'id'			=> get_the_id(),
			'title' 		=> get_the_title(),
			'dia' 			=> tribe_get_start_date(null, false),
			'hora' 			=> tribe_get_start_date( null, false, $time_format ) . ' - ' . tribe_get_end_date( null, false, $time_format ),
			'lugar'			=> tribe_get_venue(),
			'organizador'	=> tribe_get_organizer()
			);


		$imglink = cchl_frontinv($data);

		echo '<a href="' . $imglink . '">Ver invitación</a>';

		?> 

		<div class="aviso-evento-modificaciones">
			<i class="fa fa-pull-left fa-info-circle fa-2x"></i> Las actividades calendarizadas en el Programa Cultural de FILSA 2016, pueden sufrir modificaciones, antes y durante el período de la realización de FILSA. Lo que será informado por este medio y nuestras redes sociales
		</div>

		<a class="centerprog cchl-button blue" href="<?php echo get_permalink(61251);?>"><i class="fa fa-calendar-o"></i> Ir a Programa FILSA 2016</a>


	<?php endif;?>
		
	</div>
	<!-- #tribe-events-footer -->

</div><!-- #tribe-events-content -->
