<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$cargo = get_post_meta( get_the_ID(), 'team_cargo', true );
$linkedin = get_post_meta( get_the_ID(), 'team_linkedin', true );
?>

<article <?php post_class('my-3'); ?> id="post-<?php the_ID(); ?>">

	<div class="row align-items-center align-items-lg-start">

		<div class="col-sm-6 col-lg-3 mb-2">

			<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'class' => 'rounded-circle' ) ); ?>

		</div>

		<header class="col-sm-6 col-lg-3 mb-2 entry-header">

			<?php the_title( '<p class="entry-title h4">', '</p>' ); ?>

			<?php if ( $cargo ) {

				echo '<p class="cargo">'.$cargo.'</p>';

			} ?>

			<?php if ( $linkedin ) {

			echo '<p class="redes-sociales"><a href="'.$linkedin.'" target="_blank" rel="noopener noreferrer">'.smn_get_linkedin_icon().'</a></p>';

			} ?>

		</header><!-- .entry-header -->

		<div class="entry-content col-lg-6 mb-2">

			<?php the_content(); ?>

			<?php understrap_entry_footer(); ?>

		</div><!-- .entry-content -->

	</div>

</article><!-- #post-## -->
