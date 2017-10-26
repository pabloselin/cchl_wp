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

	<?php the_title( '<h1 class="tribe-events-single-event-title summary entry-title">', '</h1>' ); ?>
	
	<?php while ( have_posts() ) :  the_post(); ?>

		<?php get_template_part('parts/bs-general/bs-sharer');?>
		
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

			<?php if(function_exists('filsa2017_cuposboton')):

				if( is_object_in_term( $event_id, 'cchl_tipoevento', filsa2017_get_option('filsa2017_taxfilsavisitas') )):
						echo '<p>' . filsa2017_cuposboton($event_id) . '</p>';
				endif;

			endif;?>

			<?php if(filsa2017_checkorg($event_id)) {
				echo filsa2017_linktickets();
			}?>

			<a href="<?php echo filsa2017_get_option('filsa2017_programapage');?>" class="filsa2017_button verde"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Ir a programa FILSA 2017</a>
			
			
			<!-- .tribe-events-single-event-description -->
			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

			
			<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
		</div> <!-- #post-x -->
		<?php if ( get_post_type() == TribeEvents::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>

	<!-- Event footer -->
	<div id="tribe-events-footer">
	
		
	</div>
	<!-- #tribe-events-footer -->

</div><!-- #tribe-events-content -->
