<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function understrap_posted_on() {

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
    }
    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );
    echo $time_string; // WPCS: XSS OK.

}



/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function understrap_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'understrap' ) );
		if ( $categories_list && understrap_categorized_blog() ) {
			/* translators: %s: Categories of current post */
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %s', 'understrap' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'understrap' ) );
		if ( $tags_list ) {
			/* translators: %s: Tags of current post */
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %s', 'understrap' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
	// if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
	// 	echo '<span class="comments-link">';
	// 	comments_popup_link( esc_html__( 'Leave a comment', 'understrap' ), esc_html__( '1 Comment', 'understrap' ), esc_html__( '% Comments', 'understrap' ) );
	// 	echo '</span>';
	// }
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'understrap' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}

function smn_breadcrumb() {

	if ( is_front_page() ) return false;

	if(function_exists('bcn_display')) {
		echo '<div class="breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">';
			echo '<div class="breadcrumb-inner">';
				bcn_display();
			echo '</div>';
		echo '</div>';
	} elseif ( function_exists( 'rank_math_the_breadcrumbs') ) {
		echo '<div class="breadcrumb">';
			echo '<div class="breadcrumb-inner">';
				rank_math_the_breadcrumbs(); 
			echo '</div>';
		echo '</div>';
		} elseif ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumb"><div class="breadcrumb-inner">','</div></div>' );
	  }

}

function smn_datos_resumen_formacion( $show_label = false ) {
	$r = smn_get_datos_resumen_formacion( $show_label );
	if ( $r ) echo '<div class="datos-formacion d-flex justify-content-between">' . $r . '</div>';
}

function smn_get_datos_resumen_formacion( $show_label = false ) {

	if ( 'formacion' != get_post_type() ) return false;

    $r = '';

	$ciudad = strip_tags( get_the_term_list( get_the_ID(), 'ciudad', '', ' · ', '' ));
	if ( $ciudad ) {
		$r .= '<div class="ficha-field">';
			if ( $show_label ) $r .= '<div class="ficha-field-label d-flex"><span class="ficha-field-icon"></span><span>' . __( 'Ciudad', 'smn' ) . '</span></div>';
			$r .= '<div class="ficha-field-value">' . $ciudad . '</div>';
		$r .= '</div>';

	}

	// $fields = get_field_objects();
	$fields = acf_get_fields(15);

    if ( $fields ) {

		foreach ( $fields as $field_object ) {

			$value = get_field( $field_object['name'] );

			$append = '';
			if ( isset( $field_object['append'] ) ) $append = $field_object['append'];

			$class = '';
			if ( isset( $field_object['wrapper']['class'] ) ) $class = $field_object['wrapper']['class'];
			
			if ( $value ) {

				$r .= '<div class="ficha-field">';
					if ( $show_label ) $r .= '<div class="ficha-field-label"><span class="ficha-field-icon ' . $class . '"></span><span>' . $field_object['label'] . '</span></div>';
					$r .= '<div class="ficha-field-value">' . $value . $append . '</div>';
				$r .= '</div>';

			}

		}

		return $r;
    
    }

    return $r;
}

function smn_datos_formacion() {
	$r = smn_get_datos_formacion();
	if ( $r ) echo '<div class="wrapper datos-formacion">'.$r.'</div>';
}

function smn_get_datos_formacion() {

	if ( 'formacion' != get_post_type() ) return false;

    $r = '';

	$r .= '<div class="row">';

		$r .= '<div class="col-lg-6 mb-3">';

			$r .= '<p class="h4">' . __( 'Datos del curso', 'smn' ) . '</p>';

			$r .= smn_get_datos_resumen_formacion( true );

			$r .= smn_render_text_area_fields( get_field('formacion_datos_curso') );

		$r .= '</div>';

		$r .= '<div class="col-lg-6 mb-3">';

			$r .= '<p class="h4">' . __( 'Datos del centro', 'smn' ) . '</p>';

			$r .= smn_render_text_area_fields( get_field('formacion_datos_centro') );

		$r .= '</div>';

	$r .= '</div>';

    return $r;
}

function smn_render_text_area_fields( $text ) {
	
	$r = '';

	$text = trim( $text, PHP_EOL );
	$lines = explode( PHP_EOL, $text );

	foreach( $lines as $l ) {
		$pair = explode(':', $l);

		$r .= '<div class="ficha-field">';
			if ( isset($pair[0]) ) $r .= '<div class="ficha-field-label"><span class="ficha-field-icon"></span><span>' . $pair[0] . '</span></div>';
			if ( isset($pair[1]) ) $r .= '<div class="ficha-field-value">' . $pair[1] . '</div>';
		$r .= '</div>';

	}
	return $r;
}
function smn_get_boton_inscripcion_formacion() {
    $url = get_post_meta( get_the_ID(), 'url', true );
    if ( $url ) {
        $r = '<p><a class="btn btn-lg btn-primary" href="'.$url.'" target="_blank" rel="noopener noreferrer nofollow">'.__( 'Quiero inscribirme', 'smn' ).'</a></p>';
        return $r;
    }

	return false;
}

function smn_boton_inscripcion_formacion() {
    echo smn_get_boton_inscripcion_formacion();
}

function smn_get_rating() {

	$value = get_post_meta( get_the_ID(), 'valoracion', true );

	if ( $value > 0 ) {

		$r = '';

		$int = floor($value);

		for ($i=0; $i < $int; $i++) { 
			$r .= '<i class="star filled-star"></i>';
		}

		if ( $value - $int > 0 ) {
			$r .= '<i class="star half-star"></i>';
		}

		for ( $i=ceil($value); $i < 5; $i++ ) {
			$r .= '<i class="star"></i>';
		}

		return '<p class="rating">' . $r . '</p>';

	}

	return false;
}

function smn_get_linkedin_icon() {
	return '<svg style="width: 3rem; height: 3rem;" width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M19.7,3H4.3C3.582,3,3,3.582,3,4.3v15.4C3,20.418,3.582,21,4.3,21h15.4c0.718,0,1.3-0.582,1.3-1.3V4.3 C21,3.582,20.418,3,19.7,3z M8.339,18.338H5.667v-8.59h2.672V18.338z M7.004,8.574c-0.857,0-1.549-0.694-1.549-1.548 c0-0.855,0.691-1.548,1.549-1.548c0.854,0,1.547,0.694,1.547,1.548C8.551,7.881,7.858,8.574,7.004,8.574z M18.339,18.338h-2.669 v-4.177c0-0.996-0.017-2.278-1.387-2.278c-1.389,0-1.601,1.086-1.601,2.206v4.249h-2.667v-8.59h2.559v1.174h0.037 c0.356-0.675,1.227-1.387,2.526-1.387c2.703,0,3.203,1.779,3.203,4.092V18.338z"></path></svg>';
}