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
    wp_enqueue_script('modale', get_stylesheet_directory_uri() . '/js/modale.js', array(), '1.0.0', true);
    wp_enqueue_script('single', get_stylesheet_directory_uri() . '/js/single.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('burger', get_stylesheet_directory_uri() . '/js/menu_Burger.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('lightBox', get_stylesheet_directory_uri() . '/js/lightBox.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('filter', get_stylesheet_directory_uri() . '/js/sectionfilter.js', array('jquery'), '1.0.0', true);
    // Ajout de la bibliothèque jQuery
    wp_enqueue_script('jquery-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), '3.7.1', true);
    // Ajout de Select2
    wp_enqueue_style('select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css');
    wp_enqueue_script('select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array('jquery'), '', true);
    // Affichage des images suppplémentaires "charger plus" et filtres avec script AJAX
    wp_enqueue_script('miniature', get_template_directory_uri() . '/js/miniature.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('loadMoreAjax', get_template_directory_uri() . '/js/loadMoreAjax.js', array('jquery'), '1.0.0', true);
    wp_localize_script('loadMoreAjax', 'loadMoreAjax_js', 'ajax_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}

add_action('wp_enqueue_scripts', 'sitephoto_register_assets');

function add_ajax_url()
{
    wp_enqueue_script('filter_photos', get_template_directory_uri() . '/js/sectionfilter.js', array('jquery'), null, true);
    wp_localize_script('filter_photos', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'add_ajax_url');


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



function my_photo_filter()
{
    // Récupère les valeurs des filtres
    $category = isset($_GET['categoryfilter']) ? $_GET['categoryfilter'] : '';
    $format = isset($_GET['formatfilter']) ? $_GET['formatfilter'] : '';
    $orderby = isset($_GET['orderby']) ? $_GET['orderby'] : '';

    // Arguments de la requête pour récupérer les photos
    $args = array(
        'post_type' => 'photo', // Le type de post des photos
        'posts_per_page' => -1, // Nombre de photos à afficher (-1 pour toutes)
        'orderby' => $orderby, // Tri
        'order' => 'DESC', // Par défaut, tri par date du plus récent au plus ancien
        'tax_query' => array(
            'relation' => 'AND',
        ),
    );

    // Ajoute les filtres de catégorie et de format à la requête
    if (!empty($category)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'categorie',
            'field'    => 'slug',
            'terms'    => $category,
        );
    }

    if (!empty($format)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field'    => 'slug',
            'terms'    => $format,
        );
    }

    // Ajoutez l'ordre à la requête en fonction de la valeur de 'orderby'
    if ($orderby == 'date_desc') {
        $args['orderby'] = 'date';
        $args['order'] = 'DESC';
    } elseif ($orderby == 'date_asc') {
        $args['orderby'] = 'date';
        $args['order'] = 'ASC';
    }

    // Requête pour récupérer les photos
    $query = new WP_Query($args);

    // Affichage des photos
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
?>
<div class="photo">
    <?php if (has_post_thumbnail()) : ?>
    <?php get_template_part('template-parts/photo'); ?>
    <?php endif; ?>
</div>
<?php
        }
        wp_reset_postdata();
    } else {
        echo 'Aucune photo trouvée';
    }

    wp_die(); // Fin de la requête AJAX
}


add_action('wp_ajax_my_photo_filter', 'my_photo_filter');
add_action('wp_ajax_nopriv_my_photo_filter', 'my_photo_filter');