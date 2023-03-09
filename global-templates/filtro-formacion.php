<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<p class="h4 mt-3"><?php echo __( 'Selector de cursos', 'smn' ); ?></p>

<nav class="filter-navbar navbar navbar-expand-lg justify-content-center navbar-light mb-2 p-0">

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#filter-navbar-collapse" aria-controls="filter-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-label mr-1"><?php echo __( 'Filtrar', 'smn' ); ?></span> <span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="filter-navbar-collapse">

		<div class="nav navbar-nav">

			<?php 
				echo facetwp_display( 'facet', 'buscador' ); 
				if ( !is_tax() ) echo facetwp_display( 'facet', 'categorias_cursos' ); 
				echo facetwp_display( 'facet', 'target' ); 
				echo facetwp_display( 'facet', 'ciudad' ); 
				// echo facetwp_display( 'facet', 'tipo' ); 
				echo facetwp_display( 'facet', 'modalidad' ); 
			?>

		
		</div>

	</div>

</nav>

<!-- <a href="javascript:;" class="facetwp-flyout-open btn btn-outline-primary d-lg-none"><?php echo __( 'Filtrar', 'smn' ); ?></a> -->

<?php echo facetwp_display( 'facet', 'limpiar_filtro' ); ?>

<div class="collapse" id="search-form">

	<div class="pb-2">

		<?php get_search_form(); ?>

	</div>

</div>

<?php echo facetwp_display( 'facet', 'contador' ); ?>