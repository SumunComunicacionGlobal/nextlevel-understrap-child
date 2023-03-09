<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<hr>

<section class="no-results not-found my-3">

	<div class="row">

		<div class="col-md-6">

			<header class="page-header">

				<h1 class="page-title mb-1"><?php esc_html_e( 'No hay contenido ahora mismo', 'smn' ); ?></h1>

			</header><!-- .page-header -->

		</div>

		<div class="col-md-6">

			<div class="page-content">

				<?php
				if ( is_home() && current_user_can( 'publish_posts' ) ) :

					$kses = array( 'a' => array( 'href' => array() ) );
					printf(
						/* translators: 1: Link to WP admin new post page. */
						'<p>' . wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'understrap' ), $kses ) . '</p>',
						esc_url( admin_url( 'post-new.php' ) )
					);

				elseif ( is_search() ) :

					printf(
						'<p>%s<p>',
						esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'understrap' )
					);
					get_search_form();

				else :

					printf(
						'<p>%s<p>',
						esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'understrap' )
					);
					get_search_form();

				endif;
				?>
			</div><!-- .page-content -->

		</div>

	</div>

</section><!-- .no-results -->
