<?php 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_post_type_support( 'page', 'excerpt' );
// add_action( 'init', 'smn_settings', 1000 );
// function smn_settings() {  
    // register_taxonomy_for_object_type('category', 'page');  
// }


if ( ! function_exists('custom_post_type_slide') ) {

// Register Custom Post Type
function custom_post_type_slide() {

	$labels = array(
		'name'                  => _x( 'Slides', 'Post Type General Name', 'smn' ),
		'singular_name'         => _x( 'Slide', 'Post Type Singular Name', 'smn' ),
		'menu_name'             => __( 'Slides', 'smn-admin' ),
		'name_admin_bar'        => __( 'Slides', 'smn-admin' ),
		'add_new'               => __( 'Añadir nueva Slide', 'smn-admin' ),
		'new_item'              => __( 'Nueva Slide', 'smn-admin' ),
		'edit_item'             => __( 'Editar Slide', 'smn-admin' ),
		'update_item'           => __( 'Actualizar Slide', 'smn-admin' ),
		'view_item'             => __( 'Ver Slide', 'smn-admin' ),
		'view_items'            => __( 'Ver Slide', 'smn-admin' ),
	);
	$args = array(
		'label'                 => __( 'Slides', 'smn' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'page-attributes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 3,
		'menu_icon'             => 'dashicons-slides',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest' 			=> true,
		'taxonomies'			=> array(),
	);
	register_post_type( 'slide', $args );

}
// add_action( 'init', 'custom_post_type_slide', 0 );

}

if ( ! function_exists('custom_post_type_testimonio') ) {

	// Register Custom Post Type
	function custom_post_type_testimonio() {
	
		$labels = array(
			'name'                  => _x( 'Testimonios', 'Post Type General Name', 'smn' ),
			'singular_name'         => _x( 'Testimonio', 'Post Type Singular Name', 'smn' ),
			'menu_name'             => __( 'Testimonios', 'smn-admin' ),
			'name_admin_bar'        => __( 'Testimonio', 'smn-admin' ),
			'add_new'               => __( 'Añadir nuevo Testimonio', 'smn-admin' ),
			'new_item'              => __( 'Nuevo Testimonio', 'smn-admin' ),
			'edit_item'             => __( 'Editar Testimonio', 'smn-admin' ),
			'update_item'           => __( 'Actualizar Testimonio', 'smn-admin' ),
			'view_item'             => __( 'Ver Testimonio', 'smn-admin' ),
			'view_items'            => __( 'Ver Testimonios', 'smn-admin' ),
			'featured_image'		=> __( 'Foto de perfil', 'smn-admin' ),
			'set_featured_image'	=> __( 'Establecer Foto de perfil', 'smn-admin' ),
			'remove_featured_image'	=> __( 'Quitar Foto de perfil', 'smn-admin' ),
			'use_featured_image'	=> __( 'Usar como Foto de perfil', 'smn-admin' ),
		);
		$args = array(
			'label'                 => __( 'Testimonios', 'smn' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 23,
			'menu_icon'             => 'dashicons-format-quote',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'taxonomies'			=> array(''),
			'show_in_rest'			=> false,
		);
		register_post_type( 'testimonio', $args );
	
	}
	add_action( 'init', 'custom_post_type_testimonio', 0 );
	
}

if ( ! function_exists('custom_post_type_team') ) {

// Register Custom Post Type
function custom_post_type_team() {

	$labels = array(
		'name'                  => _x( 'Profesorado', 'Post Type General Name', 'smn' ),
		'singular_name'         => _x( 'Profesor', 'Post Type Singular Name', 'smn' ),
		'menu_name'             => __( 'Profesorado', 'smn-admin' ),
		'name_admin_bar'        => __( 'Profesor', 'smn-admin' ),
		'add_new'               => __( 'Añadir nuevo Profesor', 'smn-admin' ),
		'new_item'              => __( 'Nuevo Profesor', 'smn-admin' ),
		'edit_item'             => __( 'Editar Profesor', 'smn-admin' ),
		'update_item'           => __( 'Actualizar Profesor', 'smn-admin' ),
		'view_item'             => __( 'Ver Profesor', 'smn-admin' ),
		'view_items'            => __( 'Ver Profesorado', 'smn-admin' ),
		'featured_image'		=> __( 'Foto', 'smn-admin' ),
		'set_featured_image'	=> __( 'Establecer Foto', 'smn-admin' ),
		'remove_featured_image'	=> __( 'Quitar Foto', 'smn-admin' ),
		'use_featured_image'	=> __( 'Usar como Foto', 'smn-admin' ),
	);
	$args = array(
		'label'                 => __( 'Profesorado', 'smn' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-id',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'taxonomies'			=> array(),
		'show_in_rest'			=> false,
	);
	register_post_type( 'team', $args );

}
add_action( 'init', 'custom_post_type_team', 0 );

}

if ( ! function_exists('custom_post_type_producto') ) {

// Register Custom Post Type
function custom_post_type_producto() {

	$labels = array(
		'name'                  => _x( 'Productos', 'Post Type General Name', 'smn' ),
		'singular_name'         => _x( 'Producto', 'Post Type Singular Name', 'smn' ),
		'menu_name'             => __( 'Productos', 'smn-admin' ),
		'name_admin_bar'        => __( 'Producto', 'smn-admin' ),
		'add_new'               => __( 'Añadir nuevo Producto', 'smn-admin' ),
		'new_item'              => __( 'Nuevo Producto', 'smn-admin' ),
		'edit_item'             => __( 'Editar Producto', 'smn-admin' ),
		'update_item'           => __( 'Actualizar Producto', 'smn-admin' ),
		'view_item'             => __( 'Ver Producto', 'smn-admin' ),
		'view_items'            => __( 'Ver Productos', 'smn-admin' ),
		// 'featured_image'		=> __( 'Foto de perfil', 'smn-admin' ),
		// 'set_featured_image'	=> __( 'Establecer Foto de perfil', 'smn-admin' ),
		// 'remove_featured_image'	=> __( 'Quitar Foto de perfil', 'smn-admin' ),
		// 'use_featured_image'	=> __( 'Usar como Foto de perfil', 'smn-admin' ),
	);
	$args = array(
		'label'                 => __( 'Productos', 'smn' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 23,
		'menu_icon'             => 'dashicons-open-folder',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'taxonomies'			=> array('sector', 'product_cat', 'product_tag'),
		'show_in_rest'			=> true,
	);
	register_post_type( 'product', $args );

}
// add_action( 'init', 'custom_post_type_producto', 0 );

}

if ( ! function_exists('custom_post_type_caso_de_exito') ) {

// Register Custom Post Type
function custom_post_type_caso_de_exito() {

	$labels = array(
		'name'                  => _x( 'Casos de éxito', 'Post Type General Name', 'smn' ),
		'singular_name'         => _x( 'Caso de éxito', 'Post Type Singular Name', 'smn' ),
		'menu_name'             => __( 'Casos de éxito', 'smn-admin' ),
		'name_admin_bar'        => __( 'Caso de éxito', 'smn-admin' ),
		'add_new'               => __( 'Añadir nuevo Caso de éxito', 'smn-admin' ),
		'new_item'              => __( 'Nuevo Caso de éxito', 'smn-admin' ),
		'edit_item'             => __( 'Editar Caso de éxito', 'smn-admin' ),
		'update_item'           => __( 'Actualizar Caso de éxito', 'smn-admin' ),
		'view_item'             => __( 'Ver Caso de éxito', 'smn-admin' ),
		'view_items'            => __( 'Ver Casos de éxito', 'smn-admin' ),
		// 'featured_image'		=> __( 'Foto de perfil', 'smn-admin' ),
		// 'set_featured_image'	=> __( 'Establecer Foto de perfil', 'smn-admin' ),
		// 'remove_featured_image'	=> __( 'Quitar Foto de perfil', 'smn-admin' ),
		// 'use_featured_image'	=> __( 'Usar como Foto de perfil', 'smn-admin' ),
	);
	$args = array(
		'label'                 => __( 'Casos de éxito', 'smn' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 23,
		'menu_icon'             => 'dashicons-format-quote',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'taxonomies'			=> array(''),
		'show_in_rest'			=> true,
	);
	register_post_type( 'caso-de-exito', $args );

}
// add_action( 'init', 'custom_post_type_caso_de_exito', 0 );

}

if ( ! function_exists('cpt_content_fragment_function') ) {

	// Register Custom Post Type
	function cpt_content_fragment_function() {

		$labels = array(
			'name'                => _x( 'Fragmentos', 'Post Type General Name', 'smn' ),
			'singular_name'       => _x( 'Fragmento', 'Post Type Singular Name', 'smn' ),
			'menu_name'           => __( 'Fragmentos de contenido reutilizables', 'smn-admin' ),
			'name_admin_bar'      => __( 'Fragmento', 'smn-admin' ),
			'parent_item_colon'   => __( 'Fragmento superior:', 'smn-admin' ),
			'all_items'           => __( 'Todos los Fragmentos de contenido', 'smn-admin' ),
			'add_new_item'        => __( 'Añadir nuevo Fragmento', 'smn-admin' ),
			'add_new'             => __( 'Añadir nuevo', 'smn-admin' ),
			'new_item'            => __( 'Nuevo Fragmento', 'smn-admin' ),
			'edit_item'           => __( 'Editar Fragmento', 'smn-admin' ),
			'update_item'         => __( 'Actualizar Fragmento', 'smn-admin' ),
			'view_item'           => __( 'Ver Fragmento', 'smn-admin' ),
			'search_items'        => __( 'Buscar Fragmento', 'smn-admin' ),
			'not_found'           => __( 'No se han encontrado Fragmentos', 'smn-admin' ),
			'not_found_in_trash'  => __( 'No se han encontrado Fragmentos en la papelera', 'smn-admin' ),
		);
		$args = array(
			'label'               => __( 'Fragmentos de contenido', 'smn' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'author' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-editor-insertmore',
			'show_in_admin_bar'   => false,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest'			=> true,
		);

		register_post_type( 'content_fragment', $args );

	}

	// Hook into the 'init' action
	// add_action( 'init', 'cpt_content_fragment_function', 0 );

}

if ( ! function_exists( 'product_cat_function' ) ) {

	// Register Custom Taxonomy
	function product_cat_function() {

		$labels = array(
			'name'                       => _x( 'Familias de Producto', 'Taxonomy General Name', 'smn' ),
			'singular_name'              => _x( 'Familia de Producto', 'Taxonomy Singular Name', 'smn' ),
			'menu_name'                  => __( 'Familias de Producto', 'smn-admin' ),
			'all_items'                  => __( 'Todas las Familias de Producto', 'smn-admin' ),
			'parent_item'                => __( 'Familia de Producto superior', 'smn-admin' ),
			'parent_item_colon'          => __( 'Familia de Producto superior:', 'smn-admin' ),
			'new_item_name'              => __( 'Nueva Familia de Producto', 'smn-admin' ),
			'add_new_item'               => __( 'Añadir Nueva Familia de Producto', 'smn-admin' ),
			'edit_item'                  => __( 'Editar Familia de Producto', 'smn-admin' ),
			'update_item'                => __( 'Actualizar Familia de Producto', 'smn-admin' ),
			'view_item'                  => __( 'Ver Familia de Producto', 'smn-admin' ),
			'separate_items_with_commas' => __( 'Separar Familia de Producto con comas', 'smn-admin' ),
			'add_or_remove_items'        => __( 'Añadir o eliminar Familia de Producto', 'smn-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre las más usadas', 'smn-admin' ),
			'popular_items'              => __( 'Familias de Producto populares', 'smn-admin' ),
			'search_items'               => __( 'Buscar Familias de Producto', 'smn-admin' ),
			'not_found'                  => __( 'No encontrada', 'smn-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'				 => true,
			'rewrite'					 => array(
											'slug'			=> __( 'product-cat', 'smn' ),
											'with_front'	=> true,
											'hierarchical'	=> false,
										 ),
		);

		register_taxonomy( 'product_cat', array( 'product' ), $args );

	}
	// Hook into the 'init' action
	// add_action( 'init', 'product_cat_function', 0 );

}

if ( ! function_exists( 'product_tag_function' ) ) {

	// Register Custom Taxonomy
	function product_tag_function() {

		$labels = array(
			'name'                       => _x( 'Etiquetas de Producto', 'Taxonomy General Name', 'smn' ),
			'singular_name'              => _x( 'Etiqueta de Producto', 'Taxonomy Singular Name', 'smn' ),
			'menu_name'                  => __( 'Etiquetas de Producto', 'smn-admin' ),
			'all_items'                  => __( 'Todas las Etiquetas de Producto', 'smn-admin' ),
			'parent_item'                => __( 'Etiqueta de Producto superior', 'smn-admin' ),
			'parent_item_colon'          => __( 'Etiqueta de Producto superior:', 'smn-admin' ),
			'new_item_name'              => __( 'Nueva Etiqueta de Producto', 'smn-admin' ),
			'add_new_item'               => __( 'Añadir Nueva Etiqueta de Producto', 'smn-admin' ),
			'edit_item'                  => __( 'Editar Etiqueta de Producto', 'smn-admin' ),
			'update_item'                => __( 'Actualizar Etiqueta de Producto', 'smn-admin' ),
			'view_item'                  => __( 'Ver Etiqueta de Producto', 'smn-admin' ),
			'separate_items_with_commas' => __( 'Separar Etiqueta de Producto con comas', 'smn-admin' ),
			'add_or_remove_items'        => __( 'Añadir o eliminar Etiqueta de Producto', 'smn-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre las más usadas', 'smn-admin' ),
			'popular_items'              => __( 'Etiquetas de Producto populares', 'smn-admin' ),
			'search_items'               => __( 'Buscar Etiquetas de Producto', 'smn-admin' ),
			'not_found'                  => __( 'No encontrada', 'smn-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'				 => true,
			'rewrite'					 => array(
											'slug'			=> __( 'product-tag', 'smn' ),
											'with_front'	=> true,
											'hierarchical'	=> false,
										 ),
		);

		register_taxonomy( 'product_tag', array( 'product' ), $args );

	}
	// Hook into the 'init' action
	// add_action( 'init', 'product_tag_function', 0 );

}

if ( ! function_exists( 'custom_taxonomy_sector' ) ) {

// Register Custom Taxonomy
function custom_taxonomy_sector() {

	$labels = array(
		'name'                       => _x( 'Sectores', 'Taxonomy General Name', 'smn' ),
		'singular_name'              => _x( 'Sector', 'Taxonomy Singular Name', 'smn' ),
		'menu_name'                  => __( 'Sectores', 'smn-admin' ),
		'all_items'                  => __( 'Todos los Sectores', 'smn-admin' ),
		'parent_item'                => __( 'Sector superior', 'smn-admin' ),
		'parent_item_colon'          => __( 'Sector superior:', 'smn-admin' ),
		'new_item_name'              => __( 'Nombre del nuevo Sector', 'smn-admin' ),
		'add_new_item'               => __( 'Añadir nuevo Sector', 'smn-admin' ),
		'edit_item'                  => __( 'Editar Sector', 'smn-admin' ),
		'update_item'                => __( 'Actualizar Sector', 'smn-admin' ),
		'view_item'                  => __( 'Ver Sector', 'smn-admin' ),
		'separate_items_with_commas' => __( 'Separar Sectores con comas', 'smn-admin' ),
		'add_or_remove_items'        => __( 'Añadir o quitar Sectores', 'smn-admin' ),
		'choose_from_most_used'      => __( 'Elegir de entre los más usados', 'smn-admin' ),
		'popular_items'              => __( 'Sectores populares', 'smn-admin' ),
		'search_items'               => __( 'Buscar Sectores', 'smn-admin' ),
		'not_found'                  => __( 'No encontrado', 'smn-admin' ),
		'no_terms'                   => __( 'No hay Sectores', 'smn-admin' ),
		'items_list'                 => __( 'Lista de Sectores', 'smn-admin' ),
		'items_list_navigation'      => __( 'Navegación de la lista de Sectores', 'smn-admin' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'sector', array( 'product' ), $args );

}
// add_action( 'init', 'custom_taxonomy_sector', 10 );

}

if ( ! function_exists('formacion_custom_post_type') ) {

	// Register Custom Post Type
	function formacion_custom_post_type() {
	
		$labels = array(
			'name'                  => _x( 'Cursos', 'Post Type General Name', 'smn' ),
			'singular_name'         => _x( 'Curso', 'Post Type Singular Name', 'smn' ),
			'menu_name'             => __( 'Cursos', 'smn-admin' ),
			'name_admin_bar'        => __( 'Curso', 'smn-admin' ),
			'archives'              => __( 'Cursos', 'smn-admin' ),
			'attributes'            => __( 'Atributos de Curso', 'smn-admin' ),
			'parent_item_colon'     => __( 'Curso superior:', 'smn-admin' ),
			'all_items'             => __( 'Todos los Cursos', 'smn-admin' ),
			'add_new_item'          => __( 'Añadir nuevo Curso', 'smn-admin' ),
			'add_new'               => __( 'Añadir nuevo', 'smn-admin' ),
			'new_item'              => __( 'Nuevo Curso', 'smn-admin' ),
			'edit_item'             => __( 'Editar Curso', 'smn-admin' ),
			'update_item'           => __( 'Actualizar Curso', 'smn-admin' ),
			'view_item'             => __( 'Ver Curso', 'smn-admin' ),
			'view_items'            => __( 'Ver Cursos', 'smn-admin' ),
			'search_items'          => __( 'Buscar Cursos', 'smn-admin' ),
			'not_found'             => __( 'No encontrado', 'smn-admin' ),
			'not_found_in_trash'    => __( 'No encontrado en la papelera', 'smn-admin' ),
			'featured_image'        => __( 'Imagen principal', 'smn-admin' ),
			'set_featured_image'    => __( 'Establecer Imagen principal', 'smn-admin' ),
			'remove_featured_image' => __( 'Quitar Imagen principal', 'smn-admin' ),
			'use_featured_image'    => __( 'Usar como Imagen principal', 'smn-admin' ),
			'insert_into_item'      => __( 'Insertar en el Curso', 'smn-admin' ),
			'uploaded_to_this_item' => __( 'Subido a este Curso', 'smn-admin' ),
			'items_list'            => __( 'Lista de Cursos', 'smn-admin' ),
			'items_list_navigation' => __( 'Navegación de la lista de Cursos', 'smn-admin' ),
			'filter_items_list'     => __( 'Filtrar lista de Cursos', 'smn-admin' ),
		);
		$args = array(
			'label'                 => __( 'Cursos', 'smn-admin' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes' ),
			'taxonomies'            => array( 'area-formativa', 'modalidad', 'tipo-formacion', 'target', 'ciudad' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'menu_icon'             => 'dashicons-welcome-learn-more',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => __( 'cursos', 'smn' ),
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => array(
											'slug'			=> __( 'cursos', 'smn' ),
										),
			'query_var'				=> true,
			'capability_type'       => 'post',
			'show_in_rest'          => true,
		);
		register_post_type( 'formacion', $args );
	
	}
	add_action( 'init', 'formacion_custom_post_type', 10 );
	
}

if ( ! function_exists( 'area_formativa_custom_taxonomy' ) ) {

	// Register Custom Taxonomy
	function area_formativa_custom_taxonomy() {
	
		$labels = array(
			'name'                       => _x( 'Áreas formativas', 'Taxonomy General Name', 'smn' ),
			'singular_name'              => _x( 'Área formativa', 'Taxonomy Singular Name', 'smn' ),
			'menu_name'                  => __( 'Áreas formativas', 'smn-admin' ),
			'all_items'                  => __( 'Todas las Áreas formativas', 'smn-admin' ),
			'parent_item'                => __( 'Área formativa superior', 'smn-admin' ),
			'parent_item_colon'          => __( 'Área formativa superior:', 'smn-admin' ),
			'new_item_name'              => __( 'Nombre del nuevo Área formativa', 'smn-admin' ),
			'add_new_item'               => __( 'Añadir nuevo Área formativa', 'smn-admin' ),
			'edit_item'                  => __( 'Editar Área formativa', 'smn-admin' ),
			'update_item'                => __( 'Actualizar Área formativa', 'smn-admin' ),
			'view_item'                  => __( 'Ver Área formativa', 'smn-admin' ),
			'separate_items_with_commas' => __( 'Separar Áreas formativas', 'smn-admin' ),
			'add_or_remove_items'        => __( 'Añadir o quitar Áreas formativas', 'smn-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre las más usadas', 'smn-admin' ),
			'popular_items'              => __( 'Áreas formativas más usadas', 'smn-admin' ),
			'search_items'               => __( 'Buscar', 'smn-admin' ),
			'not_found'                  => __( 'No encontrada', 'smn-admin' ),
			'no_terms'                   => __( 'No hay Áreas formativas', 'smn-admin' ),
			'items_list'                 => __( 'Lista de Áreas formativas', 'smn-admin' ),
			'items_list_navigation'      => __( 'Lista de navegación de Áreas formativas', 'smn-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
			'rewrite'                    => array(
												'slug'		=> __( 'cursos', 'smn' ),
											),
			'show_in_rest'               => true,
			'sort'						 => true,
		);
		register_taxonomy( 'area-formativa', array( 'formacion' ), $args );
	
	}
	add_action( 'init', 'area_formativa_custom_taxonomy', 0 );
	
}

if ( ! function_exists( 'modalidad_formacion_custom_taxonomy' ) ) {

	// Register Custom Taxonomy
	function modalidad_formacion_custom_taxonomy() {
	
		$labels = array(
			'name'                       => _x( 'Modalidades', 'Taxonomy General Name', 'smn' ),
			'singular_name'              => _x( 'Modalidad', 'Taxonomy Singular Name', 'smn' ),
			'menu_name'                  => __( 'Modalidades', 'smn-admin' ),
			'all_items'                  => __( 'Todas las Modalidades', 'smn-admin' ),
			'parent_item'                => __( 'Modalidad superior', 'smn-admin' ),
			'parent_item_colon'          => __( 'Modalidad superior:', 'smn-admin' ),
			'new_item_name'              => __( 'Nombre de la nueva Modalidad', 'smn-admin' ),
			'add_new_item'               => __( 'Añadir nueva Modalidad', 'smn-admin' ),
			'edit_item'                  => __( 'Editar Modalidad', 'smn-admin' ),
			'update_item'                => __( 'Actualizar Modalidad', 'smn-admin' ),
			'view_item'                  => __( 'Ver Modalidad', 'smn-admin' ),
			'separate_items_with_commas' => __( 'Separar Modalidades con comas', 'smn-admin' ),
			'add_or_remove_items'        => __( 'Añadir o quitar Modalidades', 'smn-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre los más usados', 'smn-admin' ),
			'popular_items'              => __( 'Modalidades más usadas', 'smn-admin' ),
			'search_items'               => __( 'Buscar', 'smn-admin' ),
			'not_found'                  => __( 'No encontrada', 'smn-admin' ),
			'no_terms'                   => __( 'No hay Modalidades', 'smn-admin' ),
			'items_list'                 => __( 'Lista de Modalidades', 'smn-admin' ),
			'items_list_navigation'      => __( 'Lista de navegación de Modalidades', 'smn-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
			'rewrite'                    => array(
												'slug'		=> __( 'cursos/modalidad', 'smn' ),
											),
			'show_in_rest'               => true,
			'sort'						 => true,
		);
		register_taxonomy( 'modalidad', array( 'formacion' ), $args );
	
	}
	add_action( 'init', 'modalidad_formacion_custom_taxonomy', 0 );
	
}

if ( ! function_exists( 'tipo_formacion_custom_taxonomy' ) ) {

	// Register Custom Taxonomy
	function tipo_formacion_custom_taxonomy() {
	
		$labels = array(
			'name'                       => _x( 'Tipos de formación', 'Taxonomy General Name', 'smn' ),
			'singular_name'              => _x( 'Tipo de formación', 'Taxonomy Singular Name', 'smn' ),
			'menu_name'                  => __( 'Tipos de formación', 'smn-admin' ),
			'all_items'                  => __( 'Todos los Tipos de formación', 'smn-admin' ),
			'parent_item'                => __( 'Tipo de formación superior', 'smn-admin' ),
			'parent_item_colon'          => __( 'Tipo de formación superior:', 'smn-admin' ),
			'new_item_name'              => __( 'Nombre del nuevo Tipo de formación', 'smn-admin' ),
			'add_new_item'               => __( 'Añadir nuevo Tipo de formación', 'smn-admin' ),
			'edit_item'                  => __( 'Editar Tipo de formación', 'smn-admin' ),
			'update_item'                => __( 'Actualizar Tipo de formación', 'smn-admin' ),
			'view_item'                  => __( 'Ver Tipo de formación', 'smn-admin' ),
			'separate_items_with_commas' => __( 'Separar Tipos de formación', 'smn-admin' ),
			'add_or_remove_items'        => __( 'Añadir o quitar Tipos de formación', 'smn-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre los más usados', 'smn-admin' ),
			'popular_items'              => __( 'Tipos de formación más usados', 'smn-admin' ),
			'search_items'               => __( 'Buscar', 'smn-admin' ),
			'not_found'                  => __( 'No encontrada', 'smn-admin' ),
			'no_terms'                   => __( 'No hay Tipos de formación', 'smn-admin' ),
			'items_list'                 => __( 'Lista de Tipos de formación', 'smn-admin' ),
			'items_list_navigation'      => __( 'Lista de navegación de Tipos de formación', 'smn-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
			'rewrite'                    => array(
												'slug'		=> __( 'cursos/tipo-formacion', 'smn' ),
											),
			'show_in_rest'               => true,
			'sort'						 => true,
		);
		register_taxonomy( 'tipo-formacion', array( 'formacion' ), $args );
	
	}
	add_action( 'init', 'tipo_formacion_custom_taxonomy', 0 );
	
}

if ( ! function_exists( 'target_formacion_custom_taxonomy' ) ) {

	// Register Custom Taxonomy
	function target_formacion_custom_taxonomy() {
	
		$labels = array(
			'name'                       => _x( 'Targets', 'Taxonomy General Name', 'smn' ),
			'singular_name'              => _x( 'Target', 'Taxonomy Singular Name', 'smn' ),
			'menu_name'                  => __( 'Targets', 'smn-admin' ),
			'all_items'                  => __( 'Todos los Targets', 'smn-admin' ),
			'parent_item'                => __( 'Target superior', 'smn-admin' ),
			'parent_item_colon'          => __( 'Target superior:', 'smn-admin' ),
			'new_item_name'              => __( 'Nombre del nuevo Target', 'smn-admin' ),
			'add_new_item'               => __( 'Añadir nuevo Target', 'smn-admin' ),
			'edit_item'                  => __( 'Editar Target', 'smn-admin' ),
			'update_item'                => __( 'Actualizar Target', 'smn-admin' ),
			'view_item'                  => __( 'Ver Target', 'smn-admin' ),
			'separate_items_with_commas' => __( 'Separar Targets con comas', 'smn-admin' ),
			'add_or_remove_items'        => __( 'Añadir o quitar Targets', 'smn-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre los más usados', 'smn-admin' ),
			'popular_items'              => __( 'Targets más usados', 'smn-admin' ),
			'search_items'               => __( 'Buscar', 'smn-admin' ),
			'not_found'                  => __( 'No encontrada', 'smn-admin' ),
			'no_terms'                   => __( 'No hay Targets', 'smn-admin' ),
			'items_list'                 => __( 'Lista de Targets', 'smn-admin' ),
			'items_list_navigation'      => __( 'Lista de navegación de Targets', 'smn-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
			'rewrite'                    => array(
												'slug'		=> __( 'cursos/target', 'smn' ),
											),
			'show_in_rest'               => true,
			'sort'						 => true,
		);
		register_taxonomy( 'target', array( 'formacion' ), $args );
	
	}
	add_action( 'init', 'target_formacion_custom_taxonomy', 0 );
	
}

if ( ! function_exists( 'ciudad_formacion_custom_taxonomy' ) ) {

	// Register Custom Taxonomy
	function ciudad_formacion_custom_taxonomy() {
	
		$labels = array(
			'name'                       => _x( 'Ciudades', 'Taxonomy General Name', 'smn' ),
			'singular_name'              => _x( 'Ciudad', 'Taxonomy Singular Name', 'smn' ),
			'menu_name'                  => __( 'Ciudades', 'smn-admin' ),
			'all_items'                  => __( 'Todas las Ciudades', 'smn-admin' ),
			'parent_item'                => __( 'Ciudad superior', 'smn-admin' ),
			'parent_item_colon'          => __( 'Ciudad superior:', 'smn-admin' ),
			'new_item_name'              => __( 'Nombre de la nueva Ciudad', 'smn-admin' ),
			'add_new_item'               => __( 'Añadir nueva Ciudad', 'smn-admin' ),
			'edit_item'                  => __( 'Editar Ciudad', 'smn-admin' ),
			'update_item'                => __( 'Actualizar Ciudad', 'smn-admin' ),
			'view_item'                  => __( 'Ver Ciudad', 'smn-admin' ),
			'separate_items_with_commas' => __( 'Separar Ciudades con comas', 'smn-admin' ),
			'add_or_remove_items'        => __( 'Añadir o quitar Ciudades', 'smn-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre los más usados', 'smn-admin' ),
			'popular_items'              => __( 'Ciudades más usadas', 'smn-admin' ),
			'search_items'               => __( 'Buscar', 'smn-admin' ),
			'not_found'                  => __( 'No encontrada', 'smn-admin' ),
			'no_terms'                   => __( 'No hay Ciudades', 'smn-admin' ),
			'items_list'                 => __( 'Lista de Ciudades', 'smn-admin' ),
			'items_list_navigation'      => __( 'Lista de navegación de Ciudades', 'smn-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
			'rewrite'                    => array(
												'slug'		=> __( 'cursos/ciudad', 'smn' ),
											),
			'show_in_rest'               => true,
			'sort'						 => true,
		);
		register_taxonomy( 'ciudad', array( 'formacion' ), $args );
	
	}
	add_action( 'init', 'ciudad_formacion_custom_taxonomy', 0 );
	
}

function wpb_change_title_text( $title ){
     $screen = get_current_screen();
  
     if  ( 'portfolio_page' == $screen->post_type ) {
          $title = 'Título del proyecto';
     } elseif  ( 'slide' == $screen->post_type ) {
          $title = 'Título de la slide';
     } elseif  ( 'team' == $screen->post_type ) {
          $title = 'Nombre y apellidos';
     } elseif  ( 'product' == $screen->post_type ) {
          $title = 'Nombre del producto';
     } elseif  ( 'formacion' == $screen->post_type ) {
          $title = 'Nombre del curso';
     }
  
     return $title;
}
add_filter( 'enter_title_here', 'wpb_change_title_text' );

// ADD NEW COLUMN
add_filter('manage_posts_columns', 'smn_columns_head');
add_filter('manage_pages_columns', 'smn_columns_head');
add_action('manage_posts_custom_column', 'smn_columns_content', 10, 2);
add_action('manage_pages_custom_column', 'smn_columns_content', 10, 2);
function smn_columns_head($defaults) {
	// $defaults = array('featured_image' => 'Imagen') + $defaults;
    $defaults['featured_image'] = 'Imagen';
    $defaults['extracto'] = 'Resumen';

    return $defaults;
}
 
// SHOW THE FEATURED IMAGE
function smn_columns_content($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
    	echo '<div style="height:100px;">' . get_the_post_thumbnail( $post_ID, array(80,80) ) . '</div>';

    }
    if ($column_name == 'extracto') {
    	$post = get_post($post_ID);
    	echo $post->post_excerpt;
    }
}


?>