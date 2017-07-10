<?php

add_action('wp_enqueue_scripts', 'cchl_styles');
function cchl_styles() {
  global $post;

  wp_register_style( 'mailchimp', '//cdn-images.mailchimp.com/embedcode/classic-081711.css' , array(), '0.1', 'screen');
	//gfonts
	wp_register_style( 'fonts', 'https://fonts.googleapis.com/css?family=Signika:400,300,600,700' , array(), '0.1', 'screen' );
	//icons
	wp_register_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' , array(), '4.7.0', 'screen' );

	//Compiled grunt style
	wp_register_style( 'cchlcss', get_bloginfo('template_url') . '/css/style-cchl.91d5a253.min.css', array(), CCHL_VERSION, 'screen' );

  wp_register_style( 'home-cchl', get_bloginfo('template_url') . '/css/home-cchl.6f8f31bd.min.css', array(), CCHL_VERSION, 'screen' );

  wp_register_style( 'interior-cchl', get_bloginfo('template_url') . '/css/interior-cchl.8359b89f.min.css', array(), CCHL_VERSION, 'screen' );

  $oldpages = cchl_oldcondition($post->ID);
	if($oldpages == true ) {
    
    wp_enqueue_style('cchlcss');
    wp_enqueue_style('mailchimp');
    wp_enqueue_style('fonts');
    wp_enqueue_style('fontawesome');

	} else {

    wp_enqueue_style('fontawesome');
    wp_enqueue_style('fonts');
    wp_enqueue_style( 'home-cchl');
    wp_enqueue_style( 'interior-cchl');

  } 
}


add_action('wp_enqueue_scripts', 'cchl_scripts');

function cchl_scripts() {

global $post;

  if(!is_admin()) {
	  wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', array() );
  }

  wp_register_script( 'cchl_scripts', get_bloginfo('template_url') . '/js/cchl-scripts.25a63cf2.min.js', array('jquery', 'featherlight', 'masonry'));
  wp_register_script( 'cycle', get_bloginfo('template_url') . '/js/jquery.cycle.all.js', array('jquery'));
  wp_register_script( 'readmore', get_bloginfo('template_url') . '/js/readmore.min.js', array('jquery'));
  wp_register_script( 'imagesloaded', get_bloginfo('template_url') . '/js/imagesloaded.min.js', array('jquery'));
  wp_register_script( 'masonry', get_bloginfo('template_url') . '/js/masonry.min.js', array('jquery'));
  wp_register_script( 'featherlight', get_bloginfo('template_url') . '/js/featherlight/featherlight.min.js', array('jquery'));
  wp_register_script( 'cchl_home', get_bloginfo('template_url') . '/js/cchl-home.500557ff.min.js', array() );

  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'featherlight' );
  wp_enqueue_script( 'cchl_scripts' );
  wp_enqueue_script( 'cycle' );
  wp_enqueue_script( 'masonry' );
  wp_enqueue_script( 'readmore' );
  wp_enqueue_script( 'imagesloaded' );
  wp_enqueue_script('cchl_home');


  if(is_home() || is_single() || is_category() || is_post_type_archive() || get_page_template_slug( $post->ID ) == 'bs-archivo-ferias.php' || get_page_template_slug( $post->ID ) == 'bs-home-socios.php' || get_page_template_slug( $post->ID ) == 'bs-default-page.php') {
    wp_enqueue_script('cchl_home');
  }

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
  $tiposarr['templateurl'] = get_bloginfo('template_url');
  $tiposarr['siteurl'] = get_bloginfo('url');

  wp_localize_script( 'cchl_scripts', 'cchl', $tiposarr ); 
}
