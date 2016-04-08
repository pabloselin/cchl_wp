<?php 
function cchl_styles() {
	if(!is_admin()) {
	
	
	
	
	
	
	
	
	
	wp_register_style( 'mailchimp', '//cdn-images.mailchimp.com/embedcode/classic-081711.css' , array(), '0.1', 'screen' );
	//gfonts
	wp_register_style( 'fonts', 'http://fonts.googleapis.com/css?family=Signika:400,300,600,700' , array(), '0.1', 'screen' );
	//icons
	wp_register_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' , array(), '0.1', 'screen' );

	//Compiled grunt style
	wp_register_style( 'cchlcss', get_bloginfo('template_url') . '/css/style-cchl.css', array(), '0.2', 'screen' );

	// wp_enqueue_style('maincss');
	// wp_enqueue_style('reset');
	// wp_enqueue_style('menu');
	// wp_enqueue_style('ferias');
	// wp_enqueue_style('960grid');
	// wp_enqueue_style('slide');
	// wp_enqueue_style('dropdown');
	// wp_enqueue_style('default-adv');
	// wp_enqueue_style('default');
	wp_enqueue_style('cchlcss');
	wp_enqueue_style('mailchimp');
	wp_enqueue_style('fonts');
	wp_enqueue_style('fontawesome');
	}
}

function cchl_scripts() {
if(!is_admin()) {
	wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', array() );
}

  wp_register_script( 'cchl_main', get_bloginfo('template_url') . '/js/cchl-main.js', array('jquery', 'featherlight'));
  wp_register_script( 'cchl_ajax', get_bloginfo('template_url') . '/js/cchl-ajax.js', array('jquery'));
  wp_register_script( 'cchl_filsa', get_bloginfo('template_url') . '/js/cchl-filsa.js', array('jquery', 'cchl_ajax'));
  wp_register_script( 'cycle', get_bloginfo('template_url') . '/js/jquery.cycle.all.js', array('jquery'));
  wp_register_script( 'readmore', get_bloginfo('template_url') . '/js/readmore.min.js', array('jquery'));
  wp_register_script( 'imagesloaded', get_bloginfo('template_url') . '/js/imagesloaded.min.js', array('jquery'));
  wp_register_script( 'masonry', get_bloginfo('template_url') . '/js/masonry.min.js', array('jquery'));

  wp_register_script( 'featherlight', get_bloginfo('template_url') . '/js/featherlight/featherlight.min.js', array('jquery'));

  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'featherlight' );
  wp_enqueue_script( 'cchl_events' );
  wp_enqueue_script( 'cchl_ajax' );
  wp_enqueue_script( 'cchl_main' );
  wp_enqueue_script( 'cchl_filsa' );
  wp_enqueue_script( 'cycle' );
  wp_enqueue_script( 'masonry' );
  wp_enqueue_script( 'readmore' );
  wp_enqueue_script( 'imagesloaded' );

  $args = array(
    'hide_empty' => true
    );
  $tipos = get_terms( 'cchl_tipoevento', $args );
  $temas = get_terms( 'cchl_temaevento', $args );
  $tiposarr = array();
  foreach($tipos as $tipo) {
    $tiposarr['evtipos'][$tipo->slug] = $tipo->name;
  }
  foreach($temas as $tema) {
    $tiposarr['evtemas'][$tema->slug] = $tema->name;
  }

  $tiposarr['ajaxurl'] = admin_url('admin-ajax.php');

  wp_localize_script( 'cchl_ajax', 'cchl', $tiposarr );
}

add_action('wp_enqueue_scripts', 'cchl_scripts');

add_action('wp_enqueue_scripts', 'cchl_styles');