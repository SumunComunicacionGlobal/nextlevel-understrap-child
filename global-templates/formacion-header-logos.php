<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$img_ids = get_field( 'formacion_logos_cabecera' );

if ( !$img_ids ) return false;
?>

<div class="wrapper alignfull franja-logos franja-logos-cabecera has-yellow-background-color">

	<div class="container">

		<div class="d-flex justify-content-between align-items-center flex-wrap">

			<?php foreach ( $img_ids as $img_id ) {
				echo wp_get_attachment_image( $img_id, 'medium' );
			} ?>
	
		</div>

	</div>

</div>
