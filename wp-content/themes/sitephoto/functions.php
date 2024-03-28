<?php


add_action('after_setup_theme', 'register_my_menu');


add_action('wp-enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/assets/sass/style.css', array(), filemtime(get_stylesheet_directory() . '/assets/sass/style.css'));
}



//fonction qui gére les menus depuis WP
function register_my_menu()
{
    register_nav_menu(
        array(
            'menu-1' => esc_html__('Header', 'mota'),
            'menu-2' => esc_html__('Footer', 'mota'),
        )
    );
}