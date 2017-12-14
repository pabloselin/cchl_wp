<?php

add_action('wp_enqueue_scripts', 'cchl_styles');

function cchl_styles() {
  global $post;

  wp_register_style( 'mailchimp', '//cdn-images.mailchimp.com/embedcode/classic-081711.css' , array(), '0.1', 'screen');
	
	//icons
	wp_register_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' , array(), '4.7.0', 'screen' );

	//Compiled grunt style
	wp_register_style( 'legacy', get_bloginfo('template_url') . '/css/legacy.3f46b1a0.min.css', array(), CCHL_VERSION, 'screen' );

  wp_register_style( 'camara', get_bloginfo('template_url') . '/css/camara.f6cd2330.min.css', array(), CCHL_VERSION, 'screen' );

  $oldpages = cchl_oldcondition($post->ID);
	if($oldpages == true ) {

    //gfonts
	  wp_register_style( 'fonts', 'https://fonts.googleapis.com/css?family=Signika:400,300,600,700' , array(), '0.1', 'screen' );
    
    wp_enqueue_style('legacy');
    wp_enqueue_style('mailchimp');
    wp_enqueue_style('fonts');
    wp_enqueue_style('fontawesome');
    

	} else {

    //gfonts
	  wp_register_style( 'fonts', 'https://fonts.googleapis.com/css?family=Signika:400,300,500' , array(), '0.1', 'screen' );

    wp_enqueue_style('fontawesome');
    wp_enqueue_style('fonts');
    wp_enqueue_style( 'camara');

  } 
}


add_action('wp_enqueue_scripts', 'cchl_scripts');

function cchl_scripts() {

global $post;

  if(!is_admin()) {
	  wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', array() );
  }
  if(WP_ENV != 'development') {
    wp_register_script( 'camara', get_bloginfo('template_url') . '/js/camara.29cec3ec.min.js', array('jquery'), CCHL_VERSION, true);
  } else {
    wp_register_script( 'camara', get_bloginfo('template_url') . '/js/camara.js', array('jquery'), CCHL_VERSION, true);
  }
  

  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'camara' );
  



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

  wp_localize_script( 'camara', 'cchl', $tiposarr ); 
}
