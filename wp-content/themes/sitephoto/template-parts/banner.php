<div class="banner">
    <h1>PHOTOGRAPHE EVENT</h1>
    <?php
    // arguments de la requête
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 1,
        'orderby' => 'rand',
    );

    // création d' une nouvelle instance de WP_Query
    $query = new WP_Query($args);

    // boucle sur les résultats
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();


            echo '<img class="banner__background" src="';
            echo the_post_thumbnail_url();
            echo '" />';
        }
    }
    // réinitialisation de la requête
    wp_reset_postdata();
    ?>

</div>