<?php get_header(); ?>

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
    <header>

        <div class="banner">
            <h1>PHOTOGRAPHE EVENT</h1>
            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/nathalie-3.jpeg.webp'; ?>"
                alt="Tout est installé">
            </a>
        </div>
    </header>
</body>


<?php get_footer(); ?>