<?php
/*
  Plugin Name: Loyola Games - Post Types
  Plugin URI:
  Description: Añade Post Types al sitio Loyola Game
  Version: 1.0.0
  Author: Antonio Manuel Durán Rosal
  Author URI: www.uloyola.es
  Text Domain: loyolagames
*/

if(!defined('ABSPATH')) die(); //Prevents direct viewing of the plugin

// Register Custom Post Type
function videogames_post_type() {

	$labels = array(
		'name'                  => _x( 'Videogames', 'Post Type General Name', 'loyolagames' ),
		'singular_name'         => _x( 'Videogame', 'Post Type Singular Name', 'loyolagames' ),
		'menu_name'             => __( 'Videogames', 'loyolagames' ),
		'name_admin_bar'        => __( 'Videogame', 'loyolagames' ),
		'archives'              => __( 'Archivo', 'loyolagames' ),
		'attributes'            => __( 'Atributos', 'loyolagames' ),
		'parent_item_colon'     => __( 'Videogame Padre', 'loyolagames' ),
		'all_items'             => __( 'Todos Los Videogames', 'loyolagames' ),
		'add_new_item'          => __( 'Agregar Videogame', 'loyolagames' ),
		'add_new'               => __( 'Agregar Videogame', 'loyolagames' ),
		'new_item'              => __( 'Nuevo Videogame', 'loyolagames' ),
		'edit_item'             => __( 'Editar Videogame', 'loyolagames' ),
		'update_item'           => __( 'Actualizar Videogame', 'loyolagames' ),
		'view_item'             => __( 'Ver Videogame', 'loyolagames' ),
		'view_items'            => __( 'Ver Videogames', 'loyolagames' ),
		'search_items'          => __( 'Buscar Videogame', 'loyolagames' ),
		'not_found'             => __( 'No Encontrado', 'loyolagames' ),
		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'loyolagames' ),
		'featured_image'        => __( 'Imagen Destacada', 'loyolagames' ),
		'set_featured_image'    => __( 'Guardar Imagen destacada', 'loyolagames' ),
		'remove_featured_image' => __( 'Eliminar Imagen destacada', 'loyolagames' ),
		'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'loyolagames' ),
		'insert_into_item'      => __( 'Insertar en Videogame', 'loyolagames' ),
		'uploaded_to_this_item' => __( 'Agregado en Videogame', 'loyolagames' ),
		'items_list'            => __( 'Lista de Videogames', 'loyolagames' ),
		'items_list_navigation' => __( 'Navegación de Videogames', 'loyolagames' ),
		'filter_items_list'     => __( 'Filtrar Videogames', 'loyolagames' ),
	);
	$args = array(
		'label'                 => __( 'Videogame', 'loyolagames' ),
		'description'           => __( 'Videogames para el Sitio Web', 'loyolagames' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => true, //true = post, false = pagina
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
    'menu_position'         => 6,
    'menu_icon'             => 'dashicons-welcome-learn-more', //plugins_url('icono-cpt.png', __FILE__), // Path, 20x20, png, svg, jpg
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'videogames', $args );

}
add_action( 'init', 'videogames_post_type', 0 );
?>
