<?php

function sitephoto_supports()
{
    // Ajouter la prise en charge des images mises en avant
    add_theme_support('post-thumbnails');
    // Ajouter automatiquement le titre du site dans l'en-tête du site
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'sitephoto_supports');

// Ajout d'une fonction permettant de gérer les menus depuis WP
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
    // Chargement du script avec jQuery
    wp_enqueue_script('script', get_theme_file_uri() . '/js/modale.js', array('jquery'), time(), true);
    //wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css');
    //wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    //wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js', [], false, true);
    wp_deregister_script('jquery');
    //wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', [], false, true);
    //wp_enqueue_style('bootstrap');
    //wp_enqueue_script('bootstrap');
}

add_action('wp_enqueue_scripts', 'sitephoto_register_assets');
