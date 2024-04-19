<?php
$args = array(
    'post_type' => 'photo', // Type de contenu (article)
    'posts_per_page' => 8, // Nombre d'articles à afficher
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) :
        $query->the_post();

?>


        <div class="photo-block">
            <?php if (has_post_thumbnail()) : ?>
                <div class="photopost">
                    <a href="<?php echo get_the_permalink(get_the_ID()); ?>" data-post-title="<?php echo esc_attr(get_the_title(get_the_ID())); ?>">
                        <?php the_post_thumbnail('medium', array('class' => 'post-thumbnail')); ?>
                    </a>
                </div>
            <?php endif; ?>

            <div class="photo-overlay">
                <h2 class="photo-title"><?php the_field('reference'); ?></h2>
                <h3 class="photo-categorie"><?php echo strip_tags(get_the_term_list($post->ID, 'categorie')); ?></h3>
                <div class="eye-icon">
                    <a href="<?php the_permalink() ?>" class="eye-link">
                        <img class="eye-image" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Icon_eye.png'; ?>" alt="Icone oeil pour voir la photo">
                    </a>
                </div>
                <div class="fullscreen-icon lightbox-enabled">
                    <a href="<?php the_permalink() ?>" class="fullscreen-image">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Icon_fullscreen.png'; ?>" alt="Icone fullscreen pour voir la photo en grand">
                    </a>
                </div>
            </div>
            <div class="lightbox-container">

                <span class="material-symbols-outlined material-icons lightbox-btn left" id="left">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/arrows_gauche.png'; ?>" alt="précedent">
                </span>
                <span class="material-symbols-outlined material-icons lightbox-btn right" id="right">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/arrows_droite.png'; ?>" alt="suivant">
                </span>
                <span id="close" class="close material-icons material-symbols-outlined">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Cross.png'; ?>" alt="fermer">
                </span>
                <div class="lightbox-image-wrapper">
                    <img alt="lightboximage" class="lightbox-image">
                </div>

            </div>
        </div>


<?php
    endwhile;
    wp_reset_postdata(); // Réinitialise la requête
else :
    echo 'Aucun article trouvé.';
endif;

?>