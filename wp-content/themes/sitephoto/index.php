<!-- permet d’appeler le fichier d’en-tête -->
<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <ul>
        <?php while (have_posts()) : the_post(); ?>

            <li>
                <a href="<?php the_permalink() ?>">
                    <?php the_title() ?> </a>
                -
                <?php the_author() ?>
            </li>

        <?php endwhile ?>
    </ul>
<?php else : ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>

<?php get_footer(); ?>