<?php 

function cchl_tablaprogramaferia($pags, $titulo) {
	/**
	 * Genera calendario de feria basado en IDS de páginas con relación día
	 */
	$output = '<div class="eventos-feria-shortcode">';
	$output .= '<h2 style="font-weight:normal;">' . $titulo . '</h2>';
	$output .= '<div class="tabdias tabgen active" id="diaseventos">';
	$output .= '<ul id="navfilsa" class="navfil fil2016variant"></ul>';
	$output .= '<ul class="calendario-filsa fil2016variant">';

	foreach($pags as $day) {
		
		$page = get_post($day['id']);
		$hoy = date('Y-m-j');
		if($hoy == $day['dcode'] . '-' . $day['ndia']) {
			$cur = 'hoy';
		} else {
			$cur = 'normal';	
		}
		$dia = $day['dia'];
		$ndia = $day['ndia'];
		$mes = $day['mes'];

		$output .= '<li class="dia coneventos ' . $cur . '" data-dia="' . $dia . '" data-ndia="' . $ndia . '" data-mes="'. $mes . '">';
		$output .= '<div class="filij-day-content">';
		$output .= '<h3>' . $page->post_title . '</h3>';
		$output .= apply_filters( 'the_content', $page->post_content );
		$output .= '</div></li>';
	}

	$output .= '</ul></div></div>';

	return $output;
}

function filij2016_programashortcode($atts) {
	$info = shortcode_atts(
		array(
			'titulo' => 'Programa Cultural'
			), $atts
	);

	$pagsfilij2016 = array(
					array(
						'id' => 60531,
						'ndia' => 26,
						'mes' => 'Mayo',
						'dia' => 'Jueves',
						'dcode' => '2016-05'
						),
					array(
						'id' => 60535,
						'ndia' => 27,
						'mes' => 'Mayo',
						'dia' => 'Viernes',
						'dcode' => '2016-05'
						),
					array(
						'id' => 60537,
						'ndia' => 28,
						'mes' => 'Mayo',
						'dia' => 'Sábado',
						'dcode' => '2016-05'
						),
					array(
						'id' => 60539,
						'ndia' => 29,
						'mes' => 'Mayo',
						'dia' => 'Domingo',
						'dcode' => '2016-05'
						),
					array(
						'id' => 60541,
						'ndia' => 30,
						'mes' => 'Mayo',
						'dia' => 'Lunes',
						'dcode' => '2016-05'
						),
					array(
						'id' => 60563,
						'ndia' => 31,
						'mes' => 'Mayo',
						'dia' => 'Martes',
						'dcode' => '2016-05'
						),
					array(
						'id' => 60543,
						'ndia' => 1,
						'mes' => 'Junio',
						'dia' => 'Miércoles',
						'dcode' => '2016-06'
						),
					array(
						'id' => 60545,
						'ndia' => 2,
						'mes' => 'Junio',
						'dia' => 'Jueves',
						'dcode' => '2016-06'
						),
					array(
						'id' => 60547,
						'ndia' => 3,
						'mes' => 'Junio',
						'dia' => 'Viernes',
						'dcode' => '2016-06'
						),
					array(
						'id' => 60549,
						'ndia' => 4,
						'mes' => 'Junio',
						'dia' => 'Sábado',
						'dcode' => '2016-06'
						),
					array(
						'id' => 60551,
						'ndia' => 5,
						'mes' => 'Junio',
						'dia' => 'Domingo',
						'dcode' => '2016-06'
						)					
					 );

	return cchl_tablaprogramaferia($pagsfilij2016, $info['titulo']);
}

add_shortcode( 'programa_filij_2016', 'filij2016_programashortcode' );

function cchl_colaboradores_fields( $section_title, $field_group ) {

	global $post;

	$field_group = get_post_meta($post->ID, $field_group, true);
	$fieldcount = count(get_post_meta($post->ID, $colab_logo, false));

	$output = '';
               
    if($field_group):

    	$output .= '<h3 class="colabheading">' . $section_title . '</h3>';

    	if($fieldcount > 1) {

    			$output .= '<ul class="colabs">';

    	} else {

    			$output .= '<ul class="colabs invs">';

    	}

    	foreach($fieldgroup as $fielditem) {

    		$output .= '<li>';
    		$output .= '<img src="' . cchl_legacy_image($fielditem['image']) . '">';
    		$output .= '<h3>' . $fielditem['nombre'] . '</h3>';

    		if($fielditem['url']):

    			$output .= '<a target="_blank" href="'.$fielditem['url'].'"><i class="fa fa-external-link"></i></a>';

    		endif;

    		$output .= '</li>';

    	}

    	$output .= '</ul>';

    endif;

    return $output;

}

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

function cchl_bsferiaredirect($original_template) {
	global $post;
	$using_bsferiatemplate= cchl_get_topmost_parent_template($post->ID, 'bs-plantilla-feria.php');

	if($using_bsferiatemplate) {
		return  get_template_directory() .  '/bs-plantilla-feria.php';
	} else {
		return $original_template;
		}
}

function cchl_current_fields_id($template_to_look) {
	//devuelve el ID de la página donde se almacenan los datos de la plantilla personalizada para una feria
	global $post;
	$usable_id = (get_page_template_slug($post->ID) == $template_to_look)? $post->ID : cchl_get_topmost_parent_template($post->ID, $template_to_look);
	return $usable_id;
	
}

add_action('template_include', 'cchl_bsferiaredirect');

function checkfilsa($postid = NULL) {
  global $post;

	if($postid) {
		$pid = $postid;
	} else {
		$pid = $post->ID;
	}

  $ancestors = get_post_ancestors($pid);
  $param = isset($_GET['ref']) ? $_GET['ref'] : '';
   if(
      //condition 1
      $pid == 31817 ||
      //condition 2
      in_array(31817, $ancestors) ||
      //condition 3
      (is_single($pid) && in_category(129, $pid) ||
      $param == 'filsa2014')
      //condition 4
      //is_singular( ) && is_object_in_term( $pid, 'tribe_events_cat', 128 ) 
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

function checkferia($postid = NULL, $motherpage, $cats = NULL, $evterms = NULL ) {
  global $post, $wp_query;
  
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

    if(is_category($arrcats, $pid) || is_single() && in_category($arrcats, $pid) ) {
      $inferia = true;
    }

    if($evterms) {
      $event_id = get_queried_object_id();
      if( is_single() && tribe_event_in_category( $evterms, $event_id ) ) {
        $inferia = true;
      }
    }
  }

  return $inferia;
}


function checkferiatemplate($postid) {
  
  /**
   * chequea si un pariente está usando la plantilla de temas personalizados para ferias y devuelve el ID de la Feria
   */
  
  $ancestors = get_post_ancestors( $postid );
  $using_feria_template = false;
  $feriaid = null;
  if($ancestors) {
  foreach($ancestors as $ancestor):
    if(get_page_template_slug( $ancestor ) == 'page-feria-principal.php' || get_page_template_slug( $ancestor ) == 'page-filsa2016.php' ):

      $feriaid = $ancestor;

    endif;
  endforeach;
  }

  if( get_page_template_slug( $postid ) == 'page-feria-principal.php' || 
      get_page_template_slug( $postid ) == 'page-filsa2016.php' ):

    $using_feria_template = true;
    $feriaid = $postid;

  endif;

  //añadidos chungos para categorías de ferias específicas
  
  if(is_single($postid) && in_category( CCHL_FLPA2016, $postid )):

    $using_feria_template = true;
    $feriaid = CCHL_PAGEFLPA2016;

  endif;

  if(is_single($postid) && in_category( CCHL_FILIJ2016, $postid)):

    $using_feria_template = true;
    $feriaid = CCHL_PAGEFILIJ2016;

  endif;

  return $feriaid;
}

function cchl_header($postid) {
	//Cambiador de headers para distintas situaciones
	$isfilsa = checkfilsa($postid);
	$isfilij = checkfilij($postid);
	$template = 'parts/header-standard-new-interior';
	$using_feria_template = checkferiatemplate($postid);
	
	//Categorías extra para page-ferias
	$feriasmultimediacats = array( CCHL_FLPA2016, CCHL_FILIJ2016 );
	if( $isfilsa ):
		//get_template_part('parts/header', 'filsa-2014' );
		$template = 'parts/header-filsa-2014';
	elseif( $isfilij ):
		//get_template_part('parts/header', 'filij-2014' );
		$template = 'parts/header-filij-2014';	
	elseif( checkferia($post->ID, 53771) ):
		//get_template_part('parts/header', 'fil' );
		$template = 'parts/header-fil';
	elseif( checkferia($post->ID, CCHL_FILSA2015, '', 180) ):
		//get_template_part('parts/header', 'filsa-2015' );
		$template = 'parts/header-filsa-2015';
	elseif( checkferia($post->ID, CCHL_FILSA2016, '', 'filsa-2016') ):
  		//get_template_part('parts/header', 'filsa-2016');
		$template = 'parts/header-filsa-2016';
	elseif( checkferia($post->ID, CCHL_FILVINA2016) ):
		//get_template_part('parts/header', 'filvina-2016');
		$template = 'parts/header-filvina-2016';
	elseif( checkferia($post->ID, CCHL_FILVINA2017, '') ):
		//get_template_part('parts/header', 'filvina-2017');  
		$template = 'parts/header-filvina-2017';
	elseif( is_page_template('page-feria-principal.php') || $using_feria_template ):
		//get_template_part('parts/header', 'feria');
		$template = 'parts/header-feria';
	else:
  		if(is_home() ||
			is_single() ||
			is_category() ||
			is_post_type_archive() || 
			get_page_template_slug($post->ID) == 'bs-archivo-ferias.php' ||
			get_page_template_slug($post->ID) == 'bs-home-socios.php' ||
			get_page_template_slug($post->ID) == 'bs-default-page.php'
			):
		  	//get_template_part('parts/bs-home/bs-header');
		  	$template = 'parts/bs-general/bs-header';
  	else:
    	//get_template_part('parts/header-standard-new-interior');
			$template = 'parts/bs-general/bs-header';
		endif;
  endif;

	return $template;

}

function cchl_oldcondition($postid) {
	$isfilsa = checkfilsa($postid);
	$isfilij = checkfilij($postid);
	$using_feria_template = checkferiatemplate($postid);
	$feriasmultimediacats = array( CCHL_FLPA2016, CCHL_FILIJ2016 );
	
	if( 	$isfilsa ||
				$isfilij ||
				checkferia($post->ID, 53771) ||
				checkferia($post->ID, CCHL_FILSA2015, '', 180) ||
				checkferia($post->ID, CCHL_FILVINA2016) ||
			 	checkferia($post->ID, CCHL_FILSA2016, '', 'filsa-2016') ||
				checkferia($post->ID, CCHL_FILVINA2017, '') ||
				is_page_template('page-feria-principal.php') || 
				$using_feria_template //||
				//is_single() && in_category( $feriasmultimediacats, $post->ID )
				)
				{
					return true;
				} else {
					return false;
				}
}

function cchl_isoldfilsa( $postid ) {
	$ancestors = get_post_ancestors( $postid );
	if($postid == CCHL_FILSA2013 ||
		 $postid == CCHL_FILSA2012 ||
		 in_array( CCHL_FILSA2013, $ancestors) ||
		 in_array( CCHL_FILSA2012, $ancestors)
		 ) {
			return true;
		}	else {
			return false;
		}
}

function cchl_loadoldpage( $template ) {
	global $post;
	$isoldpage = cchl_oldcondition($post->ID);
	$isoldfilsa = cchl_isoldfilsa($post->ID);
	if($isoldpage) {
		$default_template = locate_template( array( 'page-feria-anterior.php') );
		if('' != $default_template) {
			return $default_template;
		}
	}
	if($isoldfilsa) {
		$default_template = locate_template( array( 'bs-archivo-ferias.php') );
			if('' != $default_template) {
				return $default_template;
			}
	}
	return $template;
}

add_filter('template_include', 'cchl_loadoldpage', 99);

function cchl_oldtemplates() {
	global $post;
	if(cchl_isoldfilsa($post->ID)) {
	if(is_page_template('page-observatorio-integrantes.php') || is_page_template('old/page-observatorio-integrantes.php')):
			?>
			 <div class="listado">
        	
            <?php
            $miembros = get_post_meta($post->ID, '_cchl_listadopersonas', true);
            foreach($miembros as $miembro){ 
				?>	
				<div class="row">
					<div class="col-md-3">
						<img src="<?php echo cchl_legacy_image($miembro['imagen']);?>" alt="<?php echo $miembro['nombre'];?>">
					</div>
					<div class="info col-md-8">
						<h3><?php $miembro['nombre'];?></h3>
						<span><?php echo $miembro['cargo'];?></span>
						<div class="textoint"><?php echo apply_filters('the_content', $miembro['texto']);?></div>
					</div>
				</div>
			<?php };?>
            </div>
			<?php
			endif;
		if(is_page_template('page-ferias-informacion-auspiciadores.php') || is_page_template('old/page-ferias-informacion-auspiciadores.php')):?>

		<div class="logos">
            <?php
            $miembros = get_post_meta($post->ID, '_cchl_auspicia', true);
            foreach($miembros as $miembro){
				echo "<div class='auspiciador'>";
   				echo cchl_legacy_image($miembro['imagen']);
				echo "<div class='info'>
				<h3>".$miembro['nombre']."</h3>
			
				<p>".$miembro['texto']."</p>
				</div>
				</div>";
			}
            ?>
            </ul>

		<?php 
		endif;

		if(is_page_template('colaboradores-fil-2016.php') || is_page_template('old/colaboradores-fil-2016.php')):
			get_template_part('parts/bs-blocks/rev-colaboradores-fil-2016');
		endif;


			}
		}

add_action('cchl_aftercontent', 'cchl_oldtemplates');