<?php
/*
  Plugin Name: Viajes Galeano-Caldentey - Post Types
  Plugin URI:
  Description: Añade Post Types al sitio Viajes Galeano-Caldentey
  Version: 1.0.0
  Author: Carlos Galeano, Diego Caldentey
  Author URI: www.uloyola.es
  Text Domain: viajes-galeano-caldentey
*/

if (!defined('ABSPATH')) die(); //Prevents direct viewing of the plugin

// Register Custom Post Type
function destinations_post_type()
{

    $labels = array(
        'name'                  => _x('Destinations', 'Post Type General Name', 'viajes-galeano-caldentey'),
        'singular_name'         => _x('Destination', 'Post Type Singular Name', 'viajes-galeano-caldentey'),
        'menu_name'             => __('Destinations', 'viajes-galeano-caldentey'),
        'name_admin_bar'        => __('Destination', 'viajes-galeano-caldentey'),
        'archives'              => __('Archivo', 'viajes-galeano-caldentey'),
        'attributes'            => __('Atributos', 'viajes-galeano-caldentey'),
        'parent_item_colon'     => __('Videogame Padre', 'viajes-galeano-caldentey'),
        'all_items'             => __('Todos Los Destinations', 'viajes-galeano-caldentey'),
        'add_new_item'          => __('Agregar Destination', 'viajes-galeano-caldentey'),
        'add_new'               => __('Agregar Destination', 'viajes-galeano-caldentey'),
        'new_item'              => __('Nuevo Destination', 'viajes-galeano-caldentey'),
        'edit_item'             => __('Editar Destination', 'viajes-galeano-caldentey'),
        'update_item'           => __('Actualizar Destination', 'viajes-galeano-caldentey'),
        'view_item'             => __('Ver Destination', 'viajes-galeano-caldentey'),
        'view_items'            => __('Ver Destinations', 'viajes-galeano-caldentey'),
        'search_items'          => __('Buscar Destination', 'viajes-galeano-caldentey'),
        'not_found'             => __('No Encontrado', 'viajes-galeano-caldentey'),
        'not_found_in_trash'    => __('No Encontrado en Papelera', 'viajes-galeano-caldentey'),
        'featured_image'        => __('Imagen Destacada', 'viajes-galeano-caldentey'),
        'set_featured_image'    => __('Guardar Imagen destacada', 'viajes-galeano-caldentey'),
        'remove_featured_image' => __('Eliminar Imagen destacada', 'viajes-galeano-caldentey'),
        'use_featured_image'    => __('Utilizar como Imagen Destacada', 'viajes-galeano-caldentey'),
        'insert_into_item'      => __('Insertar en Destination', 'viajes-galeano-caldentey'),
        'uploaded_to_this_item' => __('Agregado en Destination', 'viajes-galeano-caldentey'),
        'items_list'            => __('Lista de Destinations', 'viajes-galeano-caldentey'),
        'items_list_navigation' => __('Navegación de Destinations', 'viajes-galeano-caldentey'),
        'filter_items_list'     => __('Filtrar Destinations', 'viajes-galeano-caldentey'),
    );
    $args = array(
        'label'                 => __('Destination', 'viajes-galeano-caldentey'),
        'description'           => __('Destinations para el Sitio Web', 'viajes-galeano-caldentey'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'hierarchical'          => true, //true = post, false = pagina
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-airplane', //plugins_url('icono-cpt.png', __FILE__), // Path, 20x20, png, svg, jpg
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('destinations', $args);
}
add_action('init', 'destinations_post_type', 0);
