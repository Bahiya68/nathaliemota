<?php get_header(); ?>

<!-- 1st part dynamique -->
<section class="detailphoto">
    <div class="photodetail">
        <div class="info">
            <h2><?php the_title(); ?></h2>
            <p>RÉFÉRENCE : <span class="ref-val"><?php the_field('reference'); ?></p>
            <p>CATÉGORIE : <?php $categorie = get_the_term_list($post->ID, 'categorie');
                            if ($categorie) {
                                echo $categorie;
                            } else {
                                echo 'Aucun terme trouvé.';
                            }
                            ?></p>
            <p>FORMAT : <?php
                        $format = get_the_term_list($post->ID, 'format');
                        if ($format) {
                            echo $format;
                        } else {
                            echo 'Aucun terme trouvé.';
                        }
                        ?></p>
            <p>TYPE : <?php the_field('type'); ?></p>
            <p>ANNÉE : <?php echo get_the_date('Y'); ?></p>
        </div>
        <div class="photos-container">
            <img class="Card-image " src="<?php echo get_the_post_thumbnail_url(); ?>"
                alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
        </div>
    </div>

    <!-- ********Mini navigation  -->

    <?php
    $previous = get_previous_post();
    $next = get_next_post();
    ?>
    <!-- 2nd part dynamique -->
    <div class="section_post_contact_nav">
        <div class="part1">
        </div>
        <section class="contact-carrousel">
            <div class="contact-btn">
                <h4>Cette photo vous intéresse ?</h4>
                <button id="myBtn">Contact</button>
            </div>
            <div class="interaction-photo__navigation">
                <?php
                $prevPost = get_previous_post();
                $nextPost = get_next_post();
                ?>
                <div class="arrows">
                    <?php if ($prevPost) : ?>
                    <a id="arrow-left" href="<?php echo get_the_permalink($previous) ?>">
                        <img class="arrow arrow-gauche"
                            src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/images/flechegauche.svg'); ?>"
                            alt="flechegauche">
                    </a>
                    <?php endif; ?>
                    <?php if ($nextPost) : ?>
                    <a href="<?php echo get_the_permalink($next) ?>">
                        <img id="arrow-right" class="arrow arrow-droite"
                            src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/images/flechedroite.svg'); ?>"
                            alt="flechedroite">
                    </a>
                    <?php endif; ?>
                </div>

                <div class="div-preview">
                    <div class="preview">
                        <?php if (!empty($prevPost)) :
                            $nextThumbnail = get_field("photo", $prevPost->ID);
                            $nextLink = get_permalink($prevPost);
                        ?>
                        <a href="<?php echo get_the_permalink($prevPost) ?>">
                            <img id="previous-image" class="previous-image"
                                src="<?php echo get_the_post_thumbnail_url($prevPost) ?>" alt="Image précédente">
                        </a>
                        <?php endif; ?>

                    </div>
                    <div class="preview">
                        <?php if (!empty($nextPost)) :
                            $nextThumbnail = get_field("photo", $nextPost->ID);
                            $nextLink = get_permalink($nextPost);
                        ?>
                        <a href="<?= esc_url(get_permalink($nextPost)); ?>">
                            <img id="next-image" class="next-image"
                                src="<?php echo get_the_post_thumbnail_url($nextPost) ?>" alt="Image suivante">
                        </a>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="autre_photos">
        <div class="autrechoix">
            <h3>VOUS AIMEREZ AUSSI</h3>
        </div>
        <div class="likephoto">
            <?php

            $term_list = wp_get_post_terms($post->ID, 'categorie', array("fields" => "ids")); // Récupère les termes de la taxonomie 'categorie' associés au post

            $args = array(
                'orderby' => 'rand', //ordonner les résultats d'une requête de manière aléatoire
                'post_type' => 'photo', // Type de contenu (article)
                'posts_per_page' => 2, // Nombre d'articles à afficher
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categorie', // Taxonomie à interroger
                        'field' => 'id', // Champs à comparer (id)
                        'terms' => $term_list, // Liste des termes à rechercher
                        //'operator' => 'IN' // Opérateur à utiliser (dans la liste)
                    )
                ),
                //'post__not_in' => array($post->ID) // Exclure le post actuel
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();

            ?>

            <?php get_template_part('/template-parts/photo'); ?>

            <?php
                endwhile;
                wp_reset_postdata(); // Réinitialise la requête
            else :
                echo 'Aucun article trouvé.';
            endif;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>