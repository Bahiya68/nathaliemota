<?php get_header(); ?>



<!-- have_posts() contrôle qu’il y a bien quelque chose à afficher -->
<!-- the_post() permet de préparer les données de l’article -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<h1><?php the_title(); ?></h1>

<?php the_content(); ?>

<?php endwhile;
endif; ?>

<?php get_footer(); ?>