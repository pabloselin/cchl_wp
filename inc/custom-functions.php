<?php
 function compararFechas($primera, $segunda)
 {
  $valoresPrimera = explode ("/", $primera);   
  $valoresSegunda = explode ("/", $segunda); 

  $diaPrimera    = $valoresPrimera[1];  
  $mesPrimera  = $valoresPrimera[0];  
  $anyoPrimera   = $valoresPrimera[2]; 

  $diaSegunda   = $valoresSegunda[1];  
  $mesSegunda = $valoresSegunda[0];  
  $anyoSegunda  = $valoresSegunda[2];

  $diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);  
  $diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);     

  if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){
  // "La fecha ".$primera." no es v&aacute;lida";
  return 0;
  }elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){
  // "La fecha ".$segunda." no es v&aacute;lida";
  return 0;
  }else{
  return  $diasPrimeraJuliano - $diasSegundaJuliano;
  }
          
}

add_filter('upload_mimes', 'custom_upload_mimes');

function custom_upload_mimes ( $existing_mimes=array() ) {
 
  // add your ext => mime to the array
  $existing_mimes['ai'] = 'application/illustrator';
 
  // add as many as you like
 
  // and return the new full result
  return $existing_mimes;
 
}

add_filter('template_include', 'filsa_template', 99 );

function filsa_template($template) {
  $isfilsa = checkfilsa();
  if($isfilsa) {
      $new_template = locate_template(array( 'page-filsa2014.php' ) );
      if( '' != $new_template) {
        return $new_template;
      }
  }
  return $template;
}

function checkfilsa() {
  global $post;
  $ancestors = get_post_ancestors($post->ID);
  $param = $_GET['ref'];
   if(
      //condition 1
      $post->ID == 31817 ||
      //condition 2
      in_array(31817, $ancestors) ||
      //condition 3
      (is_single($post->ID) && in_category(103, $post->ID) ||
      $param == 'filsa2014')
      //condition 4
      //is_singular( ) && is_object_in_term( $post->ID, 'tribe_events_cat', 128 ) 
      ) {
        $isfilsa = true;
      } else {
        $isfilsa = false;
      }
   return $isfilsa;
}

function checkfilij($postid = NULL) {
  global $post;
  if($postid) {
    $pid = $postid;
  } else {
    $pid = $post->ID;
  }
  $ancestors = get_post_ancestors($pid);
  $pagfilij = 33775;
  if($pid == $pagfilij || in_array($pagfilij, $ancestors)) {
      return true;
  } else {
      return false;
  }
}

function checkferia($postid = NULL, $motherpage, $cats = NULL) {
  global $post;
  
  $inferia = false;
  $arrcats = explode(', ', $cats);

  if(!is_front_page()) {
    
    if($postid) {
      $pid = $postid;
    } else {
      $pid = $post->ID;
    }

    $ancestors = get_post_ancestors($pid);
    $pagfilij = $motherpage;
    
    if($pid == $pagfilij || in_array($pagfilij, $ancestors)) {
        $inferia =  true;
    } else {
        $inferia = false;
    }

    if(is_category($arrcats, $pid) || in_category($arrcats, $pid) ) {
      $inferia = true;
    }
  }
    



  return $inferia;
}

function cchl_checkevent($ancestor, $postid, $cats) {
  /**
   * Comprueba dentro de una serie de eventos cual corresponde y devuelve el tipo de evento si es que se aplica, o falso
   */

  //Feria del Libro
  //2014
  //2015

  //Feria del Libro Infantil y Juvenil

}

function dataterms_for_event($id, $tax) {
    $dataterms = array();
    $evtipos = get_the_terms( $id, $tax);
      if($evtipos):
        foreach($evtipos as $evtipo) {
          $dataterms[] = $evtipo->slug;
        }
      echo 'data-'.$tax.'="'.implode(' ', $dataterms) . '"';
      endif;
}

function dataslugtoname() {
  $slugs = $_POST['data'];
  return $slugs;
  die();
}

function custom_excerpt($postid, $limit) {
  $limit = $limit+1;
  $post = get_post($postid);
  $excerpt = explode(' ', $post->post_excerpt, $limit);
  array_pop($excerpt);
  $excerpt = implode(" ",$excerpt);
  echo '<p>'.$excerpt.' &hellip;</p>';
}

add_action('wp_ajax_dataslugtonamefn', 'dataslugtoname');
add_action('wp_ajax_nopriv_dataslugtonamefn', 'dataslugtoname');

function eventos_shortcode($atts) {
  //Muestra los eventos en una vista general
  ob_start();
  $eventcat = $atts['catid'];
  $ev_stdate = $atts['start'];
  $ev_enddate = $atts['end'];
  include( TEMPLATEPATH . '/parts/shc_eventos.php');
  $output = ob_get_clean();
  return $output;
}

function eventos_shortcode_test($atts) {
  return $atts['start'];
}

add_shortcode('eventos_feria', 'eventos_shortcode');

function eventos_filij_shortcode($atts) {
  ob_start();
  include( TEMPLATEPATH . '/parts/eventos-filij.php');
  $output = ob_get_clean();
  return $output;
}

add_shortcode('eventos_filij', 'eventos_filij_shortcode');

function checksocios($postid) {
  
}
