<?php

function cchl_showselectmenus() {
    $menus = get_terms( 
                array(
                    'taxonomy' => 'nav_menu'
            ) 
    );

    $menuoptions = array();

    if($menus) {
        foreach($menus as $menu) {
            $menuoptions[$menu->term_id] = $menu->name;
        }

        return $menuoptions;
    }

    
}



function cchl_eventspage($postid) {
    $eventpages = get_children(
        array(
            'post_parent' => $_GET['post'],
            'numberposts' => 10,
            'post_type' => 'page',
            'post_status' => 'publish'
        )
    );

    $eventoptions = array();

    if($eventpages) {
        foreach($eventpages as $eventpage) {
            $eventoptions[$eventpage->ID] = $eventpage->post_title;
        }

        return $eventoptions;
    }
}

include( TEMPLATEPATH . '/inc/meta-boxes/meta-boxes-ferias.php');
include( TEMPLATEPATH . '/inc/meta-boxes/meta-boxes-colaboradores.php');
include( TEMPLATEPATH . '/inc/meta-boxes/meta-boxes-listado.php');
include( TEMPLATEPATH . '/inc/meta-boxes/meta-boxes-custom-page.php');
include( TEMPLATEPATH . '/inc/meta-boxes/meta-boxes-invitados.php');
include( TEMPLATEPATH . '/inc/meta-boxes/meta-boxes-desplegable.php');
include( TEMPLATEPATH . '/inc/meta-boxes/meta-boxes-links.php');
include( TEMPLATEPATH . '/inc/meta-boxes/meta-boxes-organizador.php');
include( TEMPLATEPATH . '/inc/meta-boxes/meta-boxes-documentos.php');

/**
 * Metabox for Page Slug
 * @author Tom Morton
 * @link https://github.com/WebDevStudios/CMB2/wiki/Adding-your-own-show_on-filters
 *
 * @param bool $display
 * @param array $meta_box
 * @return bool display metabox
 */
function be_metabox_show_on_slug( $display, $meta_box ) {
	if ( ! isset( $meta_box['show_on']['key'], $meta_box['show_on']['value'] ) ) {
		return $display;
	}

	if ( 'slug' !== $meta_box['show_on']['key'] ) {
		return $display;
	}

	$post_id = 0;

	// If we're showing it based on ID, get the current ID
	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	} elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}

	if ( ! $post_id ) {
		return $display;
	}

	$slug = get_post( $post_id )->post_name;
	// See if there's a match
	return in_array( $slug, (array) $meta_box['show_on']['value']);
}
add_filter( 'cmb2_show_on', 'be_metabox_show_on_slug', 10, 2 );

/**
 * Taxonomy show_on filter
 * @author Bill Erickson
 * @link https://github.com/CMB2/CMB2/wiki/Adding-your-own-show_on-filters
 *
 * @param bool $display
 * @param array $metabox
 * @return bool display metabox
 */
function be_taxonomy_show_on_filter( $display, $meta_box ) {
	if ( ! isset( $meta_box['show_on']['key'], $meta_box['show_on']['value'] ) ) {
		return $display;
	}

	if ( 'taxonomy' !== $meta_box['show_on']['key'] ) {
		return $display;
	}

	$post_id = 0;

	// If we're showing it based on ID, get the current ID
	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	} elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}

	if ( ! $post_id ) {
		return $display;
	}

	foreach( (array) $meta_box['show_on']['value'] as $taxonomy => $slugs ) {
		if ( ! is_array( $slugs ) ) {
			$slugs = array( $slugs );
		}

		$display = false;
		$terms = wp_get_object_terms( $post_id, $taxonomy );
		foreach( $terms as $term ) {
			if ( in_array( $term->slug, $slugs ) ) {
				$display = true;
				break;
			}
		}

		if ( $display ) {
			break;
		}
	}

	return $display;
}
add_filter( 'cmb2_show_on', 'be_taxonomy_show_on_filter', 10, 2 );
