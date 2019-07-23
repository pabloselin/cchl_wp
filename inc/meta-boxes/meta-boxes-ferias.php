<?php
//Boxes para Ferias y cabeceras especiales

function cchl_bsferiaboxes() {
    global $post;
    $prefix = 'cchl_';
    $menuoptions = cchl_showselectmenus();
    $eventoptions = cchl_eventspage($post->ID);
    

    $taxvalues = get_terms(array(
      'taxonomy' => 'ferias'
      )
    );
    $terms = [];
    foreach($taxvalues as $taxvalue):
        $terms[$taxvalue->slug] = $taxvalue->name;
    endforeach;

    $taxtipos = get_terms(array(
      'taxonomy' => 'cchl_tipoevento'
      )
    );
    $cchl_tipoevento = [];
    foreach($taxtipos as $taxtipo):
        $cchl_tipoevento[$taxtipo->slug] = $taxtipo->name;
    endforeach;

    $feriabox = new_cmb2_box(
        array(
            'id' => $prefix . 'infoferia',
            'title' => 'Información de la Feria',
            'object_types' => array('page'),
            'show_on' => array('key' => 'page-template', 'value' => array('templates/bs-plantilla-feria.php', 'templates/bs-nueva-plantilla-feria.php'))
        )
    );

    $feriabox->add_field(
        array(
            'name' => 'Imagen Cabecera Escritorio',
            'desc' => '.jpg o .png de 1170x313px',
            'id' => $prefix . 'bsferiaheader_lg',
            'type' => 'file'
        )
    );

    $feriabox->add_field(
        array(
            'name' => 'Imagen Cabecera Móvil',
            'desc' => '.jpg o .png de 720x222px',
            'id' => $prefix . 'bsferiaheader_sm',
            'type' => 'file'
        )
    );

    $feriabox->add_field(
        array(
            'name' => 'Menu de la Feria',
            'desc' => 'El menú que se muestra para esta feria',
            'id' => $prefix . 'bsmenuferia',
            'type' => 'select',
            'show_option_none' => 'Escoja un menú',
            'options' => $menuoptions
        )
    );

    $feriabox->add_field(
        array(
            'name' => 'Página de Eventos',
            'desc' => 'La página superior donde se encuentran los eventos de esta feria (tiene que ser a su vez subpágina de esta)',
            'id' => $prefix . 'bspageevents_unitary',
            'type' => 'select',
            'show_option_none' => 'Escoja una página',
            'options' => $eventoptions
        )
    );

    $feriabox->add_field(
        array(
            'name' => 'Página de Visitas Guiadas para colegios',
            'desc' => 'La página superior donde se encuentran las visitas guiadas para colegios)',
            'id' => $prefix . 'bsvgevents',
            'type' => 'select',
            'show_option_none' => 'Escoja una página',
            'options' => $eventoptions
        )
    );

        
    $feriabox->add_field(
        array(
          'name' => 'Página de Noticias',
          'desc' => 'La página donde se encuentran las noticias de esta feria (tiene que ser subpágina de esta)',
          'id'   => $prefix . 'bspagenews',
          'type' => 'select',
          'show_option_none' => 'Escoja una página',
          'options' => $eventoptions
          )
        );

    $feriabox->add_field(
        array(
            'name' => 'Página de colaboradores',
            'desc' => 'La página donde se encuentran los colaboradores',
            'id' => $prefix . 'bspagecolabs',
            'type' => 'select',
            'show_option_none' => 'Escoja una página',
            'options' => $eventoptions
        )
    );
    
    $feriabox->add_field(
        array(
            'name' => 'Página de expositores',
            'desc' => 'La página donde se encuentran los expositores',
            'id' => $prefix . 'bspageexpositores',
            'type' => 'select',
            'show_option_none' => 'Escoja una página',
            'options' => $eventoptions
        )
    );

    $feriabox->add_field(
        array(
          'name' => 'Fecha inicio Feria',
          'desc' => 'Día de inicio de la Feria (para eventos)',
          'id' => $prefix . 'bsinicioferia',
          'type' => 'text_date'
        )
    );

    $feriabox->add_field(
        array(
           'name' => 'Fecha fin Feria',
           'desc' => 'Día finalización de la Feria (para eventos)',
           'id' => $prefix . 'bsfinferia',
           'type' => 'text_date'
          )
    );

    $feriabox->add_field(
      array(
          'name' => 'Clase CSS para la feria',
          'desc' => 'Clase que se usará para diferenciar estilos en la Feria',
          'id' => $prefix . 'bsclass',
          'type' => 'text'
      )
    );

    $feriabox->add_field(
      array(
          'name' => 'Enlace para inscripciones de visitas de colegios',
          'desc' => 'URL',
          'id' => $prefix . 'bsvgurl',
          'type' => 'text_url'
      )
    );

    $feriabox->add_field( array(
          'name'           => 'Taxonomía Feria',
          'desc'           => 'Término de taxonomía para eventos, noticias, etc.',
          'id'             => $prefix . 'bstax',
          'type'           => 'select',
          'options'        => $terms
        )
      );

    $feriabox->add_field( array(
          'name'           => 'Taxonomía Visitas Guiadas',
          'desc'           => 'Término de taxonomía para visitas guiadas de colegios.',
          'id'             => $prefix . 'vgtax',
          'type'           => 'select',
          'options'        => $cchl_tipoevento
        )
      );

}

add_action('cmb2_admin_init', 'cchl_bsferiaboxes');

function cchl_organizer_boxes() {
    
    $prefix = 'cchl_';
    $orgbox = new_cmb2_box(
        array(
            'id' => $prefix . 'infoorgferia',
            'title' => 'Información del expositor',
            'object_types' => array('tribe_organizer'),
            'show_on_cb' => 'be_taxonomy_show_on_filter',
            'show_on_terms' => array(
              'ferias' => 'fil-vina-2018'
            )
        )
    );

    $orgbox->add_field(
        array(
            'name' => 'Ubicación',
            'desc' => 'Ubicación del expositor',
            'id' => $prefix . 'location',
            'type' => 'text'
        )
    );


}

add_action('cmb2_admin_init', 'cchl_organizer_boxes');

/**
 *  * Taxonomy show_on filter
 *   * @author Bill Erickson
 *    * @param  object $cmb CMB2 object
 *     * @return bool        True/false whether to show the metabox
 *      */
function cchl_be_taxonomy_show_on_filter( $cmb ) {
  $tax_terms_to_show_on = $cmb->prop( 'show_on_terms', array() );
  if ( empty( $tax_terms_to_show_on ) || ! $cmb->object_id() ) {
    return false;
  }

  $post_id = $cmb->object_id();
  $post = get_post( $post_id );

  foreach( (array) $tax_terms_to_show_on as $taxonomy => $slugs ) {
    if ( ! is_array( $slugs ) ) {
      $slugs = array( $slugs );
    }

    $terms = $post
      ? get_the_terms( $post, $taxonomy )
      : wp_get_object_terms( $post_id, $taxonomy );

    if ( ! empty( $terms ) ) {
      foreach( $terms as $term ) {
        if ( in_array( $term->slug, $slugs, true ) ) {
          wp_die( '<xmp>: '. print_r( 'show it', true ) .'</xmp>' );
          // Ok, show this metabox
          return true;
        }
      }
    }
  }

  return false;
}


