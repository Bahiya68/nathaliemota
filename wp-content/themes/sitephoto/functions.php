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
    wp_enqueue_script('lightBox', get_stylesheet_directory_uri() . '/js/lightBox.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('filter', get_stylesheet_directory_uri() . '/js/sectionfilter.js', array('jquery'), '1.0.0', true);
    // Ajout de la bibliothèque jQuery
    wp_enqueue_script('jquery-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), '3.7.1', true);
    // Passer l'objet ajax_params au script

    // Affichage des images suppplémentaires "charger plus" et filtres avec script AJAX
    wp_enqueue_script('loadMoreAjax', get_template_directory_uri() . '/js/loadMoreAjax.js', array('jquery'), '1.0.0', true);
    // Passer l'objet ajax_params au script
    wp_localize_script('loadMoreAjax', 'loadMoreAjax_js', 'ajax_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('loadMoreAjax'),
    ));
}

add_action('wp_enqueue_scripts', 'sitephoto_register_assets');


function charger_plus_de_photos()
{
    if (isset($_POST['offset'])) {
        $offset = intval($_POST['offset']);
    } else {
        $offset = 0;
    }

    $args = array(
        'order'          => 'ASC',
        'post_type'      => 'photo',
        'posts_per_page' => 8,
        'paged'          => $offset + 1,
    );

    $ajaxphoto = new WP_Query($args);

    ob_start();

    if ($ajaxphoto->have_posts()) {
        while ($ajaxphoto->have_posts()) {
            $ajaxphoto->the_post();
            get_template_part('template-parts/photo');
        }
        wp_reset_postdata();
        $content = ob_get_clean();
        wp_send_json_success($content);
    } else {
        wp_send_json_error('No more photos found.');
    }
}

add_action('wp_ajax_nopriv_charger_plus_de_photos', 'charger_plus_de_photos');
add_action('wp_ajax_charger_plus_de_photos', 'charger_plus_de_photos');




function filter_photos()
{
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $format = isset($_POST['format']) ? $_POST['format'] : '';
    $orderby = isset($_POST['orderby']) ? $_POST['orderby'] : '';

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1,
        'orderby' => $orderby,
    );

    // Ajoutez les arguments pour les filtres sélectionnés
    if (!empty($category)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'categorie',
            'field' => 'slug',
            'terms' => $category
        );
    }

    if (!empty($format)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => $format
        );
    }

    $ajaxphoto = new WP_Query($args);

    if ($ajaxphoto->have_posts()) :
        while ($ajaxphoto->have_posts()) :
            $ajaxphoto->the_post();
            get_template_part('template-parts/photo');
        endwhile;
        wp_reset_postdata(); // Réinitialise la requête
    else :
        echo 'Aucune photo trouvée.';
    endif;

    wp_die();
}

add_action('wp_ajax_filter_photos', 'filter_photos');
add_action('wp_ajax_nopriv_filter_photos', 'filter_photos');

function add_ajax_url()
{
    wp_enqueue_script('filter_photos', get_template_directory_uri() . '/js/sectionfilter.js', array('jquery'), null, true);
    wp_localize_script('filter_photos', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'add_ajax_url');