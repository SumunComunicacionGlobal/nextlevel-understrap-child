<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$btn_inscripcion = smn_get_boton_inscripcion_formacion();
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php get_template_part( 'global-templates/formacion-header-logos' ); ?>

	<?php smn_breadcrumb(); ?>

	<div class="pt-3 row">

		<div class="col-md-6">

			<header class="entry-header">

				<?php the_title( '<h1 class="entry-title mb-3">', '</h1>' ); ?>

			</header><!-- .entry-header -->

		</div>

		<div class="col-md-6">

			<?php get_template_part( 'global-templates/formacion-financiadores-logos' ); ?>
		
		</div>

	</div>

	<?php if ( $btn_inscripcion ) { ?>

		<div class="alignfull sticky-top sticky-inscripcion">

			<div class="container">

				<?php echo $btn_inscripcion; ?>

			</div>

		</div>

	<?php } ?>

	<div class="entry-content">

		<div class="wrapper alignfull bg-light">

			<div class="container">

				<div class="row">

					<div class="col-md-6 col-lg-7">

						<div class="pr-xl-3">

							<div class="formacion-excerpt h4 mb-3">

								<?php echo wpautop( $post->post_excerpt ); ?>

							</div>

							<?php smn_datos_formacion(); ?>

						</div>

					</div>

					<div class="col-md-6 col-lg-5">

						<?php if ( $btn_inscripcion ) {
							smn_reusable_block( 327 ); 
						} else {
							smn_reusable_block( 238 ); 
						} ?>

					</div>

				</div>

			</div>

		</div>

		<div class="wrapper">

			<?php
			the_content();
			understrap_link_pages();
			?>

		</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
