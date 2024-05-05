<?php

function sitephoto_supports()
{
    // Ajouter la prise en charge des images mises en avant
    add_theme_support('post-thumbnails');
    // Ajouter automatiquement le titre du site dans l'en-tête du site
    add_theme_support('title-tag');
    // Ajouter des tailles d'images
    add_image_size('post-thumbnail', 500, 500, true);
}

add_action('after_setup_theme', 'sitephoto_supports');

// Ajout d'une fonction permettant de gérer les Menus depuis WP
function enregistrement_nav_menus()
{
    register_nav_menus(
        array(
            'mainmenu' => esc_html__('En tête', 'mota'),
            'footermenu' => esc_html__('Pied de page', 'mota'),
        )
    );
}
add_action('after_setup_theme', 'enregistrement_nav_menus');


function sitephoto_register_assets()
{
    // Chargement du style.css du thème
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/assets/style.css', array(), filemtime(get_stylesheet_directory() . '/assets/style.css'));
    // Chargement des fichiers js
    wp_enqueue_script('modale', get_theme_file_uri() . '/js/modale.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('single', get_stylesheet_directory_uri() . '/js/single.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('burger', get_stylesheet_directory_uri() . '/js/menu_Burger.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('gallerie', get_stylesheet_directory_uri() . '/js/gallerie_photos.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('filter', get_stylesheet_directory_uri() . '/js/sectionfilter.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('loadMoreAjax', get_stylesheet_directory_uri() . '/js/loadMoreAjax.js', array('jquery'), '1.0.0', true);
    // Ajout de la bibliothèque jQuery
    wp_enqueue_script('jquery-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), '3.7.1', true);
    // Passer l'objet ajax_params au script

}
add_action('wp_enqueue_scripts', 'sitephoto_register_assets');







// /********AJAX */

/**
 * Register a new route or endpoint with the rest api.
 */
// ------- Partie fonctions AJAX ------------
// Fonction de rappel AJAX pour filtrer les posts