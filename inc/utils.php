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

function eventos_filij_shortcode($atts) {
  ob_start();
  include( TEMPLATEPATH . '/parts/eventos-filij.php');
  $output = ob_get_clean();
  return $output;
}

add_shortcode('eventos_filij', 'eventos_filij_shortcode');



function adjustBrightness($hex, $steps) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Normalize into a six character long hex string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Split into three parts: R, G and B
    $color_parts = str_split($hex, 2);
    $return = '#';

    foreach ($color_parts as $color) {
        $color   = hexdec($color); // Convert to decimal
        $color   = max(0,min(255,$color + $steps)); // Adjust color
        $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
    }

    return $return;
}

function cchl_button($atts) {
  /**
   * Devuelve un botón con iconito link y texto
   * PARAMETROS: [boton url="https://ejemplo.com" text="Clic Aquí" color="blue" icon="fa-angle-double-right" target="_blank"]
   * Los Iconos toman la clase de FontAwesome correspondiente
   * https://fontawesome.io/icons/
   */
  $button = shortcode_atts( 
    array(
      'url' => '#',
      'color' => 'blue',
      'text' => 'Clic aquí',
      'icon' => 'fa-angle-double-right',
      'target' => '_blank'
    ), $atts );

  return '<a target="' .$button['target']. '" title="' . $button['text'] . '" href="' . $button['url'] . '" class="cchl-button ' . $button['color']. '"><i class="fa ' . $button['icon']. '"></i> ' . $button['text'] . '</a>';
}

add_shortcode( 'boton', 'cchl_button' );


function excerpt2($num) {
  $limit = $num+1;
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  array_pop($excerpt);
  $excerpt = implode(" ",$excerpt);
  echo '<p>'.$excerpt.' &hellip;</p>';
}

function limitar_palabras( $str, $num, $append_str='' ) {
  $palabras = preg_split( '/[\s]+/', $str, -1, PREG_SPLIT_OFFSET_CAPTURE );
  if( isset($palabras[$num][1]) ){
    $str = substr( $str, 0, $palabras[$num][1] ) . $append_str;
  }
  unset( $palabras, $num );
  return trim( $str );
}

function getYoutubeID($url) {
    $tube = parse_url($url);
    if ($tube["path"] == "/watch") {
        parse_str($tube["query"], $query);
        $id = $query["v"];
    } elseif($tube['host'] == 'https://youtu.be') {
      $id = $tube['path'];
     }
    else {
        $id = "";   
    }
    return $id;
}

if (!function_exists('is_category_or_sub')) {
  function is_category_or_sub($cat_id = 0) {
      foreach (get_the_category() as $cat) {
        if ($cat_id == $cat->cat_ID || cat_is_ancestor_of($cat_id, $cat)) return true;
      }
      return false;
  }
}

if (!function_exists('is_page_or_sub')) {
    function is_page_or_sub($my_page) {
        global $post, $wpdb;
  $grand_parent = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID = '".$post->post_parent."' AND post_type = 'page'");
  // If you pass in a string, get the page ID of $my_page to use below
  if (is_numeric($my_page)==false) {
            $my_page = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$my_page."' AND post_type = 'page'");
  }
  // If this is $my_page or the child or grandchild of $my_page return true 
  if ( is_page($my_page) || $post->post_parent == $my_page || $grand_parent == $my_page ) {
      return true;
  } 
  // Else return false
        return false;
    }
}

function get_topmost_parent($post_id){
  $parent_id = get_post($post_id)->post_parent;
  if($parent_id == 0){
    return $post_id;
  }else{
    return get_topmost_parent($parent_id);
  }
}

function cchl_get_topmost_parent_template($post_id, $page_template_slug) {
  //Devuelve el ID de la página superior que esté usando la plantilla $page_template_slug(con extensión .php)
  $ancestors = get_post_ancestors( $post_id );
    if($ancestors) {
      foreach($ancestors as $ancestor) {
        $ancestor_slug = get_page_template_slug( $ancestor );
        if($ancestor_slug == $page_template_slug) {
          return $ancestor;
        }
      }
    }
}

function new_excerpt_more( $more ) {
  return '';
}

add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Devuelve TRUE cuando estamos en alguna parte del sitio que sea responsive
 */
function cchl_isresponsive( ) {

  global $post;

  $isfilsa = checkfilsa();
  $isfilij = checkfilij();
  $using_feria_template = checkferiatemplate($post->ID);
  $feriasmultimediacats = array( CCHL_FLPA2016, CCHL_FILIJ2016 );
  $ancestor = cchl_get_topmost_parent_template($post->ID, 'bs-plantilla-feria.php');
  if(
  
  //Listado de condiciones para plantillas específicas
  is_home() ||
  is_single() || 
  $isfilsa == true ||
  $isfilij == true ||
  checkferia($post->ID, 53771) ||
  checkferia($post->ID, CCHL_FILSA2015, CCHL_CATSFILSA, 180) ||
  checkferia($post->ID, CCHL_FILSA2016, CCHL_CATSFILSA2016, 208) ||
  checkferia($post->ID, CCHL_FILVINA2016) ||
  checkferia($post->ID, CCHL_FILVINA2017) ||
  is_page_template('page-feria-principal.php') ||
  is_page_template('bs-plantilla-feria.php') ||
  is_page_template('bs-archivo-ferias.php') ||
  $using_feria_template || 
  ( is_single() && in_category( $feriasmultimediacats, $post->ID ) ) ||
  $ancestor
  ):

    return true;

  else:

    return false;

  endif;
}

//URL para usar en los contadores de redes sociales
function cchl_url($id) {
    if(get_bloginfo('url') == 'https://camaradellibro.cl') {
        $devlink =  get_permalink($id);
    } else {
        $devlink = get_permalink( $id );
        $devlink = str_replace(get_bloginfo('url'), 'https://camaradellibro.cl' , $devlink);
    }
    return $devlink;
}

function cchl_checksocios() {
  /**
   * Devuelve chequeo de si estoy en algo relacionado con socios para mostrar cosas de socios (menú principalmente)
   */
  global $post;

  if(!is_home() && (in_category(33)||in_category(32)||in_category(101)||in_category(21)||in_category(68)||is_page(45)||is_page(88)||is_page(144)||is_page(90)) ):

      return true;

  else:

      return false;

  endif;
}

function cchl_getmenus($menu, $submenus = false) {
  /**
   * Devuelve solo submenus si se le indica
   */
    $menuobject = cchl_getmenuobject($menu);
    if($menuobject) {
    //Si tengo un objeto menú me devuelve el objeto y empiezo a recolectar items
      $items = wp_get_nav_menu_items( $menuobject->term_id );   
        foreach($items as $item) {
          if($submenus != true) {
            if($item->menu_item_parent == 0) {
              $newitems[] = $item;
            }
          } else {
              $newitems[] = $item;
          }
        } 
      return $newitems;
    } else {
      //Si no hay hago un llamado independiente por sección
      return false;
    }
}

function cchl_getmenuobject($location) {
  if( ( $locations = get_nav_menu_locations() ) && isset($locations[$location]) ){
    $menu = wp_get_nav_menu_object( $locations[$location] );
    return $menu;
  } else {
    return false;
  }
}

function cchl_plainterms( $itemid, $taxonomy, $separator = ', ' ) {
  /**
   * Devuelve un listado de términos de taxonomía en texto plano separados por un separador
   */
  
  $terms = get_the_terms( $itemid, $taxonomy );
  $termnames = array();

  if( $terms ) {

      foreach($terms as $term) {
        $termnames[] = $term->name;
      }

      $termstring = implode( $separator , $termnames );

      return $termstring;

  } else {

      return '';

  }

}

function cchl_excerpt($postid, $words) {

    if(has_excerpt( $postid )) {

        return get_post_field( 'post_excerpt', $postid );

    } else {

        $content = get_post_field( 'post_content', $postid );

        return limitar_palabras( strip_tags($content), $words, '&hellip;' );

    }

}