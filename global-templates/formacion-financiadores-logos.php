<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$img_ids = get_field( 'formacion_logos_financiadores' );

if ( !$img_ids ) return false;
?>

<div class="financiadores mw-300 mx-md-auto">

	<?php echo wpautop( __( 'Financiación:', 'smn' ) ); ?>

	<div class="franja-logos franja-logos-financiadores">

		<?php foreach ( $img_ids as $img_id ) {
			echo wp_get_attachment_image( $img_id, 'medium' );
		} ?>

	</div>

</div>

