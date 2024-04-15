<?php
get_header();
if (have_posts()) : while (have_posts()) : the_post();
?>
        <h1><?php the_title(); ?></h1>
        <!-- appele de la fonction the_post_thumbnail() -->
        <?php the_post_thumbnail(); ?>
<?php
    endwhile;
endif;
get_footer();
?>