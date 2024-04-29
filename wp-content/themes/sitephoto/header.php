<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- permet de récupérer les scripts et styles -->
    <?php wp_head(); ?>
</head>

<!-- nous permet d’obtenir des noms de classe CSS en fonction de la page visitée -->

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="container">
        <header class="site_header">
            <nav id="site_navigation" class="siteNavigation" role="navigation">
                <div class="siteNavigation__logo">
                    <!-- ramène à l’accueil du site grâce à la fonction home_url() -->
                    <a href="<?php echo home_url('/'); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/nathalieMotaLogo.png'; ?>"
                            alt="Logo">
                    </a>
                </div>

                <div class="siteNavigation__menu">
                    <div class="burger">
                        <span></span>
                    </div>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'mainmenu',
                            'container' => 'false', // On retire le conteneur généré par WP
                            'menu_class' => 'navMenu', // ma classe personnalisée 
                        )
                    );
                    ?>
                    <button id="menu-item-14">CONTACT</button>

                </div>

            </nav>

            <!-- Menu Burger  -->


            <section class="menuFull menu-items">
                <div class="titreMenuBurger">
                    <ul class="liste">
                        <li><a href="#ACCUEIL">ACCUEIL</a></li>
                        <li><a href="#À PROPOS">À PROPOS</a></li>
                        <li><button id="CONTACT">CONTACT</button></li>
                    </ul>
                </div>

            </section>


        </header>