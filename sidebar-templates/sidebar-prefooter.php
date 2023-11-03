<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$ocultar_prefooter = false;
$ocultar_prefooter_orientacion = false;

if ( is_singular() ) {
	$ocultar_prefooter = get_post_meta( get_the_ID(), 'ocultar_prefooter', true );
	$ocultar_prefooter_orientacion = get_post_meta( get_the_ID(), 'ocultar_prefooter_orientacion', true );
}

// if ( $ocultar_prefooter ) return false;

if( !$ocultar_prefooter_orientacion && !is_single() && is_active_sidebar( 'prefooter-orientacion' ) ) : ?>

	<div id="wrapper-prefooter-orientacion">

		<div class="<?php echo esc_attr( $container ); ?>" id="prefooter-content-orientacion" tabindex="-1">

			<?php dynamic_sidebar( 'prefooter-orientacion' ); ?>

		</div>

	</div><!-- #wrapper-prefooter -->

	<?php

endif;

if ( is_front_page() && is_active_sidebar( 'prefooter-blog' ) ) : ?>

	<div id="wrapper-prefooter-blog">

		<div class="<?php echo esc_attr( $container ); ?>" id="prefooter-content-blog" tabindex="-1">

			<?php dynamic_sidebar( 'prefooter-blog' ); ?>

		</div>

	</div><!-- #wrapper-prefooter -->

	<?php

endif;

if ( !is_single() && is_active_sidebar( 'prefooter-catalogo' ) ) : ?>

	<div id="wrapper-prefooter-catalogo">

		<div class="<?php echo esc_attr( $container ); ?>" id="prefooter-content-catalogo" tabindex="-1">

			<?php dynamic_sidebar( 'prefooter-catalogo' ); ?>

		</div>

	</div><!-- #wrapper-prefooter -->

	<?php

endif;


if ( !is_single() && !$ocultar_prefooter && is_active_sidebar( 'prefooter' ) ) : ?>

	<div id="wrapper-prefooter">

		<div class="<?php echo esc_attr( $container ); ?>" id="prefooter-content" tabindex="-1">

			<?php dynamic_sidebar( 'prefooter' ); ?>

		</div>

	</div><!-- #wrapper-prefooter -->

	<?php

endif;
