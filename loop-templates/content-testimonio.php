<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php echo smn_get_rating(); ?>

	<div class="entry-content">

		<?php the_content(); ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php the_title( '<p class="entry-title h4">', '</p>' ); ?>

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
