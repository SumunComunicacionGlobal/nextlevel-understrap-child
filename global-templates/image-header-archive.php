<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$image_id = get_term_meta( get_queried_object_id(), 'thumbnail_id', true );

?>

<header class="wp-block-cover is-style-image-header">

	<span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-100 has-background-dim"></span>

</header>

<?php if ( $image_id ) { ?>

	<div class="container">

		<?php echo wp_get_attachment_image( $image_id, 'large', false, array('class' => 'image-header-archive') ); ?>

		<?php smn_breadcrumb(); ?>

	</div>

<?php } ?>
