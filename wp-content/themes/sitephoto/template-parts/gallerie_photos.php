<?php
$args = array(
    'orderby' => 'rand',  //ordonner les résultats d'une requête de manière aléatoire
    'post_type' => 'photo', // Type de contenu (article)
    'posts_per_page' => 8, // Nombre d'articles à afficher
    'paged' => 1,
);

$ajaxphoto = new WP_Query($args);

if ($ajaxphoto->have_posts()) :
    while ($ajaxphoto->have_posts()) :
        $ajaxphoto->the_post();
?>
        <div class="photo-block">
            <?php get_template_part('/template-parts/photo'); ?>
        </div>
<?php
    endwhile;
    wp_reset_postdata(); // Réinitialise la requête
else :
    echo 'Aucun article trouvé.';
endif;

?>