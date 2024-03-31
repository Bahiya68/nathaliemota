<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- permet de récupérer les scripts et styles -->
    <?php wp_head(); ?>
</head>

<!-- nous permet d’obtenir des noms de classe CSS en fonction de la page visitée -->

<body class="mainContainer">
    <?php wp_body_open(); ?>

    <header class="site_header">
        <nav id="site_navigation" class="siteNavigation" role="navigation">
            <div class="siteNavigationlogo">
                <!-- ramène à l’accueil du site grâce à la fonction home_url() -->
                <a href="<?php echo home_url('/'); ?>">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/nathalieMotaLogo.png'; ?>" alt="Logo">
                </a>
            </div>
            <div class="siteNavigationMenu">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'main',
                        'container' => 'false', // On retire le conteneur généré par WP
                        'menu_class' => 'site_header', // ma classe personnalisée 
                    )
                );
                ?>

            </div>
        </nav>
    </header>